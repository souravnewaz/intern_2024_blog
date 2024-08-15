<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $blogs = Blog::with('user')->orderBy('id', 'DESC')->get();

        return view('home', compact('blogs'));
    }
}
