<!-- resources/views/profile.blade.php -->

@extends('layouts.app')

@section('title', $user->name . "'s Profile")

@section('content')
    <h1>My Profile</h1>
    <hr>
    <h2>{{ $user->name }}'s Profile</h2>

    <!-- User Details -->
    <div class="card mb-4">
        <div class="card-body">
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <!-- Add more user details as needed -->
        </div>
    </div>

    <!-- Follow/Unfollow Button -->
    @auth
        @if(auth()->id() !== $user->id)
            @if($isFollowing)
                <form action="{{ route('unfollow-user', ['user' => $user->id]) }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger">Unfollow</button>
                </form>
            @else
                <form action="{{ route('follow-user', ['user' => $user->id]) }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-primary">Follow</button>
                </form>
            @endif
        @endif
    @endauth

    <!-- User's Posts -->
    <h2 class="mt-4">My Posts</h2>
    @foreach($user->posts()->latest()->get() as $post)
        <div class="card mb-3">
            <div class="card-body">
                <p class="card-text">{{ $post->content }}</p>
                <p class="text-muted">Posted on {{ $post->created_at->format('M d, Y') }}</p>
                <!-- Like Button -->
                @auth
                    <form action="{{ route('like-post', ['post' => $post->id]) }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-primary btn-sm">
                            Like ({{ $post->likes->count() }})
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary btn-sm">Like ({{ $post->likes->count() }})</a>
                @endauth
            </div>
        </div>
    @endforeach

    <!-- Followers and Following -->
    <div class="row mt-4">
        <div class="col-md-6">
            <h3>My Followers ({{ $user->followers->count() }})</h3>
            <ul class="list-group">
                @foreach($user->followers as $follower)
                    <li class="list-group-item">
                        <a href="{{ route('author', ['id' => $follower->follower->id]) }}">
                            {{ $follower->follower->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-6">
            <h3>My Following ({{ $user->following->count() }})</h3>
            <ul class="list-group">
                @foreach($user->following as $followed)
                    <li class="list-group-item">
                        <a href="{{ route('author', ['id' => $followed->following->id]) }}">
                            {{ $followed->following->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
