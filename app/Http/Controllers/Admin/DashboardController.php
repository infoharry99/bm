<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\Member;

class DashboardController extends Controller
{
    public function index()
    {
        $news = News::latest()->limit(5)->get();
        $events = Event::latest()->limit(5)->get();
        $gallery = Gallery::latest()->limit(6)->get();
        $members = Member::count();
        return view('admin.dashboard', compact('news','events','gallery','members'));
    }
}
