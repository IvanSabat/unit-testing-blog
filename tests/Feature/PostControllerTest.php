<?php

namespace Tests\Feature;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class PostControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_post()
    {
        // Simulate a user creating a new post through the web interface
        $response = $this->post(route('posts.store'), [
            'title' => 'New Post Title',
            'description' => 'New Post Description',
            'image' => $this->create_test_image(),
        ]);

        // Assert that the post is successfully stored in the database
        $this->assertCount(1, Post::all());

        // Assert that the user is redirected to the Posts Index page after post creation
        $response->assertRedirect(route('posts.index'));
    }

    // Helper function to create a test image for the post
    private function create_test_image(): \Illuminate\Http\Testing\File|null
    {
        // Create a mock image file using Laravel's UploadedFile class
        $file = UploadedFile::fake()->image('test_image.jpg');

        // Return the path to the temporary image file
        return $file;
    }
}
