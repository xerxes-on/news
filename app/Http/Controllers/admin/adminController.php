<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Stats;
use App\Models\User;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function index(){
      $user = User::all();
      $stats = Stats::all();
      $chrome = round(Stats::where('browser', "Chrome")->count() * 100 / count($stats),2);
      $safari = round(Stats::where('browser', "Safari")->count() * 100 / count($stats),2);
      $firefox = round(Stats::where('browser', "Firefox")->count() * 100 / count($stats),2);
      $opera = round(Stats::where('browser', "Opera")->count() * 100 / count($stats),2);
      $edge = round(Stats::where('browser', "Microsoft Edge")->count() * 100 / count($stats),2);
      return view('admin.index', compact(['chrome', 'safari', 'firefox', 'opera', 'edge', 'user']));
    }
    public function search(Request $request){
        $search = $request->search;
        $articles = Article::where(function ($query) use ($search) {
            $query->where('title_en', 'like', "%$search%")
                ->orwhere('title_uz', 'like', "%$search%")
                ->orwhere('body_en', 'like', "%$search%")
                ->orwhere('body_uz', 'like', "%$search%");
        })->get();
        return view('admin.article.index', compact('articles'));
    }
}
