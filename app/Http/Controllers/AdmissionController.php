<?php

namespace App\Http\Controllers;

use App\Models\Admission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class AdmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.admission');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'date_of_birth' => 'required',
            'place_of_birth' => 'required',
            'religion' => 'required',
            'gender' => 'required',
            'street_address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'last_school_name' => 'required',
            'medium_of_instruction' => 'required',
            'last_school_result' => 'required',
            'reason_for_leaving' => 'required',
            // 'leaving_certificate' => 'required',
            // 'mark_list_report_card' => 'required',
            // 'medical_certificate' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => false, 'error' => $validator->errors()]);
        }
        $user = Admission::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->last_name,
            'date_of_birth' => date('Y-m-d H:i:s', strtotime($request->date_of_birth)),
            'place_of_birth' => $request->input('place_of_birth'),
            'religion' => $request->input('religion'),
            'religion' => $request->input('religion'),
            'gender' => $request->input('gender'),
            'street_address' => $request->input('street_address'),
            'city' => $request->input('city'),
            'state' => $request->input('state'),
            'last_school_name' => $request->input('last_school_name'),
            'medium_of_instruction' => $request->input('medium_of_instruction'),
            'last_school_name' => $request->input('last_school_name'),
            'last_school_result' => $request->input('last_school_result'),
            'reason_for_leaving' => $request->input('reason_for_leaving'),
        ]);


        if ($request->hasFile('leaving_certificate')) {
            $file = $request->file('leaving_certificate');
            if ($file->isValid()) {
                $ext = strtolower($file->getClientOriginalExtension());
                $filename = $user->id . '.' . $ext;
                $targetPath = LEAVING_CERTIFICATE;
                $file->move($targetPath, $filename);
                $user->leaving_certificate = $filename;
                $user->save();
            } else {
                return back()->with("image", "Uploaded leaving_certificate is not valid.");
            }
        }
        if ($request->hasFile('mark_list_report_card')) {
            $file = $request->file('mark_list_report_card');
            if ($file->isValid()) {
                $ext = strtolower($file->getClientOriginalExtension());
                $filename = $user->id . '.' . $ext;
                $targetPath = LEAVING_CERTIFICATE;
                $file->move($targetPath, $filename);
                $user->leaving_certificate = $filename;
                $user->save();
            } else {
                return back()->with("image", "Uploaded leaving_certificate is not valid.");
            }
        }
        //medical_certificate
        if ($request->hasFile('medical_certificate')) {
            $file = $request->file('medical_certificate');
            if ($file->isValid()) {
                $ext = strtolower($file->getClientOriginalExtension());
                $filename = $user->id . '.' . $ext;
                $targetPath = REPORT_CARD;
                $file->move($targetPath, $filename);
                $user->medical_certificate = $filename;
                $user->save();
            } else {
                return back()->with("image", "Uploaded medical_certificate is not valid.");
            }
        }
        return redirect()->route('admission')->with('success', 'Your slider Successfully Added');
    }

    /**
     * Display the specified resource.
     */
    public function getAdmissiondata(Request $request)
    {
        if ($request->ajax()) {
            $data = Admission::select("*")->get();
            return DataTables::of($data)
                ->addColumn('action', function ($row) {
                    $deletebutton = '<button class="btn btn-danger btn-sm delete-btn" data-row-id="' . $row->id . '"><i class="fa-solid fa-pencil"></i></button>&nbsp;';
                    return $deletebutton;
                })
                ->make(true);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Admission::findOrfail($id);
        $user->delete();
        return response()->json(['sucess' => true, 'sucess' => 'deleted successfully!!']);
    }
}
