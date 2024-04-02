@extends('layouts.app')

@section('content')>
    <main class="container">
        <section class="my-5">
            <div class="row">
                <div class="col-sm-12 col-md-6 mx-auto">
                    <hr>
                        <h3 class="text-center">Edit Blog Details</h3>
                    <hr>
                    <form class="my-5" method="POST" action="{{ route('blogs.update', $blog) }}" novalidate>
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="title" class="fw-bold">Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ $blog->title }}" required />
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="fw-bold">Description <span class="text-danger">*</span></label>
                            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="3" required>{{ $blog->description }}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col">
                                <button type="submit" class="btn btn-warning w-100">Submit</button>
                            </div>
                            <div class="col">
                                <a href="{{ route('blogs.index') }}" class="btn btn-outline-dark w-100">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
@endsection
