<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use Exception;

class CreateUser extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'create:user';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Adds a user';

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
		$email = $this->ask('Введите email:');
		$name = $this->ask('Введите имя пользователя:');

		if ($this->confirm('Сгенерировать пароль автоматически?')) {
			$password = str_random(7);
			$this->info("Ваш пароль: $password");
		} else {
			$password = $this->secret('Введите пароль:');
		}

		try {
			User::create(compact('name', 'email', 'password'));
		} catch (Exception $e) {
			$this->error('Ошибка: ' . $e->getMessage() . PHP_EOL);
		}
	}
}
