<?php

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
Route::get('tasks', function () {
    return view('tasks');
});
Route::post('create', function () {
    $task_name = $_POST['name'];
    DB::table('tasks')->insert(['name'=> $task_name]);
    return view('tasks');
});
