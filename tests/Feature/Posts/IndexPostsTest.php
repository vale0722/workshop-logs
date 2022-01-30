<?php

namespace Tests\Feature\Posts;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IndexPostsTest extends TestCase
{
    use RefreshDatabase;

    public function testYouCanListPosts()
    {
        Post::factory()->count(2)->create();

        $response = $this->get(route('posts.index'));

        $response->assertOk();
        $postsResponse = $response->getOriginalContent()['posts'];

        $response->assertViewIs('posts.index');
        $this->assertNotEmpty($postsResponse->count());
    }
}
