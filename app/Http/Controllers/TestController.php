<?php

namespace App\Http\Controllers;

use App\Models\test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function testview()
    {
        return view('backend.test');
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
    public function teststore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => "required",
            'email' => 'required',
            'phone' => "required",
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'error' => $validator->errors()]);
        }

        $user = test::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone
        ]);
        if ($user) {
            return response()->json(['success' => true, 'message' => 'data added successfully!']);
        } else {
            return response()->json(['success' => false, 'message' => 'Failed to add user.']);
        }
    }

    public function getData(Request $request)
    {
        if ($request->ajax()) {
            $data = test::select('*')->get();
            return DataTables::of($data)

                ->addColumn('action', function ($row) {
                    $editbutton = '<button class = "btn btn-success  edit-btn btn-sm" data-row-id="' . $row->id . '"><i class="fa-solid fa-pencil"></i></button>&nbsp;';
                    $deleteButton = '<button class="btn btn-danger  delete-btn btn-sm" data-row-id="' . $row->id . '"><i class="fa-solid fa-delete-left"></i></button>&nbsp;';
                    return $editbutton . $deleteButton;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = Test::findOrFail($id);
        if ($user) {
            return response()->json(['data' => $user]);
        } else {
            return response()->json(['error' => 'Invalid ID'], 404);
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => "required",
            'email' => "required",
            'phone' => "required",
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'error' => $validator->errors()]);
        }
        $user = test::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found.']);
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->save();

        return response()->json(['success' => true, 'message' => 'profile update sucessfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = test::find($id);
        $user->delete();
        return response()->json(['success' => 'delete sucessfully!!']);
    }
}
