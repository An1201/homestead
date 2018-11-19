<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    /**
     * Выводит список задач
     */
    public function getList() {
        $tasks = Task::orderBy('created_at', 'asc')->get();

        return view('tasks.tasks', [
          'tasks' => $tasks
        ]);
    }


    /**
     * Создает задачу
     */
    public function create(Request $request) {
        $validator = Validator::make($request->all(), [
          'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
          return redirect('/tasks')
            ->withInput()
            ->withErrors($validator);
        }

        $task = new Task;
        $task->name = $request->name;
        $task->save();

        return redirect('/tasks');
    }

    /**
     * Удаляет задачу
     */
    public function delete(Task $task) {
        $task->delete();

        return redirect('/tasks');
    }
}
