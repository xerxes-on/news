<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
           return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_uz' =>'unique:categories',
            'name_en' =>'unique:categories',
        ]);
        Category::create($request->all());
        return redirect()->route('category.index')->with('message', 'Created successfully 🥳🥳');
    }

    public function show(Category $category)
    {
        return view('admin.category.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));

    }
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name_uz' =>'unique:categories',
            'name_en' =>'unique:categories',
        ]);
        $category->update(($request->all()));
        return redirect()->back()->with('message', 'Updated successfully 🥳');

    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->back()->with('message', 'Deleted successfully 🥳');
    }
}
