<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index() {
        $news = News::latest()->paginate(12);
        return view('admin.news.index', compact('news'));
    }

    public function create() {
        return view('admin.news.create');
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
            $file->move(public_path('news'), $name);
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
            // $file->storeAs('public/news', $name);
            $file->move(public_path('news'), $name);
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
