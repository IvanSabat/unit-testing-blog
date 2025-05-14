<?php

namespace Tests\Unit;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase; // use PHPUnit\Framework\TestCase;

class PostCreationTest extends TestCase
{
    use RefreshDatabase;

    public function testPostCreation()
    {
        // Create a new post and save it to the database
        $post = Post::query()->create([
            'title' => 'Sample Post Title',
            'description' => 'Sample Post Description',
            'image' => 'sample_image.jpg',
        ]);

        // Retrieve the post from the database and assert its existence
        $createdPost = Post::query()->find($post->id);
        $this->assertNotNull($createdPost);
        $this->assertEquals('Sample Post Title', $createdPost->title);
    }
}
