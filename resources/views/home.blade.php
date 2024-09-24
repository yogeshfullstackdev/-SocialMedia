<!-- resources/views/home.blade.php -->

@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <h1 class="mb-4">All Posts</h1>

    @foreach($posts as $post)
        <div class="card mb-3">
            <div class="card-body">
                <!-- Post Author -->
                <!-- <h5 class="card-title">
                    <a href="{{ route('profile', ['id' => $post->user->id]) }}">
                        Author: {{ $post->user->name }}
                    </a>
                </h5> -->

                <!-- Post Content -->
                <p class="card-text">{{ $post->content }}</p>

                <p>
                    <a href="{{ route('author', ['id' => $post->user->id]) }}">
                        Author: {{ $post->user->name }}
                    </a>
                </p>

                <!-- Post Date -->
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

    <!-- Pagination Links -->
    <div class="d-flex justify-content-center">
        {{ $posts->links() }}
    </div>
@endsection
