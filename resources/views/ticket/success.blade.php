<!DOCTYPE html>
<html style="font-size: 100px;"><head lang="en"><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>【门票】抢票成功 - 2018武汉国际改装车展</title>
    
    <script type="text/javascript">
        /*响应式布局 start*/
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
        /*响应式布局 end*/
    </script>
    <link href="{{asset('/')}}index/ticket/swiper.min.css" rel="stylesheet" type="text/css">
    <link href="{{asset('/')}}index/ticket/refit.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="https://res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
 <script src="{{asset('/')}}index/js/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{asset('/')}}index/css/sweetalert.min.css"">
<style type="text/css">
.suuess-tip {
    margin-top: 1.2rem;
    text-align: center;
}
.footer {
    margin-top: 2.2rem;
    height: 2.2rem;
    text-align: center;
    background: #dadada;
}
.footer img {
    width: 2.2rem;
    height: 2.2rem;
    margin-top: -1.5rem;
}
    </style>
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
</head>
<body class="body-bg">

 <div class="suuess-tip">
     <img src="{{asset('/')}}index/ticket/success_img.png">
 </div>
 <div style="font-size: 18px;text-align: center; margin-top: 20px;line-height: 30px;">订单号：<font style="color:red"> {{$orderinfo->ordersn}}</font></div>
 <div style="font-size:18px;text-align: center;">我们将很快为您出票</div>
<div class="footer">
    <img src="{{asset('/')}}index/ticket/code.png" class="code-pic">
    <p>
        请长按识别二维码关注<br>
        武汉改装车展<br>
        公众号查看电子票
    </p>
</div>


</body></html>