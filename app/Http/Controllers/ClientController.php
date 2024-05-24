<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

use App\Models\Client;
use App\Models\ClientSalary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.client');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => "required",
            'department' => "required",
            'designation' => "required",
            'avtar' => "required",

        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $client = Client::create([
            'name' => $request->name,
            'department' => $request->department,
            'designation' => $request->designation,
        ]);

        if ($request->hasFile('avtar')) {
            $file = $request->file('avtar');
            if ($file->isValid()) {
                $ext = strtolower($file->getClientOriginalExtension());
                $filename = $client->id . '.' . $ext;
                $targetPath = AVTAR_PATH;
                $file->move($targetPath, $filename);
                $client->avtar = $filename;
                $client->save();
            } else {
                return redirect()->back()->with("avtar", "Uploaded image is not valid.");
            }
        }
        $basicSalary = $request->salary;
        $da = 0.05 * $basicSalary;
        $hra = 0.1 * $basicSalary;
        $pf = 1000;
        $netsalary = $basicSalary + $da + $hra - $pf;

        
        $clientSalary = ClientSalary::create([
            'client_id' => $client->id,
            'salary' => $basicSalary,
            'da' => $da,
            'hra' => $hra,
            'pf' => $pf,
            'net_salary' => $netsalary,
        ]);
        return redirect()->back()->with('sucess', 'sucessfully added client!');
    }

    /**
     * Display the specified resource.
     */
    public function Getclintdata(Request $request)
    {
        if ($request->ajax()) {
            $clients = ClientSalary::with('client')
                ->join('clients', 'clients.id', '=', 'clientsalary.client_id')
                ->select('clients.id', 'clients.name', 'clients.designation', 'clients.avtar',    'clientsalary.salary', 'clientsalary.da', 'clientsalary.hra', 'clientsalary.pf', 'clientsalary.net_salary')
                ->get();

            return DataTables::of($clients)
                ->addColumn('avtar', function ($row) {
                    return '<img src="' . asset('/backend/avtar/' . $row->avtar) . '" border="2" width="90" class="img-rounded" align="center" />';
                })

                ->addColumn('action', function ($row) {
                    $editButton = '<button class="btn btn-success edit-btn btn-sm" data-row-id="' . $row->id . '"><i class="fa-solid fa-pencil"></i></button>&nbsp;';
                    $deleteButton = '<button class="btn btn-danger delete-btn btn-sm" data-row-id="' . $row->id . '"><i class="fa-solid fa-delete-left"></i></button>&nbsp;';
                    return $editButton . $deleteButton;
                })
                ->rawColumns(['avtar', 'action'])
                ->toJson();
        }
    }

    public function edit(string $id)
    {
        $client = Client::findOrFail($id);
        $clientSalary = $client->clientSalary;
        if (!$clientSalary) {
            return response()->json(['error' => 'Client salary not found'], 404);
        }
        $data = [
            'client' => $client,
            'clientSalary' => $clientSalary
        ];
        return response()->json(['data' => $data]);
    }



    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => "required",
            'department' => "required",
            'designation' => "required",

        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $client = Client::findOrfail($id);

        $client->update([
            'name' => $request->name,
            'department' => $request->department,
            'designation' => $request->designation,
        ]);

        if ($request->hasFile('avtar')) {
            $file = $request->file('avtar');
            if ($file->isValid()) {
                $ext = strtolower($file->getClientOriginalExtension());
                $filename = $client->id . '.' . $ext;
                $targetPath = AVTAR_PATH;
                $file->move($targetPath, $filename);
                $client->avtar = $filename;
                $client->save();
            } else {
                return redirect()->back()->with("avtar", "Uploaded image is not valid.");
            }
        }
        $basicSalary = $request->salary;
        $da = 0.05 * $basicSalary;
        $hra = 0.1 * $basicSalary;
        $pf = 1000;
        $netSalary = $basicSalary + $da + $hra - $pf;

        $clientSalary = ClientSalary::updateOrCreate(
            ['client_id' => $client->id],
            [
                'salary' => $basicSalary,
                'da' => $da,
                'hra' => $hra,
                'pf' => $pf,
                'net_salary' => $netSalary,
            ]
        );
        return redirect()->back()->with('success', 'Client details updated successfully!');
    }


    public function destroy(string $id)
    {
        $client = Client::findOrFail($id);
        $client->delete();
        ClientSalary::where('client_id', $id)->delete();
        return response()->json(['success' => true, 'message' => 'Client and associated salary data deleted successfully']);
    }
}
