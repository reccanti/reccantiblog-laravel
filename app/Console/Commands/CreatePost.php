<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Post;

class CreatePost extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'posts:create {author} {title} {postfile} {url?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a post from a markdown file.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $post = new Post;
        $post->author = $this->argument('author');
        $post->title = $this->argument('title');
        if ($this->argument('url')) {
            $post->url = $this->argument('url');
        } else {
            $post->url = str_slug($this->argument('title'));
        }
        $post->content = "hello";
        $post->save();

        $this->info($post->id);
    }
}
