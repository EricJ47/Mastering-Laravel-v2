<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GreetCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'greet';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'A simple command that greeting user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        return $this->info('Hello, This is greet Command');
    }
}
