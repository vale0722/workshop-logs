<?php

namespace Tests\Feature\Posts;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IndexPostsTest extends TestCase
{
    use RefreshDatabase;

    public function testYouCanListPosts()
    {
        $user = User::factory()->create();
        Post::factory()->count(2)->create(
            [
                'user_id' => $user->getKey()
            ]
        );
        $response = $this->actingAs($user)->get(route('admin.posts.index'));

        $response->assertOk();
        $postsResponse = $response->getOriginalContent()['posts'];

        $response->assertViewIs('admin.posts.index');
        $this->assertNotEmpty($postsResponse->count());
    }
}
