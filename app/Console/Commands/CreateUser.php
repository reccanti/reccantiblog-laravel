<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a User who can upload posts';

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
        $username = $this->ask('Enter the username you would like to use: ');
        $email = $this->ask('Enter the email you would like to use: ');
        $password = $this->secret('Enter the password you would like to use: ');
        User::create([
            'name' => $username,
            'email' => $email,
            'password' => bcrypt($password)
        ]);
    }
}
