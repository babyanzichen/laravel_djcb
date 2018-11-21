<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		 <meta name="_token" content="{!! csrf_token() !!}" />
	    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
	    <title>{{$data->name}}——2018-2019年度汽车服务行业财富金字塔颁奖盛典投票</title>
	     <script src="{{asset('/')}}index/vote/jquery-1.10.1.min.js" type="text/javascript"></script>
	    <link rel="stylesheet" type="text/css" href="{{asset('/')}}index/vote/ui.css">
	    <script type="text/javascript" src="https://res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
        
      <style>
   .dark {
    border: 1px solid #bfb9b9;
    /* color: black; */
    background-color: #93a2a1;
}
body {
    font-family: 微软雅黑;
    background-color: #d8d8d8;
    margin: 0px;
    padding: 0px;
}
        .top{
        z-index: 5;
        }
        .main .top img{
        width: 100%
        }
.head {
  
    z-index: 1;
    top: 0;
    -webkit-transform: scale(1);
    transform: scale(1);
    opacity: 0;
    -webkit-animation: fromBack 1s linear forwards;
    animation: fromBack 1s linear forwards;
    margin-top: -10%;
    position: relative;
    width: 100%;
    background-color: rgba(255, 253, 251, 0.6);
    height:150px;
    border-radius: 10px;
}
.head .votes {
    margin-top:15%;
    margin-left: 5%;
    position: relative;
    float: left;
}
.logo {
    position: relative;
    float: right;
    width:60%;
    margin-right: 5%;
    margin-top: -10%;
}
 .logo img {
    border-radius: 10px;
    width: 80px;
    margin-left: 75%;
}
.name{
    float: right;
}
.gdmk {
    background-color: white;
    margin-top: 20px;
    width: 100%;
    min-height: 210px;
    overflow: hidden;
    margin-bottom:20px;
}
.gdmk .bt {
    width: 100%;
    height: 40px;
    line-height: 40px;
    border-bottom: 1px solid #c1b9b9;
}
        .gdmk .bt span {
        font-size: 16px;
        margin-left: 10px;
        font-weight: 600;
        font-family: "Droid Sans Fallback", "Microsoft YaHei",arial,serif,monospace;
        }
    .gdmk .xtbmk {
            width: 100px;
            height: 170px;
        }
       .gdmk .xtbmk .icon {
            width: 110px;
            height: 110px;
            padding: 5px 0 0 5px;
        }
 .line {
    left: 2%;
    position: relative;
    width: 3px;
    height: 40px;
    border: 3px solid #eab558;
    margin-right: 10px;
}
.reason {
    padding: 3%;
   
}
.tips {
    width: 100%;
    height: 80px;
    padding-top:5%;
    background-color: rgba(70, 67, 67, 0.19);
    color: white;
    text-align: center;
}
.record{
  text-align: center;
   margin-top:5%
}
.record img {
    width: 5%;
    border-radius: 5px;
}
.buttons {
    margin-top: 5%;
    margin-bottom: 5%;
}
button{
  width: 30%;
    height: 50px;
    background-color: #00BCD4;
    border: none;
    border-radius: 5px;
    color: white;
    margin-left: 13%
}
.tishi {
    left: 25%;
    width: 50%;
    border-radius: 30px;
    height: 50px;
    top: 50%;
    line-height: 50px;
    position: fixed;
    display: none;
    z-index: 1000;
    color: red;
    font-size: 12px;
    background-color: #e0dad9;
    text-align: center;
}
.num img{
    width:20px;
}
.guanggao {
    padding: .3rem;
    background: #f4f4f4;
}
.guanggao h2 {
    color: #999;
    text-align: center;
    height: 1rem;
    line-height: 1rem;
    font-size: .3rem;
    position: relative;
    float: left;
}
.guanggao h2 span {
    width: 1rem;
    z-index: 1;
    background: #fbf5f5;
    position: absolute;
    top: 0.05rem;
    left: 100%;
    margin-left: 0rem;
}
.guanggao h2 i {
    border-bottom: 1px dashed #ddd;
    background: #f4f4f4;
    display: block;
    position: absolute;
    width: 100%;
    top: .3rem;
    z-index: 0;
}
.guanggao img {
    width: 100%;
}
    </style>
	</head>
	<body>
    <div class="tishi">
    </div>
		<div class="main">
        <div class="top">
            <img src="{{asset('/')}}index/vote/banner.png">
        </div>
        <div class="head">
            <div class="logo">
                <div class="pic"><img src="{{$data->photo}}"></div>
                <div class="name">{{$data->name}}</div></div>

            <div class="votes">票数：<span class="number">{{$data->votes}}</span><br>热度：<span class="number">{{$data->visitcounts}}</span></div>
            
        </div>

        <div class="gdmk">
            <div class="bt">
                <span class="line"></span> <span>自荐理由</span>
            </div>
            <div class="reason">
             {!!$data->reason!!}
            </div>
        </div>
       

        <div class="gdmk">
            <div class="bt">
                <span class="line"></span> <span>最近投票</span>
            </div>
           
        <div class="record">
            @foreach ($list as $i)
              <img src="{{$i->avatar}}">
             @endforeach

        </div>
    </div>
     <div class="tips">我正在参加2018-2019汽车服务行业财富金字塔“{{$data->awards}}”评选，请为我投票</div>
        <div class="buttons">
             <a  href="{{asset('/')}}vote/lists"><button>查看总榜</button></a>
             @if($data->is_enabled=='no')
              <button class="dark" onclick="vote(this,{{$data->id}})">暂不支持投票</button>
              @else
            <button class="{{$data->style}}" onclick="vote(this,{{$data->id}})">{{$data->tips}}</button>
            @endif
        </div>
    </div>
    @if($comments->count())
     @include('comments.list',['collections'=>$comments['root']])
    @else 
    暂时没有评论
    @endif
    
        <h3>留下您的评论</h3>
        @include('comments.form',['parentId'=>$post->id])
    <div class="guanggao">
            <h2>
                <span>广告</span>
                <i></i>
            </h2>
           <img>
        </div>
		 @include('layout.app')
		<script type="text/javascript" src="{{asset('/')}}index/vote/jquery-1.10.1.min.js"></script>
		<script type="text/javascript" src="{{asset('/')}}index/vote/mui.min.js"></script>
	    <script type="text/javascript" src="{{asset('/')}}index/vote/app.js"></script>
	
<script type="text/javascript">
window.onload=function(){
	
var num = GetRandomNum(1,3);
$(".guanggao img").attr("src","http://www.djcb123.cn/home/img/banner1.jpg")
}
function GetRandomNum(Min,Max)
{   
var Range = Max - Min;   
var Rand = Math.random();   
return(Min + Math.round(Rand * Range));   
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
     title: '{{$nickname}}祝贺 {{$data->name}}入围财富金字塔“{{$data->awards}}”奖项', // 分享标题
      desc: '2019年2月24日东莞·颁奖典礼，邀您共鉴荣耀时刻', // 分享描述
      link: 'http://www.djcb123.cn/vote/detail/{{$data->id}}', // 分享链接
      imgUrl: '{{$data->photo}}', // 分享图标
      type: '', // 分享类型,music、video或link，不填默认为link
      dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
      success: function () {
      
      },
      cancel: function () {
         alert("分享失败");
      }
  });

  wx.onMenuShareTimeline({
      title: '{{$nickname}}祝贺 {{$data->name}}入围财富金字塔“{{$data->awards}}”奖项', // 分享标题
      desc: '2019年2月24日东莞·颁奖典礼，邀您共鉴荣耀时刻', // 分享描述
      link: 'http://www.djcb123.cn/vote/detail/{{$data->id}}', // 分享链接
      imgUrl: '{{$data->photo}}', // 分享图标分享图标
      success: function () {
          
          
          
          
          
          
          
      },
      cancel: function () {
         alert("分享失败");
      }
  });

  });
</script>
<script type="text/javascript">
    
    url = '/vote/';
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    $(".icon-backs").click(function() {
        $("#wy_list_down").html("");
        $("#search-input").val("");
        $(".container").fadeIn("2000");
        $(".main").css("margin-top","320px"); 
    });
   
        $("#search-input").focus(function ()//得到教室时触发的时间 
        { 
         $("#wy_list_down").html("");
        $(".container").slideUp("5000");
        $(".main").css("margin-top","70px"); 
        }) 
        $("#search-input").blur(function () //失去焦点时触发的事件 
        { 
        var keyword=$("#search-input").val();
        get("","",keyword);
});





(function ($) {
    $.extend({
        tipsBox: function (options) {
            options = $.extend({
                obj: null,  //jq对象，要在那个html标签上显示
                str: "<img src='{{asset('/')}}index/vote/3.png'>+1",  //字符串，要显示的内容;也可以传一段html，如: "<b style='font-family:Microsoft YaHei;'>+1</b>"
                startSize: "12px",  //动画开始的文字大小
                endSize: "26px",    //动画结束的文字大小
                interval:600,  //动画时间间隔
                color: "red",    //文字颜色

                callback: function () { }    //回调函数
            }, options);
            $("body").append("<span class='num'>" + options.str + "</span>");
            var box = $(".num");
            var left = options.obj.offset().left + options.obj.width()/10;
            var top = options.obj.offset().top - options.obj.height();
            box.css({
                "position": "absolute",
                "left": left + "px",
                "top": top + "px",
                "z-index": 9999,
                "font-size": options.startSize,
                "line-height": options.endSize,
                "color": options.color
            });
            box.animate({
                "font-size": options.endSize,
                "opacity": "0",
                "top": top - parseInt(options.endSize) + "px"
            }, options.interval, function () {
                box.remove();
                options.callback();
            });
        }
    });
})(jQuery);
  
function niceIn(prop){
    prop.find('i').addClass('niceIn');
    setTimeout(function(){
        prop.find('i').removeClass('niceIn');   
    },1000);        
}
$(function () {
    $(".app_download_btn").click(function () {
        $.tipsBox({
            obj: $(this),
            str: "<img src='{{asset('/')}}index/vote/3.png'>+1",
            callback: function () {
            }
        });
        niceIn($(this));
    });
});





   function vote(obj,id) {
        var id =id;
        $.ajax({
            type: 'post',
            url: url+'vote/'+id,
            beforeSend: function () {
                // 禁用按钮防止重复提交
                $("#submit").attr({ disabled: "disabled" });
            },
            success: function (data) {
                if(data.status=='200'){
                var a=$(".number").html();
                $(obj).addClass("dark").html("已投票");
               // alert(a);
               var n=parseInt(a);
               $(".number").html(n+1);
               console.log(a);
                $.tipsBox({
                            obj: $(obj),
                            str: "<img src='{{asset('/')}}index/vote/"+Math.floor(Math.random() * 6 + 1)+".png'>+1",
                            callback: function () {
                            }
                        });
                        niceIn($(obj));

                    }else{
                        $(".tishi").html(data.msg).fadeIn(200).fadeOut(2000);
                    }


            },
            error: function (data, json, errorThrown) {
                console.log(data);
                var errors = data.responseJSON;
                var errorsHtml= '';
                $.each( errors, function( key, value ) {
                    errorsHtml += '<li>' + value[0] + '</li>';
                });
                toastr.error( errorsHtml , "Error " + data.status +': '+ errorThrown);
            }
        });
    };




</script>
</body></html>