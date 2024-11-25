@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-header bg-success text-white text-center">
                        <h2>Welcome, {{ Auth::user()->name }}!</h2>
                    </div>
                    <div class="card-body">
                        <h4>Your Dashboard</h4>
                        <p>You have successfully logged in. Here's what's happening:</p>
                        
                        <form method="POST" action="{{ route('create-post') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="content" class="form-label">Post Content</label>
                                <textarea class="form-control" name="content" id="content" rows="3" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Add Post</button>
                        </form>

                        <hr>

                        <h5>All Posts:</h5>
                        <ul class="list-group">
                            @foreach($posts as $post)
                                <li class="list-group-item">
                                    <h5>{{ $post->title }}</h5>
                                    <p>{{ $post->content }}</p>
                                    <small>Posted by: {{ $post->user->name }} on {{ $post->created_at->toFormattedDateString() }}</small>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="card-footer text-center">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-danger">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
