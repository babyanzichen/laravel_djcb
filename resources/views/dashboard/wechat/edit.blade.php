<!DOCTYPE html>
<html lang="en">
<head>
<meta name="_token" content="{!! csrf_token() !!}"/>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>公众号自定义菜单添加</title>
<!-- jQuery --> 
<script src="{{ asset('/')}}admins/sbadmin/bower_components/jquery/dist/jquery.min.js"></script> 
<!-- Bootstrap Core JavaScript --> 
<script src="{{ asset('/')}}admins/sbadmin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script> 

<!-- Metis Menu Plugin JavaScript --> 
<script src="{{ asset('/')}}admins/sbadmin/bower_components/metisMenu/dist/metisMenu.min.js"></script> 

<!-- Custom Theme JavaScript --> 
<script src="{{ asset('/')}}admins/sbadmin/dist/js/sb-admin-2.js"></script>
<script src="{{ asset('/')}}admins/js/ajaxupload.js" ></script>
<script src="{{ asset('/')}}admins/js/jquery.Jcrop.min.js" ></script>
<link src="{{ asset('/')}}admins/css/index.css" rel="stylesheet">
<link src="{{ asset('/')}}admins/css/jquery.Jcrop.css" rel="stylesheet">
<link href="{{ asset('/')}}admins/css/brand.css" rel="stylesheet">
<!-- Bootstrap Core CSS -->
<link href="{{ asset('/')}}admins/sbadmin/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body style="background:#FFF;">
<div class="md-content">
        <h6><span>公众号自定义菜单添加</span></h6>
        <div>
        
          <form role="form" name="frm">
            <div class="form-group">
              <label for="name">请在此粘贴菜单配置json文件</label>
              <textarea class="form-control" rows="20"></textarea>
            </div>
            
            
           
           
          </form>
    
          <button type="button" class="btn btn-primary btn-lg btn-block">确定提交</button>
        </div>
      </div>
<div>





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
    <script type="text/javascript">
   
   $(document).ready(function() {
   $(".tj").click(function(){
    //console.log(1);
      var token = $('meta[name="_token"]').attr('content');
      var brandname= $("input[name=brandname]").val();
      var brandlogo= $("input[name=f]").val();
      var shoplink= $("input[name=shoplink]").val();
      var category1= $("select[name=s1]").val();
      var category2= $("select[name=s2]").val();
    
       $.ajax ({
        type:"post",
        url:"{{ url('admin/addaction') }}",
        data:{
        
         "brandname":brandname,
         "brandlogo":brandlogo,
         "shoplink":shoplink,
         "category1":category1,
         "category2":category2,
         "_token": token
      },
       
      success:function(data){
        alert("编辑成功");
        location.reload();
      },
    })

   })
   
   })
  

    </script>
   <script type="text/javascript">  
       var token = $('meta[name="_token"]').attr('content');  
       var g_oJCrop = null;  
                            //异步上传文件  
        new AjaxUpload("#upload", {  
        action:"{{ url('admin/upload') }}",  
         type:"post",  
         name:'myfile',  
         data: {"_token": token},  
         onSubmit: function(file, ext) {  
              if($(".text-info img").length>0){  
              $(".info").html("<div style='color:#E3583B;margin:5px;'>文件已经裁剪过！</div>");return false;  
               }  
                $(".info").html("<div style='color:#008000;margin:5px;'>上传中...</div>");  
               },  
               onComplete: function(file, response) {  
              if(g_oJCrop!=null){g_oJCrop.destroy();}  
                                           //生成元素  
               $(".pic-display").html("<div class='thum'><img id='target' src='"+response+"'/></div>");  
      
                //初始化裁剪区  
                $('#target').Jcrop({  
                onChange: updatePreview,  
                onSelect: updatePreview,  
                aspectRatio: 1  
                },function(){  
                 g_oJCrop = this;  
      
                 var bounds = g_oJCrop.getBounds();  
                   var x1,y1,x2,y2;  
                   if(bounds[0]/bounds[1] > 150/150)  
                    {  
                    y1 = 0;  
                    y2 = bounds[1];  
                    x1 = (bounds[0] - 150 * bounds[1]/150)/2;  
                    x2 = bounds[0]-x1;  
                    }  
                    else  
                    {  
                      x1 = 0;  
                      x2 = bounds[0];  
      
                      y1 = (bounds[1] - 150 * bounds[0]/150)/2;  
                      y2 = bounds[1]-y1;  
                      }  
                       g_oJCrop.setSelect([x1,y1,x2,y2]);  
      
                                           //顺便插入略缩图  
                       $(".jcrop-holder").append("<div id='preview-pane'><div class='preview-container'><img  class='jcrop-preview' src='"+response+"' /></div></div>");  
      
                                          });  
                                           //传递参数上传  
                        $("#f").val(response);  
      
                                           //更新提示信息  
                        $(".info").html("<div style='color:#008000;margin:5px;'>准备裁剪。。。</div>");  
      
              }  
       });  
      
                            //更新裁剪图片信息  
                function updatePreview(c) {  
                  if (parseInt(c.w) > 0){  
                    $('#x').val(c.x);  
                    $('#y').val(c.y);  
                    $('#w').val(c.w);  
                    $('#h').val(c.h);  
                    var bounds = g_oJCrop.getBounds();  
                    var rx = 150 / c.w;  
                    var ry = 150 / c.h;  
                    $('.preview-container img').css({  
                    width: Math.round(rx * bounds[0]) + 'px',  
                    height: Math.round(ry * bounds[1]) + 'px',  
                    marginLeft: '-' + Math.round(rx * c.x) + 'px',  
                    marginTop: '-' + Math.round(ry * c.y) + 'px'  
                  });  
                 }  
               }  
      
      
                                //表单异步提交后台裁剪  
        $("input[name=btn]").click( function(){  
        var w=parseInt($("#w").val());  
        if(!w){  
           w=0;  
          }  
          if(w>0){  
           $.post("{{ url('admin/cutPic') }}",{'_token': token,'x':$("input[name=x]").val(),'y':$("input[name=y]").val(),'w':$("input[name=w]").val(),'h':$("input[name=h]").val(),'f':$("input[name=f]").val()},function(data){  
            if(data.status==1){  
            $(".pic-display").remove();  
             $(".info").html("<div style='color:#008000;margin:10px 5px;'>裁剪成功!</div>")  
              $(".text-info").html("<img src='"+data.data+"'>");  
              $("input[name=btn]").hide();  
        }  
      
           },'json');  
         }else{  
       $(".info").html("<div style='color:#E3583B;margin:5px;'>亲！还没有选择裁剪区域哦！</div>");  
      }  
         });  
      
  </script>  
    </body>  
</html>
