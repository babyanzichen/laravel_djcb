<!DOCTYPE html>
<html data-dpr="1" style="font-size: 55.2px;"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		
	    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
	    <title>{{$news->title}}</title>
	    <link rel="stylesheet" type="text/css" href="{{asset('/')}}index/vote/ui.css">
	    <link href="{{asset('/')}}index/vote/mui.min.css" rel="stylesheet" type="text/css">
	    <link rel="stylesheet" href="{{asset('/')}}index/vote/dstyle.css" type="text/css">
	    <script type="text/javascript" src="https://res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
	</head>
	<body class="mui-ios mui-ios-9 mui-ios-9-1" style="">
		<style>  
.spinner {
    background-color: #dee0d9;
    margin: 0px auto 0;
    padding-top: 200px;
    width: 100%;
    text-align: center;
    z-index: 1001;
    position: absolute;
    height: 1000px;
}
 
.spinner > div {
  width: 30px;
  height: 30px;
  background-color: #67CF22;
 
  border-radius: 100%;
  display: inline-block;
  -webkit-animation: bouncedelay 1.4s infinite ease-in-out;
  animation: bouncedelay 1.4s infinite ease-in-out;
  /* Prevent first frame from flickering when animation starts */
  -webkit-animation-fill-mode: both;
  animation-fill-mode: both;
}
 
.spinner .bounce1 {
  -webkit-animation-delay: -0.32s;
  animation-delay: -0.32s;
}
 
.spinner .bounce2 {
  -webkit-animation-delay: -0.16s;
  animation-delay: -0.16s;
}
 
@-webkit-keyframes bouncedelay {
  0%, 80%, 100% { -webkit-transform: scale(0.0) }
  40% { -webkit-transform: scale(1.0) }
}
 
@keyframes bouncedelay {
  0%, 80%, 100% {
    transform: scale(0.0);
    -webkit-transform: scale(0.0);
  } 40% {
    transform: scale(1.0);
    -webkit-transform: scale(1.0);
  }
}
</style>
<div class="spinner">
  <div class="bounce1"></div>
  <div class="bounce2"></div>
  <div class="bounce3"></div>
  <h3 class="tips">您好，{{Session::get('user')["nickname"]}},</h3>
  <h2>页面数据努力加载中，请稍候......</h2>
  <h6>访客ip:{{$ip}}</h6>
  <h6>网络运营商:{{$addr}}</h6>
</div>

<div class="aui-container">
	<div class="aui-page">
		<!-- 头部 begin-->
		<div class="header">
			<div class="header-background"></div>
			<div class="toolbar statusbar-padding">
				<button class="bar-button back-button" onclick="history.go(-1);" dwz-event-on-click="click"><i class="icon icon-back"></i></button>
				<!--<a class="bar-button" data-href="home.html?dwz_callback=home_render" target="navTab" rel="home"><i class="icon icon-back"></i></a>-->
				<div class="header-title">
					<div class="title">资讯详情</div>
				</div>
			</div>
		</div>
		<div style="height:44px"></div>
		<div class="mui-content article ">
			<h2 class="article-title">{{$news->title}}</h2>
			<div class="article-text">
				文章来源：<a href="http://www.17sucai.com/preview/155563/2017-05-24/%E5%B0%8F%E7%A8%8B%E5%BA%8F/evadatail.html">{{$news->author}}</a>
				<label class="time">{{$news->timer}}</label>
				<label class="view">{{$news->num}}</label>
			</div>
			<!--
			<div class="evaluating">
				<div class="evaluating-top">
					<span class="logo fl">
						<img src="{{asset('/')}}index/vote/jx3.jpg">
					</span>
					<div class="right fr">
						<span class="score">8.5<small>分</small></span>
						<a href="http://www.17sucai.com/preview/155563/2017-05-24/%E5%B0%8F%E7%A8%8B%E5%BA%8F/storedetail.html" class="btn">查看详情</a>
					</div>
					<div class="middle">
						<h2>感恩笔记本</h2>
						<p>感恩笔记本-用感恩的心看世界，记录生命给予的</p>
					</div>
				</div>
				<div class="evaluating-bot">
					<img src="{{asset('/')}}index/vote/ewm.jpg">
					<p>保存二维码，前往微信扫一扫，体验小程序</p>
				</div>
			</div>
		-->
			<div class="mui-content-padded">
				{!!$news->info!!}
			</div>
		</div>
		<!--广告位-->
		<div class="guanggao">
			<h2>
				<span>广告</span>
				<i></i>
			</h2>
			<a href="https://www.djzx88.cn/dianjin/index/app"><img src="http://www.djcb123.cn/home/img/banner2.jpg"></a>
		</div>
		 @include('layout.app')
		<script type="text/javascript" src="{{asset('/')}}index/vote/jquery-1.10.1.min.js"></script>
		<script type="text/javascript" src="{{asset('/')}}index/vote/mui.min.js"></script>
	    <script type="text/javascript" src="{{asset('/')}}index/vote/app.js"></script>
	
<script type="text/javascript">
window.onload=function(){
	var t=setTimeout("$('.spinner').remove()",3000)
}
</script>
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
     title: '{{$news->title}}', // 分享标题
      desc: '{{$news->desc}}', // 分享描述
      link: 'http://www.djcb123.cn/vote/articledetail/{{$news->id}}', // 分享链接
      imgUrl: '{{$news->icon}}', // 分享图标
      type: '', // 分享类型,music、video或link，不填默认为link
      dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
      success: function () {
      
      },
      cancel: function () {
         alert("分享失败");
      }
  });

  wx.onMenuShareTimeline({
      title: '{{$news->title}}', // 分享标题
      desc: '{{$news->desc}}', // 分享描述
      link: 'http://www.djcb123.cn/vote/articledetail/{{$news->id}}', // 分享链接
      imgUrl: '{{$news->icon}}', // 分享图标分享图标
      success: function () {
          
          
          
          
          
          
          
      },
      cancel: function () {
         alert("分享失败");
      }
  });

  });
</script>
</body></html>