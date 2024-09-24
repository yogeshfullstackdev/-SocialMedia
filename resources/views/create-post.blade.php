<!-- resources/views/create-post.blade.php -->

@extends('layouts.app')

@section('title', 'Create Post')

@section('content')
    <h1 class="mb-4">Create a New Post</h1>

    <div class="card">
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
@endsection
