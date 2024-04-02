<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(): View
    {
        $blogs = Blog::latest()->simplePaginate(5);

        return view('index', [
            'blogs' => $blogs
        ]);
    }
}
