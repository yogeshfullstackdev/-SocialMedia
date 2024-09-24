<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    /**
     * Like a post.
     */
    public function likePost(Post $post)
    {
        $user = auth()->user();

        // Check if the user has already liked the post
        $existingLike = Like::where('user_id', $user->id)
                            ->where('post_id', $post->id)
                            ->first();

        if (!$existingLike) {
            // Create a new like
            Like::create([
                'user_id' => $user->id,
                'post_id' => $post->id,
            ]);

            return back()->with('success', 'Post liked!');
        }

        return back()->with('info', 'You have already liked this post.');
    }

    /**
     * Unlike a post (optional).
     */
    public function unlikePost(Post $post)
    {
        $user = auth()->user();

        // Find the like
        $like = Like::where('user_id', $user->id)
                    ->where('post_id', $post->id)
                    ->first();

        if ($like) {
            $like->delete();

            return back()->with('success', 'Post unliked!');
        }

        return back()->with('info', 'You have not liked this post.');
    }
}
