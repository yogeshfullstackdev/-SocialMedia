<!-- resources/views/followers.blade.php -->
@extends('layouts.layout')

@section('title', 'Follow Users')

@section('content')
<h1>Follow Users</h1>

@foreach($users as $user)
    @if(auth()->id() !== $user->id)
    <div class="card mb-3">
        <div class="card-body">
            <h5>{{ $user->name }}</h5>
            @if($user->isFollowedBy(auth()->user()))
                <form action="{{ route('unfollow-user', ['user' => $user->id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">Unfollow</button>
                </form>
            @else
                <form action="{{ route('follow-user', ['user' => $user->id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">Follow</button>
                </form>
            @endif
        </div>
    </div>
    @endif
@endforeach

@endsection
