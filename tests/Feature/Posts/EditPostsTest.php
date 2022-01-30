<?php

namespace Tests\Feature\Posts;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EditPostsTest extends TestCase
{
    use RefreshDatabase;

    public function testYouCanSeeEditPostForm()
    {
        $post = Post::factory()->create();
        $response = $this->get(route('posts.edit', $post));

        $response->assertOk();
        $response->assertViewIs('posts.edit');
        $response->assertViewHas('post');
    }
}
