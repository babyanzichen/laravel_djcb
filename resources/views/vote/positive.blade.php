<!DOCTYPE html>

<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	
	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>财富金字塔颁奖盛典</title>
	<link rel="stylesheet" type="text/css" href="{{asset('/')}}index/vote/ui.css">
	<script type="text/javascript" src="https://res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
<body style="background:#fed261;overflow:hidden;">


<div class="container" id="container">
	<div class="RedBox">
		<div class="topcontent">
			<h2 class="bounceInDown">恭喜您，成功为威固增加</h2>
			<span class="text flash"><b>1</b>票</span>
			<div class="avatar">
				<div id="open"><img src="{{asset('/')}}index/vote/fu.png" alt="" width="100" height="100" class="zoomIn"></div>
			</div>
			<div class="description1 flipInX" onclick="history.go(-1);">返回</div>
		</div>
	</div>
	<div style="color:white">说明：
	<p>1、本页投票对象为随机获得，用户每进入此页面一次，将随机为一个企业增加一票。
	</p>
	<p>2、为了给您支持的企业增加更多票数，建议您将此页分享至朋友圈，您每分享一次将增加一次额外的投票机会，每日最多额外获得五次投票机会。
	</p>
	</div>
</div>
<script type="text/javascript" src="{{asset('/')}}index/vote/jquery-1.9.1.min.js"></script>
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
      desc: '票数不够？来这里拼人品吧', // 分享描述
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
      desc: '票数不够？来这里拼人品吧', // 分享描述
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

<script>
	var oOpen = document.getElementById("open");
	var oClose = document.getElementById("open");
	var oContainer = document.getElementById("container");

	oChai.onclick = function (){
		oChai.setAttribute("class", "rotate");
	};
</script>

</body></html>