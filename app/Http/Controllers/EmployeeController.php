<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function employee()
    {
        return view('backend.employee');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function employeeList()
    {
        return view('backend.employeeList');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $data = Employee::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        return redirect()->route('employee.view');
    }

    /**
     * Display the specified resource.
     */
    public function employeegetdata(Request $request)
    {
        if ($request->ajax()) {
            $data = Employee::select('*')->get();
            return DataTables::of($data)
                ->addColumn('action', function ($row) {
                    $editButton = '<button class="btn btn-dark edit-btn btn-sm" data-row-id="' . $row->id . '" ><i class="fa-solid fa-pencil"></i></button>&nbsp;';
                    $deleteButton = '<button class="btn btn-dark delete-btn btn-sm" data-row-id="' . $row->id . '" ><i class="fa-solid fa-delete-left"></i></button>&nbsp;';
                    return $editButton . $deleteButton;
                })

                ->rawColumns(['action'])
                ->make(true);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = employee::findOrfail($id);
        if ($user) {
            return view('backend.employee-edit', compact('user'));
        } else {
            return redirect()->back()->with('error', 'invalid id!');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $user = employee::findOrfail($id);
        $rule = [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ];
        $validator = Validator::make($data, $rule);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $user->update($data);
        return redirect()->route('employeeList')->with('success', 'Employee updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = employee::find($id);
        $user->delete();
        return response()->json(['success' => 'employee delete successfully']);
    }
}
