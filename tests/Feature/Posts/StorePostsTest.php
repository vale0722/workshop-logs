<?php

namespace Tests\Feature\Posts;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StorePostsTest extends TestCase
{
    use RefreshDatabase;

    public function testYouCanStoreAPost()
    {
        $data = [
            'title' => 'Title test',
            'content' => 'Content test',
        ];

        $response = $this->actingAs(User::factory()->create())->post(route('admin.posts.store'), $data);
        $response->assertRedirect();
        $this->assertDatabaseHas('posts', $data);
    }
}
