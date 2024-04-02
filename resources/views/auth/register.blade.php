@extends('layouts.app')

@section('content')
<div class="container">
    <section class="my-5">
        <div class="row">
            <div class="col-sm-12 col-md-6 mx-auto">
                <hr>
                <h3 class="text-center">Register an Account</h3>
                <hr>
                <form class="my-5" method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="fw-bold">Full Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Firstname M.I. Lastname" required />
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
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
                    <div class="mb-3">
                        <label for="password-confirm" class="fw-bold">Confirm Password <span class="text-danger">*</span></label>
                        <input type="password" name="password_confirmation" id="password-confirm" class="form-control" placeholder="********" required />
                    </div>
                    <button type="submit" class="btn btn-warning w-100">Submit</button>
                    <p class="mt-3 text-center">
                        Already have an account? <a href="{{ route('login') }}" class="text-decoration-none">Click here to login</a>
                    </p>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection
