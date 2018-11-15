<!DOCTYPE html>
<!-- saved from url=(0060)http://www.17sucai.com/preview/10221/2017-03-14/show/me.html -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	
	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>个人中心</title>
	<link rel="stylesheet" type="text/css" href="{{asset('/')}}index/vote/ui.css">
	<link href="http://www.17sucai.com/preview/10221/2017-03-14/show/favicon.ico" type="image/x-icon" rel="icon">
	<link href="http://www.17sucai.com/preview/10221/2017-03-14/show/iTunesArtwork@2x.png" sizes="114x114" rel="apple-touch-icon-precomposed">
</head>
<body class="android">
<div style="
    width: 100%;
    height: 2000px;
    position: absolute;
    top: 0px;
    color: white;
    z-index: 3;
    text-align: center;
    background-color: rgba(0, 0, 0, 0.9);
    padding-top: 200px;">
<embed src="{{asset('/')}}index/vote/rect.svg" width="300" height="100" 
type="image/svg+xml"
pluginspage="http://www.adobe.com/svg/viewer/install/" />
<p>页面建设中</p>
</div>
<div class="scroll-content">
	<div class="">
		<div class="header home-header" style="" id="headsearch">
			<div class="toolbar statusbar-padding active">
				<button class="bar-button current-city"><i class="icon icon-set" style="left:0;right: inherit"></i></button>

				<button class="bar-button icon-button"><i class="icon icon-msg"></i></button>
			</div>
		</div>
		<div class="my-info">
			<div class="my-info-background"></div>
			<img class="my-avatar" src="{{Session::get('user')['headimgurl']}}">
			<span class="name"><a href="http://www.17sucai.com/preview/10221/2017-03-14/show/login.html" style="color:#fff">{{Session::get('user')['nickname']}}</a></span>
			<span class="my-vip" style="background:none">超级会员&nbsp;&nbsp;&nbsp;&nbsp;积分:5190&nbsp;&nbsp;</span>
		</div>
		<div class="my-car-shortcut">
			<div class="layout-column b-line" style="padding:10px 0">
				<a class="col" rel="test" href="http://www.17sucai.com/preview/10221/2017-03-14/show/wait.html">
							<span class="img-icon ">
								<img class="img-icon-home" src="{{asset('/')}}index/vote/me-1.png">
							</span>
					<span class="img-icon-name">待付款</span>
				</a>
				<a class="col" rel="test" href="http://www.17sucai.com/preview/10221/2017-03-14/show/wait.html">
							<span class="img-icon ">
								<img class="img-icon-home" src="{{asset('/')}}index/vote/me-2.png">
							</span>
					<span class="img-icon-name">待收货</span>
				</a>
				<a class="col" href="http://www.17sucai.com/preview/10221/2017-03-14/show/wait.html" rel="test">
							<span class="img-icon ">
								<img class="img-icon-home" src="{{asset('/')}}index/vote/me-3.png">
							</span>
					<span class="img-icon-name">全部订单</span>
				</a>
			</div>
		</div>
		<div class="devider b-line"></div>
		<!-- 个人中心 begin-->
		<div>
			<div class="aui-list-cells">
				<a href="http://www.17sucai.com/preview/10221/2017-03-14/show/wallet.html" class="aui-list-cell">
					<div class="aui-list-cell-fl"><img src="{{asset('/')}}index/vote/me-4.png"></div>
					<div class="aui-list-cell-cn">我的钱包</div>
					<div class="aui-list-cell-fr">3999</div>
				</a>
				<a href="http://www.17sucai.com/preview/10221/2017-03-14/show/collect.html" class="aui-list-cell">
					<div class="aui-list-cell-fl"><img src="{{asset('/')}}index/vote/me-13.png"></div>
					<div class="aui-list-cell-cn">我的收藏</div>
					<div class="aui-list-cell-fr"></div>
				</a>
				<a href="http://www.17sucai.com/preview/10221/2017-03-14/show/adds.html" class="aui-list-cell">
					<div class="aui-list-cell-fl"><img src="{{asset('/')}}index/vote/me-6.png"></div>
					<div class="aui-list-cell-cn">地址管理</div>
					<div class="aui-list-cell-fr"></div>
				</a>
				<a href="http://www.17sucai.com/preview/10221/2017-03-14/show/footprint.html" class="aui-list-cell">
					<div class="aui-list-cell-fl"><img src="{{asset('/')}}index/vote/me-5.png"></div>
					<div class="aui-list-cell-cn">我的足迹</div>
					<div class="aui-list-cell-fr">8450</div>
				</a>
				<div class="devider b-line"></div>
				<a href="http://www.17sucai.com/preview/10221/2017-03-14/show/bank.html" class="aui-list-cell">
					<div class="aui-list-cell-fl"><img src="{{asset('/')}}index/vote/me-7.png"></div>
					<div class="aui-list-cell-cn">我的银行</div>
					<div class="aui-list-cell-fr"></div>
				</a>
				<a href="http://www.17sucai.com/preview/10221/2017-03-14/show/evaluate.html" class="aui-list-cell">
					<div class="aui-list-cell-fl"><img src="{{asset('/')}}index/vote/me-9.png"></div>
					<div class="aui-list-cell-cn">我的评价</div>
					<div class="aui-list-cell-fr"></div>
				</a>
				<div class="devider b-line"></div>
				<a href="http://www.17sucai.com/preview/10221/2017-03-14/show/login.html" class="aui-list-cell">
					<div class="aui-list-cell-fl"><img src="{{asset('/')}}index/vote/me-11.png"></div>
					<div class="aui-list-cell-cn">退出账号</div>
					<div class="aui-list-cell-fr"></div>
				</a>
			</div>
		</div>


	</div>
</div>
 @include('layout.app')
<script type="text/javascript" src="{{asset('/')}}index/vote/jquery-1.7.1.min.js"></script>
<script class="demo-script">
	$(window).scroll(function () {
		if ($(window).scrollTop() > 100) {
			$("#headsearch").addClass("ui-form-color-nav");
		}else if($(window).scrollTop() == 0){
			$("#headsearch").removeClass("ui-form-color-nav");
		}
	});
	(function (){
		var slider = new fz.Scroll('.ui-slider', {
			role: 'slider',
			indicator: true,
			autoplay: true,
			interval: 5000
		});

		slider.on('beforeScrollStart', function(fromIndex, toIndex) {
			console.log(fromIndex,toIndex)
		});

		slider.on('scrollEnd', function(cruPage) {
			console.log(cruPage)
		});
	})();
</script>

</body></html>