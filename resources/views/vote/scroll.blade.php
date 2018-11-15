<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>投票</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
		<link rel="stylesheet" href="{{asset('/')}}index/vote/swiper-3.4.0.min.css">
		<link href="{{asset('/')}}index/vote/sweet-alert.css" rel="stylesheet" type="text/css">
		<link href="{{asset('/')}}index/vote/styles.css" rel="stylesheet" type="text/css">
</head>

	<body>
		<div class="header">
			<span><a  class="selected">战队1</a></span>
			<span><a >战队2</a></span>
			<span><a >战队3</a></span>
			<span><a >战队4</a></span>
		</div>
		<!--战队1-->
		<div class="swiper-container swiper-container-horizontal swiper-container-3d swiper-container-coverflow" id="page1">
			<div class="swiper-wrapper" id="list" style="transform: translate3d(-1054.5px, 0px, 0px); transition-duration: 0ms;"><div class="swiper-slide swiper-slide-duplicate" style="background-image: url({{asset('/')}}index/vote/v1.png); height: 1354.15px; transform: translate3d(-219.606px, 0px, -1397.49px) rotateX(0deg) rotateY(0deg); z-index: -3; transition-duration: 0ms;" data-swiper-slide-index="0">
					
					<div class="ok">
						<img src="{{asset('/')}}index/vote/ok.png" alt="">
					</div>
					<div class="renwu">
						<img src="{{asset('/')}}index/vote/ren1.png" alt="">
					</div>
					<div class="num">
						<span class="num-name">选号：</span>
						<span class="num-xuhao">001</span>
					</div>
					<div class="num">
						<span class="num-name">选号：</span>
						<span class="num-xuhao">001</span>
					</div>
					<div class="title">
						<span class="titlt-l">球队：</span>
						<span class="titlt-r">球队名称球队名称</span>
					</div>
					<div class="detail" data-source="{{asset('/')}}index/vote/1.mp4">
						<img src="{{asset('/')}}index/vote/detail1.png" alt="">
					</div>
					<div class="toupiao" onclick="swal(&#39;投票成功!&#39;, &#39;非常感谢,么么哒！&#39;, &#39;success&#39;)">
						<img src="{{asset('/')}}index/vote/vote1.png" alt="">
					</div>
				</div><div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-prev" style="background-image: url({{asset('/')}}index/vote/v1.png); height: 1354.15px; transform: translate3d(-165.297px, 0px, -1051.89px) rotateX(0deg) rotateY(0deg); z-index: -2; transition-duration: 0ms;" data-swiper-slide-index="1">
					<div class="renwu">
						<img src="{{asset('/')}}index/vote/ren2.jpg" alt="">
					</div>
					<div class="num">
						<span class="num-name">选号：</span>
						<span class="num-xuhao">001</span>
					</div>
					<div class="num">
						<span class="num-name">选号：</span>
						<span class="num-xuhao">001</span>
					</div>
					<div class="title">
						<span class="titlt-l">球队：</span>
						<span class="titlt-r">球队名称球队名称</span>
					</div>
					<div class="detail" data-source="mv/1.mp4">
						<img src="{{asset('/')}}index/vote/detail1.png" alt="">
					</div>
					<!--<div class="toupiao" onClick="swal('投票成功!', '非常感谢,么么哒！', 'success')">
						<img src="images/vote1.png" alt="">
					</div>-->
					<div class="toupiao" onclick="swal(&#39;您已经投票!&#39;, &#39;非常感谢,么么哒！&#39;, &#39;success&#39;)">
						<img src="{{asset('/')}}index/vote/yitou.png" alt="">
					</div>
				</div>
				<!--1-->
				<div class="swiper-slide swiper-slide-duplicate-active" style="background-image: url({{asset('/')}}index/vote/v1.png); height: 1354.15px; transform: translate3d(-109.803px, 0px, -698.746px) rotateX(0deg) rotateY(0deg); z-index: -1; transition-duration: 0ms;" data-swiper-slide-index="0">
					
					<div class="ok">
						<img src="{{asset('/')}}index/vote/ok.png" alt="">
					</div>
					<div class="renwu">
						<img src="{{asset('/')}}index/vote/ren1.png" alt="">
					</div>
					<div class="num">
						<span class="num-name">选号：</span>
						<span class="num-xuhao">001</span>
					</div>
					<div class="num">
						<span class="num-name">选号：</span>
						<span class="num-xuhao">001</span>
					</div>
					<div class="title">
						<span class="titlt-l">球队：</span>
						<span class="titlt-r">球队名称球队名称</span>
					</div>
					<div class="detail" data-source="mv/1.mp4">
						<img src="{{asset('/')}}index/vote/detail1.png" alt="">
					</div>
					<div class="toupiao" onclick="swal(&#39;投票成功!&#39;, &#39;非常感谢,么么哒！&#39;, &#39;success&#39;)">
						<img src="{{asset('/')}}index/vote/vote1.png" alt="">
					</div>
				</div>
				<!--2-->
				<div class="swiper-slide swiper-slide-prev swiper-slide-duplicate-next" style="background-image: url({{asset('/')}}index/vote/v1.png); height: 1354.15px; transform: translate3d(-55.0989px, 0px, -350.629px) rotateX(0deg) rotateY(0deg); z-index: 0; transition-duration: 0ms;" data-swiper-slide-index="1">
					<div class="renwu">
						<img src="{{asset('/')}}index/vote/ren2.jpg" alt="">
					</div>
					<div class="num">
						<span class="num-name">选号：</span>
						<span class="num-xuhao">001</span>
					</div>
					<div class="num">
						<span class="num-name">选号：</span>
						<span class="num-xuhao">001</span>
					</div>
					<div class="title">
						<span class="titlt-l">球队：</span>
						<span class="titlt-r">球队名称球队名称</span>
					</div>
					<div class="detail" data-source="mv/1.mp4">
						<img src="{{asset('/')}}index/vote/detail1.png" alt="">
					</div>
					<!--<div class="toupiao" onClick="swal('投票成功!', '非常感谢,么么哒！', 'success')">
						<img src="images/vote1.png" alt="">
					</div>-->
					<div class="toupiao" onclick="swal(&#39;您已经投票!&#39;, &#39;非常感谢,么么哒！&#39;, &#39;success&#39;)">
						<img src="{{asset('/')}}index/vote/yitou.png" alt="">
					</div>
				</div>
				
			<div class="swiper-slide swiper-slide-duplicate swiper-slide-active" style="background-image: url({{asset('/')}}index/vote/v1.png); height: 1354.15px; transform: translate3d(0px, 0px, 0px) rotateX(0deg) rotateY(0deg); z-index: 1; transition-duration: 0ms;" data-swiper-slide-index="0">
					
					<div class="ok">
						<img src="{{asset('/')}}index/vote/ok.png" alt="">
					</div>
					<div class="renwu">
						<img src="{{asset('/')}}index/vote/ren1.png" alt="">
					</div>
					<div class="num">
						<span class="num-name">选号：</span>
						<span class="num-xuhao">001</span>
					</div>
					<div class="num">
						<span class="num-name">选号：</span>
						<span class="num-xuhao">001</span>
					</div>
					<div class="title">
						<span class="titlt-l">球队：</span>
						<span class="titlt-r">球队名称球队名称</span>
					</div>
					<div class="detail" data-source="mv/1.mp4">
						<img src="{{asset('/')}}index/vote/detail1.png" alt="">
					</div>
					<div class="toupiao" onclick="swal(&#39;投票成功!&#39;, &#39;非常感谢,么么哒！&#39;, &#39;success&#39;)">
						<img src="{{asset('/')}}index/vote/vote1.png" alt="">
					</div>
				</div>
				<div class="swiper-slide swiper-slide-duplicate swiper-slide-next swiper-slide-duplicate-prev" style="background-image: url({{asset('/')}}index/vote/v1.png); height: 1354.15px; transform: translate3d(55px, 0px, -350px) rotateX(0deg) rotateY(0deg); z-index: 0; transition-duration: 0ms;" data-swiper-slide-index="1">
					<div class="renwu">
						<img src="{{asset('/')}}index/vote/ren2.jpg" alt="">
					</div>
					<div class="num">
						<span class="num-name">选号：</span>
						<span class="num-xuhao">001</span>
					</div>
					<div class="num">
						<span class="num-name">选号：</span>
						<span class="num-xuhao">001</span>
					</div>
					<div class="title">
						<span class="titlt-l">球队：</span>
						<span class="titlt-r">球队名称球队名称</span>
					</div>
					<div class="detail" data-source="mv/1.mp4">
						<img src="{{asset('/')}}index/vote/detail1.png" alt="">
					</div>
					<!--<div class="toupiao" onClick="swal('投票成功!', '非常感谢,么么哒！', 'success')">
						<img src="images/vote1.png" alt="">
					</div>-->
					<div class="toupiao" onclick="swal(&#39;您已经投票!&#39;, &#39;非常感谢,么么哒！&#39;, &#39;success&#39;)">
						<img src="{{asset('/')}}index/vote/yitou.png" alt="">
					</div>
				</div>
				</div>
			<div class="middle swiper-pagination-bullets" id="swiper-pagination1"><span class="swiper-pagination-bullet swiper-pagination-bullet-active"></span><span class="swiper-pagination-bullet"></span></div>
		</div>
		
		<div class="vediobox">
			<video class="video-js" id="video-js" controls="">
			<source src="{{asset('/')}}index/vote/1.mp4" type="video/mp4">
			</video>
		</div>
		<div class="paihang"><span>实时排行榜</span><span>奖品</span></div>
		<script type="text/javascript" src="{{asset('/')}}index/vote/jquery.min.js"></script>
		<script type="text/javascript" src="{{asset('/')}}index/vote/swiper-3.4.0.jquery.min.js"></script>
		<script src="{{asset('/')}}index/vote/sweet-alert.min.js"></script>
		<script>
			$(function() {
				// $("body,html").css("background-size", $(window).width() + "px " + $(window).height() + "px");
				 
				$('.swiper-slide').css('height', $('.swiper-slide').width() * 950 / 590 + 'px');
				$(".swiper-container").css("padding-top", ($(window).height() - $('.swiper-slide').width() * 950 / 590 + 50) / 2);
				
				function getSwiperOptions (pagination) {
					return {
						pagination: pagination,
						effect: 'coverflow',
						centeredSlides: true,
						loop: true,
						speed: 1000,
						autoplay:3000,
						autoplayDisableOnInteraction: false,
						slidesPerView: 'auto',
						coverflow: {
							rotate: 0,
							stretch: -55,
							depth: 350,
							modifier: 1,
							slideShadows: false
						}
					}
				}
				
				var swiper = [];
				swiper['#page1'] = new Swiper('#page1', getSwiperOptions('#swiper-pagination1'));
				
				var tabhosts = $(".header a");  
				  
				tabhosts.each(function() {  
				
					$($(this).attr("href")).hide();  
					  
					if ($(this).hasClass("selected")) {  
						$($(this).attr("href")).show();  
					}  
					  
					$(this).click(function(event) {  
						event.preventDefault();
						  var id = $(this).attr("href");
						  if(swiper.hasOwnProperty(id)){
							  swiper[id].slideTo(0, 1000, false);
							  swiper[id].stopAutoplay();
							  swiper[id].startAutoplay();
						  }
						  
						if (!$(this).hasClass("selected")) {  
							tabhosts.each(function() {  
								$(this).removeClass("selected");  
								$($(this).attr("href")).hide();  
							});  
							  
							$(this).addClass("selected");  
							$($(this).attr("href")).show();  
						}  
					});  
				});  
			});  
	   </script>
	   <script type="text/javascript">
			jQuery (function ($)
			{
				var video = $("#video-js"); 
				$ ('.detail').click (function ()
				{
					var videoSource = $(this).data('source'); 
					video.attr('src',videoSource);
					video.get(0).play();
				});
				
			
			
			});
	   </script>

	

<div><div class="sweet-overlay" tabindex="-1"></div><div class="sweet-alert" tabindex="-1"><div class="icon error"><span class="x-mark"><span class="line left"></span><span class="line right"></span></span></div><div class="icon warning"> <span class="body"></span> <span class="dot"></span> </div> <div class="icon info"></div> <div class="icon success"> <span class="line tip"></span> <span class="line long"></span> <div class="placeholder"></div> <div class="fix"></div> </div> <div class="icon custom"></div> <h2>Title</h2><p>Text</p><button class="cancel" tabindex="2">Cancel</button><button class="confirm" tabindex="1">OK</button></div></div></body></html>