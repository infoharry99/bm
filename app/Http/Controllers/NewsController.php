<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index() {
    $news = News::latest()->get();
    return view('news.index', compact('news'));
}
 public function cookies() {
    return view('news.cookies');
}


public function store(Request $r) {
        $r->validate([
            'title'=>'required|string|max:255',
            'details'=>'nullable|string',
            'url'=>'nullable|url',
            'image'=>'nullable|image|max:4096'
        ]);

        $data = $r->only(['title','details','source','url']);

        if($r->hasFile('image')) {
            $file = $r->file('image');
            $name = time().'_'.Str::random(6).'.'.$file->getClientOriginalExtension();
            $file->storeAs('public/news', $name);
            $data['image'] = $name;
        }

        News::create($data);
        return redirect()->route('admin.news.index')->with('success','News added.');
    }

    public function edit(News $news) {
        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $r, News $news) {
        $r->validate([
            'title'=>'required|string|max:255',
            'image'=>'nullable|image|max:4096'
        ]);

        $data = $r->only(['title','details','source','url']);
        if($r->hasFile('image')) {
            $file = $r->file('image');
            $name = time().'_'.Str::random(6).'.'.$file->getClientOriginalExtension();
            $file->storeAs('public/news', $name);
            $data['image'] = $name;
        }

        $news->update($data);
        return redirect()->route('admin.news.index')->with('success','News updated.');
    }

    public function destroy(News $news) {
        $news->delete();
        return back()->with('success','News deleted.');
    }

}
