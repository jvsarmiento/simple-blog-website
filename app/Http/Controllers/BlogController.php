<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $blogs = Blog::where('user_id', auth()->user()->id)->get();

        return view('blogs.index', [
            'blogs' => $blogs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        Blog::create([
            ...$request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
            ]),
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('blogs.index')->with([
            'alert-message' => 'Blog created successfully.'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog): View
    {
        return view('blogs.show', [
            'blog' => $blog
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog): View
    {
        return view('blogs.edit', [
            'blog' => $blog
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $blog->update($request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]));

        return redirect()->route('blogs.index')->with([
            'alert-message' => 'Blog updated successfully.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog): RedirectResponse
    {
        $blog->delete();

        return redirect()->route('blogs.index')->with([
            'alert-message' => 'Blog deleted successfully.'
        ]);
    }
}
