<?php

namespace Tests\Feature;

use App\Domains\Post\Entities\Post;
use Database\Seeders\PostSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    protected $seed = true;

    protected $seeder = PostSeeder::class;

    private $basePath = '/api/post';

    function test_creating_new_post(): void
    {
        $data = [
            "title"   => "Test post title",
            "content" => "Test new post string content",
        ];

        $response = $this->postJson($this->basePath, $data);

        $response->assertStatus(200);
        $response->assertJson(function (AssertableJson $json) use ($data) {
            $json
                ->where('id', 2)
                ->where('title', $data['title'])
                ->where('content', $data['content'])
                ->etc();
        });
    }

    function test_get_post()
    {
        $post = Post::find(1);
        $response = $this->getJson($this->basePath . '/1');

        $response->assertStatus(200);
        $response->assertJson(function (AssertableJson $json) use ($post) {
            $json
                ->where('id', (int) $post->getId())
                ->where('title', $post->getTitle())
                ->where('content', $post->getContent())
                ->etc();
        });
    }
}
