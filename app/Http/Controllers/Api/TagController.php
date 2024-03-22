<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        return response()->json(Tag::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_uz' =>'unique:tags',
            'name_en' =>'unique:tags',
        ]);
        Tag::create($request->all());
        return response()->json(['message'=> 'Created successfully 🥳🥳']);
    }

    public function show($id)
    {

        return response()->json(Tag::find($id));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name_uz' =>'unique:tags',
            'name_en' =>'unique:tags',
        ]);
        Tag::find($id)->update($request->all());
        return response()->json(['message'=> 'Updated successfully 🥳🥳']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Tag::find($id)->delete();
        return response()->json(['message'=> 'Deleted successfully 🥳🥳']);
    }
}
