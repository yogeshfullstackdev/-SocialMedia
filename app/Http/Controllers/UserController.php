<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a user's profile.
     */
    public function profile($id)
    {
        $user = User::with(['posts', 'followers', 'following'])->findOrFail($id);

        // Check if the current user is following this user
        $isFollowing = false;
        if (auth()->check()) {
            $isFollowing = $user->followers()->where('follower_id', auth()->id())->exists();
        }

        return view('profile', compact('user', 'isFollowing'));
    }

    public function author($id)
    {
        $user = User::with(['posts', 'followers', 'following'])->findOrFail($id);

        // Check if the current user is following this user
        $isFollowing = false;
        if (auth()->check()) {
            $isFollowing = $user->followers()->where('follower_id', auth()->id())->exists();
        }

        return view('author', compact('user', 'isFollowing'));
    }
}
