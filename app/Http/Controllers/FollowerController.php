<?php

namespace App\Http\Controllers;

use App\Models\Follower;
use App\Models\User;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    /**
     * Follow a user.
     */
    public function followUser(User $user)
    {
        $currentUser = auth()->user();

        if ($currentUser->id === $user->id) {
            return back()->with('error', 'You cannot follow yourself.');
        }

        // Check if already following
        $existingFollow = Follower::where('follower_id', $currentUser->id)
                                  ->where('following_id', $user->id)
                                  ->first();

        if (!$existingFollow) {
            // Create a new follow
            Follower::create([
                'follower_id' => $currentUser->id,
                'following_id' => $user->id,
            ]);

            return back()->with('success', 'User followed successfully!');
        }

        return back()->with('info', 'You are already following this user.');
    }

    /**
     * Unfollow a user.
     */
    public function unfollowUser(User $user)
    {
        $currentUser = auth()->user();

        // Find the follow record
        $follow = Follower::where('follower_id', $currentUser->id)
                          ->where('following_id', $user->id)
                          ->first();

        if ($follow) {
            $follow->delete();

            return back()->with('success', 'User unfollowed successfully!');
        }

        return back()->with('info', 'You are not following this user.');
    }
}
