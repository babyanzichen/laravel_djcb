<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>点金车宝后台管理系统</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="_token" content="{!! csrf_token() !!}"/>
        <link rel="stylesheet" href="{{ asset('/')}}auth/css/bootstrap.min.css" />
        <link rel="stylesheet" href="{{ asset('/')}}auth/css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="{{ asset('/')}}auth/css/matrix-login.css" />
        <link href="{{ asset('/')}}auth/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
        <script type="text/javascript" src="{{ asset('/auth/js/jquery.min.js') }}"></script>
    </head>
    <body>
        <div id="loginbox">            
            <form id="loginform" class="form-vertical"  method="POST" action="{{ url('/login') }}" style="display: block;">
                <div class="control-group normal_text"> <h3><img src="{{ asset('/auth/img/logo.png')}}" alt="Logo"></h3></div>
                <div class="control-group">
                     {!! csrf_field() !!}
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"></i></span><input type="email"  name="email" placeholder="请在此输入用户名">
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" name="password" placeholder="请在此输入密码">
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <span class="pull-left"><a href="{{ url('/register') }}" class="flip-link btn btn-info">申请账号</a></span>
                    <span class="pull-left"><a href="#" class="flip-link btn btn-info" id="to-recover">忘记密码?</a></span>
                    <span class="pull-right"><input type="submit" value="登陆" class="btn btn-success"></span>
                </div>
            </form>
            <div id="recoverform"  class="form-vertical" style="display: none;">
                <p class="normal_text">请填入您账户注册时使用的邮箱，系统将自动发送密码重置链接到您此邮箱。如果1分钟后仍未收到邮箱，请尝试刷新此页面，并重新提交。</p>
                
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lo"><i class="icon-envelope"></i></span><input type="text" name="emailaccount" placeholder="请输入您的邮箱">
                        </div>
                    </div>
               
                <div class="form-actions">
                    <span class="pull-left"><a href="{{ url('/auth/login') }}" class="flip-link btn btn-success" id="to-login">« 返回登录</a></span>
                    <span class="pull-right" id="sendemail"><button class="btn btn-info">提交申请</button></span>
                </div>
            </div>
        </div>
         
     <script type="text/javascript" src="{{ asset('/auth/js/jquery.min.js') }}"></script>
     <script type="text/javascript" src="{{ asset('/auth/js/matrix.login.js') }}"></script>
</body>
<script type="text/javascript">
$(document).ready(function(){
    $("#sendemail").click(function(){
        var email=$('input[name="emailaccount"]').val();
        var token = $('meta[name="_token"]').attr('content');
        $.ajax ({
        type: 'POST',
        url:"{{ url('/password/email') }}",
        data:{
          "email":  email,
          "_token": token
      },   
       success:function(data){ 
       alert("密码重置申请提交成功，请到邮箱查看");
       location.reload() ;
      
                  },
      async:true
    });
  })
})
</script>
</html>
