<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('product.index', ['product' => Product::get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //Validation
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required'

        ]);




        //upload image and store in database/public/products/filename
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('products'), $imageName);

        $product = new Product;
        $product->image = $imageName;
        $product->name = $request->name;
        $product->description = $request->description;

        $product->save();
        return back()->withSuccess('Product Created Successfully');
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
        // dd($id);
        $product = Product::where('id', $id)->first();
        return view('product.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required'

        ]);

        $product = Product::where('id', $id)->first();

        if (isset($request->image)) {




            //upload image and store in database/public/products/filename
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('products'), $imageName);


            $product->image = $imageName;
        }
        $product->name = $request->name;
        $product->description = $request->description;

        $product->save();
        return back()->withSuccess('Product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::where('id', $id)->first();
        $product->delete();
        return back()->withSuccess('Product Deleted Successfully');
    }
}
