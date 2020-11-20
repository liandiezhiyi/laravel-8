<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{

    public function index()
    {

        //$data['username']=$_POST['username'];
        $items = Db::table('admin')->where('username','admin')->first(['username','password']);
       echo  $items->username;
        dd($items);
        foreach($items as $key=>$val){
            dd($val);
        }

    }

    public function login(Request $request){
        if($_POST)
        {
            $validatedData = $request->validate([
                'username' => 'required|min:2',
                'password' => 'required|min:6',
            ],[
                    'username.required'=>'用户名不能为空',
                    'password.required'=>'密码不能为空',
                    'username.min'=>'用户名不能小于2位',
                    'password.min'=>'密码不能小于6位',
                ]
                );
            if($validatedData)
            {
                $data['username']=$_POST['username'];
                $data['password']=md5(md5($_POST['password']));
                $item = Db::table('admin')->where($data)->first(['id','username','password']);
                if($item){
                    session('nickname', $item->username);
                    session('uid', $item->id);
                    session('session_start_time', time());
                    //登录成功后 修改登录时间、登录次数及登录IP地址
                    $data=[
                        "last_login_time"=> time(),
                        "last_login_ip"=>request()->ip(),
                    ];
                    $condition['username'] = $item->username;
                    $condition['password'] = $item->password;
                    Db::table('admin')->where($condition)->update($data);
                    // Db::name('admin')->where($condition)->data($data)->update();
                    // return json_encode($res);
                    return ['status' => 200, 'message' => '登录成功'];
                }else{
                    return ['status' => 400, 'message' => '用户名或密码不正确'];
                }

            }





                 //  $data['username']=$_POST['username'];
                    //$data['password']=$_POST['password'];
                 // return json_encode($data['username']);


     //return       DB::table('admin')->where('id', '=', 1)->select();
            //$user = DB::table('admin')->where($data)->find();
                // $res=   DB::table("lara_admin")->where($data)->find();

            // //return json_encode($user);

        }
        else {
            return view("admin.login.login");
        }

        /*
            if(empty($_POST['username'] || empty($_POST['password']))){
                return ["status"=>0,'message'=>'用户名或密码不能为空'];
            }
            else{


            }*/



    }

    public function register(){
        if($_POST)
        {

            /*
         $request=new Request();
         $validatedData = $request->validate([
             'username'=>"required|between:5,32|unique:user,name",
             'password'=>"required|min:6|max:18|regex:/^[a-zA-Z0-9]+$/"],[
             "username.required"=>'用户名不能是空',
             "username.unique"=>'用户名已经存在',
             "password.required"=>'密码不能是空',
             "password.min"=>"密码不能小于6位",
             "password.max"=>"密码不能大于18位",
             "password.regex"=>"密码格式不对，只能输入字母和数字",
         ]);
         */

            $data['username']=$_POST['username'];
            $data['pwd']=$_POST['pwd'];
            //$array = array('username'=>$username,'pwd'=>$pwd);
            return json_encode($data);

        }
        else{
            return 121254578787;
        }

    }


    public function  test(){
        return 111111222;
    }

}
