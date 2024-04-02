@extends('layouts.app')

@section('content')>
    <main class="container">
        <section class="my-5">
            <div class="row">
                <div class="col-sm-12 col-md-6 mx-auto text-center">
                    <hr>
                        <figure class="text-center">
                            <blockquote class="blockquote">
                                <h3>{{ $blog->title }}</h3>
                                <p>{{ $blog->description }}</p>
                            </blockquote>
                            <figcaption class="blockquote-footer">
                                {{ $blog->user->name }}
                            </figcaption>
                        </figure>
                        <p><small>{{ $blog->created_at->diffForHumans() }}</small></p>
                        <a href="{{ route('blogs.index') }}" class="btn btn-warning btn-sm">View All Blogs</a>
                    <hr>
                </div>
            </div>
        </section>
    </main>
@endsection
