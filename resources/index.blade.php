<!DOCTYPE html>
<html style="font-size: 100px;"><head lang="en"><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="_token" content="{!! csrf_token() !!}" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>2018武汉国际改装车展</title>
    <script type="text/javascript">
        function setRootFontSize() {
            var width = document.documentElement.clientWidth, fontSize;
            if (width > 720) {
                document.getElementsByTagName('html')[0].style['font-size'] = 100 + 'px';
            }
            else if(width<=720){
                fontSize = (width / 7.2);
                document.getElementsByTagName('html')[0].style['font-size'] = fontSize + 'px';
            }
        }
        setRootFontSize();
        window.addEventListener('resize', function() {
            setRootFontSize();
        }, false);
    </script>
 <script type="text/javascript" src="https://res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
 <script src="{{asset('/')}}index/js/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{asset('/')}}index/css/sweetalert.min.css"">
<script>
      wx.checkJsApi({
        jsApiList: ['chooseImage'], // 需要检测的JS接口列表，所有JS接口列表见附录2,
        success: function(res) {
          // 以键值对的形式返回，可用的api值true，不可用为false
          // 如：{"checkResult":{"chooseImage":true},"errMsg":"checkJsApi:ok"}
        }
      });
    wx.config({
        debug: false,
        appId: '<?php echo $signPackage["appId"];?>',
        timestamp: '<?php echo $signPackage["timestamp"];?>',
        nonceStr: '<?php echo $signPackage["nonceStr"];?>',
        signature: '<?php echo $signPackage["signature"];?>',
        jsApiList: [
          // 所有要调用的 API 都要加到这个列表中
          'onMenuShareTimeline','onMenuShareAppMessage'
        ]
      });

  wx.ready(function(){
    wx.onMenuShareAppMessage({
     title: '漂移副驾，想体验你就来', // 分享标题
      desc: '{{session()->get("user")["nickname"]}}想邀请您体验2018武汉国际改装车展汽车漂移特技表演', // 分享描述
      link: 'http://www.djcb123.cn/race', // 分享链接
      imgUrl: 'http://www.djcb123.cn/index/ticket/152509992876327.png', // 分享图标
      type: '', // 分享类型,music、video或link，不填默认为link
      dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
      success: function () {
        swal('分享成功','感谢您的分享',"success");
      },
      cancel: function () {
        swal(
                "分享取消",
                "您已经取消分享",
                "error"
              );
      }
  });

  wx.onMenuShareTimeline({
      title: '{{session()->get("user")["nickname"]}}想邀请您体验2018武汉国际改装车展汽车漂移特技表演', // 分享标题
      
      link: 'http://www.djcb123.cn/race', // 分享链接
      imgUrl: 'http://www.djcb123.cn/index/ticket/152509992876327.png', // 分享图标
      success: function () {  
          swal('分享成功','感谢您的分享',"success");
      
      },
      cancel: function () {
        swal(
                "分享取消",
                "您已经取消分享",
                "error"
              );
      }
  });

  });
</script>

   
  <style type="text/css">
body,div,img{
  margin: 0;
  padding: 0;
}
body {
    background: #6f6d6d;
}
.headpic {
    background: white;
    width: 100px;
    height: 100px;
    text-align: center;
    margin-left: 35%;
    border-radius: 50%;
}
.headpic img {
    width: 100px;
    
    border-radius: 50%;
}
#headpic{
      height: 100px;
    width: 100px;
    
    border-radius: 50%;
    background-size: cover;
}
  .top img{
        width: 100%;
  }
  .laws {
    position: relative;
    font-size: 14px;
    padding: 10px;
    color: white;
    background-color: black;
    margin-top: -10px;
}
 .form {
    background: black;
    color: red;
    text-align: center;
    font-size: 36px;
    margin-top: 10px;
    padding-bottom: 30px;
}
  .nickname input{
    width: 80%;
    height: 30px;
    border-radius: 5px;
    margin-top: 10px;
  }
  .quote textarea{
    width: 80%;
    height:60px;
    border-radius: 5px;
    margin-top: 10px;
  }
  .username input{
    width: 80%;
    height: 30px;
    border-radius: 5px;
    margin-top: 10px;
  }
  .phone input{
    width: 80%;
    height: 30px;
    border-radius: 5px;
    margin-top: 10px;
  }
#button{
  background-color: red;
    border: navajowhite;
    width: 80%;
    height: 30px;
    border-radius: 5px;
    color: white;
}
.title {
    font-size: 24px;
    padding-top: 20px;
    padding-bottom: 10px;
}
</style>

    
</head>
<body class="body-bg" style="">
<div class="top">
  <img src="{{asset('/')}}index/race/top.jpg">
</div>
<div class="laws">
  <p>1、活动时间为：2018年5月30日到6月15日。</p>
  <p>2、漂移体验活动为刺激性活动，如参赛者对此类活动排斥者请勿报名。</p>
  <p>3、体验漂移之前会跟参加者签署免责协议。</p>
  <p>4、请留意报名及投票时间，妥善安排时间。</p>
  <p>5、活动结束后主办方根据票数排名前30名参赛者进行兑奖。</p>
  <p>6、此次改装车展漂移活动时间为2018年6月23至25日，地点为武汉国际博览中心（汉阳区）。</p>
</div>
<div class="form">
  
 
    <div class="title">填写参赛信息</div>
    <div class="headpic">
      <form id="jvForm" action="o_save.shtml" method="post" enctype="multipart/form-data">  
         <a style="position: absolute;background-color: rgba(3, 169, 244, 0);font-size:20px;color: #908b8b;z-index: 1000;margin-top: 0;width: 100px;height: 100px;line-height: 100px;left: 35%;" id="upbtn" >上传头像
                <input style="background-color: transparent;opacity: 0;height: 100px; width:100px;position: absolute;left: 8px;display: block;top: 0px;" name="file" type="file" onchange="uploadPic()"/> 
      </a>
      <div id="headpic" style="background-image: url({{session()->get('user')['headimgurl']}})"></div>
  
    </form>
    
    </div>
    <div style="text-align: center;color:red;font-size: 16px">为防止上传头像变形，请尽量使用其它软件<br>将照片裁剪成正方形后再在此处上传</div>
    <div class="nickname"><input value="{{session()->get('user')['nickname']}}" type="text" name="nickname" placeholder="请填写个人昵称"></div>
    <div class="quote"><textarea name="quote" placeholder="请填写个人拉票宣言"></textarea></div>
    <div class="title">
      请填写联系信息
      <p style="font-size: 14px;margin: 0px;">(此部分信息不对外公开)</p>
    </div>
    <div class="username"><input type="text" name="username" placeholder="请填写姓名"></div>
    <div class="phone"><input type="text" name="phone" placeholder="请填写联系电话"></div>
    <div><input id="button" onclick="sub()" type="button" value="确认提交"></div>
 
  
  
</div>

<script src="{{asset('/')}}index/ticket/jquery.min.js"></script>
<script src="{{asset('/')}}index/ticket/leftTime.min.js"></script>
<script type="text/javascript" src="{{asset('/')}}index/race/jquery.form.min.js"></script> 

<script>
   function GetRTime(){
       var EndTime= new Date('2018/06/26 00:00:00');
       var EndTime1=new Date('2018/05/31 00:00:00');
       var EndTime2=new Date('2018/06/21 00:00:00');
       var EndTime3=new Date('2018/06/26 00:00:00');
       var NowTime = new Date();
       if(NowTime<EndTime1){
          var remain=EndTime1.getTime() - NowTime.getTime();
          $(".yleft").html("1元抢票");
       }else if(NowTime>=EndTime1&&NowTime<EndTime2){
          var remain=EndTime2.getTime() - NowTime.getTime();
          $(".yleft").html("10元抢票");
       }else{
          var remain=EndTime3.getTime() - NowTime.getTime();
          $(".yleft").html("50元抢票");
       }
       var t =EndTime.getTime() - NowTime.getTime();
       var d=Math.floor(t/1000/60/60/24);
       var h=Math.floor(t/1000/60/60%24);
       var m=Math.floor(t/1000/60%60);
       var s=Math.floor(t/1000%60);
       var days=Math.floor(remain/1000/60/60/24);
       var hours=Math.floor(remain/1000/60/60%24);
       var minutes=Math.floor(remain/1000/60%60);
       var seconds=Math.floor(remain/1000%60);
       document.getElementById("t_d").innerHTML = d + "";
       document.getElementById("t_h").innerHTML = h + "";
       document.getElementById("t_m").innerHTML = m + "";
       document.getElementById("t_s").innerHTML = s + "";
     document.getElementById("v_d").innerHTML = days + "";
       document.getElementById("v_h").innerHTML = hours + "";
       document.getElementById("v_m").innerHTML = minutes + "";
       document.getElementById("v_s").innerHTML = seconds + "";
   }
   setInterval(GetRTime,1000000000);




   function uploadPic() {  
        // 上传设置  
        var options = {  
                // 规定把请求发送到那个URL  
                url: "/upload/upimg",  
                // 请求方式  
                type: "post",  
                // 服务器响应的数据类型  
                dataType: "json",  
                // 请求成功时执行的回调函数  
                success: function(data, status, xhr) {  
                    // 图片显示地址  
                    $("#headpic").css("background-image","url("+data.data.src+")");  
                }  
        };  
          
        $("#jvForm").ajaxSubmit(options);  
    }  



</script>
    <script type="text/javascript">
  function sub(){
    var username=$('input[name="username"]').val();
  var phone=$('input[name="phone"]').val();
  var nickname=$('input[name="nickname"]').val();
  var quote=$('textarea[name="quote"]').val();
  var headpic=$('#headpic').css("backgroundImage").replace('url(','').replace(')','');
  //alert(headpic);
  if (phone!=''&&nickname!=''&&username!=''&&quote!=''&&headpic!=''){
  
        $.ajax({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        },
          url: '/race/infosubmit',
          type: "POST",
          data: {'username':username,'phone':phone,'nickname':nickname,'quote':quote,'headpic':headpic},

          success: function (data) {
            //alert(data);
            if(data.code==200){
              //alert("请支付");
              swal('报名成功','2秒钟后自动跳转至个人主页',"success");
                    setTimeout(function(){window.location.href='/race/detail/{{session()->get("user")["openid"]}}';},2000);
            }else{
              swal(
                data.status,
                data.msg,
                "error"
              );
            }
            
            },
            error:function(data){
              //alert('系统错误，请刷新页面重试');
              swal(
                "报名失败",
                "系统错误，请稍候再试",
                "error"
              );
            }
        });
      }else{
      //alert('信息填写不完整，请补充')
      swal(
            "报名失败",
            "信息填写不完整，请补充",
            "error"
          );
    }
 } 
</script>


</body>
</html>