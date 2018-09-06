<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Exception;
use Illuminate\Support\Facades\Validator;

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

		$validator = Validator::make(
			[
				'email' => $email,
				'name' => $name,
				'password' => $password
			],
			[
				'name' => 'required',
				'password' => 'required|min:7',
				'email' => 'required|email|unique:users,email',
			]);

		if ($validator->fails()) {
			$this->error('Пользователь не создан');
			foreach ($validator->errors()->all() as $error) {
				$this->comment($error);
			}
			die;
		}

		$password = Hash::make($password);

		try {
			/* @var User $user */
			$user = User::firstOrCreate([
				'name' => $name,
				'email' => $email,
				'password' => $password
			]);
			$user->generateToken();

			$this->info('Ваш пользователь:' . $user->name . ', token:' . $user->api_token);
		} catch (Exception $e) {
			$this->error('Ошибка: ' . $e->getMessage() . PHP_EOL);
		}
	}
}
