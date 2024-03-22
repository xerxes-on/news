<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return response()->json(Category::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_uz' =>'unique:categories',
            'name_en' =>'unique:categories',
        ]);
        Category::create($request->all());
        return response()->json(['message'=> 'Created successfully 🥳🥳']);
    }

    public function show($id)
    {

        return response()->json(Category::find($id));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name_uz' =>'unique:categories',
            'name_en' =>'unique:categories',
        ]);
        Category::find($id)->update($request->all());
        return response()->json(['message'=> 'Updated successfully 🥳🥳']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Category::find($id)->delete();
        return response()->json(['message'=> 'Deleted successfully 🥳🥳']);

    }
}
