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
        User::where('name',)
    }
}