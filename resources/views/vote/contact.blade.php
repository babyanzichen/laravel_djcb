<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title>联系我们</title>
        <link rel="stylesheet" type="text/css" href="{{asset('/')}}index/vote/ui.css">
	</head>

	<body>


<section class="135editor" style="position: static; box-sizing: border-box; border: 0px none; margin-top: 30%;padding: 0px;" data-id="85472" data-color="rgb(117, 117, 118)" data-custom="rgb(117, 117, 118)">
    <section style="border:none;margin: 5px;">
        <section style="color: rgb(117, 117, 118); font-size: 20px; text-align: center; margin: 0px auto -2px; border-bottom-width: 2px; border-bottom-style: solid; border-color: rgb(117, 117, 118); border-radius: 15px; padding: 5px 5px 15px;">
            <span class="135brush" data-brushtype="text" style="border-color: #757576; color: inherit; font-size: 18px; letter-spacing: 2px;"><p style="text-align:center">
                <span style="font-size: 16px;"><strong><span style="font-family: 宋体;">{{$about->title}}</span></strong></span>
            </p></span>
        </section>
    </section>
</section>
<div class="content" style="margin:5%">
<?php echo html_entity_decode(json_decode($info->content)->raw)  ?>
</div>

@include('layout.app')

	</body>
</html>