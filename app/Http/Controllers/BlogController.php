<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->authorizeResource(Blog::class, 'blog');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $search = $request->input('search');

        $blogs = Blog::when($search, fn ($query, $search) => $query->search($search))
                    ->where('user_id', auth()->user()->id)->get();

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
    public function store(BlogRequest $request): RedirectResponse
    {
        Blog::create([
            ...$request->validated(),
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
    public function update(BlogRequest $request, Blog $blog)
    {
        $blog->update($request->validated());

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
