<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
	public function index()
	{
		return response()->json(Category::all(), 201);
	}

	public function show($id)
	{
		$category = Category::find($id);
		$items = $category->items;

		return response()->json($category, 201);
	}

	public function store(Request $request)
	{
		$category = Category::create($request->all);
		return response()->json($category, 201);
	}

	public function update(Request $request, $id)
	{
		$category = Category::findOrFail($id);
		$category->update($request->all());

		return response()->json($category, 200);
	}

	public function delete(Request $request, $id)
	{
		$article = Category::findOrFail($id);
		$article->delete();

		return response()->json(null, 204);
	}
}
