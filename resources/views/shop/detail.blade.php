<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="_token" content="{!! csrf_token() !!}"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<title>点金车宝</title>
<meta name="description" content="专业的汽车后市场会展组织策划机构">
<meta name="keywords" content="专业的汽车后市场会展组织策划机构">
<link href="{{ asset('/index/css/default.css') }}" type="text/css" rel="stylesheet">
<script type="text/javascript" src="https://res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
<link href="{{ asset('/index/css/index.css') }}" type="text/css" rel="stylesheet">
<script type="text/javascript" src="{{ asset('/index/js/hm.js') }}"></script>
<script type="text/javascript" src="{{ asset('/index/js/jquery.js') }}"></script>
</head>
<body>
<div class="main">
<div id="top">
	<div id="logo"><img src="{{asset('/')}}index/images/logo.png"/></div>
<div id="weather"><iframe allowtransparency="true" frameborder="0" width="120" height="36" scrolling="no" src="http://tianqi.2345.com/plugin/widget/index.htm?s=3&z=3&t=1&v=0&d=3&bd=0&k=&f=&q=1&e=1&a=1&c=54511&w=180&h=36&align=center"></iframe></div>
</div>
<div id="search" class="wid">
<form action="" method="post">
<span class="search-btn"><img src="{{asset('/')}}index/images/zoom.png"></span>
<input type="text" class="txt" placeholder="品牌很多&nbsp;&nbsp;只选名牌"/>
<input type="submit" name="baidubtn" id="baidubtn" value="搜 索">
</form>
</div>
<div class="banner"><img src="{{asset('/')}}index/images/banner1.jpg"></div>
   
<article class="htmleaf-container">
  <div class="tabs">
    <div class="tabs-header">
    <div class="border"></div>
    <ul>
      <li class="active"><a href="#tab-1" tab-id="1" ripple="ripple" ripple-color="#03F">精品</a></li>
      <li><a href="#tab-2" tab-id="2" ripple="ripple" ripple-color="#FFF">电子</a></li>
      <li><a href="#tab-3" tab-id="3" ripple="ripple" ripple-color="#FFF">养护</a></li>
      <li><a href="#tab-4" tab-id="4" ripple="ripple" ripple-color="#FFF">改装</a></li>
      <li><a href="#tab-5" tab-id="5" ripple="ripple" ripple-color="#FFF">房车</a></li>
      <li><a href="#tab-6" tab-id="6" ripple="ripple" ripple-color="#FFF">配件</a></li>
    </ul>
    
    </div>
    <div class="tabs-content">
    <div tab-id="1" class="tab active">
        <ul>
           @foreach ($brands1 as $item)
            <li><a class="" href="{{ asset('/home/shop') }}/{{$item->id}}"   onclick="count({{$item->id}})"><img src="{{asset('/')}}{{$item->brandlogo}}"><span>{{$item->brandname}}</span></a></li>
           @endforeach 
         </ul>
        
    </div>
    <div tab-id="2" class="tab">
     <ul>
          @foreach ($brands2 as $item)
            <li><a class="" href="{{ asset('/home/shop') }}/{{$item->id}}"  onclick="count({{$item->id}})"><img src="{{asset('/')}}{{$item->brandlogo}}"><span>{{$item->brandname}}</span></a></li>
           @endforeach 
     </ul>
       
            </div>
    <div tab-id="3" class="tab">
     <ul>
          @foreach ($brands3 as $item)
            <li><a class="" href="{{ asset('/home/shop') }}/{{$item->id}}"  onclick="count({{$item->id}})"><img src="{{asset('/')}}{{$item->brandlogo}}"><span>{{$item->brandname}}</span></a></li>
           @endforeach 
     </ul>
    </div>
    <div tab-id="4" class="tab">
      <div class="">
      <ul>
          @foreach ($brands5 as $item)
            <li><a class="" href="{{ asset('/home/shop') }}/{{$item->id}}"  onclick="count({{$item->id}})"><img src="{{asset('/')}}{{$item->brandlogo}}"><span>{{$item->brandname}}</span></a></li>
           @endforeach 
         </ul>
                     <hr>
            </div>
    </div>
    <div tab-id="5" class="tab">
      <div class="">
      <ul>
         @foreach ($brands5 as $item)
            <li><a class="" href="{{ asset('/home/shop') }}/{{$item->id}}"  onclick="count({{$item->id}})"><img src="{{asset('/')}}{{$item->brandlogo}}"><span>{{$item->brandname}}</span></a></li>
           @endforeach 
         </ul>
                     <hr>
            </div>
    </div>
    <div tab-id="6" class="tab">
      <div class="">
      <ul>
       @foreach ($brands6 as $item)
            <li><a class="" href="{{ asset('/home/shop') }}/{{$item->id}}"  onclick="count({{$item->id}})"><img src="{{asset('/')}}{{$item->brandlogo}}"><span>{{$item->brandname}}</span></a></li>
           @endforeach 
         </ul>
                     <hr>
            </div>
    </div>
    </div>
  </div>
</article>
<script>window.jQuery || document.write('<script src="js/jquery-2.1.1.min.js"><\/script>')</script>
<script>
$(document).ready(function () {
  var activePos = $('.tabs-header .active').position();
  function changePos() {
    activePos = $('.tabs-header .active').position();
    $('.border').stop().css({
      left: activePos.left,
      width: $('.tabs-header .active').width()
    });
  }
  changePos();
 /* var tabHeight = $('.tab.active').height();
  function animateTabHeight() {
    tabHeight = $('.tab.active').height();
    $('.tabs-content').stop().css({ height: tabHeight + 'px' });
  }
  animateTabHeight();*/
  function changeTab() {
    var getTabId = $('.tabs-header .active a').attr('tab-id');
    $('.tab').stop().fadeOut(300, function () {
      $(this).removeClass('active');
    }).hide();
    $('.tab[tab-id=' + getTabId + ']').stop().fadeIn(300, function () {
      $(this).addClass('active');
      animateTabHeight();
    });
  }
  $('.tabs-header a').on('click', function (e) {
    e.preventDefault();
    var tabId = $(this).attr('tab-id');
    $('.tabs-header a').stop().parent().removeClass('active');
    $(this).stop().parent().addClass('active');
    changePos();
    tabCurrentItem = tabItems.filter('.active');
    $('.tab').stop().fadeOut(300, function () {
      $(this).removeClass('active');
    }).hide();
    $('.tab[tab-id="' + tabId + '"]').stop().fadeIn(300, function () {
      $(this).addClass('active');
      animateTabHeight();
    });
  });
  var tabItems = $('.tabs-header ul li');
  var tabCurrentItem = tabItems.filter('.active');
  $('#next').on('click', function (e) {
    e.preventDefault();
    var nextItem = tabCurrentItem.next();
    tabCurrentItem.removeClass('active');
    if (nextItem.length) {
      tabCurrentItem = nextItem.addClass('active');
    } else {
      tabCurrentItem = tabItems.first().addClass('active');
    }
    changePos();
    changeTab();
  });
  $('#prev').on('click', function (e) {
    e.preventDefault();
    var prevItem = tabCurrentItem.prev();
    tabCurrentItem.removeClass('active');
    if (prevItem.length) {
      tabCurrentItem = prevItem.addClass('active');
    } else {
      tabCurrentItem = tabItems.last().addClass('active');
    }
    changePos();
    changeTab();
  });
  $('[ripple]').on('click', function (e) {
    var rippleDiv = $('<div class="ripple" />'), rippleOffset = $(this).offset(), rippleY = e.pageY - rippleOffset.top, rippleX = e.pageX - rippleOffset.left, ripple = $('.ripple');
    rippleDiv.css({
      top: rippleY - ripple.height() / 2,
      left: rippleX - ripple.width() / 2,
      background: $(this).attr('ripple-color')
    }).appendTo($(this));
    window.setTimeout(function() {
      rippleDiv.remove();
    }, 1500);
  });
});
</script>
  
<div class="icbox icbox1">
	<h2 id="icbnews">精品车饰&nbsp;></h2>
	<div class="wid mtop5 mcenter"></div>
	<div class="wid mtop5 mcenter"></div>
<dl>
		<dt>
		<a href="#"><div class="outline1">汽车座垫</div></a>
		</dt>
            @foreach ($brands11 as $item)
            <dd><a href="{{ asset('/home/shop') }}/{{$item->id}}" onclick="count({{$item->id}})"><em>{{$item->brandname}}</em></a></dd>
            @endforeach
            <dd class="change" onClick="showMore(this,1,1)"><i class="showmore"></i></dd>
		</dl>
        <div class="more">
        
        </div>
	<dl>
		<dt>
		<a href="#"><div class="outline1">汽车香水</div></a>
		</dt>
      		@foreach ($brands12 as $item)
            <dd><a href="{{ asset('/home/shop') }}/{{$item->id}}" onclick="count({{$item->id}})"><em>{{$item->brandname}}</em></a></dd>
          @endforeach
		 <dd class="change" onClick="showMore(this,1,2)"><i class="showmore"></i></dd>
    </dl>
        <div class="more">
        
        
        </div>
      <dl>
		<dt>
		<a href="#"><div class="outline1">汽车脚垫</div></a>
		</dt>
		@foreach ($brands13 as $item)
      <dd><a href="{{ asset('/home/shop') }}/{{$item->id}}" onclick="count({{$item->id}})"><em>{{$item->brandname}}</em></a></dd>
    @endforeach
		 <dd class="change" onClick="showMore(this,1,3)"><i class="showmore"></i></dd>
    </dl>
        <div class="more">
        
        
        </div>
<div class="icbox icbox2">
<div><h2 id="icbvideo">电子导航&nbsp;></h2></div>
<div class="wid mtop5 mcenter"></div>
<dl>
		<dt>
		<a href="#"><div class="outline2">行车记录仪</div></a>
		</dt>
		@foreach ($brands21 as $item)
      <dd><a href="{{ asset('/home/shop') }}/{{$item->id}}" onclick="count({{$item->id}})"><em>{{$item->brandname}}</em></a></dd>
    @endforeach
		<dd class="change" onClick="showMore(this,2,1)"><i class="showmore"></i></dd>
    </dl>
        <div class="more">
        
        </div>
    <dl>
		<dt>
		<a href="#"><div class="outline2">智能后视镜</div></a>
		</dt>
		@foreach ($brands22 as $item)
      <dd><a href="{{ asset('/home/shop') }}/{{$item->id}}" onclick="count({{$item->id}})"><em>{{$item->brandname}}</em></a></dd>
    @endforeach
		 <dd class="change" onClick="showMore(this,2,2)"><i class="showmore"></i></dd>
    </dl>
        <div class="more">
        
        </div>
	<dl>
		<dt>
		<a href="#"><div class="outline2">智能车机</div></a>
		</dt>
		@foreach ($brands23 as $item)
      <dd><a href="{{ asset('/home/shop') }}/{{$item->id}}" onclick="count({{$item->id}})"><em>{{$item->brandname}}</em></a></dd>
    @endforeach
		<dd class="change" onClick="showMore(this,2,3)"><i class="showmore"></i></dd>
    </dl>
        <div class="more">
        
        </div>
	<dl>
		<dt>
		<a href="#"><div class="outline2">GPS导航</div></a>
		</dt>
		@foreach ($brands24 as $item)
      <dd><a href="{{ asset('/home/shop') }}/{{$item->id}}" onclick="count({{$item->id}})"><em>{{$item->brandname}}</em></a></dd>
    @endforeach
	 <dd class="change" onClick="showMore(this,2,4)"><i class="showmore"></i></dd>
    </dl>
    <div class="more">
        
     </div>
	<dl>
		<dt>
		<a href="#"><div class="outline2">安全预警仪</div></a>
		</dt>
		@foreach ($brands25 as $item)
      <dd><a href="{{ asset('/home/shop') }}/{{$item->id}}" onclick="count({{$item->id}})"><em>{{$item->brandname}}</em></a></dd>
    @endforeach
		<dd class="change" onClick="showMore(this,2,5)"><i class="showmore"></i></dd>
    </dl>
        <div class="more">
        
        </div>
	<dl>
		<dt>
		<a href="#"><div class="outline2">胎压监测</div></a>
		</dt>
		@foreach ($brands26 as $item)
      <dd><a href="{{ asset('/home/shop') }}/{{$item->id}}" onclick="count({{$item->id}})"><em>{{$item->brandname}}</em></a></dd>
    @endforeach
		<dd class="change" onClick="showMore(this,2,6)" ><i class="showmore"></i></dd>
    </dl>
        <div class="more">
        
        </div>
</div>
<div class="icbox icbox3">
<h2 id="icbmall">美容养护&nbsp;></h2>
<div class="wid mtop5 mcenter"></div>
	<dl>
		<dt>
		<a href="#"><div class="outline3">4S保养</div></a>
		</dt>
		@foreach ($brands31 as $item)
      <dd><a href="{{ asset('/home/shop') }}/{{$item->id}}" onclick="count({{$item->id}})"><em>{{$item->brandname}}</em></a></dd>
    @endforeach
		<dd class="change" onClick="showMore(this,3,1)"><i class="showmore"></i></dd>
    </dl>
        <div class="more">
        
        </div>

<dl>
		<dt>
		<a href="#"><div class="outline2">空气净化器</div></a>
		</dt>
		@foreach ($brands32 as $item)
      <dd><a href="{{ asset('/home/shop') }}/{{$item->id}}" onclick="count({{$item->id}})"><em>{{$item->brandname}}</em></a></dd>
    @endforeach
		<dd class="change" onClick="showMore(this,3,2)"><i class="showmore"></i></dd>
    </dl>
        <div class="more">
        
        </div>

	
	<dl>
		<dt>
		<a href="#"><div class="outline3">隔热膜</div></a>
		</dt>
		@foreach ($brands33 as $item)
      <dd><a href="{{ asset('/home/shop') }}/{{$item->id}}" onclick="count({{$item->id}})"><em>{{$item->brandname}}</em></a></dd>
    @endforeach
	 <dd class="change" onClick="showMore(this,3,3)"><i class="showmore"></i></dd>
    </dl>
        <div class="more">
        
        </div>

	
	<dl>
		<dt>
		<a href="#"><div class="outline3">漆面养护</div></a>
		</dt>
		@foreach ($brands34 as $item)
      <dd><a href="{{ asset('/home/shop') }}/{{$item->id}}" onclick="count({{$item->id}})"><em>{{$item->brandname}}</em></a></dd>
    @endforeach
	 <dd class="change" onClick="showMore(this,3,4)"><i class="showmore"></i></dd>
    </dl>
        <div class="more">
        
   </div>
       
</div>
	
</div>
<div class="icbox icbox1">
<h2 id="icbyule">汽车改装&nbsp;></h2>
<div class="wid mtop5 mcenter"></div>
<dl>
		<dt>
		<a href="#"><div class="outline1">外观改装</div></a>
		</dt>
		@foreach ($brands41 as $item)
      <dd><a href="{{ asset('/home/shop') }}/{{$item->id}}" onclick="count({{$item->id}})"><em>{{$item->brandname}}</em></a></dd>
    @endforeach
		<dd class="change" onClick="showMore(this,4,1)"><i class="showmore"></i></dd>
    </dl>
        <div class="more">
        
        </div>

	<dl>
		<dt>
		<a href="#"><div class="outline1">动力改装</div></a>
		</dt>
		@foreach ($brands42 as $item)
      <dd><a href="{{ asset('/home/shop') }}/{{$item->id}}" onclick="count({{$item->id}})"><em>{{$item->brandname}}</em></a></dd>
    @endforeach
		 <dd class="change" onClick="showMore(this,4,2)"><i class="showmore"></i></dd>
    </dl>
        <div class="more">
        
        </div>

</div>
<div class="icbox icbox5">
<h2 id="icbtuan">大牌配件&nbsp;> </h2>
<div class="wid mtop5 mcenter"></div>
<dl>
		<dt>
		<a href="#"><div class="outline5">轮胎</div></a>
		</dt>
		@foreach ($brands51 as $item)
      <dd><a href="{{ asset('/home/shop') }}/{{$item->id}}" onclick="count({{$item->id}})"><em>{{$item->brandname}}</em></a></dd>
    @endforeach
		<dd class="change" onClick="showMore(this,5,1)"><i class="showmore"></i></dd>
    </dl>
        <div class="more">
        
        </div>

	<dl>
		<dt>
		<a href="#"><div class="outline5">机油</div></a>
		</dt>
		@foreach ($brands52 as $item)
      <dd><a href="{{ asset('/home/shop') }}/{{$item->id}}" onclick="count({{$item->id}})"><em>{{$item->brandname}}</em></a></dd>
    @endforeach
		<dd class="change" onClick="showMore(this,5,2)"><i class="showmore"></i></dd>
    </dl>
        <div class="more">
        
        
</div>
	
	<dl>
		<dt>
		<a href="#"><div class="outline5">雨刮器</div></a>
		</dt>
		@foreach ($brands53 as $item)
      <dd><a href="{{ asset('/home/shop') }}/{{$item->id}}" onclick="count({{$item->id}})"><em>{{$item->brandname}}</em></a></dd>
    @endforeach
		<dd class="change" onClick="showMore(this,5,3)"><i class="showmore"></i></dd>
    </dl>
        <div class="more">
        
        </div>

	
	<dl>
		<dt>
		<a href="#"><div class="outline5">改装光源</div></a>
		</dt>
		@foreach ($brands54 as $item)
      <dd><a href="{{ asset('/home/shop') }}/{{$item->id}}" onclick="count({{$item->id}})"><em>{{$item->brandname}}</em></a></dd>
    @endforeach
	<dd class="change" onClick="showMore(this,5,4)"><i class="showmore"></i></dd>
    </dl>
        <div class="more">
        
        </div>
</div>
		</div>
<div class="icbox icbox4">
<h2 id="icblife">房车&nbsp;></h2>
<div class="wid mtop5 mcenter"></div>
<dl>
		<dt>
		<a href="#"><div class="outline4">移动房车</div></a>
		</dt>
		@foreach ($brands61 as $item)
      <dd><a href="{{ asset('/home/shop') }}/{{$item->id}}" onclick="count({{$item->id}})"><em>{{$item->brandname}}</em></a></dd>
    @endforeach
	 <dd class="change" onClick="showMore(this,6,1)"><i class="showmore"></i></dd>
    </dl>
        <div class="more">
        
        </div>
</div>
	
        </div>
</div>
</div>

<div id="foot" class="wid"> 
<p style="font-size:1.5rem;padding-top:2%;">点金车宝</p>
<p style="font-size: 1rem;    padding-top: 1%;
    padding-bottom: 2%;">Copyright? 2010-2016 点金版权所有 All Rights Reserved.</p>
</div>
</div>
<script>
//function showMore(obj){
	//console.log(1);
 // $('.more').hide();
//	$(obj).parent().parent().next('.more').slideToggle('fast');
	 
//	var a =$(obj).find("img").attr("src");
//		$(obj).find("img").attr("src","{{asset('/')}}index/images/up.png");
//	}else{
//			$(obj).find("img").attr("src","{{asset('/')}}index/images/arrow.png");
//	}
//}
</script>
</body>
<script type="text/javascript" src="{{asset('/')}}/index/js/dianjintj.js"></script>
<script type="text/javascript">
         function count(id){
          //alert(1);
          //var id=id;
          
             //console.log(id);
          var token = $('meta[name="_token"]').attr('content');
          $.ajax ({
        type: 'POST',
        url:"{{ url('home/count') }}",
        data:{
          "id":id,
          "_token": token
      },
       dataType: 'json',
      
       success:function(data){ 
       // location.reload() ;
          //  alert(data);
                  },
      async:true
    });
  }
  </script>
  <script type="text/javascript">
         function showMore(obj,category1,category2){
          $(obj).children().attr('class','hideMore');
          
          var token = $('meta[name="_token"]').attr('content');
          $.ajax ({
        type: 'get',
        url:"{{ url('home/getmore') }}",
        data:{
          "category1":category1,
          "category2":category2,
          "_token": token
      },
       
      
       success:function(data){ 
       var data="<ul>"+data+"</ul>"
       $(obj).parent().next('.more').html(data);
                  },
      async:true
    });
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
     title: '点金车宝', // 分享标题
      desc: '点金车宝——打造B2C专业平台', // 分享描述
      link: 'http://www.djcb123.cn', // 分享链接
      imgUrl: 'http://www.djcb123.cn/index/images/1.jpg', // 分享图标
      type: '', // 分享类型,music、video或link，不填默认为link
      dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
      success: function () {
          
          
          
          
          
          
          
          
      },
      cancel: function () {
         alert("分享失败");
      }
  });

  wx.onMenuShareTimeline({
      title: '点金车宝', // 分享标题
      desc: '点金车宝——打造B2C专业平台', // 分享描述
      link: 'http://www.djcb123.cn', // 分享链接
      imgUrl: 'http://www.djcb123.cn/index/images/1.jpg', // 分享图标
      success: function () {
          
          
          
          
          
          
          
      },
      cancel: function () {
         alert("分享失败");
      }
  });

  });
</script>
</html>