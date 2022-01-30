<?php

namespace Tests\Feature\Posts;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShowPostsTest extends TestCase
{
    use RefreshDatabase;

    public function testYouCanSeeAPostDetail()
    {
        $post = Post::factory()->create();
        $response = $this->get(route('posts.show', $post));

        $response->assertOk();
        $response->assertViewIs('posts.show');
        $response->assertViewHas('post');
    }
}
