<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Exception;

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

        // use a URL if provided, otherwise create one from the title
        if ($this->argument('url')) {
            $post->url = $this->argument('url');
        } else {
            $post->url = str_slug($this->argument('title'));
        }

        // attempt to open the file provided
        try {
            $post->content = file_get_contents($this->argument('postfile'));
        } catch (ErrorException $e) {
            $this->error('file does not exist');
            return;
        }

        // exit from the command if the file could not be opened
        if(!$post->content) {
            $this->error('failed to open file');
            return;
        }

        $post->save();

        // output the newly generated Post ID to the console so that we can retrieve it in unit tests
        $this->info($post->id);
    }
}
