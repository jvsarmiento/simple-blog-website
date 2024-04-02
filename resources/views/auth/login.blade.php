@extends('layouts.app')

@section('content')
<div class="container">
    <section class="my-5">
        <div class="row">
            <div class="col-sm-12 col-md-6 mx-auto">
                <hr>
                <h3 class="text-center">Login your Account</h3>
                <hr>
                <form class="my-5" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="fw-bold">Email Address <span class="text-danger">*</span></label>
                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="someone@example.com" required />
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="fw-bold">Password <span class="text-danger">*</span></label>
                        <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="********" required />
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-warning w-100">Submit</button>
                    <p class="mt-3 text-center">
                        Don't have an account yet? <a href="{{ route('register') }}" class="text-decoration-none">Click here to register</a>
                    </p>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection
