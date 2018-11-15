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
      title: '漂移副驾,够胆你就来', // 分享标题
      desc:'{{$data->nickname}}正在争夺2018武汉国际改装车展汽车漂移特技表演体验资格,请为他投票',
      
      link: 'http://www.djcb123.cn/race/detail/{{$data->openid}}', // 分享链接
      imgUrl: '{{$data->headpic}}', // 分享图标
      type: '', // 分享类型,music、video或link，不填默认为link
      dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
      success: function () {
        swal('分享成功','感谢您的分享',"success");
        $("#cover").hide();
      },
      cancel: function () {
        swal(
                "分项取消",
                "您已经取消分享",
                "error"
              );
      }
  });

  wx.onMenuShareTimeline({
     title: '漂移副驾,够胆你就来,{{$data->nickname}}正在争夺2018武汉改装车展汽车漂移特技表演体验资格,请为他投票', // 分享标题
      
      link: 'http://www.djcb123.cn/race/detail/{{$data->openid}}', // 分享链接
      imgUrl: '{{$data->headpic}}', // 分享图标
      success: function () {  
          swal('分享成功','感谢您的分享',"success");
          $("#cover").hide();
      
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
.info {
    font-size: 18px;
    padding: 10px;
    height: auto;
    min-height: 353px;
    color: white;
    background-color: black;
    margin-top: -10px;
}
.headpic {
    background: white;
    width:40%;
    margin-left: 5%;
    background-position: top;
    background-repeat: no-repeat;
    border-radius: 50%;
    position: relative;
    float: left;
    background-size: cover;
}

.word {
    float: right;
    right: 0px;
    position: relative;
    font-size: 22px;
    display: inline-grid;
}

.info-top{
  width: 100%;
  height: 180px;
}
  .top img{
        width: 100%;
  }
  
.button {
    background-color: red;
    border: none;
    width: 40%;
    height: 40px;
    border-radius: 5px;
    color: white;
    margin-left: 7%;
    font-size: 20px;
    position: relative;
    text-align: center;
    line-height: 40px;
    float: left;
}
#button-lg {
    background-color: red;
    border: none;
    width: 90%;
    height: 40px;
    border-radius: 5px;
    color: white;
    margin-left: 5%;
    font-size: 20px;
    position: relative;
    text-align: center;
    line-height: 40px;
    margin-bottom: 30px;
}
#button-sm {
    margin-top: 10px;
    position: relative;
    height: 40px;
}
.list {
    background-color: black;
    height: auto;
    margin-top: 5px;
    min-height: 1250px;
}
 .title {
    padding: 20px;
    font-size: 30px;
    text-align: center;
    color: red;
}
.list .title span{
  font-size: 16px;
}
.list .all{
  color: white;
  font-size:16px
}
.item {
    width: 25%;
    margin-left: 6%;
    float: left;
    overflow: hidden;
    height: auto;
    min-height: 160px;
    margin-top: 5px;
    
}
.nickname {
    width: 100%;
    /* border: 1px solid #ddd; */
    overflow: hidden;
    white-space: nowrap;
    text-align: center;
    text-overflow: ellipsis;
}
.head {
    width: 100%;
    height: auto;
    background-size: cover;
    border-radius: 50%;
    background-color: white;
}
.tip{
  text-overflow: ellipsis;
    width:200px;
    overflow: hidden;
    white-space: nowrap;
}
.bottom {
    margin-top: 5px;
    background-color: black;
    padding-bottom: 30px;
}
.bottom img {
    width: 90%;
    left: 5%;
    position: relative;
}
a{
  color: white;
  text-decoration: none;
}
.tips{
  font-size: 18px;
    color: white;
    text-align: center;
    margin-bottom: 30px;
}
.desc{
  font-size: 16px;
    color: white;
    padding: 10px;
}
.qtitle h3{
  text-align: center;
}
.qtitle p{
  margin-left: 7%
}
</style>

    
</head>
<body class="body-bg" style="">
<div class="top">
  <img src="{{asset('/')}}index/race/top.jpg">
</div>
<div class="info">
  <div class="info-top">
    <div class="headpic" style="background-image:url({{$data->headpic}});"></div>
    <div class="word">
      <div class="tip">昵称：{{$data->nickname}}</div>
      <div class="tip">序号：{{$data->id}}</div>
      <div class="tip">票数：{{$data->votes}}</div>
    </div>
  </div>
  <div class="qtitle">
    <h3>Ta的拉票宣言</h3>
    <p>{{$data->quote}}</p>
  </div>
  <div id="button-sm">
    <div onclick="vote(this,'{{$data->openid}}')"  id="votebtn" class="button">给Ta投一票</div>
   <div class="button"> <a href="{{asset('/')}}race">我要报名</a></div>
  </div>
  <div style="color:white;text-align: center;margin-top: 30px" class="left-time">
       活动结束倒计时：
       <div style="color:red;display: contents;">
        <span id="t_d">44</span>天
        <span id="t_h">1</span>时
        <span id="t_m">36</span>分
        <span id="t_s">55</span>秒
      </div>
   </div>

</div>
<div class="list">
  
 
    <div class="title">排名<span style="color:white">排名仅限前20名</span></div>
    <div class="all">
       @foreach ($lists as $li)
       <a href="{{asset('/')}}race/detail/{{$li->openid}}">
      <div class="item">
        <div class="head" style="background-image: url({{$li->headpic}});">
        
        </div>
        <div class="nickname">{{$li->nickname}}</div>
        <div class="nickname">票数:{{$li->votes}}</div>
      </div>
    </a>
      @endforeach
    </div>
   
 
  
  
</div>
<div class="bottom">
  <div class="title">活动介绍</div>
  <div class="desc">被称为个性、时尚、国际改装车Party的UTS，至2015年起已成功举办3届，稳坐中国汽车专业改装展规模第一，称为名副其实的改装第一展，今年将在6月23到25日登陆武汉，开展期间将在展馆外开展为期三天的漂移表演活动。</div>
  <div class="title">车队介绍</div>
  <div class="carteam">
    <img src="{{asset('/')}}index/race/carteam.jpg">
  </div>
  <div class="title">改装车展</div>
  <div class="desc">
    中国（武汉）国际汽车升级及改装展览会，简称UTS，是集汽车改装升级零部件，高端改装升级用品、特种改装车、越野改装、赛车部品，以及相关改装升级服务为一体的国际专业改装展览会
  </div>
  <div class="ticket">
    <img src="{{asset('/')}}index/race/ticket.jpg">
  </div>
  <div class="ticket">
    <img style="width:50%;left: 25%;position: relative;" src="{{asset('/')}}index/race/qrcode.jpg">
  </div>
  <div class="tips">扫码抢电子门票</div>
  <div id="button-lg">转发分享拉票</div>
 
</div>
<img id="cover" style="width:100%;display: none;z-index: 100;position: fixed;top: 0px" src="{{asset('/')}}index/ticket/share.png"> 
<script src="{{asset('/')}}index/ticket/jquery.min.js"></script>
<script src="{{asset('/')}}index/ticket/leftTime.min.js"></script>
<script type="text/javascript" src="{{asset('/')}}index/race/jquery.form.min.js"></script> 
<script type="text/javascript">
  window.onload=function(){
    $(".head").css("height", $(".head").css("width"));
    $(".headpic").css("height", $(".headpic").css("width"));
    var lineheight= $(".headpic").css("width");
    $(".word").css("height", lineheight);
  }
</script>
<script>
   function GetRTime(){
       var EndTime= new Date('2018/06/16 00:00:00');
      var NowTime = new Date();
      if(NowTime>1529078400){
        var t =0;
       var d=0;
       var h=0;
       var m=0;
       var s=0;
     
   }else{
       var t =EndTime.getTime() - NowTime.getTime();
       var d=Math.floor(t/1000/60/60/24);
       var h=Math.floor(t/1000/60/60%24);
       var m=Math.floor(t/1000/60%60);
       var s=Math.floor(t/1000%60);
      }
      
       document.getElementById("t_d").innerHTML = d + "";
       document.getElementById("t_h").innerHTML = h + "";
       document.getElementById("t_m").innerHTML = m + "";
       document.getElementById("t_s").innerHTML = s + "";
       
     
   }
   setInterval(GetRTime,0);




  

</script>
    <script type="text/javascript">
 




   function vote(obj,id) {
        var id =id;
        $.ajax({
            type: 'get',
            url: '/race/vote/'+id,
            beforeSend: function () {
                // 禁用按钮防止重复提交
                $("#votebtn").attr({ disabled: "disabled" });
            },
            success: function (data) {
              //alert(1);
               //alert(data.code);
                if(data.code=='200'){

                   swal(data.status,data.msg,"success");
                   setTimeout(function(){window.location.reload();},2000);
                 }else{
                 // alert(111);
                  swal(
                data.status,
                data.msg,
                "error"
              );
                 }


            },
            error: function (data, json, errorThrown) {
                swal("错误","系统报了一个错误，请稍候再试","error");
            }
        });
    };




</script>
<script type="text/javascript">
    $("#button-lg").click(function(){
      $('#cover').show();
    })
  </script>

</body>
</html>