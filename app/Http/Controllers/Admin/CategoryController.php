<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::paginate();
        return view('admin.categories', [
            'categories' => $categories,
        ]);
    }

    public function create()
    {
        return view('admin.categoryCreate');
    }

    public function store(CategoryRequest $request)
    {
        Category::create([
            'category' => $request->category,
        ]);

        return redirect()->route('admin.categories');
    }

    public function edit(Category $category)
    {
        return view('admin.categoryEdit', [
            'category' => $category,
        ]);
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $category->update([
            'category' => $request->category,
        ]);

        return redirect()->route('admin.categories');
    }

    public function destroy(Category $category)
    {
        $category->articleCategories()->delete();
        $category->delete();
        return redirect()->route('admin.categories');
    }

}
