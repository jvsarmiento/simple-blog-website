@extends('layouts.app')

@section('content')
    <header>
        <div class="px-4 py-5 text-center bg-light">
            <span class="fs-4">Welcome to</span>
            <h1 class="display-5 fw-bold text-body-emphasis">{{ config('name', 'Simple Blog Website') }}</h1>
            <div class="col-lg-6 mx-auto">
                <p class="lead">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore incidunt, ab nobis eum libero, animi assumenda adipisci molestias veniam illo ea doloribus accusamus aspernatur quasi.
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
                                                <li class="list-group-item">
                                                    <figure>
                                                        <blockquote class="blockquote">
                                                            <p>Comment #1</p>
                                                        </blockquote>
                                                        <figcaption class="blockquote-footer">
                                                            Jefferson V. Sarmiento <small>( January 01, 2000 )</small>
                                                        </figcaption>
                                                    </figure>
                                                </li>
                                            </ul>
                                            <form>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="Enter your comment here..." />
                                                    <button class="btn btn-dark" type="button">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            @empty

            @endforelse
            {{-- Pagination --}}
        <div class="d-flex justify-content-center">
            {{ $blogs->links() }}
        </div>
        </section>
    </main>
@endsection
