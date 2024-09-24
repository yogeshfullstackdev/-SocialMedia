<!-- resources/views/dashboard.blade.php -->

@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h1 class="mb-4">Dashboard</h1>

    <!-- Create Post Form -->
    <div class="card mb-4">
        <div class="card-header">Create a New Post</div>
        <div class="card-body">
            <form action="{{ route('store-post') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <textarea name="content" class="form-control @error('content') is-invalid @enderror" rows="3" placeholder="What's on your mind?" required></textarea>
                    @error('content')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success">Post</button>
            </form>
        </div>
    </div>

    <!-- User's Posts -->
    <h2>Your Posts</h2>
    @foreach(auth()->user()->posts()->latest()->get() as $post)
        <div class="card mb-3">
            <div class="card-body">
                <p class="card-text">{{ $post->content }}</p>
                <p class="text-muted">Posted on {{ $post->created_at->format('M d, Y') }}</p>
                <!-- You can add edit and delete buttons here -->
            </div>
        </div>
    @endforeach
@endsection
