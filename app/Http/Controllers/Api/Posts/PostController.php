<?php

namespace App\Http\Controllers\Api\Posts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Posts\FormPostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PostController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $posts = auth()->user()->posts()->paginate(5);

        return PostResource::collection($posts);
    }

    public function store(FormPostRequest $request): PostResource
    {
        $post = Post::storeOrUpdate($request->validated());

        return new PostResource($post);
    }

    public function show(Post $post): PostResource
    {
        return new PostResource($post);
    }

    public function update(FormPostRequest $request, Post $post): PostResource
    {
        $post = Post::storeOrUpdate($request->validated(), $post);

        return new PostResource($post);
    }

    public function destroy(Post $post): JsonResponse
    {
        $post->delete();

        return response()->json(['message' => 'Eliminado exitosamente']);
    }
}
