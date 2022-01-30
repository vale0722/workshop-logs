<?php

namespace Tests\Feature\Posts;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreatePostsTest extends TestCase
{
    use RefreshDatabase;

    public function testYouCanSeeCreatePostForm()
    {
        $response = $this->actingAs(User::factory()->create())->get(route('admin.posts.create'));

        $response->assertOk();
        $response->assertViewIs('admin.posts.create');
    }
}
