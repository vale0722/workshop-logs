<?php

namespace Tests\Feature\Posts;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EditPostsTest extends TestCase
{
    use RefreshDatabase;

    public function testYouCanSeeEditPostForm()
    {
        $post = Post::factory()->create();
        $response = $this->actingAs(User::factory()->create())->get(route('admin.posts.edit', $post));

        $response->assertOk();
        $response->assertViewIs('admin.posts.edit');
        $response->assertViewHas('post');
    }
}
