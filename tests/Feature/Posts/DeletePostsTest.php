<?php

namespace Tests\Feature\Posts;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DeletePostsTest extends TestCase
{
    use RefreshDatabase;

    public function testYouCanDeleteAPost()
    {
        $post = Post::factory()->create();
        $response = $this->delete(route('posts.destroy', $post));

        $response->assertRedirect();
        $this->assertEmpty($post->fresh());
    }
}
