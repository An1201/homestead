<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class ItemController extends Controller
{
	public function index()
	{
		return response()->json(Item::all(),201);
	}

	public function show($id)
	{
		$item = Item::find($id);
		$categories = $item->categories;
		return response()->json($item, 201);
	}

	public function store(Request $request)
	{
		$item = Item::create($request->all());

		return response()->json($item, 201);
	}

	public function update(Request $request, $id)
	{
		$article = Item::findOrFail($id);
		$article->update($request->all());

		return $article;
	}

	public function delete(Request $request, $id)
	{
		$article = Item::findOrFail($id);
		$article->delete();

		return 204;
	}
}
