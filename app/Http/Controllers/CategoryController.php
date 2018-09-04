<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
	/**
	 * Получить список категорий
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function index()
	{
		return response()->json(Category::all(), 201);
	}

	/**
	 * Получить категорию по id
	 *
	 * @param int $id
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function show($id)
	{
		$category = Category::with('items')->where('id', '=', $id)->get();

		return response()->json($category, 201);
	}

	/**
	 * Создать категорию
	 *
	 * @param Request $request
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function store(Request $request)
	{
		$category = Category::create($request->all());

		If (isset($request->all()['item_id'])) {
			$itemIds = $request->all()['item_id'];
			$category->items()->attach($itemIds);
		}

		return response()->json($category, 201);
	}

	/**
	 * Обновить категорию по id
	 *
	 * @param Request $request
	 * @param $id
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function update(Request $request, $id)
	{
		$category = Category::findOrFail($id);
		$category->update($request->all());

		return response()->json($category, 200);
	}

	/**
	 * Удалить категорию
	 *
	 * @param Request $request
	 * @param $id
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function delete(Request $request, $id)
	{
		$category = Category::findOrFail($id);
		$category->items()->detach();
		$category->delete();

		return response()->json(null, 204);
	}
}
