@extends('layouts.app')

@section('content')
    <header>
        <div class="px-4 py-5 text-center bg-light">
            <span class="fs-4">Welcome to</span>
            <h1 class="display-5 fw-bold text-body-emphasis">{{ config('name', 'Simple Blog Website') }}</h1>
            <div class="col-lg-6 mx-auto">
                <p class="lead">
                    This simple blog website is for technical exam purposes only
                </p>
                @if (!Auth::check())
                    <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mt-4">
                        <a href="{{ route('login') }}" class="btn btn-warning btn-lg px-4 gap-3">Login</a>
                        <a href="{{ route('register') }}" class="btn btn-outline-dark btn-lg px-4">Register</a>
                    </div>
                @endif
            </div>
        </div>
    </header>

    <main class="container">
        <section class="my-5">
            @forelse ($blogs as $blog)
                <article>
                    <div class="card mb-3 shadow-sm">
                        <div class="card-body pb-0">
                            <figure>
                                <blockquote class="blockquote">
                                    <h3 class="fw-bolder">{{ $blog->title }}.</h3>
                                    <p>{{ $blog->description }}</p>
                                </blockquote>
                                <figcaption class="blockquote-footer">
                                    {{ $blog->user->name }} <small>({{ $blog->created_at->diffForHumans() }})</small>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="card-footer">
                            <div class="accordion" id="accordion-{{ $blog->id}}">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $blog->id}}" aria-expanded="true" aria-controls="collapse-{{ $blog->id}}">
                                            Show all comments
                                        </button>
                                    </h2>
                                    <div id="collapse-{{ $blog->id}}" class="accordion-collapse collapse" data-bs-parent="#accordion-{{ $blog->id}}">
                                        <div class="accordion-body">
                                            <ul class="list-group list-group-flush">
                                                @forelse ($blog->comments as $comment)
                                                    <li class="list-group-item">
                                                        <figure>
                                                            <blockquote class="blockquote">
                                                                <p>{{ $comment->comment }}</p>
                                                            </blockquote>
                                                            <figcaption class="blockquote-footer">
                                                                {{ $comment->user->name }} <small>( {{ $comment->created_at->diffForHumans() }} )</small>
                                                            </figcaption>
                                                        </figure>
                                                    </li>
                                                @empty
                                                    <li class="list-group-item">
                                                        <figure>
                                                            <blockquote class="blockquote">
                                                                <p>No comment posted yet.</p>
                                                            </blockquote>
                                                        </figure>
                                                    </li>
                                                @endforelse
                                            </ul>
                                            @if (Auth::check())
                                            <form method="POST" action="{{ route('blogs.comments.store', $blog) }}">
                                                @csrf
                                                <div class="input-group">
                                                    <input type="text" name="comment" class="form-control" placeholder="Enter your comment here..." />
                                                    <button type="submit" class="btn btn-dark">Submit</button>
                                                </div>
                                            </form>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            @empty
                <div class="px-4 py-5 text-center">
                    <h3 class="fw-bold text-body-emphasis">
                        No Blog Posted Yet
                    </h3>
                    <a href="{{ route('blogs.create') }}" class="btn btn-warning btn-sm px-4 gap-3">Post a new Blog</a>
                </div>
            @endforelse
            <div class="d-flex justify-content-center">
                @if ($blogs)
                    {{ $blogs->links() }}
                @endif
            </div>
        </section>
    </main>
@endsection
