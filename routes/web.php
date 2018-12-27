<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/**
 * Вывод списка задач
 */
Route::get('/tasks', 'TaskController@getList');
/**
 * Создание задачи
 */
Route::post('/task', 'TaskController@create');
/**
 * Удалить задачу
 */
Route::delete('/task/{task}', 'TaskController@delete');


/**
 * Вывод списка тем
 */
Route::get('/themes', 'ThemeController@getList');
/**
 * Создание темы
 */
Route::post('/theme', 'ThemeController@create');
/**
 * Удалить тему
 */
Route::delete('/theme/{theme}', 'ThemeController@delete');

/**
 * Вывод списка статей
 */
Route::get('/news', 'ArticleController@getList');
/**
 * Создание статьи
 */
Route::post('/article', 'ArticleController@create');
/**
 * Удалить статью
 */
Route::delete('/article/{articleId}', 'ArticleController@delete');

