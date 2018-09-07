<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use Illuminate\Support\Facades\Validator;

class ItemController extends Controller
{
	/**
	 * Получить список товаров
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function index()
	{
		return response()->json(Item::all(),200);
	}

	/**
	 * Получить товар по id
	 * @param $id
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function show($id)
	{
		$item = Item::with('categories')->where('id', '=', $id)->get();
		if (empty($item->toArray())) {
			return response()->json('Not found', 404);
		}
		return response()->json($item, 201);
	}

	/**
	 * Создать товар
	 * @param Request $request
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function store(Request $request)
	{
		$validator = Validator::make($request->all(),
			[
				'name' => 'required|unique:items,name',
				'category_id' => 'required|array',
				'category_id.*' => 'integer|exists:categories,id'
			]
		);
		if ($validator->fails()) {
			return response()->json(['data' => $validator->errors()->all()], 400);
		}

		$item = Item::create($request->all());
		if (isset($request->all()['category_id'])) {
			$categoryIds = $request->all()['category_id'];
			$item->categories()->attach($categoryIds);
		}

		return response()->json($item, 200);
	}

	/**
	 * Обновить товар
	 * @param Request $request
	 * @param $id
	 * @return mixed
	 */
	public function update(Request $request, $id)
	{
		$item = Item::with('categories')->where('id', '=', $id)->get();
		if (empty($item->toArray())) {
			return response()->json('Not found', 404);
		}

		$validator = Validator::make($request->all(),
			[
				'name' => 'required|unique:items,name',
				'category_id' => 'required|array',
				'category_id.*' => 'integer|exists:categories,id'
			]
		);

		if ($validator->fails()) {
			return response()->json(['data' => $validator->errors()->all()], 400);
		}

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
