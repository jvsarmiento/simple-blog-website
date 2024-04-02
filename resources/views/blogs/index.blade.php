@extends('layouts.app')

@section('content')
    <header>
        <div class="px-4 py-5 text-center bg-light">
            <span class="fs-4">Welcome to</span>
            <h1 class="display-5 fw-bold text-body-emphasis">Blog Management</h1>
            <div class="col-lg-6 mx-auto">
                <p class="lead mb-4">
                    You can manage your blogs here
                </p>
            </div>
        </div>
    </header>

    <main class="container">
        <section class="my-5">
            @if (session()->has('alert-message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> {{ session('alert-message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="fw-bolder m-0 p-0">List</h4>
                        <a href="{{ route('blogs.create') }}" class="btn btn-success btn-sm">Add</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped table-hover table-sm w-100">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th class="text-center" width="15%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($blogs as $blog)
                                <tr>
                                    <td>{{ $blog->title }}</td>
                                    <td>{{ $blog->description }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('blogs.show', $blog) }}" class="btn btn-dark btn-sm">View</a>
                                        <a href="{{ route('blogs.edit', $blog) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form class="d-inline" method="POST" action="{{ route('blogs.destroy', $blog) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">No blog posted yet.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>
@endsection
