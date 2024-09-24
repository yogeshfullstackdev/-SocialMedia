<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display the public home page with all posts.
     */
    public function index()
    {
        // Fetch all posts with the user and likes relationships
        $posts = Post::with('user', 'likes')->latest()->paginate(10); // Using pagination

        // Return the home view with posts
        return view('home', compact('posts'));
    }

    /**
     * Show the form for creating a new post (Dashboard).
     */
    public function create()
    {
        return view('create-post');
    }

    /**
     * Store a newly created post in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'content' => 'required|string|max:255',
        ]);

        // Create the post
        Post::create([
            'user_id' => auth()->id(),
            'content' => $request->content,
        ]);

        // Redirect back to dashboard with success message
        return redirect()->route('dashboard')->with('success', 'Post created successfully!');
    }
}
