<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function show($id) {
        $task = Task::find($id);

        return view('tasks.show', compact('task'));
    }
}
