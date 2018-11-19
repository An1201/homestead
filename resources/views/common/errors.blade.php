<?php
/**
 * Created by PhpStorm.
 * User: anastasia
 * Date: 19/11/2018
 * Time: 13:53
 */
?>
<!-- resources/views/common/errors.blade.php -->

@if (count($errors) > 0)
    <!-- Список ошибок формы  -->
    <div class="alert alert-danger">
        <strong>Что-то пошо не так!</strong>

        <br><br>

        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif