<?php

namespace App\Http\Controllers;

use App\Article;
use App\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
  /**
   * Выводит список статей
   */
  public function getList() {
    $articles = Article::orderBy('created_at', 'DESC')->get();

    return view('articles.articles', [
      'articles' => $articles,
      'themes' => Theme::all(),
    ]);
  }

  /**
   * Создает статью
   */
  public function create(Request $request) {
    $validator = Validator::make($request->all(), [
      'title' => 'required|max:255',
      'theme_id' => 'integer',
    ]);

    if ($validator->fails()) {
      return redirect('/admin/news')
        ->withInput()
        ->withErrors($validator);
    }

    $article = new Article();
    $article->title = $request->title;
    $article->text = $request->tetx;
    $article->image = $request->image;
    $article->theme_id = $request->theme_id;
    $article->save();

    return redirect('/news');
  }

  /**
   * Удаляет статью
   */
  public function delete(Article $article) {
    $article->delete();
    return redirect('/news');
  }
}
