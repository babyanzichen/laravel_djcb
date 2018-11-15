<!DOCTYPE html>
<!-- saved from url=(0062)http://www.17sucai.com/preview/10221/2017-03-14/show/life.html -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	
	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>资讯列表</title>
	<link rel="stylesheet" type="text/css" href="{{asset('/')}}index/vote/ui.css">
	<link href="http://www.17sucai.com/preview/10221/2017-03-14/show/favicon.ico" type="image/x-icon" rel="icon">
	<link href="http://www.17sucai.com/preview/10221/2017-03-14/show/iTunesArtwork@2x.png" sizes="114x114" rel="apple-touch-icon-precomposed">
</head>
<body>
<style>  
.spinner {
    background-color: #dee0d9;
    margin: 0px auto 0;
    padding-top: 200px;
    width: 100%;
    text-align: center;
    z-index: 1000;
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
					<div class="title">资讯列表</div>
				</div>
			</div>
		</div>
		<div style="height:44px"></div>
		<!-- 头部 End-->

		<!-- 内容 -->
		<div class="aui-content-text">
			 @foreach ($news as $new)
			 <a href="{{ asset('/vote/articledetail') }}/{{$new->id}}">
			<div class="aui-content-title">
				<h2>{{$new->title}}</h2>
			</div>
			<div class="my-car-thumbnail my-car-thumbnail-l"><img src="{{$new->icon}}"></div>
			<div class="aui-content-p">
				<p>{{$new->desc}}</p>
			</div>
			<div class="aui-coll-s b-line">
				<div class="aui-coll-l"><i class="aui-icon-zan"></i>点赞</div>
				<div class="aui-coll-f"><i class="aui-icon-shi"></i>分享</div>
			</div>
			<div class="devider b-line"></div>
		</a>
			@endforeach
		</div>

		

		 @include('layout.app')
	</div>
</div>


<script type="text/javascript" src="{{asset('/')}}index/vote/jquery-1.9.1.min.js"></script>

<script type="text/javascript">
window.onload=function(){
	var t=setTimeout("$('.spinner').remove()",3000)
}
</script>
</body></html>