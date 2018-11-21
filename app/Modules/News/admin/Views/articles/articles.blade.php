<?php
/**
 * Created by PhpStorm.
 * User: anastasia
 * Date: 20/11/2018
 * Time: 13:40
 */

?>

@extends('News::index')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    New article
                </div>

                <div class="panel-body">
                    <!-- Отображение ошибок проверки ввода -->
                <!-- /*@*include('common.errors') -->

                <!-- Форма новой статьи -->
                    <form action="{{ url('admin/article') }}" method="POST" class="form-horizontal">

                    <!-- Имя статьи -->
                        <div class="form-group">
                            <label for="article-title" class="col-sm-3 control-label">Название</label>
                            <div class="col-sm-6">
                                <input type="text" name="title" id="article-title" class="form-control" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="article-text" class="col-sm-3 control-label">Текст</label>
                            <div class="col-sm-6">
                                <textarea name="text" id="article-text" class="form-control" rows="3">
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="article-theme" class="col-sm-3 control-label">В тему</label>
                            <div class="col-sm-6">
                                <select name="theme_id" id="article-theme" class="custom-select form-control">
                                    @foreach ($themes as $theme)
                                        <option value="{{$theme->id}}">{{$theme->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Кнопка добавления статьи -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-plus"></i> Сохранить статью
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Текущие статьи -->
            @if (count($articles) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Текущая статья
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped article-table">

                            <!-- Заголовок таблицы -->
                            <thead>
                            <th>Статья</th>
                            <th>Тема</th>
                            <th> </th>
                            </thead>

                            <!-- Тело таблицы -->
                            <tbody>
                            @foreach ($articles as $article)
                                <tr>
                                    <!-- Имя статьи -->
                                    <td class="table-text">
                                        <div>{{ $article->title }}</div>
                                    </td>
                                    <td >
                                        <div>{{ $article->theme_id }}</div>
                                    </td>

                                    <!-- Кнопка Удалить -->
                                    <td>
                                        <form action="{{ url('admin/article/' . $article->id) }}" method="POST">
                                            {{ method_field('DELETE') }}

                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa fa-trash"></i> Удалить
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection