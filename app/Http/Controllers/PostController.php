<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(): View
    {
        $posts = Post::query()->orderBy('created_at', 'desc')->get();

        return view('posts.index', compact('posts'));
    }

    public function create(): View
    {
        return view('posts.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $fileName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $fileName);

        $payload = [
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'image' => $fileName,
        ];

        Post::query()->create($payload);

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }
}
