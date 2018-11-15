<!DOCTYPE html>
<html lang="en">
<head>
<meta name="_token" content="{!! csrf_token() !!}"/>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>表单提交</title>
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
<SCRIPT language=javascript> 
<!-- 
var subcat = new Array(); 
subcat[0] = new Array('1','汽车坐垫','1')
subcat[1] = new Array('1','汽车香水','2') 
subcat[2] = new Array('1','汽车脚垫','3')
subcat[3] = new Array('2','行车记录仪','1') 
subcat[4] = new Array('2','智能后视镜','2') 
subcat[5] = new Array('2','智能车机','3') 
subcat[6] = new Array('2','GPS导航','4') 
subcat[7] = new Array('2','安全预警仪','5') 
subcat[8] = new Array('2','胎压监测','6') 
subcat[9] = new Array('3','4S保养','1')
subcat[10] = new Array('3','空气净化器','2') 
subcat[11] = new Array('3','隔热膜','3')
subcat[12] = new Array('3','漆面养护','4') 
subcat[13] = new Array('4','外观改装','1') 
subcat[14] = new Array('4','动力改装','2') 
subcat[15] = new Array('5','轮胎','1') 
subcat[16] = new Array('5','机油','2') 
subcat[17] = new Array('5','雨刮器','3') 
subcat[18] = new Array('5','雨刮器','4') 
subcat[18] = new Array('6','移动房车','1') 
function changeselect1(locationid) 
{ 
document.frm.s2.length = 0; //初始化下拉列表 清空下拉数据 
document.frm.s2.options[0] = new Option('==请选择二级类目==',''); //给第一个值 
for (i=0; i<subcat.length; i++) //legth=20 
{ 
if (subcat[i][0] == locationid) //[0] [1] 第一列 第二列 
{document.frm.s2.options[document.frm.s2.length] = new Option(subcat[i][1], subcat[i][2]);} 
} 
}

//--> 
</SCRIPT>
</head>

<body style="background:#FFF;">
<div class="md-content">
        <h6><span>品牌链接添加</span></h6>
        <div>
        
          <form role="form" name="frm">
            <div class="form-group">
              <label for="name">品牌名称</label>
              <input type="text" name="brandname" class="form-control" placeholder="文本输入">
            </div>
            <div class="form-group">

             <div class="form">  
                      <h3>上传logo：</h3>  
      
                     
                              <input type="hidden" id="x" name="x" />  
                              <input type="hidden" id="y" name="y" />  
                              <input type="hidden" id="w" name="w" />  
                              <input type="hidden" id="h" name="h" />  
                              <input type="hidden" id="f" name="f" />  
      
                              <input id='upload' name="file_upload" type="button" value='上传' class='btn btn-large btn-primary'>  
                              <input type="button" name="btn" value="确认裁剪" class="btn" />  
      
                        
                         <div class="info"></div>  
                         <div class="pic-display"></div><div class="text-info"></div>  
      
                     </div>  





            </div>
            <div class="form-group">
              <label for="name">商城链接</label>
              <input type="text" class="form-control" name="shoplink" ></input>
            </div>
            <div class="form-group">
              <label for="name">一级类目</label>
              <select onchange=changeselect1(this.value) name=s1 class="form-control"> 
                   <option>==请选择一级类目==</option>
                    <OPTION value=1>精品车饰</OPTION>
                    <OPTION value=2>电子导航</OPTION>
                    <OPTION value=3>美容养护</OPTION>
                    <OPTION value=4>汽车改装</OPTION>
                    <OPTION value=5>大牌配件</OPTION>
                    <OPTION value=6>房车</OPTION>
                </select>
            </div>
           <div class="form-group">
              <label for="name">二级类目</label>
              <select name=s2 class="form-control">
                <OPTION selected>==请选择二级类目==</OPTION>
              </select> 

            </div>
           
          </form>
    
          <button class="tj">提交</button>
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
