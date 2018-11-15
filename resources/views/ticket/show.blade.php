<!DOCTYPE html>
<html>
<head lang="en"><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>【门票】2018武汉国际改装车展</title>
    <script src="{{asset('/')}}index/js/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{asset('/')}}index/css/sweetalert.min.css"">
    <script src="{{asset('/')}}index/ticket/jquery.min.js"></script>
    <style type="text/css">
    	body,img,p,div{
    		margin: 0;
    		padding:0;
    		
    	}
img{
  width: 100%;
}
.ordersn {
  position: relative;
  top: 54.5%;
  left: 5%;
  width: 95%;
  height: 45px;
  line-height: 45px;
  font-size: 1.2rem;
}
    	.username {
		    position: absolute;
		    top: 53.5%;
		    left: 5%;
		    font-size: 1.2rem;
		}
    	.phone {
		    position: absolute;
		    top: 65.5%;
		    left: 5%;
		    font-size: 1.2rem;
		}
    	.city {
		    position: absolute;
		    top: 59.5%;
		    left:5%;
		    font-size: 1.2rem;
		}
		.info {
        background-color: #d8d7d7;
        height: 160px;
        width: 100%;
        overflow: hidden;
    }
		.left{
			z-index: 5
		}
		.right {
		    width: 30%;
		    top: 10%;
		    right: 5%;
		    position: relative;
		    float: right;
		}
    .tip {
    width: 225px;
    left: 20%;
    position: relative;
    font-size: 14px;
    margin-bottom: 93px;
}
#qrcode{
    background-color: white;
    height: 120px;
    width: 120px;
}
canvas{
  left: 10px;
    top: 10px;
    position: relative;
}
    </style>
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
      	$('#cover').fadeOut();
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
      	$('#cover').fadeOut();
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
</head>
<body>
	<img id="cover" style="width:100%;display: none;z-index: 100;position: absolute;" src="{{asset('/')}}index/ticket/share.png">	
	<img style="z-index: 5"  src="{{asset('/')}}index/ticket/top.jpg">
	<div class="ordersn">{{$orderinfo->ordersn}}</div>
	<div class="info">
		<div class="left">
			<div class="username">姓名：{{$orderinfo->username}}</div>
			<div class="city">城市：{{$orderinfo->city}}</div>
			<div class="phone">手机：{{$orderinfo->phone}}</div>
		</div>
		<div class="right">
			<img style="display: none" id="logoImg" src="{{asset('/')}}index/ticket/logo.jpg">
      <div id="qrcode"></div>
		</div>
	</div>
	<img class="bottom" style="z-index: 5;position: relative;"  src="{{asset('/')}}index/ticket/bottom.jpg">
  <div class="tip">
    <p>使用规则：<strong>仅限本人，三天通用，不限次数</strong></p>
    <p>使用方法：<strong>直接扫码入场（有纸质票需求的可在进场时换取纸质票）</strong></p>
  </div>
  <script type="text/javascript" src="{{asset('/')}}index/ticket/jquery.qrcode.min.js"></script>
	<script type="text/javascript">
    swal({ 
  title: "提示：本门票可在武汉改装车展【6.23-6.25】三天全场通用！", 
  text: "2秒后自动关闭。", 
  timer:4000, 
  showConfirmButton: false 
});
		$(".bottom").click(function(){
			$('#cover').show();
		})




    //计算宽，高，中心坐标，logo大小                                                                       
    var width = 100;                                                                      
    var height =100;                                                                     
    var x = width * 0.4;                                                                  
    var y = height * 0.4;                                                                 
    var lw = width * 0.2;                                                                 
    var lh = height * 0.2;                                                                
//生成二维码                                                                                   
    $("#qrcode").qrcode({                                                              
        width: width,                                                                     
        height:height,                                                                    
        text:'<?php echo $orderinfo->ordersn;?>'                                                      
    });                                                                                   
//画logo                                                                                      
    $("#qrcode canvas")[0].getContext('2d').drawImage($("#logoImg")[0], x, y, lw, lh);
	</script>

</body>
</html>