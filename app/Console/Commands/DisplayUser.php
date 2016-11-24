<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;

class DisplayUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:display {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'get all User ';

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
        $name = $this->ask('What is your name?');
        $password = $this->secret('What is the password?');
        if( $name == 'abdou' && $password == '123456'){
            $user = $this->argument('name');
            $users = User::all(['name','email','password']);
            $headers = ['Name', 'Email','password'];
            if(count($users) > 0){
                $this->table($headers, $users);
            }else{
                $this->line('Not user');
            }
        }else{
            $this->error('Something went wrong! verifier NAME OR PASSWORD');
        }
    }
}
