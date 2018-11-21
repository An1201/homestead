<?php
/**
 * Created by PhpStorm.
 * User: anastasia
 * Date: 19/11/2018
 * Time: 18:36
 */
?>

@extends('News::index')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Новая тема
                </div>

                <div class="panel-body">
                    <!-- Отображение ошибок проверки ввода -->
                    <!-- /*@*include('common.errors') -->

                <!-- Форма новой темы -->
                    <form action="{{ url('admin/theme') }}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}

                    <!-- Имя темы -->
                        <div class="form-group">
                            <label for="theme" class="col-sm-3 control-label">Название</label>
                            <div class="col-sm-6">
                                <input type="text" name="name" id="theme-name" class="form-control" value="">
                            </div>
                        </div>
                        <!-- Приоритет -->
                        <div class="form-group">
                            <label for="priority" class="col-sm-3 control-label">Приоритет</label>
                            <div class="col-sm-6">
                                <input type="text" name="priority" id="priority" class="form-control" value="">
                            </div>
                        </div>

                        <!-- Кнопка добавления темы -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-plus"></i> Добавить тему
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Текущие темы -->
            @if (count($themes) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Все темы
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped themes-table">

                            <!-- Заголовок таблицы -->
                            <thead>
                            <th>Тема</th>
                            <th>Приоритет</th>
                            </thead>

                            <!-- Тело таблицы -->
                            <tbody>
                            @foreach ($themes as $theme)
                                <tr>
                                    <!-- Имя темы -->
                                    <td class="table-text">
                                        <div>{{ $theme->name }}</div>
                                    </td>
                                    <!-- Приоритет темы -->
                                    <td class="table-text">
                                        <div>{{ $theme->priority }}</div>
                                    </td>
                                    <!-- Кнопка Удалить -->
                                    <td>
                                        <form action="{{ url('/admin/theme/' . $theme->id) }}" method="POST">
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
