<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{{csrf_token()}}"/>
    <title>HTML5响应式第三方登录页面模板</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />

    <link rel="stylesheet" type="text/css" href="{{URL::asset('admin/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('admin/login/fonts/iconic/css/material-design-iconic-font.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('admin/login/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('admin/login/css/main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('admin/login/css/message.css')}}">

</head>
<body>
<div id="response"></div>   <!--用来显示错误提示的div-->
<div class="limiter">
    <div class="container-login100" style="background-image: url('{{URL::asset("admin/login/images/bg-01.jpg")}}');">
        <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
            <form class="login100-form validate-form" id="frm">

                <span class="login100-form-title p-b-49">登录</span>

                <div class="wrap-input100 validate-input m-b-23" data-validate="请输入用户名">
                    <span class="label-input100">用户名</span>
                    <input class="input100" id="username"  type="text" name="username" placeholder="请输入用户名" autocomplete="off">
                    <span class="focus-input100" data-symbol="&#xf206;"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="请输入密码">
                    <span class="label-input100">密码</span>
                    <input class="input100" id="password" type="password" name="password" placeholder="请输入密码" autocomplete="off">
                    <span class="focus-input100" data-symbol="&#xf190;"></span>
                </div>

                <div class="text-right p-t-8 p-b-31">
                    <a href="javascript:">忘记密码？</a>
                </div>

                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button type="button" class="login100-form-btn loginBtn">登 录</button>
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
           /* if(username=="" || password==""){
                $.message({
                    message:"用户名密码不能为空",
                    type:'error'
                });
            }*/
            $.ajax({
                type: 'POST',
                url:'login',
                dataType: 'json',
                data:$('#frm').serialize(),
                //防（CSRF） 攻击
                headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
                success: function(data){
                    if(data.status === 200){
                        $.message({
                            message:data.message,
                            type:'success'
                        });
                        setTimeout('url()' ,2000 );
                    }else{
                        $.message({
                            message:data.message,
                            type:'error'
                        });
                    }
                },

                //ajax 方法输出自定义错误信息提示
                error:function (data) {
                    if (data.status === 422) {
                        $val=[];
                        var errors = $.parseJSON(data.responseText);    //转json格式，或直接使用 data.responseJSON
                        $.each(errors, function (key, value) {
                        if($.isPlainObject(value)){
                            $.each(value,function (key,value) {
                                $val.push(value);
                            });
                        }
                        });
                        var msg = $val.slice(0,1);
                       // alert(end);
                        $.message({
                           message:msg,
                            type:'warning'
                        });

                    }


                    //页页输出自定义错误信息提示
                    /*
                    if (data.status === 422) {
                        var errors = $.parseJSON(data.responseText);    //转json格式，或直接使用 data.responseJSON
                        $.each(errors, function (key, value) {
                            $('#response').addClass("alert alert-danger");
                            if ($.isPlainObject(value)) {
                                $.each(value, function (key, value) {
                                    console.log(key + " " + value);
                                    $('#response').show().append(value + "<br/>");

                                });
                            } else {
                                $('#response').show().append(value + "<br/>"); //this is my div with messages
                            }
                        });
                    }
                    */



                }
            });
        });





    });
    //页面跳转方法
    function  url() {
        window.location.href = '/admin/index';
    }


</script>


</body>
</html>
