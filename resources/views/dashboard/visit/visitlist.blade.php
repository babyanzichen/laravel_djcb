<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>表单提交</title>

<!-- Bootstrap Core CSS -->
<link href="{{ asset('/')}}admins/sbadmin/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body style="background:#FFF;">

<table class="table table-hover">
   <caption>点金车宝访客列表</caption>
   <thead>
      <tr> 
      <th class="companys">编号</th>
      <th class="companys">访客ip</th>
      <th>访客地址</th>
      <th>访问时间</th>   
      </tr>
   </thead>
   <tbody>
      
     
      @foreach ($visitlist as $visit)
    
      <tr>
         <td> {{$visit->id}}</td>
        
         <td> {{$visit->visitip}}</td>
         <td> {{$visit->addr}}</td>
         <td>{{$visit->visittime}}</td>
          <td><button onclick="edit({$companylist.id})">信息审核</button> </td>
      </tr>
      @endforeach 
     <tr class="content">
                <!--<td colspan="3" bgcolor="#FFFFFF">&nbsp;{$page}</td>-->
                <td colspan="7" bgcolor="#FFFFFF" style="text-align:center">
                <div class="pages">
                       {!! $visitlist->render() !!}
                </div>
                </td>  
                </tr>
   </tbody>
   
</table>

           


  


<!-- jQuery --> 
<script src="{{ asset('/')}}admins/sbadmin/bower_components/jquery/dist/jquery.min.js"></script> 

<!-- Bootstrap Core JavaScript --> 
<script src="{{ asset('/')}}admins/sbadmin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script> 

<!-- Metis Menu Plugin JavaScript --> 
<script src="{{ asset('/')}}admins/sbadmin/bower_components/metisMenu/dist/metisMenu.min.js"></script> 

<!-- Custom Theme JavaScript --> 
<script src="{{ asset('/')}}admins/sbadmin/dist/js/sb-admin-2.js"></script>
<!--左边菜单控制切换右侧内容js-->
    <script>
        $(document).ready(function (e) {
            $("#li_index").click();

            $(".menuc").click(function () {
                var url = $(this).attr("url");
                $("#iframecon").attr("src", url);
            });


        });
    </script>
    <!--iframe自适应内容高度js-->
    <script type="text/javascript" language="javascript">
        function iFrameHeight() {
            var ifm = document.getElementById("iframecon");
            var subWeb = document.frames ? document.frames["iframepage"].document :
ifm.contentDocument;
            if (ifm != null && subWeb != null) {
                ifm.height = subWeb.body.scrollHeight;
            }
        }

    </script>

</body>
</html>
