<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{{csrf_token()}}"/>
    <title>HTML5响应式第三方登录页面模板</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link rel="stylesheet" type="text/css" href="{{URL::asset('admin/login/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('admin/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('admin/login/fonts/iconic/css/material-design-iconic-font.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('admin/login/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('admin/login/css/main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('admin/login/css/message.css')}}">


</head>

<body>

<div class="limiter">
    <div class="container-login100" style="background-image: url('{{URL::asset("admin/login/images/bg-01.jpg")}}');">
        <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
            <form class="login100-form validate-form" id="frm">
                @csrf
                <span class="login100-form-title p-b-49">登录</span>

                <div class="wrap-input100 validate-input m-b-23" data-validate="请输入用户名">
                    <span class="label-input100">用户名</span>
                    <input class="input100" id="username"  type="text" name="username" placeholder="请输入用户名" autocomplete="off">
                    <span class="focus-input100" data-symbol="&#xf206;"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="请输入密码">
                    <span class="label-input100">密码</span>
                    <input class="input100" id="password" type="password" name="pass" placeholder="请输入密码">
                    <span class="focus-input100" data-symbol="&#xf190;"></span>
                </div>

                <div class="text-right p-t-8 p-b-31">
                    <a href="javascript:">忘记密码？</a>
                </div>

                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button  class="login100-form-btn loginBtn">登 录</button>
                    </div>
                </div>

                <div class="txt1 text-center p-t-54 p-b-20">
                    <span>第三方登录</span>
                </div>

                <div class="flex-c-m">
                    <a href="#" class="login100-social-item bg1">
                        <i class="fa fa-wechat"></i>
                    </a>

                    <a href="#" class="login100-social-item bg2">
                        <i class="fa fa-qq"></i>
                    </a>

                    <a href="#" class="login100-social-item bg3">
                        <i class="fa fa-weibo"></i>
                    </a>
                </div>

                <div class="flex-col-c p-t-25">
                    <a href="javascript:" class="txt2">立即注册</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="{{URL::asset('admin/login/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<script src="{{URl::asset('admin/login/js/main.js')}}"></script>
<script src="{{URl::asset('admin/login/js/message.js')}}"></script>


<script>





    $(function () {

        /*
        //验证用户名称长度
        $('.txt_message').blur(function () {
            $username=$(".txt_message").val();
            if($username=="" || $username.length < 5  || $username.length > 32){
                $.message({
                    message:"用户名格式: 5~18 个字符",
                    type:'warning',

                });
            }

        });

            //难密码码长度
        $('.pwd_message').blur(function () {
            $pwd=$(".pwd_message").val();
            if($pwd=="" || $pwd.length < 6  || $pwd.length > 18 ){
                $.message({
                    message:"密码格式: 6~18 个字符",
                    type:'warning'
                });
            }
        });

*/


        //登录提交
        $(".loginBtn").click(function () {
            var username=$('#username').val();
            var password=$('#password').val();
            $.ajax({
                type: 'post',
                url:'login',
                dataType: 'json',
                data:{'username':username,'pwd':password},
                headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
                success: function(data){
                    alert(data.username+'--------------------'+data.pwd);
                    //alert(data);
                },
                error: function(xhr, type){
                    alert('Ajax error!')
                }
            });
        });





    });

</script>


</body>
</html>
