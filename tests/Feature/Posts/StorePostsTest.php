<?php

namespace Tests\Feature\Posts;

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

        $response = $this->post(route('posts.store'), $data);
        $response->assertRedirect();
        $this->assertDatabaseHas('posts', $data);
    }
}
