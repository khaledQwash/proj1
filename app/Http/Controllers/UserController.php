<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        // $users = DB::table('users')->get();
        $users = User::all();
        return view('users', compact('users'));
    }
    public function create()
    {
        $user_email = $_POST['userEmail'];
        // DB::table('users')->insert(['email' => $user_email, 'name' => "User", 'password' => "123456789"]);
        $user = new User;
        $user->email =  $user_email;
        $user->name =  "user";
        $user->password =  "123456789";
        $user->save();
        return redirect()->back();
    }
    public function delete($id)
    {
        // DB::table('users')->where('id', $id)->delete();
        $user = User::find($id);
        $user->delete();
        return redirect()->back();
    }
    public function edit($id)
    {
        $user = User::find($id);
        $users = User::all();
        // $user= DB::table('users')->where('id',$id)->first();
        // $users = DB::table('users')->get();
        return view('users', compact('user', 'users'));
    }
    public function update()
    {
        $id = $_POST['userId'];
        $user = User::find($id);
        $user->email = $_POST['userEmail'];
        $user->save();
        // DB::table('users')->where('id',$id)->update(['email' => $_POST['userEmail']]);
        return redirect('users');
    }
}
