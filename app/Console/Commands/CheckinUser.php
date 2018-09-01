<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class CheckinUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'checkin:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Registers user';

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
        $name = $this->ask('What is your name?!!!!');
        $password = $this->secret('What is the password?');

        $this->info('Вывести это на экран' . $name . $password);
        //$this->error('Что-то пошло не так!');
        //$this->line('Вывести это на экран');
    }
}
