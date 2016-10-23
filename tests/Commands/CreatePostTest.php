<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Post;

class CreatePost extends TestCase
{

    use DatabaseMigrations;
    
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    /**
     * Test to see that a Post can be created with all options
     *
     * @return void
     */
    public function testCreatePost() {
        $post = Artisan::call('post:create', [
            'author' => 'testuser',
            'title' => 'Test Title',
            'postfile' => 'Hello',
            'url' => 'test-title',
        ]);
        $post = Post::where('id', Artisan::output())->get()->first();
        $this->assertTrue($post->author === 'testuser');
        $this->assertTrue($post->title === 'Test Title');
        $this->assertTrue($post->content === 'hello');
        $this->assertTrue($post->url === 'test-title');
    }
}
