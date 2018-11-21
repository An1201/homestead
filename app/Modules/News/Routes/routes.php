<?php
/**
 * Created by PhpStorm.
 * User: anastasia
 * Date: 20/11/2018
 * Time: 17:39
 */


Route::group([ 'namespace' => 'App\Modules\News\admin\Controllers',], function() {
   /* Вывод списка статей */
    Route::get('/admin/news', 'ArticleController@getList');
    /* Создание статьи */
    Route::post('/admin/article', 'ArticleController@create');
    /* Удалить статью */
    Route::delete('/admin/article/{articleId}', 'ArticleController@delete');

    /**
     * Вывод списка тем
     */
    Route::get('/admin/themes', 'ThemeController@getList');
    /**
     * Создание темы
     */
    Route::post('/admin/theme', 'ThemeController@create');
    /**
     * Удалить тему
     */
    Route::delete('/admin/theme/{themeId}', 'ThemeController@delete');
});