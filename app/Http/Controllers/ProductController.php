<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(9);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cats = Cat::get();
        return view('admin.products.create', compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $ext = $img->getClientOriginalExtension();
            $name = 'product-' . uniqid() . '.' . $ext;
            $img->move(public_path('uploads/products'), $name);

            Product::create([
                'name' => $request['name'],
                'description' => $request['description'],
                'price' => $request['price'],
                'sale' => $request['sale'],
                'quantity' => $request['quantity'],
                'cat_id' => $request['cat_id'],
                'image' => $name,
            ]);
        }


        $products = Product::paginate(9);
        return redirect(route('products.index'))->with('success_message', 'Product Added Successfully')->with('products');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        $cats = Cat::get();
        return view('user.product', compact('product', 'cats'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cats = Cat::get();
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product', 'cats'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);


        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $ext = $img->getClientOriginalExtension();
            $name = 'product-' . uniqid() . '.' . $ext;
            $img->move(public_path('uploads/products'), $name);

            $product->update([
                'name' => $request['name'],
                'description' => $request['description'],
                'price' => $request['price'],
                'sale' => $request['sale'],
                'quantity' => $request['quantity'],
                'cat_id' => $request['cat_id'],
                'image' => $name,
            ]);
        }

        $product->update([
            'name' => $request['name'],
            'description' => $request['description'],
            'price' => $request['price'],
            'sale' => $request['sale'],
            'quantity' => $request['quantity'],
            'cat_id' => $request['cat_id'],
        ]);

        $products = Product::paginate(9);
        return redirect(route('products.index'))->with('primary_message', 'Product Updated Successfully')->with('products');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if ($product->image !== null) {
            unlink(public_path('uploads/products/') . $product->image);
        }

        $product->delete();

        $products = Product::paginate(9);
        return redirect()->back()->with('danger_message', 'Product Deleted Successfully')->with('products');
    }
}
