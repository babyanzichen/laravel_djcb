<!DOCTYPE html>

<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <link rel="stylesheet" type="text/css" href="{{asset('/')}}index/vote/ui.css">
  <script src="{{asset('/')}}index/js/sweetalert.min.js"></script>
        <link rel="stylesheet" type="text/css" href="{{asset('/')}}index/css/sweetalert.min.css"">
  <style>
  ul li{
    font-size: 18px;
    font-family: 微软雅黑;
  }
  .more {
    margin-top: 10px;
    background-color: #F44336;
    width: 50%;
    margin-left: 25%;
    display: block;
    height: 30px;
    border: none;
    border-radius: 5px;
    font-size: 18px;
    color: white;
}
</style>
	<title>报名信息</title>
<body style="background:#ffffff;padding: 30% 0 50% 0;
    margin-bottom: 100px;">

<div class="container" style="text-align: center;
    padding-top:5%;height:800px;">
	<img src="{{asset('/')}}index/vote/checking.png">
  <h3 >恭喜您，奖项申报成功！</h3>
<br>
  <h4>您已报名奖项:</h4>
    <h5 style="color:red">(点击已通过奖项名称即可预览详情)</h5>
    
  <ul>
     @foreach ($is as $i)
     @if($i->award_id>40)
           
            <a  href="{{asset('/')}}vote/detail/{{$i->id}}">
                <font style="color:red"><li>{{ $i -> award->name  }}（ @if ($i -> is_enabled == 'yes')已通过 @else
              审核中
            @endif）</li></font>
            </a>
           
      @endif  
      @endforeach
      
 


  <br>
    <h6 >申请不通过可能原因：重复申请奖项</h6> 
    <h6 >资料长时间审核中可能原因：未提供logo</h6>
    <h6 >以上请联系客服处理：18922350780（微信、电话同号）  </h6>
 
  <br>
    <h6 style="color:blue">为了您获得更多票数，</h6> 
    <h6 style="color:blue">单个奖项请勿重复申报。</h6>
    <h6 style="color:blue">如需修改资料，请联系客服。</h6> 
    <h6 style="color:blue">18922350780（微信、电话同号）  </h6>
  </ul>
  <a class="more" href="{{asset('/')}}vote/regs">报名更多</a>
    <br>
    <br>
    <br>
    <br>
    <p>2017届财富金字塔奖项申报记录：</p>
    @foreach ($is as $i)
       
        @if($i->award_id<=40)
            <a  href="{{asset('/')}}vote/detail/{{$i->id}}">
                <font style="color:red"><li>{{ $i -> award->name  }}</li></font>
            </a>    
        @endif       
  @endforeach
</div>
 @include('layout.app')
<script type="text/javascript" src="{{asset('/')}}index/vote/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="https://res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
<script type="text/javascript">
    window.onload=function(){
        var is_guanzhu='{{$is_guanzhu}}';
        if(is_guanzhu!='T'){
        swal({ 
          title:'<h6>系统检测到您可能未关注武汉改装车展微信公众号，为了您及时收到活动信息，请先长按以下二维码识别关注</h6>',
          text: "<img src='__PUBLIC__/index/imgs/kakaqr.jpg'>", 
          html: true 
        });
      }      
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
        title: '我在参加汽车服务行业“财富金字塔”颁奖盛典', // 分享标题
        desc: '2017年11月18日 广州长隆酒店【荣耀开启】', // 分享描述
        link: 'http://www.djcb123.cn/vote/reg', // 分享链接
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
        title: '我在参加汽车服务行业“财富金字塔”颁奖盛典', // 分享标题
        desc: '2017年11月18日 广州长隆酒店【荣耀开启】', // 分享描述
        link: 'http://www.djcb123.cn/vote/reg', // 分享链接
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