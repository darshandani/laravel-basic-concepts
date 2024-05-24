<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.products');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => "required",
            'image' => "required",
            'desc' => "required"
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $product = Product::create([
            'name' => $request->name,
            'desc' => $request->desc,
        ]);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            if ($file->isValid()) {
                $ext = strtolower($file->getClientOriginalExtension());
                $filename = $product->id . '.' . $ext;
                $targetPath = PRODUCT_IMAGE;
                $file->move($targetPath, $filename);
                $product->image = $filename;
            } else {
                return back()->with("image", "Uploaded image is not valid.");
            }
        }
        $product->save();
        return back()->with('error', 'something wrog!');
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
        //
    }
}
