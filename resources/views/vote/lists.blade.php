<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="_token" content="{!! csrf_token() !!}" />
        <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, width=device-width">
        <meta content="yes" name="apple-mobile-web-app-capable">
        <meta content="black" name="apple-mobile-web-app-status-bar-style">
        <meta content="telephone=no" name="format-detection">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <link rel="stylesheet" type="text/css" href="{{asset('/')}}index/vote/ui.css">
        <title>
            参评列表——财富金字塔颁奖盛典
        </title>
        <script src="{{asset('/')}}index/vote/jquery-1.10.1.min.js" type="text/javascript">
</script>
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
     title: '我在参加汽车服务行业“财富金字塔”颁奖盛典', // 分享标题
      desc: '2019年2月24日 东莞·广东现代国际展览中心邀您共鉴荣耀时刻', // 分享描述
      link: 'http://www.djcb123.cn/vote/lists', // 分享链接
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
      desc: '2017年11月18日  广州长隆酒店国际会展中心', // 分享描述
      link: 'http://www.djcb123.cn/vote/lists', // 分享链接
      imgUrl: 'http://www.djcb123.cn/index/vote/paramid.jpg', // 分享图标
      success: function () {
          
          
          
          
          
          
          
      },
      cancel: function () {
         alert("分享失败");
      }
  });

  });
</script>
        <style type="text/css">
body{
            background-color: #e9eae7;
        }
       .container {
    width: 100%;
    overflow: inherit;
    color: black !important;
    height:310px;
    background-color: white;
    margin-top: 50px;
}
        .container .nav
        {
        width: 100%;
        height: 40px;
        }

.container .nav span {
    display: block;
    width:90%;
    text-align: center;
   height:40px;
    float: left;
    cursor: pointer;
    font-size: 12px;
    margin-left: 5%;
}
        .container .nav  .active {
        border-bottom: 1px solid rgb(213,146,4);
        color: rgb(213,146,4);
        }
      .content {
    width: 100%;
    height:120px;
    top: -3px;
    position: relative;
    min-height: 50px;
    overflow: hidden;
}
        /*定位一般设置为relative，overflow设置为hidden来隐藏外面的内容*/ 
        .content .box
        {
        position: absolute;
        width: 100%;
        overflow: hidden;
        }
        /*这个定位设置为absolute,因为要操作这个的位置来切换内容*/ 
.content ul {
    height: 180px;
    float: left;
    margin-top: 10px;
    width: 25%;
    overflow-x: hidden;
  
}
.content ul li {
    height: 30px;
    font-size:15px;
    width:90%;
    float: left;
    border: 1px solid #aaa;
    text-align: center;
    margin-left: 2.5%;
    margin-right: 2.5%;
    margin-top: 10px;
    position: relative;
    border-radius: 15px;
    line-height: 30px;
}
.content ul .active {
    color: #FF9800;
   
    border: 1px solid #FF9800;
}
       
.main {
    margin-top: 360px;
    padding: 1%;
    background-color: white;
}
        .head{
        	height: 50px;
        }
        .thead{
        	height: 50px;
    border-bottom: 1px solid #d2d0d0;
        }
   .thead .tit {
    text-align: center;
    /* padding: 2%; */
    float: left;
}
        .so{
            float: right;
        }
        .so img {
    width: 20px;
    padding-top: 10%;
        }
      .tips {
    font-size: 22px;
    z-index: 1;
    position: absolute;
}
     #wy_list_down {
    border-bottom: 1px solid #CCCCCC;
}
.wy_list_down {
    height: 110px;
    padding-top: .8rem;
    border-bottom: 1px solid #E3E3E3;
}
.list_main {
   
    float: left;
    text-align: center;
   
}
.list_main h6 {
    line-height: 80px;
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
}
.piao {
   
    float: left;
    text-align: center;
    line-height: 90px;
}
 .game_list {
    display: inline-block;
    margin-left: 3px;
}
.list_left {
    display: inline-block;
    text-align: center;
    float: left;
    line-height: 90px;
    margin-top: 2%;
}
.left {
   
    float: left;
    line-height: 90px;
    text-align: center;
}
.rank {
    width:30px;
    height:30px;
    border-radius: 25px;
    background-color: #d2cdd2;
    text-align: center;
    margin-top:45%;
    line-height: 20px;
    display: inline-block;
    padding-top: 3px;
}
a {
    color: #428bca;
    text-decoration: none;
}
.list_left  img {
    width: 70px;
    height: 70px;
    vertical-align: middle;
    border-radius: 8px;
}
 
 h4 {
    color: #97969e;
    font-size: 18px;
}
 .hq {
  
    color: #aaa;
}
  .nav p {
   
    font-size:18px;
}
p {
    color: #000;
    font-size:14px;
}
 .delete {
    display: inline-block;
    float: right;
    height: 60px;
    box-sizing: border-box;
   
}
.aui-title-input input {
    background: rgba(255, 255, 255, 0.7);
    height: 32px;
    width: 100%;
    padding-left: 4px;
    border-radius: 16px;
    font-size: 12px;
    color: #666;
}
.app_download_btn {
    width:80%;
    text-align: center;
    padding: 2px 5px;
    border: solid 1px #FFA726;
    border-radius: 20px;
    font-size: 14px;
    color: #FF9800;
    text-decoration: none;
    float: right;
    /* margin-right: 5px; */
    margin-top:25%;
}
.bg {
    font-size: 22px;
    color: #f3ddd1;
    top: 10px;
    left: 20px;
    position: relative;
}
.grade1 {
    background-image: url(http://www.djcb123.cn/index/vote/r1.png);
    background-size: 100% 100%;
    background-repeat: no-repeat;
    background-color: white;
    border-radius: 0;
}
.grade2 {
    background-image: url(http://www.djcb123.cn/index/vote/r2.png);
    background-size: 100% 100%;
    background-repeat: no-repeat;
    background-color: white;
    border-radius: 0;
}
.grade3 {
    background-image: url(http://www.djcb123.cn/index/vote/r3.png);
    background-size: 100% 100%;
    background-repeat: no-repeat;
    background-color: white;
    border-radius: 0;
}
.num img{
	width:20px;
}
.a1{
	width:10%;
}
.a2{
	width:20%;
}
.a3{
	width:20%;
}
.a4{
	width:20%;
}
.a5{
	width:30%;
}
        </style>
        <script type="text/javascript">
$(function() {

                //var width = 1001; //跟外面盒子的宽度一样，或者写成 
                var width = $(".content").width();
                var ulNum = $(".content ul").length; //获取ul的个数
                var contentWidth = width * ulNum; //获取整个box应该的长度，刚开始box设置成了1100，但是应该把所有的ul防到一行里面去，这样box向左移动的时候才是无缝滚动
                $(".box").width(contentWidth); //给box设置宽度  .width() 是获取宽度  .width(value)是设置宽度
                $(".nav span").click(function() {

                    //$(this)表示点击的这个元素 ，.addClass()表示添加的样式名称，.siblings()表示这个元素的所有兄弟级元素，此处表示span，
                    // .removeClass()表示删除的样式名称
                    $('p').removeClass('active');
                    $(this).children('p').addClass('active');

                    var clickNum = $(this).index(); //判断点击的是第几个span .index()方法返回第几个，从0开始算起
                    //alert(clickNum);
                    var moveLeft = clickNum * width * -1; //应该向左移动的距离
                    $(".box").animate({
                        'left': moveLeft
                    },
                    600); //通过操作box的left来使box向左移动， .animate 是动画函数
                    //第一个参数用{}包含起来，里面的内容形式为 {'left':100,'top':100}，多个用逗号隔开，
                    // 表示从当前位置移动到left为100px、top为100px的位置（即left:100px;top:100px处），
                    //第二个参数为时间，表示从当前位置移动到第一个参数用时，单位为ms，1000ms=1秒
                    //点击的时候一定要点开审查元素，查看box元素的行内样式
                })

            });
        </script>
    </head>
    		<style>  
.spinner {
    background-color: #ffffff;
    margin: 0px auto 0;
    padding-top:50px;
    width: 100%;
    text-align: center;
    z-index: 1001;
    position: absolute;
    height: 400px;
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
.hide{
	transform: scale(0.5,0.5);
    -webkit-transform: scale(0.5,0);
    -o-transform: scale(0.5,0.5);
    transition: all 1s;
    -webkit-transition: all 1s;
    -o-transition: all 1s;
    opacity: 1;
    z-index: 1;
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

    <body style="">
    	 <div class="tishi">
        </div>
        <div class="container">
            <div class="nav">
                @foreach($cateList as $clist)
                    <span ><p class="">{{$clist->name}}</p></span>   
                @endforeach
            </div>
            <div class="content">
                <div class="box" style="width: 5505px; left: 0px;">
                    <ul>
                        @foreach($awardList as $alist)
                         @if($alist->category_id=='5')
                        <li class="" onclick="get({{$alist->id}})">{{$alist->name}}
                        </li>
                        @endif
                        @endforeach
                    </ul>
                    
                    <ul>
                         @foreach($awardList as $alist)
                         @if($alist->category_id=='6')
                         <li onclick="get({{$alist->id}})">{{$alist->name}}</li>
                         @endif
                         @endforeach
                    </ul>
                    <ul>
                        @foreach($awardList as $alist)
                        @if($alist->category_id=='7')
                        <li onclick="get({{$alist->id}})">{{$alist->name}}
                        </li>
                        @endif
                        @endforeach
                    </ul>
                    <ul>
                         @foreach($awardList as $alist)
                        @if($alist->category_id=='8')
                        <li onclick="get({{$alist->id}})">{{$alist->name}}
                        </li>
                        @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="header">
			<div class="aui-header-bg" style="background:tan;"></div>
			<div class="toolbar statusbar-padding" style="min-height:50px">
				<button class="bar-button back-button"><i class="icon icon-backs"></i></button>
				<div class="header-title" style="height:50px; padding:0 50px">
					<div class="title aui-title-input"><input id="search-input" type="text" placeholder="财富金字塔"></div>
				</div>
				<a>
					<button class="icon aui-icon-mag"></button>
				</a>
			</div>
		</div>
        <div class="main">
            <div class="head">
                <span class="tips">排行榜</span>
                <span class="bg">LEADERBOARD</span>
            </div>
            <div class="thead">
            	<div class="tit a1">排名</div>
            	<div class="tit a2">照片</div>
            	<div class="tit a3">名称</div>
            	<div class="tit a4">票数</div>
            	<div class="tit a5"></div>
            </div>
            <div id="wy_list_down">
            	
               




                </div>
                
                
        </div>@include('layout.app')
        <div class="demo"></div>
    </body>
    
<script type="text/javascript">
	 $("ul li").click(function() {
        //$(this)表示点击的这个元素 ，.addClass()表示添加的样式名称，.siblings()表示这个元素的所有兄弟级元素，此处表示span，
                    // .removeClass()表示删除的样式名称
        $(this).addClass('active').siblings().removeClass('active');
    });
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
            timeout: 5000,  
		    beforeSend: function () {
		        // 禁用按钮防止重复提交
		        $("#submit").attr({ disabled: "disabled" });
		    },
            success: function (data) {
                if(data.status=='200'){
                var a=$(obj).parent().prev().children(".piao").children().html();
                $(obj).addClass("dark").html("已投票");
                //alert(a);
               var n=parseInt(a);
               $(obj).parent().prev().children(".piao").children().html(n+1);
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
            },
             complete: function (XMLHttpRequest,status) {
                if(status == 'timeout') {
                    xhr.abort();    // 超时后中断请求
                    $.alert("网络超时，请刷新", function () {
                        location.reload();
                    })
                }
            }
        });
    };

	window.onload=function(){
	  get(62);
      $('.nav').children(':first').addClass('active');
      $('.box ul').children(':first').addClass('active');
	}





    function get(award_id,keyword) {
    
        if($('#search-input').val() != '') {
           var data = {
           keyword:keyword,
        };
           // var type = "POST"; // add
        }
        else {
           var data = {
           award_id: award_id,
        };
           // var type = "PUT"; // edit
        }
        
        $.ajax({
            type: 'GET',
            url: url+'get',
            data: data,
            dataType: 'json',
            timeout: 5000,
            beforeSend: function () {
		        // 禁用按钮防止重复提交
		         var str = '<div class="spinner"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div><h2>请求数据中，请稍候......</h2></div>';
		         $('#wy_list_down').html(str);
		    },
            success: function (data) {
                console.log(data);
                 var str ='';
                if(data.status==200){
                    for (var i=0,len=data.lists.length; i<len; i++)
                    {
                        console.log(len);
                    str+='<div class="wy_list_down"><div class="left a1"><span class="rank grade'+(i+0+1)+'">'+(i+0+1)+'</span></div> <a  href="{{asset('/')}}vote/detail/'+data.lists[i]['id']+'"><div class="list_left a2"><img src="'+data.lists[i]['photo']+'" alt=""></div><div class="list_main a3"><h6>'+data.lists[i]['name']+'</h6></div><div class="piao a4"><h4 class="hq">'+data.lists[i]['votes']+'</h4></div></a><div class="delete a5"><div  onclick="vote(this,'+data.lists[i]['id']+')"class="app_download_btn '+data.lists[i]['style']+'"><i></i>'+data.lists[i]['tips']+'</div></div></div>';
                    //document.write(cars[i] + "<br>");
                    }
                }else{
                    str=data.msg;
                }
               
                
                //$('#taskModal').modal('hide');
                //$('#task').trigger('reset');
                
                    console.log(str);
                   $('#wy_list_down').html(str);
               /* if(type == 'POST') {
                    $('#task-list').append(task);
                    toastr.success('添加成功！');
                }
                else { // edit
                    $('#task'+data.id).replaceWith(task);
                    toastr.success('编辑成功！');
                }*/
            },
            error: function (data, json, errorThrown) {
                console.log(data);
                var errors = data.responseJSON;
                var errorsHtml= '';
                $.each( errors, function( key, value ) {
                    errorsHtml += '<li>' + value[0] + '</li>';
                });
                toastr.error( errorsHtml , "Error " + data.status +': '+ errorThrown);
            },
             complete: function (XMLHttpRequest,status) {
                if(status == 'timeout') {
                    xhr.abort();    // 超时后中断请求
                    $.alert("网络超时，请刷新", function () {
                        location.reload();
                    })
                }
            }
        });
    }

</script>
</html>