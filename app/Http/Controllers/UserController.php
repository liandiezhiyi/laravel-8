<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index (){
        phpinfo();
    }
    public  function  userList(){
        $data=['name'=>'tang','age'=>'19'];
       //return view('user/userList',['test'=>'test1111111']);
       //return view('user/userList',$data);
       return view('user/userList',compact('data'));
       // return view("user/userList")->with('data',$data);
    }
    public  function  addUser(){
        echo  33333333333333333;
    }

    public function userUpdate(){
        return 222222222222222;
    }
    public function  userDel(){
        return    6666666666666666666;
    }
    public function searchUser(){
        return 111111111111;
    }

}

