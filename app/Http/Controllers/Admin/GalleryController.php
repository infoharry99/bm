<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    public function index()
    {
        $gallery = Gallery::latest()->paginate(30);
        return view('admin.gallery.index', compact('gallery'));
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'year'   => 'required',
            'caption'=> 'nullable|string',
            'image'  => 'required|image|max:4096'
        ]);

        $file = $request->image;
        $name = time().'_'.Str::random(5).'.'.$file->getClientOriginalExtension();
        $file->move(public_path('gallery'), $name);

        Gallery::create([
            'image'   => $name,
            'year'    => $request->year,
            'caption' => $request->caption
        ]);

        return redirect()->route('admin.gallery.index')
                         ->with('success', 'Image Added to Gallery!');
    }

    public function edit(Gallery $gallery)
    {
        return view('admin.gallery.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'year'   => 'required',
            'caption'=> 'nullable|string',
            'image'  => 'nullable|image|max:4096'
        ]);

        $data = $request->only(['year','caption']);

        if ($request->hasFile('image')) {
            $file = $request->image;
            $name = time().'_'.Str::random(5).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('gallery'), $name);
            $data['image'] = $name;
        }

        $gallery->update($data);

        return redirect()->route('admin.gallery.index')
                         ->with('success', 'Gallery Image Updated!');
    }

    public function destroy(Gallery $gallery)
    {
        $gallery->delete();
        return back()->with('success', 'Gallery Image Deleted!');
    }
}
