<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
         <meta name="_token" content="{!! csrf_token() !!}" />
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title>财富金字塔颁奖盛典</title>
         <script src="{{asset('/')}}index/vote/jquery-1.10.1.min.js" type="text/javascript"></script>
        <script src="{{asset('/')}}index/vote/CountDown.js" type="text/javascript"></script>
        <script type="text/javascript" src="https://res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
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
             title: '点金传媒邀请您关注2018-2019汽车服务行业财富金字塔颁奖盛典', // 分享标题
              desc: '2019年2月24日  东莞·广东现代国际会展中心', // 分享描述
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
              title: '点金传媒邀请您关注2018-2019汽车服务行业财富金字塔颁奖盛典', // 分享标题
              desc: '2019年2月24日  东莞·广东现代国际会展中心', // 分享描述
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
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}index/vote/ui.css">
    <style type="text/css">
        @media screen and (max-width:350px) and (orientation:portrait){
            .title {
                animation: fromBack 1s linear forwards;
                height: auto;
                min-height: 120px;
                border-radius: 20px;
                background-color: rgba(255, 255, 255, 0.76);
                filter: alpha(Opacity=80);
                -moz-opacity: 0.5;
                opacity: 0.5;
                background-size: 100%;
                z-index: 10;
                position: relative;
                box-shadow: 0 0 10px #ad7e59;
                width:100%;  
                top: -30px;
            }
            .tit {
                padding: 5%;
                position: relative;
                top:-20px;
                background-color: white;
                font-size: 14px;
            }
            .contents {
                       margin-top: -10px;
                        background-color: white;
                        height:1000px;
                        margin-bottom: 30px;
                    }
        }
        @media screen and (min-width:351px) and (max-width:400px){
        .title {
            animation: fromBack 1s linear forwards;
            height: auto;
            min-height: 120px;
            border-radius: 20px;
            background-color: rgba(255, 255, 255, 0.76);
            filter: alpha(Opacity=80);
            -moz-opacity: 0.5;
            opacity: 0.5;
            box-shadow: 0 0 10px #ad7e59;
            width:100%;
            z-index: 10;
           position: relative;
           top: -30px;
        }
        .tit {
            padding: 5%;
            position: relative;
            top:-20px;
            background-color: white;
        }
        .contents {
           margin-top: -10px;
            background-color: white;
            height:1000px;
            margin-bottom: 30px;
        }
    }

    @media screen and (min-width:401px) and (max-width:450px){
          .title {
            animation: fromBack 1s linear forwards;
            height: auto;
            min-height: 120px;
            border-radius: 20px;
            background-color: rgba(255, 255, 255, 0.76);
            filter: alpha(Opacity=80);
            -moz-opacity: 0.5;
            opacity: 0.5;
            z-index: 10;
            top: -30px;
            box-shadow: 0 0 10px #ad7e59;
            width: 100%;
            /* margin-left: 2.5%; */
            position: relative;
        }
        .tit {
        padding: 5%;
        position: relative;
        top:-20px;
        background-color: white;
        }
        .contents {
            margin-top: -10px;
            background-color: white;
            height:1000px;
            margin-bottom: 30px;
        }
    }

    @media screen and (min-width:451px) and (max-width:500px)
    {
    }

    @media screen and (min-width:501px)
    { 
     
        
    }

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
        body {
            font-family: 微软雅黑;
            background-color: #f3f1f1;
        }
        .top{
            z-index: 5;
        }
        .main .top img{
            width: 100%
        }
        .main .zs {
            float: left;
            width: 30%;
            margin-left: 3%;
            position: relative;
            text-align: center;
            margin-top: 10%;
            height:60px;
        }
        .num {
            color: #e5a700;
        }
        
        
        .tit a{
            color: #e5a700;
        }
       .tit1 {
            animation: fromBack 1s linear forwards;
            color: #b52727;
            height: 30px;
        }
        
       .gdmk {
            width: 100%;
            height: 210px;
            overflow: hidden;
            margin-bottom: 50px;
        }
        .gdmk .bt {
            width: 100%;
            height: 40px;
            line-height: 40px;
        }
        .gdmk .bt span {
            font-size: 16px;
            margin-left: 10px;
            font-weight: 600;
            font-family: "Droid Sans Fallback", "Microsoft YaHei",arial,serif,monospace;
        }
       .bt a {
            float: right;
            margin-right: 5%;
            color: #8a8a8a;
        }
        .gdmk ul {
            padding-bottom: 10px;
        }

        .list-unstyled {
            padding-left: 0;
            list-style: none;
        }
        .category-tags {
            display: block;
            overflow-y: hidden;
            overflow-x: scroll;
            -webkit-overflow-scrolling: touch;
            white-space: nowrap;
        }
       .category-tags::-webkit-scrollbar {
            display: none;
        }
        .list-unstyled {
            padding-left: 0;
            list-style: none;
        }

        ul, ol {
            margin-top: 0;
            margin-bottom: 10px;
        }

        ol, ul {
            list-style: none;
        }
        .category-tags .tbg {
            display: inline-block;
            margin-right: 20px;
        }

        li {
            list-style-type: none;
        }

        li {
            display: list-item;
            text-align: -webkit-match-parent;
        }
        .gdmk .xtbmk {
            width: 100px;
            height: 170px;
        }
       .gdmk .xtbmk .icon {
            width: 110px;
            height: 110px;
           
        }
         .line {
            left: 2%;
            position: relative;
            width: 3px;
            height: 40px;
            border: 3px solid #eab558;
            margin-right: 10px;
        }
        .gdmk .xtbmk .icon img {
            width: 110px;
            height: 110px;
            border-radius: 15px;
        }
        img {
            vertical-align: middle;
        }
        .gdmk .xtbmk .yxm {
            width: 100%;
            height: 30px;
            padding: 0 5px;
            font-size: 14px;
            line-height: 30px;
            text-align: center;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        .yxbq {
            width: 100%;
            height: 30px;
            border: 1px solid #FF9800;
            border-radius: 20px;
            padding: 0 5px;
            font-size: 12px;
            line-height: 30px;
            color: #FF9800;
            text-align: center;
        }
        .gdmk .xtbmk .yxbq span {
            margin: 0 2px;
        }
    .piao {
        position: relative;
        margin-top: -30px;
        color: white;
        width: 110%;
        height: 30px;
        padding: 0 5px;
        font-size: 14px;
        line-height: 30px;
        text-align: center;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        background-color: rgba(214, 129, 68, 0.88);
    }
    .num img{
    width:20px;
    }
    .dark{
        border: 1px solid #bfb9b9;
        color: black;
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
    </style>
    </head>
    <body>
        <div class="tishi">
        </div>
        <div class="main">
            <div class="top">
                <img src="{{asset('/')}}index/vote/topbanner.png">
            </div>
            <div class="title">
                <div class="zs">
                    <h3 class="num">
                         {{$data['regcount']}}
                    </h3>
                    <h3>
                        报名人数
                    </h3>
                </div>
                <div class="zs">
                    <h3 class="num">
                        {{$data['votecount']}}
                    </h3>
                    <h3>
                       投票人数
                    </h3>
                </div>
                <div class="zs">
                    <h3 class="num">
                        {{$data['visitcount']}}
                    </h3>
                    <h3>
                        访问量
                    </h3>
                </div>
            </div>
            <div class="tit">
                <h3 class="tit1">
                        <input type="hidden" name="countDown" data-prefix="" value="{{$voteInfo->time}}"> 

                        <span class="payment-time">
                            <span class="active-time">
                                <t class="time_prefix"></t>
                                <em class="time_d">379</em>天<em class="time_h">12</em>小时<em class="time_m">08</em>分<em class="time_s">53</em>秒
                                <t class="time_suffix"></t>
                            </span>
                        </span>
                    
                </h3>
                <h4>
                颁奖时间：  {{$voteInfo->hold_time}}
                </h4>
                <h4>
                盛典地址：{{$voteInfo->address}}
                </h4><a href="{{ asset('/vote/laws') }}">活动详细介绍&gt;&gt;</a>
            </div>
            <div class="contents">
                @foreach ($lists as $list)
                    
                    
                <div class="gdmk">
                    <div class="bt">
                       <span class="line"></span> <span>{{$list->name}}</span><a href="{{ asset('/vote/lists') }}">更多</a>
                    </div>
                    <ul class="list-unstyled category-tags">
                        @foreach ($list['award'] as $award)
                      @foreach ($award['register'] as $register)
                        <li class="tbg">
                           
                            <div class="xtbmk">
                                <a  href="{{asset('/')}}vote/detail/{{$register->id}}">
                                    <div class="icon">
                                        <img src="{{$register->photo}}">
                                    </div>
                                    <div class="piao"> {{$register->votes}}票</div>
                                    <div class="yxm">
                                        {{$register->name}}
                                    </div>
                                </a>
                                <div class="yxbq {{$register->style}}" onclick="vote(this,{{$register->id}})">
                                  {{$register->tips}}
                                </div>
                            </div>
                        </li>
                       
                         @endforeach
                 @endforeach
                    </ul>
                </div>
               
                 @endforeach
                

                
            </div>
        </div>
        
            @include('layout.app')
   <script type="text/javascript">
    $("input[name='countDown']").each(function () {
        var time_end=this.value;
        var con=$(this).next("span");
        var _=this.dataset;
        countDown(con,{
            title:_.title,//优先级最高,填充在prefix位置
            prefix:_.prefix,//前缀部分
            suffix:_.suffix,//后缀部分
            time_end:time_end//要到达的时间
        })
        //提供3个事件分别为:启动,重启,停止
        .on("countDownStarted countDownRestarted  countDownEnded ",function (arguments) {
            console.info(arguments);
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
                var a=$(obj).parent().find(".piao").html();
                $(obj).addClass("dark").html("已投票");
               // alert(a);
               var n=parseInt(a);
               $(obj).parent().find(".piao").html(n+1+"票");
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
    </body>
</html>