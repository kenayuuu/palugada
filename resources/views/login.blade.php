@extends('layouts.template')
@section('title', 'Login')
@section('content')

<style>
    body {
        background-color: #f8f9fa;
    }
</style>

<div class="d-flex justify-content-center align-items-center" style="height: 80vh;">
    <div class="card shadow p-4" style="min-width: 400px; border-radius: 16px;">
        <h3 class="text-center mb-4">Login</h3>
        <form action="/login" method="POST">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input
                    type="email"
                    class="form-control @error('email') is-invalid @enderror"
                    id="exampleInputEmail1"
                    name="email"
                    value="{{ old('email') }}"
                    required
                >
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input
                    type="password"
                    class="form-control @error('password') is-invalid @enderror"
                    id="exampleInputPassword1"
                    name="password"
                    required
                >
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Remember me</label>
            </div>
            <button type="submit" class="btn w-100 text-white" style="background-color: #6f42c1;">Login</button>
        </form>
    </div>
</div>

@endsection
