<!DOCTYPE html>
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	
	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>财富金字塔颁奖盛典</title>
	<link rel="stylesheet" type="text/css" href="{{asset('/')}}index/vote/ui.css">
	<script type="text/javascript" src="https://res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
</head>
<body>
<style>  
.spinner {
    background-color: rgba(0, 0, 0, 0.9);
    margin: 0px auto 0;
    padding-top: 200px;
    width: 100%;
    color:white;
    text-align: center;
    z-index: 1000;
    position: absolute;
    height: 1000px;
    top:0px;
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
			<div class="aui-header-bg" style="background:#ff5a5f;"></div>
			<div class="toolbar statusbar-padding" style="min-height:50px">
				<button class="bar-button back-button"><i class="icon icon-sao"></i></button>
				<div class="header-title" style="height:50px; padding:0 50px">
					<div class="title aui-title-input"><input type="text" placeholder="财富金字塔"></div>
				</div>
				<a href="{{ asset('/vote/my') }}">
					<button class="icon aui-icon-mag"></button>
				</a>
			</div>
		</div>
		<div style="height:50px"></div>
		<!-- 头部 End-->
		<!-- 首页轮播 begin -->
		<div class="aui-banner-content">
			<div id="focus" class="focus">
				<div class="bd">
					<div class="tempWrap" style="overflow:hidden; position:relative;">
						<div class="tempWrap" style="overflow:hidden; position:relative;"><ul id="Gallery" class="gallery" style="width: 2484px; position: relative; overflow: hidden; padding: 0px; margin: 0px; transition-duration: 0ms; transform: translate(-414px, 0px) translateZ(0px);">
							<li style="display: table-cell; vertical-align: top; width: 414px;">
								<a href="{{ asset('/vote/my') }}"><img src="{{asset('/')}}home/img/banner1.jpg"></a>
							</li><li style="display: table-cell; vertical-align: top; width: 414px;">
								<a href="http://www.17sucai.com/preview/10221/2017-03-14/show/index.html#"><img src="{{asset('/')}}home/img/banner2.jpg"></a>
							</li>
							<li style="display: table-cell; vertical-align: top; width: 414px;">
								<a href="http://www.17sucai.com/preview/10221/2017-03-14/show/index.html#"><img src="{{asset('/')}}home/img/banner3.jpg"></a>
							</li>
							
						</ul></div>
					</div>
				</div>
				<div class="hd">
					<ul><li class="on">1</li><li class="">2</li><li class="">3</li></ul>
				</div>
			</div>
		</div>
		<!-- 首页轮播 end -->
		<!-- 分类切换 begin -->
		<div class="" id="container" style="top: 50px;">
			<div id="main" style="transition-timing-function: cubic-bezier(0.1, 0.57, 0.1, 1); transition-duration: 0ms; transform: translate(0px, 0px) translateZ(0px);">
				<div id="scroller">
					<section class="slider" style="margin:0  auto; width:100%">
						<div class="swiper-container swiper-container2 swiper-container-horizontal">
							<div class="swiper-wrapper tuangouwidth" style="transition-duration: 0ms; transform: translate3d( 0px, 0px);">
								<div class="swiper-slide swiper-slide-duplicate swiper-slide-active" style="width: 414px;">
									<ul class="icon-list">
										<li class="icon">
											<a href="{{ asset('/vote/positive') }}">
												<span class="icon-circle"><img src="{{asset('/')}}index/vote/zan.png"></span>
												<span class="icon-desc">为他拉票</span>
											</a>
										</li>
										
										<li class="icon">
											<a href="#">
												<span class="icon-circle"><img src="{{asset('/')}}index/vote/icon-tuan2.png"></span>
												<span class="icon-desc">人气排名</span>
											</a>
										</li>
										
										<li class="icon">
											<a href="#">
												<span class="icon-circle"><img src="{{asset('/')}}index/vote/icon-tuan4.png"></span>
												<span class="icon-desc">投票人数</span>
											</a>
										</li>
										<li class="icon">
											<a href="#">
												<span class="icon-circle"><img src="{{asset('/')}}index/vote/live.png"></span>
												<span class="icon-desc">图文直播</span>
											</a>
										</li>
										
										<li class="icon">
											<a href="{{ asset('/vote/lists') }}">
												<span class="icon-circle"><img src="{{asset('/')}}index/vote/icon-tuan7.png"></span>
												<span class="icon-desc">最新报名</span>
											</a>
										</li>
									</ul>
								</div>
								
							</div>
							
						</div>
					</section>
				</div>
			</div>
		</div>
		<!-- 分类切换 end -->
		<div class="devider t-line"></div>
		<div class="b-line" style="position:relative"></div>
		<div class="b-line">
			<a class="home-inform aui-home-inform" data-href="home-slogan.html" target="navView" rel="slogan">
				<i class="name icon-inform"></i>
				<span style="font-size:14px; padding-left:5px">2017第六届财富金字塔11.18即将盛大举行</span>
			</a>
		</div>
		<div class="my-car-thumbnail"><img src="{{asset('/')}}index/vote/paramid.png"></div>
	
		<div class="aui-title-h">
			<h2>人气前三</h2>
		</div>
		<div class="aui-flex">
			<div class="aui-flex-item aui-flex-items">
		<span>
			<a href="http://www.17sucai.com/preview/10221/2017-03-14/show/page.html"><img src="{{asset('/')}}index/vote/b1.jpg"></a>
		</span>
				<a href="http://www.17sucai.com/preview/10221/2017-03-14/show/index.html#" class="aui-flex-box">保千里</a>
			</div>
			<div class="aui-flex-item aui-flex-items">
		<span>
			<a href="http://www.17sucai.com/preview/10221/2017-03-14/show/page.html"><img src="{{asset('/')}}index/vote/b2.jpg"></a>
		</span>
				<a href="http://www.17sucai.com/preview/10221/2017-03-14/show/index.html#" class="aui-flex-box">路畅</a>

			</div>
			<div class="aui-flex-item aui-flex-items">
		<span>
			<a href="http://www.17sucai.com/preview/10221/2017-03-14/show/page.html"><img src="{{asset('/')}}index/vote/b3.jpg"></a>
		</span>
				<a href="http://www.17sucai.com/preview/10221/2017-03-14/show/index.html#" class="aui-flex-box">道可视</a>
			</div>
		</div>
		<div class="aui-title-h">
			<h2>潜力大牌</h2>
		</div>
		<div class="aui-flex">
			<div class="aui-flex-item aui-flex-items1">
		<span>
			<img src="{{asset('/')}}index/vote/xiao1.jpg">
		</span>
			</div>
			<div class="aui-flex-item aui-flex-items1">
		<span>
			<img src="{{asset('/')}}index/vote/xiao2.jpg">
		</span>

			</div>
			<div class="aui-flex-item aui-flex-items1">
		<span>
			<img src="{{asset('/')}}index/vote/xiao3.jpg">
		</span>

			</div>
			<div class="aui-flex-item aui-flex-items1">
		<span>
			<img src="{{asset('/')}}index/vote/xiao34.jpg">
		</span>

			</div>
		</div>
		<div class="aui-title-h">
			<h2>特别提名</h2>
		</div>
		<div class="aui-flex">
			<div class="aui-flex-item aui-flex-items1 aui-flex-items2">
				<span>
					<img src="{{asset('/')}}index/vote/b4.jpg">
				</span>
				<a href="http://www.17sucai.com/preview/10221/2017-03-14/show/index.html#" class="aui-flex-box">
					<h2>保千里</h2>
				</a>
				<div class="votes">
					<div class="nums">99票</div>
					<img src="{{asset('/')}}index/vote/vtn.png">
				</div>
			</div>

			<div class="aui-flex-item aui-flex-items1 aui-flex-items2">
				<span>
					<img src="{{asset('/')}}index/vote/b4.jpg">
				</span>
				<a href="http://www.17sucai.com/preview/10221/2017-03-14/show/index.html#" class="aui-flex-box">
					<h2>保千里</h2>
				</a>
				<div class="votes">
					<div class="nums">99票</div>
					<img src="{{asset('/')}}index/vote/vtn.png">
				</div>
			</div>

		</div>
	
		 @include('layout.app')
	</div>
</div>


<script type="text/javascript" src="{{asset('/')}}index/vote/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="{{asset('/')}}index/vote/aui-touchSlide.js"></script>
<script type="text/javascript">
window.onload=function(){
	var t=setTimeout("$('.spinner').remove()",3000)
}

</script>
<script>
	/*banner首页轮播*/
	TouchSlide({
		slideCell : "#focus",
		titCell : ".hd ul", // 开启自动分页 autoPage:true ，此时设置 titCell 为导航元素包裹层
		mainCell : ".bd ul",
		effect : "leftLoop",
		autoPlay : true, // 自动播放
		autoPage : true, // 自动分页
		delayTime: 200, // 毫秒；切换效果持续时间（执行一次效果用多少毫秒）
		interTime: 5000, // 毫秒；自动运行间隔（隔多少毫秒后执行下一个效果）
		switchLoad : "_src" // 切换加载，真实图片路径为"_src"
	});
</script>
<script src="{{asset('/')}}index/vote/aui-scroll.js" type="text/javascript" charset="utf-8"></script>
<script src="{{asset('/')}}index/vote/aui-index.js" type="text/javascript" charset="utf-8"></script>
<script src="{{asset('/')}}index/vote/aui-swipe.js" type="text/javascript" charset="utf-8"></script>
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
     title: '点金传媒邀请您关注2017汽车服务行业财富金字塔颁奖盛典', // 分享标题
      desc: '财富金字塔颁奖盛典——2017汽车服务行业年度盛会荣耀开启', // 分享描述
      link: 'http://www.djcb123.cn/vote', // 分享链接
      imgUrl: 'http://www.djcb123.cn/index/vote/paramid.jpg', // 分享图标
      type: '', // 分享类型,music、video或link，不填默认为link
      dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
      success: function () {
      
      },
      cancel: function () {
         alert("分享失败");
      }
  });

  wx.onMenuShareTimeline({
      title: '点金传媒邀请您关注2017汽车服务行业财富金字塔颁奖盛典', // 分享标题
      desc: '财富金字塔颁奖盛典——2017汽车服务行业年度盛会荣耀开启', // 分享描述
      link: 'http://www.djcb123.cn/vote', // 分享链接
      imgUrl: 'http://www.djcb123.cn/index/vote/paramid.jpg', // 分享图标
      success: function () {
          
          
          
          
          
          
          
      },
      cancel: function () {
         alert("分享失败");
      }
  });

  });
</script>

</body></html>