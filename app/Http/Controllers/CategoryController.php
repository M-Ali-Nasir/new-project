<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    //all category page
    public function allCategoriesView()
    {
        if (Auth::user() && Auth::user()->role == 'admin') {
            $categories = ProductCategory::all();

            $user = Auth::user();
            return view('admin.allCategories', compact('user', 'categories'));
        }
    }

    //create category page
    public function createCategoryView()
    {
        if (Auth::user() && Auth::user()->role == 'admin') {


            $user = Auth::user();
            return view('admin.createCategory', compact('user'));
        }
    }


    //edit category page
    public function editCategoryView($id)
    {
        if (Auth::user() && Auth::user()->role == 'admin') {


            $user = Auth::user();
            $category = ProductCategory::where('id', $id)->first();
            if ($category) {
                return view('admin.editCategory', compact('user', 'category'));
            } else {
                return redirect()->back();
            }
        }
    }


    public function createCategory(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $newCategory = new ProductCategory();
        $newCategory->name = $validated['name'];

        $newCategory->save();

        return redirect()->back();
    }

    public function editCategory(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);


        $category = ProductCategory::where('id', $request->id)->first();

        if ($category) {
            $category->name = $validated['name'];
        }

        $category->save();


        return redirect()->back();
    }

    public function deleteCategory($id)
    {
        $category = ProductCategory::where('id', $id)->first();

        if ($category) {
            $category->delete();
        }

        return redirect()->back();
    }
}
