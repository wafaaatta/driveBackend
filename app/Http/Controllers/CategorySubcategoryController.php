<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;

class CategorySubCategoryController extends Controller
{
    /**
     * Attach a sub-category to a category.
     */
    public function attachSubCategory(Request $request, $categoryId, $subCategoryId)
    {
        $category = Category::findOrFail($categoryId);
        $subCategory = SubCategory::findOrFail($subCategoryId);

        $category->subCategories()->attach($subCategoryId);

        return response()->json(['message' => 'Sub-category attached successfully.']);
    }

    /**
     * Detach a sub-category from a category.
     */
    public function detachSubCategory(Request $request, $categoryId, $subCategoryId)
    {
        $category = Category::findOrFail($categoryId);
        $subCategory = SubCategory::findOrFail($subCategoryId);

        $category->subCategories()->detach($subCategoryId);

        return response()->json(['message' => 'Sub-category detached successfully.']);
    }

    /**
     * List all sub-categories for a given category.
     */
    public function listSubCategories($categoryId)
{

    $category = Category::findOrFail($categoryId);


    $response = [
        'category_name' => $category->name,
        'sub_categories' => $category->subCategories->pluck('name')
    ];


    return response()->json($response);
}

    /**
     * List all categories for a given sub-category.
     */
    public function listCategories($subCategoryId)
    {
        $subCategory = SubCategory::findOrFail($subCategoryId);

        $response = [
            'sub_categories_name' => $subCategory->name,
            'category' => $subCategory->categories->pluck('name')
        ];
        return response()->json($subCategory->categories);
    }
}