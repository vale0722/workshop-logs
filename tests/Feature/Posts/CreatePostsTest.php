<?php

namespace Tests\Feature\Posts;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use League\Flysystem\Config;
use Monolog\Handler\TestHandler;
use Monolog\Logger;
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

    public function testYouCanSeeCreatePostFormAndSeeLog()
    {
        $monolog = new Logger('test');
        $monolog->pushHandler(new TestHandler());
        config([
            'default' => 'test',
            'logging.channels' => [
                'test' => [
                    'driver' => 'custom',
                    'via' => $monolog
                ],
            ],
        ]);

        $this->testYouCanSeeCreatePostForm();
    }
}
