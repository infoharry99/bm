<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\Gallery;

class GalleryController extends Controller
{
    // public function index()
    // {
    //     // Get all image files from public/gallery
    //     $images = File::files(public_path('gallery'));
    //     $images = array_filter($images, function ($file) {
    //         $ext = strtolower($file->getExtension());
    //         return in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp']);
    //     });
    //     // dd($images );

    //     return view('gallery', compact('images'));
    // }

    public function index() {
        $gallery = Gallery::orderBy('year','DESC')->get()->groupBy('year');
        return view('gallery.index', compact('gallery'));
    }

    public function gallery(Request $request){
        return view('admin.gallery');
    }
    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('gallery'), $imageName);

        return back()->with('success', 'Image uploaded successfully.');
    }
}
