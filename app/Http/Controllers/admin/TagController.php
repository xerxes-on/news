<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tag.index', compact('tags'));
    }

    public function create()
    {
           return view('admin.tag.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_uz' =>'unique:tags',
            'name_en' =>'unique:tags',
        ]);
        Tag::create($request->all());
        return redirect()->route('tag.index')->with('message', 'Created successfully 🥳🥳');
    }

    public function show(Tag $tag)
    {
        return view('admin.tag.show', compact('tag'));
    }

    public function edit(Tag $tag)
    {
        return view('admin.tag.edit', compact('tag'));

    }
    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name_uz' =>'unique:tags',
            'name_en' =>'unique:tags',
        ]);
        $tag->update(($request->all()));
        return redirect()->back()->with('message', 'Updated successfully 🥳');

    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->back()->with('message', 'Deleted successfully 🥳');;
    }
}
