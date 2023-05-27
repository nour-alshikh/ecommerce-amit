<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use Illuminate\Http\Request;

class CatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cats = Cat::get();
        return view('admin.cats.index', compact('cats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.cats.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        cat::create([
            'name' => $request['name'],
        ]);

        $cats = cat::get();
        return redirect(route('cats.index'))->with('success_message', 'Category Added Successfully')->with('cats');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cat = cat::findOrFail($id);
        return view('admin.cats.edit', compact('cat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cat = cat::findOrFail($id);
        $cat->update([
            'name' => $request->name,
        ]);

        $cats = cat::get();
        return redirect(route('cats.index'))->with('primary_message', 'Category Updated Successfully')->with('cats');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cat = cat::findOrFail($id);
        $cat->delete();

        $cats = cat::get();
        return redirect()->back()->with('danger_message', 'Category Deleted Successfully');
    }
}
