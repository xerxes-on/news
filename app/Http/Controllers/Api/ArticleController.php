<?php

namespace App\Http\Controllers\Api;

use App\Events\Action_store;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
     public function index()
    {
        return response()->json(Article::all());
    }

    public function store(Request $request)
    {
        $insert = $request->except('tags');
        $tags = $request['tags'];
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
//        event(new Action_store($article,'create', auth()->user(), $request->ip(), 'articles' ));
        return response()->json(['message'=> 'Created successfully 🥳🥳']);
    }

    public function show($id)
    {

        return response()->json(Article::find($id));
    }

    public function update(Request $request, $id)
    {
        $article = Article::find($id);
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
//        $article->tags()->attach($tags);
//        event(new Action_store($article,'update', auth()->user(), $request->ip(), 'articles' ));
        return response()->json(['message'=> 'Updated successfully 🥳🥳']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Article::find($id)->delete();
        return response()->json(['message'=> 'Deleted successfully 🥳🥳']);
    }
}
