<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterTest extends TestCase
{
	public function testsRegistersSuccessfully()
	{
		$data = [
			'name' => 'John',
			'email' => 'john@toptal.com',
			'password' => 'toptal123',
			'password_confirmation' => 'toptal123',
		];

		$this->json('post', '/api/register', $data)
			->assertStatus(201)
			->assertJsonStructure([
				'data' => [
					'id',
					'name',
					'email',
					'created_at',
					'updated_at',
					'api_token',
				],
			]);;
	}

	public function testsRequiresPasswordEmailAndName()
	{
		$this->json('post', '/api/register')
			->assertStatus(422);
	}
}
