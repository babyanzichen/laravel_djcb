<!DOCTYPE html>
<html data-dpr="1" style="font-size: 55.2px;"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		
	    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
	    <title>投票规则</title>
	    <link rel="stylesheet" type="text/css" href="{{asset('/')}}index/vote/ui.css">
	    <link href="{{asset('/')}}index/vote/mui.min.css" rel="stylesheet" type="text/css">
	    <link rel="stylesheet" href="{{asset('/')}}index/vote/dstyle.css" type="text/css">
	    <script type="text/javascript" src="https://res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
	</head>
	<style>
	p {
    line-height: 32px;
}
</style>
	<body class="mui-ios mui-ios-9 mui-ios-9-1" style="padding: 5%;">
<div style="text-align: center;padding: 5%;color: #FF5722;font-size: 16px;">{{$info->name}}</div>
{!!$info->content!!}
	 @include('layout.app')
</body>
</html>