@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-4">
            <h2>Login</h2>
            <form method="POST" action="{{ route('login') }}" id="loginForm">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
@endsection
