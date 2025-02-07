@extends('layouts.auth')

@section('title', 'Register')

@section('content')
    <p class="text-center fs-4 mb-0 fw-bold">Register</p>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input name="name" type="text" class="form-control" id="name">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input name="email" type="email" class="form-control" id="email">
        </div>
        <div class="mb-4">
            <label for="password" class="form-label">Password</label>
            <input name="password" type="password" class="form-control" id="password">
        </div>
        <div class="mb-4">
            <label for="password_confirmation" class="form-label">Confirmation Password</label>
            <input name="password_confirmation" type="password" class="form-control" id="password_confirmation">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">
                Register
            </button>
        </div>
        <div class="d-flex align-items-center justify-content-center">
            <p class="fs-4 mb-0 fw-bold">Already have an Account?</p>
            <a class="text-primary fw-bold ms-2" href="{{ route('login') }}">Sign In</a>
        </div>
    </form>
@endsection
