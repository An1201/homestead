<?php
/**
 * Created by PhpStorm.
 * User: anastasia
 * Date: 19/11/2018
 * Time: 13:40
 */
?>

@extends('index')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Новая задача
                </div>

                <div class="panel-body">
                    <!-- Отображение ошибок проверки ввода -->
                    @include('common.errors')

                    <!-- Форма новой задачи -->
                    <form action="{{ url('task') }}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                        <!-- Имя задачи -->
                        <div class="form-group">
                            <label for="task" class="col-sm-3 control-label">Название</label>
                            <div class="col-sm-6">
                                <input type="text" name="name" id="task-name" class="form-control" value="{{ old('task') }}">
                            </div>
                        </div>
                        <!-- Кнопка добавления задачи -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-plus"></i> Создать
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Текущие задачи -->
            @if (count($tasks) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Список задач
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">

                            <!-- Тело таблицы -->
                            <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <!-- Имя задачи -->
                                    <td class="table-text" data-id="{{$task->id}}}">
                                        <div>{{ $task->name }}</div>
                                    </td>

                                    <!-- Кнопка Удалить -->
                                    <td>
                                        <form action="{{ url('task/'.$task->id) }}" method="POST">
                                            {{ csrf_field() }}
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