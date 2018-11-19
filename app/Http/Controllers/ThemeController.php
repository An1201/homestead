<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theme;
use Illuminate\Support\Facades\Validator;

class ThemeController extends Controller
{
  /**
   * Выводит список тем
   */
  public function getList() {
    $themes = Theme::orderBy('priority', 'desc')->get();

    return view('themes.themes', [
      'themes' => $themes
    ]);
  }


  /**
   * Создает тему
   */
  public function create(Request $request) {
    $validator = Validator::make($request->all(), [
      'name' => 'required|max:255',
      'priority' => 'integer'
    ]);

    if ($validator->fails()) {
      return redirect('/themes')
        ->withInput()
        ->withErrors($validator);
    }

    $theme = new Theme;
    $theme->name = $request->name;
    $theme->priority = $request->priority;
    $theme->save();

    return redirect('/themes');
  }

  /**
   * Удаляет тему
   */
  public function delete(Theme $theme) {
    $theme->delete();

    return redirect('/themes');
  }
}
