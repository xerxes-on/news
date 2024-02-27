<?php

namespace App\Http\Controllers\admin;

use App\Events\Action_store;
use App\Events\Actionstore;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{

     public function index()
    {
        $articles = Article::all();
        return view('admin.article.index', compact('articles'));
    }

    public function create()
    {
        $tags  = Tag::all();
        $categories = Category::all();
        return view('admin.article.create', compact(['categories','tags']));
    }

    public function store(Request $request)
    {
        $insert = $request->except('tags');
        $tags = $request['tags'];
//        dd($insert);
        $request->validate([
            'photo' =>'mimes:png,svg,jpg,jpeg,webp|required',
            'title_uz' =>'min:5|required',
            'title_en' =>'min:5|required',
        ]);
//        Image Handling
        $file = $request->file('photo');
        $fileName  = time() .'-'. $file->getClientOriginalName();
        $file->move('files/images' , $fileName);

        $insert['photo'] = $fileName;

        $article = Article::create($insert);
        $article->tags()->attach($tags);
        event(new Action_store($article,'create', auth()->user(), $request->ip(), 'articles' ));
        return redirect()->route('article.index')->with('message', 'Created successfully 🥳🥳');
    }

    public function show(Article $article)
    {

        return view('admin.article.show', compact('article'));
    }

    public function edit(Article $article)
    {
        $tags  = Tag::all();
        $categories = Category::all();

        return view('admin.article.edit', compact(['article', 'categories','tags']));

    }
    public function update(Request $request, Article $article)
    {
        $insert = $request->except('tags');
        $tags = $request['tags'];
        if($request->hasFile('photo')){
              $request->validate([
                'photo' =>'mimes:png,jpg,jpeg,svg,webp|required',
            ]);
    //        Image Handling
            $file = $request->file('photo');
            $fileName  = time() .'-'. $file->getClientOriginalName();
            $file->move('files/images' , $fileName);
            unlink('files/images/' . $article['photo']);
            $insert['photo'] = $fileName;
        }

        $article->update($insert);
        $article->tags()->attach($tags);
        event(new Action_store($article,'update', auth()->user(), $request->ip(), 'articles' ));

        return redirect()->route('article.index')->with('message', 'Updated successfully 🥳');

    }

    public function destroy(Article $article, Request $request)
    {
        event(new Action_store($article,'delete', auth()->user(), $request->ip(), 'articles' ));
        unlink('files/images/' . $article['photo']);
        $article->delete();
        return redirect()->back()->with('message', 'Deleted successfully 🥳');
    }
}
