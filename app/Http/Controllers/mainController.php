<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Stats;
use App\Models\Tag;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class mainController extends Controller
{
    public function browser_stats()
    {
          $stats = Stats::all();
        $chrome = round(Stats::where('browser', "Chrome")->count() * 100 / count($stats),2);
      $safari = round(Stats::where('browser', "Safari")->count() * 100 / count($stats),2);
      $firefox = round(Stats::where('browser', "Firefox")->count() * 100 / count($stats),2);
      $edge = round(Stats::where('browser', "Microsoft Edge")->count() * 100 / count($stats),2);
       return  [$chrome,$safari,$firefox,$edge];

    }
    public function index(){
      $response = Http::get('https://cbu.uz/uz/arkhiv-kursov-valyut/json/');
      $data = $response->json();
      $ad = Ad::all();
      $articles = Article::take(8)->get();
      $latest_articles = Article::latest()->take(6)->get();;
      $categories = Category::all();
      $most_viewed_articles = Article::orderBy('viewsint', 'desc')->take(3)->get();
      $browser = $this->browser_stats();
      return view('pages.home', compact([
        'categories',
        'articles',
        'latest_articles',
        'most_viewed_articles',
        'ad',
        'data',
        'browser'
      ]));
    }
    public function show(Article $article){
      $response = Http::get('https://cbu.uz/uz/arkhiv-kursov-valyut/json/');
      $data = $response->json();
      $categories = Category::all();
      $comments = $article->comments;
      $browser = $this->browser_stats();
      $most_viewed_articles = Article::orderBy('viewsint', 'desc')->take(5)->get();
      $related_articles = Article::where('category_id', $article->category_id)->latest()->take(3)->get();
      return view('pages.show',compact([
        'article',
        'categories',
        'most_viewed_articles',
        'related_articles',
        'data',
        'comments',
        'browser'
      ]));
    }
    public function list(Category $category){
      $response = Http::get('https://cbu.uz/uz/arkhiv-kursov-valyut/json/');
      $data = $response->json();
      $categories = Category::all();
      $browser = $this->browser_stats();
      $most_viewed_articles = Article::orderBy('viewsint', 'desc')->take(5)->get();
      $articles=Article::where('category_id', $category->id)->latest()->take(7)->get();
      return view('pages.list', compact([
        'categories',
        'articles',
        'most_viewed_articles',
        'data',
        'browser'
      ]));
    }
    public function comment(Request $request, $article){
      $insert = $request->all();
      $insert['name'] = 'Guest';
      $insert['status'] = 0;
      $insert['permitted'] = 1;
      $insert['article_id'] = $article;
      Comment::create($insert);
      return redirect()->back()->with('message', 'Posted successfully 🥳');
    }
    public function hashtag(Tag $tag){
      $response = Http::get('https://cbu.uz/uz/arkhiv-kursov-valyut/json/');
      $data = $response->json();
      $categories = Category::all();
      $most_viewed_articles = Article::orderBy('viewsint', 'desc')->take(5)->get();
      $articles = $tag->articles->take(5);
      return view('pages.list', compact([
        'categories',
        'articles',
        'most_viewed_articles',
        'data',
      ]));
    }
    public function lang($lang){
        session(['lang' => $lang]);
        return redirect()->back();
    }
    public function theme(){
        if(session()->has('dark')){
            session()->forget('dark');
        } else {
            session(['dark' => true]);
        }

        return redirect()->back();
    }
    public function search(Request $request){
        $search = $request->search;
        $categories = Category::all();
        $most_viewed_articles = Article::orderBy('viewsint', 'desc')->take(5)->get();
        $response = Http::get('https://cbu.uz/uz/arkhiv-kursov-valyut/json/');
        $data = $response->json();
        $articles = Article::where(function ($query) use ($search) {
            $query->where('title_' . session('lang'), 'like', "%$search%")
                ->orwhere('body_' . session('lang'), 'like', "%$search%");
        })->orWhereHas('category', function ($query) use ($search){
            $query->where('name_' . session('lang'), 'like', "%$search%");
        })->orWhereHas('tags', function ($query) use ($search){
            $query->where('name_' . session('lang'), 'like', "%$search%");
        })->get();
        return view( 'pages.list', compact('articles',
            'categories',
                        'most_viewed_articles',
                        'data'
        ));
    }

}
