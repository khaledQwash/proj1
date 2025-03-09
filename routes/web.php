<?php

use Illuminate\Support\Facades\Route;

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
