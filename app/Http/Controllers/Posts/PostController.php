<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Posts\FormPostRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(): View
    {
        $posts = auth()->user()->posts()->paginate(5);

        return view('admin.posts.index', ['posts' => $posts]);
    }

    public function create(): View
    {
        return view('admin.posts.create');
    }

    public function store(FormPostRequest $request): RedirectResponse
    {
        Post::storeOrUpdate($request->validated());

        return response()->redirectToRoute('admin.posts.index');
    }

    public function show(Post $post): View
    {
        return view('admin.posts.show', compact('post'));
    }

    public function edit(Post $post): View
    {
        return view('admin.posts.edit', compact('post'));
    }

    public function update(FormPostRequest $request, Post $post): RedirectResponse
    {
        $post = Post::storeOrUpdate($request->validated(), $post);

        return response()->redirectToRoute('admin.posts.show', $post);
    }

    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();

        return response()->redirectToRoute('admin.posts.index');
    }
}
