<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        // $tasks = DB::table('tasks')->get();
        $tasks = Task::all();
        return view('tasks', compact('tasks'));
    }
    public function create()
    {
        $task_name = $_POST['name'];
        // DB::table('tasks')->insert(['name' => $task_name]);
        $task = new Task;
        $task->name =  $task_name;
        $task->save();
        return redirect()->back();
    }
    public function delete($id)
    {
        // DB::table('tasks')->where('id', $id)->delete();
        $task = Task::find($id);
        $task->delete();
        return redirect()->back();
    }
    public function edit($id)
    {
        $task = Task::find($id);
        $tasks = Task::all();
        // $task = DB::table('tasks')->where('id',$id)->first();
        // $tasks = DB::table('tasks')->get();
        return view('tasks', compact('task', 'tasks'));
    }
    public function update()
    {
        $id = $_POST['id'];
        $task = Task::find($id);
        $task->name = $_POST['name'];
        $task->save();
        // DB::table('tasks')->where('id',$id)->update(['name' => $_POST['name']]);
        return redirect('tasks');
    }
}
