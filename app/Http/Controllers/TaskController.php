<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function getTask()
    {
        $tasks = Auth::user()->task;

        return view('tasks', [
            'tasks' => $tasks
        ]);
    }
}
