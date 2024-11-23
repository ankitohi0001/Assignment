@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2>Your Posts</h2>
            <form method="POST" action="{{ url('api/create-post') }}">
                @csrf
                <div class="mb-3">
                    <textarea class="form-control" name="content" rows="3" placeholder="Share something..."></textarea>
                </div>
                <button type="submit" class="btn btn-success">Post</button>
            </form>
            <h3>All Posts:</h3>
            <ul>
                @foreach($posts as $post)
                    <li><strong>{{ $post->user->name }}</strong>: {{ $post->content }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
