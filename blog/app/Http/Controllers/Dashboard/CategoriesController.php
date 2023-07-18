<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{



    public function index()
    {
        $categories = Category::all();
        return view('dashboard.categories.index', compact('categories'));
    }




    public function create()
    {
        $category = new Category();

        return view('dashboard.categories.create', compact('category'));
    }



    public function store(StoreCategoryRequest $request)
    {

        DB::beginTransaction();

        $data = $request->validated();

        $category = Category::create($data);

        if ($request->hasFile('image')) {
            $category
                ->addMedia(request()->image)
                ->toMediaCollection('category_image');
        }

        DB::commit();

        return Redirect::route('dashboard.categories.index')
            ->with('success', 'Category Created!');
    }





    public function edit(Category $category)
    {
        return view('dashboard.categories.edit', compact('category'));
    }





    public function update(UpdateCategoryRequest $request, Category $category)
    {
        DB::beginTransaction();

        $category->update($request->validated());

        if ($request->hasFile('image')) {
            $category
                ->addMedia(request()->image)
                ->toMediaCollection('category_image');
        }
        DB::commit();

        return Redirect::route('dashboard.categories.index')
            ->with('success', 'Category Updated!');
    }



    public function destroy(Category $category)
    {
        $category->delete();

        return Redirect::route('dashboard.categories.index')
            ->with('success', 'Category Deleted!');
    }
}
