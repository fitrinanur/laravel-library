<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomepagesController extends Controller
{
    public function about()
    {
        return view('home_pages.about');
    }
    public function arrival()
    {
        return view('home_pages.arrival');
    }
    public function news()
    {
        return view('home_pages.news');
    }
    public function librarian()
    {
        return view('home_pages.librarian');
    }
}
