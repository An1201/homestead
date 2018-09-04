<?php

namespace Tests\Feature\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use Illuminate\Support\Facades\Hash;

class LoginTest extends TestCase
{
	/**
	 * Тестирование авторизации
	 */
	public function testLogin()
	{
		factory(User::class)->create([
			'email' => 'testlogin@user.com',
			'password' => Hash::make('toptal123'),
		]);

		$data = ['email' => 'testlogin@user.com', 'password' => 'toptal123'];

		$this->json('POST', '/api/login', $data)
			->assertStatus(200)
			->assertJsonStructure([
				'*' => [
					'id',
					'name',
					'email',
					'api_token'
				],
			]);
	}

	/**
	 * Тестирование попытки войти без параметров доступа
	 */
	public function testsRequiresPasswordEmailAndName()
	{
		$this->json('post', '/api/login')
			->assertStatus(422);
	}

}
