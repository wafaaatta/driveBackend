<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $categories = Category::with('subCategories')->get();
        return response()->json($categories, 201);


    }

    public function create()
    {
        $categories = Category::all();
        return response()->json($categories, 201);
    }


    public function store(Request $request)
    {

        if ($request->has('subCategories') && !is_array($request->subCategories)) {
            $subCategories = json_decode($request->subCategories, true);
            $request->merge(['subCategories' => $subCategories]);
        }


        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'subCategories' => 'nullable|string|max:255',
        ]);


        $category = Category::create($validatedData);


        if (!empty($request->subCategories)) {
            $category->subCategories()->attach($request->subCategories);
        }


        return response()->json($category, 201);
    }


    public function show($id)
    {
        $category = Category::with('subCategories')->find($id);


        return response()->json($category, 201);
    }

    public function edit(Int $id)
    {
        $category = Category::findOrFail($id);

        return response()->json($category, 201);

    }

    public function update(Request $request, Int $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'subCategories'=> 'nullable|string|max:255',
        ]);
        $category = Category::findOrFail($id);

        $category->update($validatedData);

        return response()->json($validatedData, 201);
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return response()->json($category, 201);
    }
}