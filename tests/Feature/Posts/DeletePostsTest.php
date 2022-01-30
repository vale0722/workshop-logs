<?php

namespace Tests\Feature\Posts;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DeletePostsTest extends TestCase
{
    use RefreshDatabase;

    public function testYouCanDeleteAPost()
    {
        $post = Post::factory()->create();
        $response = $this->actingAs(User::factory()->create())->delete(route('admin.posts.destroy', $post));

        $response->assertRedirect();
        $this->assertEmpty($post->fresh());
    }
}
