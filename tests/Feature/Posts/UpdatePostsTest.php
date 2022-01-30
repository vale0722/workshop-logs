<?php

namespace Tests\Feature\Posts;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpdatePostsTest extends TestCase
{
    use RefreshDatabase;

    public function testYouCanUpdateAPost()
    {
        $data = [
            'title' => 'Title test',
            'content' => 'Content test',
        ];
        $post = Post::factory()->create();
        $response = $this->patch(route('posts.update', $post), $data);
        $response->assertRedirect();

        $post = $post->refresh();
        $this->assertEquals($data['title'], $post->title);
        $this->assertEquals($data['content'], $post->content);
    }
}
