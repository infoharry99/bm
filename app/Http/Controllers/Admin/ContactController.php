<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{

    public function index()
    {
        $contacts = DB::table('contact_messages')
                    ->orderBy('id','desc')
                    ->get();

        return view('admin.contact.index', compact('contacts'));
    }

}