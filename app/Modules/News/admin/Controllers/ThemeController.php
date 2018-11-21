<?php

namespace App\Modules\News\admin\Controllers;

use Illuminate\Http\Request;
use App\Modules\News\Model\Theme;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class ThemeController extends Controller
{
  /**
   * Выводит список тем
   */
  public function getList() {
    $themes = Theme::orderBy('priority', 'desc')->get();

    return view('News::themes.themes', [
      'themes' => $themes,
      'navbarTitle' => 'Список тем',
      'homeUrl' => url('/admin/themes'),
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
      return redirect('/admin/themes')
        ->withInput()
        ->withErrors($validator);
    }

    $theme = new Theme;
    $theme->name = $request->name;
    $theme->priority = $request->priority;
    $theme->save();

    return redirect('/admin/themes');
  }

  /**
   * Удаляет тему
   */
  public function delete($themeId) {
    if (!$themeId) {
        return redirect('/admin/themes')
        ->withErrors('не передан id');
    }
    $theme = Theme::find($themeId);
    if (!$theme) {
        return redirect('/admin/themes')
        ->withErrors('тема не найдена');
    }

    $theme->delete();
    return redirect('/admin/themes');
  }
}
