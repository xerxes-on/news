<?php

namespace App\Http\Controllers\admin;

use App\Events\Action_store;
use App\Http\Controllers\Controller;
use App\Models\Ad;
use Illuminate\Http\Request;

class AdController extends Controller
{
     public function index()
    {
        $ads = Ad::all();
        return view('admin.ad.index', compact('ads'));
    }

    public function create()
    {
           return view('admin.ad.create');
    }

    public function store(Request $request)
    {
       $insert = $request->all();
        $request->validate([
            'img1' =>'mimes:png,svg,jpg,jpeg,webp,gif,mp4|required',
            'img2' =>'mimes:png,svg,jpg,jpeg,webp,gif,mp4|required',
        ]);
//        Image Handling
        $file = $request->file('img1');
        $fileName  = time() .'-'. $file->getClientOriginalName();
        $file->move('files/images' , $fileName);
        $file2 = $request->file('img2');
        $fileName2  = time() .'-'. $file2->getClientOriginalName();
        $file2->move('files/images' , $fileName2);

        $insert['img1'] = $fileName;
        $insert['img2'] = $fileName2;

        $ad = Ad::create($insert);
        event(new Action_store($ad,'create', auth()->user(), $request->ip(), 'articles' ));

        return redirect()->route('ad.index')->with('message', 'Created successfully 🥳🥳');
    }

    public function show(Ad $ad)
    {
        return view('admin.ad.show', compact('ad'));
    }

    public function edit(Ad $ad)
    {
        return view('admin.ad.edit', compact('ad'));

    }
    public function update(Request $request, Ad $ad)
    {
      $insert = $request->all();
        if($request->hasFile('img1')){
              $request->validate([
                'img1' =>'mimes:png,jpg,jpeg,svg,webp,gif,mp4|required',
              ]);
    //        Image Handling
            $file = $request->file('img1');
            $fileName  = time() .'-'. $file->getClientOriginalName();
            $file->move('files/images' , $fileName);
            unlink('files/images/' . $ad['img1']);
            $insert['img1'] = $fileName;
        }elseif($request->hasFile('img2'))
        {
              $request->validate([
                'img2' =>'mimes:png,jpg,jpeg,svg,webp,gif,mp4|required',
              ]);
            $file = $request->file('img2');
            $fileName  = time() .'-'. $file->getClientOriginalName();
            $file->move('files/images' , $fileName);
            unlink('files/images/' . $ad['img2']);
            $insert['img2'] = $fileName;
        }
        $ad->update($insert);
        event(new Action_store($ad,'update', auth()->user(), $request->ip(), 'articles' ));

        return redirect()->route('ad.index')->with('message', 'Updated successfully 🥳');

    }

    public function destroy(Ad $ad, Request $request)
    {
        unlink('files/images/' . $ad['img1']);
        unlink('files/images/' . $ad['img2']);
        event(new Action_store($ad,'delete', auth()->user(), $request->ip(), 'articles' ));
        $ad->delete();
        return redirect()->route('ad.index')->with('message', 'Deleted successfully 🥳');
    }
}
