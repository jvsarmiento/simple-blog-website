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
                <a href="#" class="btn btn-warning btn-lg px-4 gap-3">Add New Blog</a>
            </div>
        </div>
    </header>

    <main class="container">
        <section class="my-5">
            <article>
                <div class="card mb-3 shadow-sm">
                    <div class="card-body pb-0">
                        <figure>
                            <blockquote class="blockquote">
                                <h3 class="fw-bolder">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eaque, pariatur.</h3>
                                <p>A well-known quote, contained in a blockquote element.</p>
                            </blockquote>
                            <figcaption class="blockquote-footer">
                                Jefferson V. Sarmiento <small>( January 01, 2000 )</small>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="card-footer">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Show all comments
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
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
        </section>
    </main>
@endsection
