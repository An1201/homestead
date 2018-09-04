<?php

namespace Tests\Feature;

use App\Category;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class CategoryTest extends TestCase
{
	/**
	 * Тестирование создания категорий
	 */
	public function testsCategoriesAreCreatedCorrectly()
	{
		/* @var User $user*/
		$user = factory(User::class)->create();
		$token = $user->generateToken();
		$headers = ['Authorization' => "Bearer $token"];
		$data = [
			'name' => 'Сумки',
		];

		$this->json('POST', '/api/categories', $data, $headers)
			->assertStatus(201)
			->assertJsonStructure([
				'name',
				'updated_at',
				'created_at',
				'id'
			]);
	}

	/**
	 * Тестирование обновления категории
	 */
	public function testsCategoryAreUpdatedCorrectly()
	{
		$user = factory(User::class)->create();
		$token = $user->generateToken();
		$headers = ['Authorization' => "Bearer $token"];
		$category = factory(Category::class)->create([
			'name' => 'Сумки',
		]);

		$data = [
			'name' => 'Рюкзаки'
		];

		$this->json('PUT', '/api/categories/' . $category->id, $data, $headers)
			->assertStatus(200)
			->assertJson([
				'name' => 'Рюкзаки',
			]);
	}

	/**
	 * Тестирование удаления категории
	 */
	public function testsCtegoriesAreDeletedCorrectly()
	{
		$user = factory(User::class)->create();
		$token = $user->generateToken();
		$headers = ['Authorization' => "Bearer $token"];
		$category = factory(Category::class)->create([
			'name' => 'Рюкзаки',
		]);

		$this->json('DELETE', '/api/categories/' . $category->id, [], $headers)
			->assertStatus(204);
	}
}
