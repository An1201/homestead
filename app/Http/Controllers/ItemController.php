<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class ItemController extends Controller
{
	/**
	 * Получить список товаров
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function index()
	{
		return response()->json(Item::all(),201);
	}

	/**
	 * Получить товар по id
	 * @param $id
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function show($id)
	{
		$item = Item::with('categories')->where('id', '=', $id)->get();

		return response()->json($item, 201);
	}

	/**
	 * Создать товар
	 * @param Request $request
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function store(Request $request)
	{
		$item = Item::create($request->all());
		$categoryIds = $request->all()['category_id'];
		$item->categories()->attach($categoryIds);

		return response()->json($item, 201);
	}

	/**
	 * Обновить товар
	 * @param Request $request
	 * @param $id
	 * @return mixed
	 */
	public function update(Request $request, $id)
	{
		$item = Item::findOrFail($id);
		$item->update($request->all());

		return response()->json($item, 201);
	}

	/**
	 * Удалить товар
	 * @param Request $request
	 * @param $id
	 * @return int
	 */
	public function delete(Request $request, $id)
	{
		$item = Item::findOrFail($id);
		$item->categories()->detach();
		$item->delete();

		return response()->json(null, 204);
	}
}
