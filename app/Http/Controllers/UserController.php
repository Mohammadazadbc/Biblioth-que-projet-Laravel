<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function Register(Request $req){
        $req->validate([
            "name"=>"required",
            "lastname"=>"required",
            "email"=>"required|email|unique:users",
            "password"=>"required|min:4"
        ]);
        $user = new User();
        $user->name = $req->name;
        $user->lastname = $req->lastname;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->profilePic = $req->file('profilePic')->store('books');
        $user->coverPic = $req->file('coverPic')->store('books');
        $result = $user->save();
        if($result){
            return $user;
        }
        else{
            return ["result" =>"Somethings went wrong"];
        }
    }
    function showUser(){
        return User::all();
    }
    function DeleteUser($id){
        $user = User::find($id);
        $result = $user->delete();
        if($result){
            return ["user has been"=>"Deleted"];
        }else{
            return ["user has been"=>"Not deleted"];
        }
    }

    function Login(Request $req){
        $req->validate([
            "email"=>"required|email",
            "password"=>"required"
        ]);
        $user = User::where(["email"=>$req->email])->first();
        if(!$user || !Hash::check($req->password, $user->password)){
            return "worng pass";
        }
        else{
            return $user;
        }
    }
}
