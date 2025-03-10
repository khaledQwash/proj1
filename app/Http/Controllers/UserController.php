<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $users = DB::table('users')->get();
        return view('users', compact('users'));
    }
    public function create()
    {
        $user_email = $_POST['userEmail'];
        DB::table('users')->insert(['email' => $user_email, 'name' => "User", 'password' => "123456789"]);
        return redirect()->back();
    }
    public function delete($id)
    {
        DB::table('users')->where('id', $id)->delete();
        return redirect()->back();
    }
    public function edit($id)
    {
        $user= DB::table('users')->where('id',$id)->first();
        $users = DB::table('users')->get();
        return view('users', compact('user', 'users'));
    }
    public function update()
    {
        $id = $_POST['userId'];
        DB::table('users')->where('id',$id)->update(['email' => $_POST['userEmail']]);
        return redirect('users');
    }
}
