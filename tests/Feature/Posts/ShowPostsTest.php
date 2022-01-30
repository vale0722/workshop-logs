<?php

namespace Tests\Feature\Posts;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShowPostsTest extends TestCase
{
    use RefreshDatabase;

    public function testYouCanSeeAPostDetail()
    {
        $post = Post::factory()->create();
        $response = $this->actingAs(User::factory()->create())->get(route('admin.posts.show', $post));

        $response->assertOk();
        $response->assertViewIs('admin.posts.show');
        $response->assertViewHas('post');
    }
}
