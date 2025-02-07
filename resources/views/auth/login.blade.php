@extends('layouts.auth')

@section('title', 'Login')

@section('content')
    <p class="text-center fs-4 mb-0 fw-bold">Login</p>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input name="email" type="email" class="form-control" id="email">
        </div>
        <div class="mb-4">
            <label for="password" class="form-label">Password</label>
            <input name="password" type="password" class="form-control" id="password">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">
                Sign In
            </button>
        </div>
        <div class="d-flex align-items-center justify-content-center">
            <p class="fs-4 mb-0 fw-bold">Dont Have Account?</p>
            <a class="text-primary fw-bold ms-2" href="{{ route('register') }}">Create an account</a>
        </div>
    </form>
@endsection
