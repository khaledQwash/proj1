<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Console\View\Components\Task;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    $name='khaled';
    $departments=[
        '1'=> 'teaching1',
        '2'=> 'marketing2',
        '3'=> 'development3',
    ];
    return view('about', compact('name', 'departments'));
    // return view('about')->with('name', $name);
});
Route::post('/about', function () {
    $name = $_POST['name'];
    $departments=[
        '1'=> 'teaching1',
        '2'=> 'marketing2',
        '3'=> 'development3',
    ];
    return view('about', compact('name', 'departments'));
});
Route::get('tasks', [TaskController::class, 'index']);//index
Route::post('createTask', [TaskController::class, 'create']);
Route::post('deleteTask/{id}', [TaskController::class, 'delete']);
Route::post('editTask/{id}', [TaskController::class, 'edit']);
Route::post('updateTask', [TaskController::class, 'update']);

Route::get('users', [UserController::class, 'index']);//index
Route::post('createUser', [UserController::class, 'create']);
Route::post('deleteUser/{id}', [UserController::class, 'delete']);
Route::post('editUser/{id}', [UserController::class, 'edit']);
Route::post('updateUser', [UserController::class, 'update']);

Route::get('app', function () {
    return view('layouts.app');
});
