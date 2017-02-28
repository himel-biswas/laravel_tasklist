<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {

        //Calling data to frontend

        //orderBy(),where,whereIn() - any methods can be used

        $tasks = Task::orderBy('created_at', 'asc')->get();

        // dd($task);
        // $task->name;

        return view('tasks.index')->withTasks($tasks);

        // return view('tasks.index');

    }

    public function store(Request $request)
    {

        $validator = validator($request->all(), [

            'name' => 'required|max:255',

        ]);

        if ($validator->fails())
        {
            return redirect('/')->withInput()
                ->withErrors($validator);
        }

        // Code-Writing-Style #1

        /*    $task       = new Task();
        $task->name = $request->name;
        $task->save();
         */

        // Code-Writing-Style #2
        Task::create([

            'name' => $request->name,
        ]);

        return redirect('/');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(Task $id)
    {
        $id->delete();
        return redirect('/');

    }
}
