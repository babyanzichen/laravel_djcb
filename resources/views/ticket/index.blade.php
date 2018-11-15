<!DOCTYPE html>
<html style="font-size: 100px;"><head lang="en"><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="_token" content="{!! csrf_token() !!}" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>【门票】2018武汉国际改装车展</title>
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
     title: '【门票】2018武汉国际改装车展，搜好玩，一起来', // 分享标题
      desc: '{{session()->get("user")["nickname"]}}想邀请您参加2018武汉国际改装车展抢票', // 分享描述
      link: 'http://www.djcb123.cn/ticket', // 分享链接
      imgUrl: 'http://www.djcb123.cn/index/ticket/152509992876327.png', // 分享图标
      type: '', // 分享类型,music、video或link，不填默认为link
      dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
      success: function () {
        swal('分享成功','感谢您的分享',"success");
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
      title: '{{session()->get("user")["nickname"]}}想邀请您参加2018武汉国际改装车展抢票', // 分享标题
      
      link: 'http://www.djcb123.cn/ticket', // 分享链接
      imgUrl: 'http://www.djcb123.cn/index/ticket/152509992876327.png', // 分享图标
      success: function () {  
          swal('分享成功','感谢您的分享',"success");
      
      },
      cancel: function () {
        swal(
                "分项取消",
                "您已经取消分享",
                "error"
              );
      }
  });

  });
</script>
<link href="{{asset('/')}}index/ticket/swiper.min.css" rel="stylesheet" type="text/css">
    <link href="{{asset('/')}}index/ticket/refit.css" rel="stylesheet" type="text/css">
	<style type="text/css">
	 table.data-table{width:100%;}
	 table.data-table tr:odd{background:#dcebff;}
	 table.data-table td{line-height:24px;padding:3px;vertical-align: top;}
	 table.data-table th{height:50px;line-height:50px;padding: 3px;font-size:20px;text-align: left;}
	 table.data-table .colspan-a{width:35%;}
	 table.data-table .colspan-b{width:25%;}
	 table.data-table .colspan-c{width:40%;}
	 table.data-table td pre{display: block; padding:5px; border: 1px solid #00caff;background: #f8fcff;text-align: left;}
	.testBtn-a{display: inline-block;height:30px;line-height:30px;padding:0 10px; border:0; border-radius:5px;color:#fff;background:rgb(65,133,244);cursor: pointer;}
	.testBtn-a.on{background:#c9c9c9;color:#666;cursor: default;}
	.data-show-box{line-height:30px; color:#fff;}
	.date-tiem-span,.date-s-span{display: inline-block;font-size:18px; width:36px; height:30px;line-height:30px; text-align: center; color:#fff; border-radius:5px;}
	.date-tiem-span{ background:#333;}
	.date-s-span{ background:#f00;}
	.date-select-a{margin-right:5px;}
  .addr{
    text-align: center;
    color: #FFC107;
    font-size: 17px;
    height: 40px;
    line-height: 50px;
  }
  .left-time span {
   
   
    color: #fff;
    font-size: .28rem;
    text-align: center;
    background:rgba(0, 0, 0, 0);
}



@media only screen and (max-width:540px){
.parent,.slider,.slide1,.slide2,.slide3,.slide4,svg{  min-height:300px;}
 
  }
@media only screen and (max-width:480px){
.parent,.slider,.slide1,.slide2,.slide3,.slide4,svg{  min-height:195px;}
 
  }
  @media only screen and (max-width:400px){
.parent,.slider,.slide1,.slide2,.slide3,.slide4,svg{  min-height:175px;}

  }
    @media only screen and (max-width:360px){
.parent,.slider,.slide1,.slide2,.slide3,.slide4,svg{  min-height:175px;}

  
  }
  @media only screen and (max-width:320px){
.parent,.slider,.slide1,.slide2,.slide3,.slide4,svg{  min-height:155px;}
  
}
.parent {
  width: 100%;
  height:auto;
 
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  margin: auto auto;
  overflow: hidden;
  position:relative;
  -webkit-box-shadow: 0 0 88px 5px rgba(0, 0, 0, 0.75);
  -moz-box-shadow: 0 0 88px 5px rgba(0, 0, 0, 0.75);
  box-shadow: 0 0 88px 5px rgba(0, 0, 0, 0.75);
}

svg {
  position: absolute;
  z-index: 1;
  width: 100%;
 height:auto;
}

.butt {
  position: absolute;
  z-index: 50;
  width: 25px;
  overflow: hidden;
  height: 25px;
  border: none;
  border-radius: 50%;
  background: #fff;
  cursor: pointer;
  -webkit-box-shadow: 0 0 88px 5px rgba(0, 0, 0, 0.75);
  -moz-box-shadow: 0 0 88px 5px rgba(0, 0, 0, 0.75);
  box-shadow: 0 0 88px 5px rgba(0, 0, 0, 0.75);
}
.butt:focus {
  outline-width: 0;
}

circle {
  stroke: #fff;
  fill: none;
  transition: 0.3s;
}

#svg1 circle {
  transition-timing-function: linear;
}

#svg2 circle {
  transition-timing-function: linear;
}

#Capa_1 {
  position: absolute;
  width: 16px;
  height: 16px;
  transform: translate(-7px, -8px);
}

#Capa_2 {
  position: absolute;
  width: 16px;
  height: 16px;
  transform: translate(-9px, -8px);
}

.right {
    top: 40%;
    right: 0px;
    border: 1px solid #849494;
    background-color: transparent;
    transition: .5s;
}
.right:hover {
  background-color: #fff;
}

.left {
    left: 0px;
    top: 40%;
    border: 1px solid #849494;
    background-color: transparent;
    transition: .5s;
}
.left:hover {
  background-color: #fff;
}

.circle1 {
  transition-delay: 0.05s;
}

.circle2 {
  transition-delay: 0.1s;
}

.circle3 {
  transition-delay: 0.15s;
}

.circle4 {
  transition-delay: 0.2s;
}

.circle5 {
  transition-delay: 0.25s;
}

.circle6 {
  transition-delay: 0.3s;
}

.circle7 {
  transition-delay: 0.35s;
}

.circle8 {
  transition-delay: 0.4s;
}

.circle9 {
  transition-delay: 0.45s;
}

.circle10 {
  transition-delay: 0.05s;
}

.circle11 {
  transition-delay: 0.1s;
}

.circle12 {
  transition-delay: 0.15s;
}

.circle13 {
  transition-delay: 0.2s;
}

.circle14 {
  transition-delay: 0.25s;
}

.circle15 {
  transition-delay: 0.3s;
}

.circle16 {
  transition-delay: 0.35s;
}

.circle17 {
  transition-delay: 0.4s;
}

.circle18 {
  transition-delay: 0.45s;
}

.slide1 {
  background-image: url("{{asset('/')}}index/ticket/banner1.jpg");
}

.slide2 {
  background-image: url("{{asset('/')}}index/ticket/banner2.jpg");
}

.slide3 {
  background-image: url("{{asset('/')}}index/ticket/banner1.jpg");
}

.slide4 {
  background-image: url("{{asset('/')}}index/ticket/banner2.jpg");
}

.slider {
  position: absolute;
  width:100%;
 height:auto;
 
  background: #000;
  display: inline-flex;
  overflow: hidden;
}

 .slide1,
.slide2,
.slide3,
.slide4 {
    position: absolute;
    background-position:top;
    background-size:100%;
    background-repeat: no-repeat;
    color: #fff;
    font-size: 62px;
    font-weight: 800;
    font-family: 'Heebo', sans-serif;
    text-align: center;
    width: 100%;height:auto;
  
    z-index: 10;
    transition: 1.4s;
}

.tran {
  transform: scale(1.3);
}

.up1 {
  z-index: 20;
}

.up2 {
  z-index: 40;
}

.steap {
  stroke-width: 0;
}

.streak {
  stroke-width: 82px;
}

@media (max-width: 700px) {
 
}
</style>

    
</head>
<body class="body-bg" style="">


<div class="action-wrap">
   <!--<div class="banner"><img src="{{asset('/')}}index/ticket/banner.jpg"></div>-->

    


    <div class='parent'>
    <div class='slider' onclick="location='/race/'">
        <button type="button" id='right' class='butt right' name="button">

       <svg style="min-height: 15px" version="1.1" id="Capa_1" width='40px' height='40px ' xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
         viewBox="0 0 477.175 477.175" style="enable-background:new 0 0 477.175 477.175;" xml:space="preserve">
       <g>
        <path style='fill: #9d9d9d;' d="M360.731,229.075l-225.1-225.1c-5.3-5.3-13.8-5.3-19.1,0s-5.3,13.8,0,19.1l215.5,215.5l-215.5,215.5
          c-5.3,5.3-5.3,13.8,0,19.1c2.6,2.6,6.1,4,9.5,4c3.4,0,6.9-1.3,9.5-4l225.1-225.1C365.931,242.875,365.931,234.275,360.731,229.075z
          ">
       </g>

       </svg>

       </button>
        <button type="button" id='left' class='left butt' name="button">
       <svg style="min-height: 15px" version="1.1" id="Capa_2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
         viewBox="0 0 477.175 477.175" style="enable-background:new 0 0 477.175 477.175;" xml:space="preserve">
       <g>
        <path style='fill: #9d9d9d;' d="M145.188,238.575l215.5-215.5c5.3-5.3,5.3-13.8,0-19.1s-13.8-5.3-19.1,0l-225.1,225.1c-5.3,5.3-5.3,13.8,0,19.1l225.1,225
          c2.6,2.6,6.1,4,9.5,4s6.9-1.3,9.5-4c5.3-5.3,5.3-13.8,0-19.1L145.188,238.575z">
       </g>
       </svg>
       </button>
        <svg id='svg2' class='up2' xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
      <circle id='circle1' class='circle1 steap' cx="34px" cy="49%" r="20"  />
      <circle id='circle2' class='circle2 steap' cx="34px" cy="49%" r="100"  />
      <circle id='circle3' class='circle3 steap' cx="34px" cy="49%" r="180"  />
      <circle id='circle4' class='circle4 steap' cx="34px" cy="49%" r="260"  />
      <circle id='circle5' class='circle5 steap' cx="34px" cy="49%" r="340"  />
      <circle id='circle6' class='circle6 steap' cx="34px" cy="49%" r="420"  />
      <circle id='circle7' class='circle7 steap' cx="34px" cy="49%" r="500"  />
      <circle id='circle8' class='circle8 steap' cx="34px" cy="49%" r="580"  />
      <circle id='circle9' class='circle9 steap' cx="34px" cy="49%" r="660"  />
    </svg>
        <svg id='svg1' class='up2' xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
      <circle id='circle10' class='circle10 steap' cx="648px" cy="49%" r="20"  />
      <circle id='circle11' class='circle11 steap' cx="648px" cy="49%" r="100"  />
      <circle id='circle12' class='circle12 steap' cx="648px" cy="49%" r="180"  />
      <circle id='circle13' class='circle13 steap' cx="648px" cy="49%" r="260"  />
      <circle id='circle14' class='circle14 steap' cx="648px" cy="49%" r="340"  />
      <circle id='circle15' class='circle15 steap' cx="648px" cy="49%" r="420"  />
      <circle id='circle16' class='circle16 steap' cx="648px" cy="49%" r="500"  />
      <circle id='circle17' class='circle17 steap' cx="648px" cy="49%" r="580"  />
      <circle id='circle18' class='circle18 steap' cx="648px" cy="49%" r="660"  />
    </svg>
        <div id='slide1' class='slide1 up1'></div>
        <div id='slide2'  class='slide2'></div>
        <div id='slide3' class='slide3'></div>
       <div id='slide4'  class='slide4'></div>
    </div>
</div>








   <div class="addr">2018.6.23-25武汉国际博览中心（汉阳）</div>
   <div style="color:white" class="left-time">
				武汉展倒计时：
        <span id="t_d">44</span>天
        <span id="t_h">1</span>时
        <span id="t_m">36</span>分
        <span id="t_s">55</span>秒
   </div>
   <div class="exhibiton-explain">
       <div class="ex-head">
           <img src="{{asset('/')}}index/ticket/ex_top.png">
       </div>
       <div class="ex-title"></div>
       <div class="ex-nav">
           <a href=""><span>汽车改装嘉年华</span></a>
           <a href=""><span>汽车音乐节</span></a>
           <a href=""><span>汽车赛事体验</span></a>
       </div>
   </div>
    <div class="ex-main">
        <img src="{{asset('/')}}index/ticket/ad_01.jpg" class="w100">
        <img src="{{asset('/')}}index/ticket/ad_02.jpg" class="w100">
        <div class="brand-wrap">
            <img src="{{asset('/')}}index/ticket/brand_title.jpg" class="w100">
            <div class="title"><span class="arrow"></span><span class="tlx">更多品牌向右滑动</span></div>
            <!-- Swiper -->
            <div class="swiper-container swiper-container-horizontal">
                <div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px);">
<div class="swiper-slide swiper-slide-active" style="width: 750px;">
<ul class="brandUL">
<li><img src="{{asset('/')}}index/ticket/logos/10.jpg"></li>
<li><img src="{{asset('/')}}index/ticket/logos/2.jpg"></li>
<li><img src="{{asset('/')}}index/ticket/logos/3.jpg"></li>
<li><img src="{{asset('/')}}index/ticket/logos/4.jpg"></li>
<li><img src="{{asset('/')}}index/ticket/logos/5.jpg"></li>
<li><img src="{{asset('/')}}index/ticket/logos/6.jpg"></li>
</ul>
</div>
<div class="swiper-slide swiper-slide-next" style="width: 750px;">
  <ul class="brandUL">
    <li><img src="{{asset('/')}}index/ticket/logos/7.jpg"></li>
<li><img src="{{asset('/')}}index/ticket/logos/8.jpg"></li>
<li><img src="{{asset('/')}}index/ticket/logos/9.jpg"></li>
<li><img src="{{asset('/')}}index/ticket/logos/1.jpg"></li>
<li><img src="{{asset('/')}}index/ticket/logos/11.jpg"></li>
<li><img src="{{asset('/')}}index/ticket/logos/12.jpg"></li>
</ul>
</div>
                </div>
                <!-- Add Arrows -->
                <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide" aria-disabled="false"></div>
                <div class="swiper-button-prev swiper-button-disabled" tabindex="0" role="button" aria-label="Previous slide" aria-disabled="true"></div>
            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
        </div>
        <div class="ticket-wrap">
            <div class="yuan-ticket">
               <div class="yuan-top">
                   <div class="yleft"></div>
                   <div class="yright">
                       <span class="old-price">原价120元</span>
                       <span class="time">抢票倒计时：<em><font id="v_d">44</font>天
        <font id="v_h">1</font>时
        <font id="v_m">36</font>分
        <font id="v_s">55</font>秒</em></span>
                   </div>
               </div>
                <div class="yuan-bot">
                    <div class="wper">
                        <span class="s1">1元<em>抢票</em></span>
                        <span class="s2">6月10日结束</span>
                    </div>
                    <div class="wper">
                        <span class="s1">10元<em>抢票</em></span>
                        <span class="s2">6月22日结束</span>
                    </div>
                    <div class="wper">
                        <span class="s1">20元<em>抢票</em></span>
                        <span class="s2">6月25日结束</span>
                    </div>
                </div>
            </div>
			<form action="/success" method="post">
            <div class="tickeInput">
               <ul>
                <input type="text" value="{{$openid}}" style="display: none;" name="openid">
                <input type="text" value="{{$ordersn}}" style="display: none;" name="ordersn">
                <input type="text" value="{{$price}}" style="display: none;" name="price">
                   <li><i class="v1"></i><input type="text" name="username" class="ipt" placeholder="购票人姓名"></li>
                   <li><i class="v2"></i><input type="text" name="phone" class="ipt" placeholder="购票人手机"></li>
                   <li><i class="v3"></i><input type="text" name="city" class="ipt" placeholder="购票人城市"></li>
               </ul>
			   <input type="button"  onclick="pay()" value="支付{{$price}}元立即抢票" class="submit-btn">
                <p class="tips">请完善以上信息后完成抢票</p>
            </div>
        </form></div>
		
        <div class="traffic-sel">
            <img src="{{asset('/')}}index/ticket/traffice_01.jpg" class="w100">
            <img src="{{asset('/')}}index/ticket/traffice_02.jpg" class="w100">
        </div>
    </div>
</div>
<script src="{{asset('/')}}index/ticket/jquery.min.js"></script>
<script src="{{asset('/')}}index/ticket/leftTime.min.js"></script>
<script src="{{asset('/')}}index/ticket/swiper.min.js"></script>

<script>
   function GetRTime(){
       var EndTime= new Date('2018/06/23 00:00:00');
       var EndTime1=new Date('2018/06/11 00:00:00');
       var EndTime2=new Date('2018/06/23 00:00:00');
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
          $(".yleft").html("20元抢票");
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
       if(t<0){
          document.getElementById("t_d").innerHTML = 0 + "";
          document.getElementById("t_h").innerHTML = 0 + "";
          document.getElementById("t_m").innerHTML = 0 + "";
          document.getElementById("t_s").innerHTML = 0 + "";
           document.getElementById("v_d").innerHTML = 0 + "";
       document.getElementById("v_h").innerHTML = 0 + "";
       document.getElementById("v_m").innerHTML =0+ "";
       document.getElementById("v_s").innerHTML =0+ "";
       }else{
          document.getElementById("t_d").innerHTML = d + "";
          document.getElementById("t_h").innerHTML = h + "";
          document.getElementById("t_m").innerHTML = m + "";
          document.getElementById("t_s").innerHTML = s + "";
           document.getElementById("v_d").innerHTML = days + "";
       document.getElementById("v_h").innerHTML = hours + "";
       document.getElementById("v_m").innerHTML = minutes + "";
       document.getElementById("v_s").innerHTML = seconds + "";
       }
       
	  
   }
   setInterval(GetRTime,0);
</script>
<script>
  swal({ 
      title: "温馨提示：本门票一次购买，即可在武汉改装车展【6.23-6.25】三天全场通用！", 
      text: "2秒后自动关闭。", 
      timer:4000, 
      showConfirmButton: false 
    });
    var swiper = new Swiper('.swiper-container', {
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
</script>
<script type="text/javascript">
  function pay(){
    var username=$('input[name="username"]').val();
  var phone=$('input[name="phone"]').val();
  var city=$('input[name="city"]').val();
  var openid=$('input[name="openid"]').val();
  var ordersn=$('input[name="ordersn"]').val();
  var price=$('input[name="price"]').val();
  if (phone!=''&&city!=''&&username!=''){
    if(openid!=''&&ordersn!=''&&price!=''){
        $.ajax({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        },
          url: '/ticket/infosubmit',
          type: "POST",
          data: {'username':username,'phone':phone,'city':city,'ordersn':ordersn,'openid':openid,'price':price},

          success: function (data) {
            if(data.code==200){
              //alert("请支付");
              WXPayment();
            }else{
              swal(
                data.status,
                data.msg,
                "error"
              );
            }
            
            },
            error:function(res){
              //alert('系统错误，请刷新页面重试');
              swal(
                "提交订单失败",
                "系统错误，请稍候再试",
                "error"
              );
            }
        });
      }else{
        //alert("系统异常");
        swal(
            "提交订单失败",
            "系统异常，请稍候再试",
            "error"
          );
      }
    }else{
      //alert('信息填写不完整，请补充')
      swal(
            "提交订单失败",
            "信息填写不完整，请补充",
            "error"
          );
    }
  }
  
  
  var WXPayment = function() {
    if( typeof WeixinJSBridge === 'undefined' ) {
        alert('请在微信在打开页面！');
        return false;
    }
    WeixinJSBridge.invoke(
        'getBrandWCPayRequest', <?php echo $payment->getConfig(); ?>, function(res) {
            switch(res.err_msg) {
                case 'get_brand_wcpay_request:cancel':
                    //alert('用户取消支付！');
                    swal(
                    "失败",
                    "您已取消支付",
                    "error"
                    );
                    break;
                case 'get_brand_wcpay_request:fail':
                   // alert('支付失败！（'+res.err_desc+'）');
                    swal(
                    "支付失败",
                    res.err_desc,
                    "error"
                    );
                    break;
                case 'get_brand_wcpay_request:ok':
                    //alert('支付成功！');
                    swal('支付成功','2秒钟后自动跳转至购票结果页',"success");
                    setTimeout(function(){window.location.href='/ticket/success';},2000);
                    break;
                default:
                    alert(JSON.stringify(res));
                    swal(
                    "未知错误导致支付失败",
                    JSON.stringify(res),
                    "error"
                    );
                    break;
            }
        }
    );
}
</script>
<script>
  var curpage = 1;
  var sliding = false;
  var click = true;
  var left = document.getElementById('left');
  var right = document.getElementById('right');
  var pagePrefix = 'slide';
  var pageShift = 500;
  var transitionPrefix = 'circle';
  var svg = true;

  function leftSlide() {
    if (click) {
      if (curpage == 1) curpage = 5;
        console.log('woek');
        sliding = true;
        curpage--;
        svg = true;
        click = false;
        for(k=1;k<=4;k++){
          var a1 = document.getElementById(pagePrefix + k);
          a1.className += ' tran';
        }
        setTimeout(()=>{
          move();
        },200);
        setTimeout(()=>{
          for(k=1;k<=4;k++){
            var a1 = document.getElementById(pagePrefix + k);
            a1.classList.remove('tran');
          };
        },1400);
      }
  }
setInterval(function(){
     rightSlide();
    },5000);

   function rightSlide() {
    if (click) {
      if (curpage == 4) curpage = 0;
      console.log('woek');
      sliding = true;
      curpage++;
      svg = false;
      click = false;
      for(k=1;k<=4;k++){
        var a1 = document.getElementById(pagePrefix + k);
        a1.className += ' tran';
      }
      setTimeout(()=>{
        move();
      },200);
      setTimeout(()=>{
        for(k=1;k<=4;k++){
          var a1 = document.getElementById(pagePrefix + k);
          a1.classList.remove('tran');
        };
      },1400);
    }
  }


  function move() {
    if (sliding) {
      sliding = false;
      if (svg) {
        for (j = 1; j <= 9; j++) {
          var c = document.getElementById(transitionPrefix + j);
          c.classList.remove("steap");
          c.setAttribute("class", (transitionPrefix + j) + " streak")
          console.log('streak');
        }
      } else {
        for (j = 10; j <= 18; j++) {
          var c = document.getElementById(transitionPrefix + j);
          c.classList.remove("steap");
          c.setAttribute("class", (transitionPrefix + j) + " streak")
          console.log('streak');
        }
      }

      // for(k=1;k<=4;k++){
      //   var a1 = document.getElementById(pagePrefix + k);
      //   a1.className += ' tran';
      // }

      setTimeout(() => {
        for (i = 1; i <= 4; i++) {
          if (i == curpage) {
            var a = document.getElementById(pagePrefix + i);
            a.className += ' up1';
          } else {
            var b = document.getElementById(pagePrefix + i);
            b.classList.remove("up1");
          }
        };
        sliding = true;
      }, 600);
      setTimeout(() => {
        click = true;
      }, 1700);



      setTimeout(() => {
        if (svg) {
          for (j = 1; j <= 9; j++) {
            var c = document.getElementById(transitionPrefix + j);
            c.classList.remove("streak");
            c.setAttribute("class", (transitionPrefix + j) + " steap");
          }
        } else {
          for (j = 10; j <= 18; j++) {
            var c = document.getElementById(transitionPrefix + j);
            c.classList.remove("streak");
            c.setAttribute("class", (transitionPrefix + j) + " steap");
          }
          sliding = true;
        }
      }, 850);
      setTimeout(() => {
        click = true;
      }, 1700);
    }

  }

  left.onmousedown=()=>{
    leftSlide();
  }

  right.onmousedown=()=>{
    rightSlide();
  }

  document.onkeydown=(e)=>{
    if(e.keyCode==37){
      leftSlide();

    }
    else if (e.keyCode==39) {
      rightSlide();

    }
  }

  //for codepen header
  setTimeout(()=>{
          rightSlide();

  },500)

</script>
</body></html>