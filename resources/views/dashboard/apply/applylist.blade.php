<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<link href="http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
<link href="{{ asset('/admins/css/cb.css') }}" type="text/css" rel="stylesheet">
<!-- HTML5 Shim 和 Respond.js 用于让 IE8 支持 HTML5元素和媒体查询 -->
<!-- 注意： 如果通过 file://  引入 Respond.js 文件，则该文件无法起效果 -->
<!--[if lt IE 9]><![endif]-->
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<link href="{{ asset('/admins/css/page.css') }}" type="text/css" rel="stylesheet">
<script type="text/javascript" src="{{ asset('/admins/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/admins/js/ajaxupload.js') }}"></script>
<script type="text/javascript">
$(function(){
    var button = $('#upload_button'), interval;
    var confirmdiv = $('#uploadphotoconfirm');
    var fileType = "pic",fileNum = "one"; 
    new AjaxUpload(button,{
        action: "{:U('Column/uppic')}",
        name: 'userfile',
        onSubmit : function(file, ext){
            if(fileType == "pic")
            {
                if (ext && /^(jpg|png|jpeg|gif|JPG)$/.test(ext)){
                    this.setData({
                        'info': '文件类型为图片'
                    });
                } else {
                     confirmdiv.text('文件格式错误，请上传格式为.png .jpg .jpeg 的图片');
                    return false;               
                }
            }
                        
            confirmdiv.text('文件上传中');
            
            if(fileNum == 'one')
                this.disable();
            
            interval = window.setInterval(function(){
                var text = confirmdiv.text();
                if (text.length < 14){
                    confirmdiv.text(text + '.');                    
                } else {
                    confirmdiv.text('文件上传中');             
                }
            }, 200);
        },
        onComplete: function(file, response){
            if(response != "success"){
                if(response =='2'){
                    confirmdiv.text("文件格式错误，请上传格式为.png .jpg .jpeg 的图片");
                }else{
                    if(response.length>40){
                        confirmdiv.text("文件上传失败请重新上传"+response);            
                    }else{
                        confirmdiv.text("上传完成");
                         $("#newbikephotoName").val("/Uploads/"+response);
                        $("#newbikephoto").attr("src","__PUBLIC__/Uploads/"+response);            
                    }
                }
                
            }
                                  
            window.clearInterval(interval);
                        
            this.enable();
            
            if(response == "success")
            alert('上传成功');              
        }
    });
});
</script>
<script type="text/javascript">
    var iMaxFilesize = 2097152; //2M <script type="text/javascript"> 
var arr = new  Array();
arr[0]=""
arr[1]="汽车座垫,汽车座套,后备箱垫,小精品,汽车脚垫" 
arr[2 ]="行车记录仪,智能后视镜,智能车机,GPS导航,空气净化器,安全预警仪,胎压监测,车载冷暖气" 
arr[3 ]="4S保养,防冻液,燃油宝,隔热膜,车蜡,镀晶,汽车车衣" 
arr[4 ]="外观改装,动力改装,进气系统,点火系统,排气系统,操控性改装,轮胎轮毂,ECU" 
arr[5 ]="自行式A型,自行式B型,自行式C型,拖挂式A型,拖挂式B型,拖挂式C型,拖挂式D型,移动房车" 
arr[6 ]="轮胎,机油,外侧脚踏板,雨刮器,发动机挡板,扶手箱,大灯总成" 

function init()
{
    var category2 = document.getElementById("category2");
    var category2Arr = arr[0].split(",");
    for(var i=0;i<category2Arr.length;i++)
    {
             category2[i]=new Option(category2Arr[i],category2Arr[i]);
    }
}

function getCategory2()
{    
    var pro = document.getElementById("category1");
    var category2 = document.getElementById("category2");
    var index = pro.selectedIndex;
    var category2Arr = arr[index].split(",");   
    
    category2.length = 0;
    //将城市数组中的值填充到城市下拉框中
    for(var i=0;i<category2Arr.length;i++)
    {
             category2[i]=new Option(category2Arr[i],category2Arr[i]);
         }
}
</script>
</head>

<body class="gray-bg">

<div class="md-content">

        <h6><span>栏目列表编辑</span></span></h6>
       
 <div>
  <p><a href="__MODULE__/brand/brandadd">点击此处添加栏目列表</a></p>

     <form class="form-horizontal" role="form">
       <div class="form-group">
          <label  class="col-sm-2 control-label">品牌名称</label>
          <div class="col-sm-10">
             <input type="text" class="form-control" id="firstname" 
                placeholder="请输入品牌名称">
          </div>
       </div>
       <div class="form-group">
          <label  class="col-sm-2 control-label">网店链接</label>
          <div class="col-sm-10">
             <input type="text" class="form-control" id="lastname" 
                placeholder="请输入网店链接">
          </div>
       </div>
        <div class="form-group">
          <label for="name">选择分类</label>
          <select class="form-control" id="category1" size=1 name="category1" onChange="getCategory2()">
            <option value=" ">请选择</option>
            <option value="精品车饰">精品车饰</option> 
            <option value="电子导航">电子导航</option> 
            <option value="美容养护" >美容养护</option> 
            <option value="汽车改装">汽车改装</option> 
            <option value="房车">房车</option> 
            <option value="大牌配件">大牌配件</option> 
          </select>
            
       </div>
       <div class="form-group">
           <select id="category2" name="category2"></select>  
       </div>
      
       <div class="form-group">
          <label  class="col-sm-2 control-label">自定义类目</label>
          <div class="col-sm-10">
             <input type="text" class="form-control" id="lastname" 
                placeholder="请输入自定义类目">
          </div>
       </div>
       <div class="form-group">
          <label  class="col-sm-2 control-label">公司名称</label>
          <div class="col-sm-10">
             <input type="text" class="form-control" id="lastname" 
                placeholder="请输入公司名称">
          </div>
       </div>
       <div class="form-group">
          <label  class="col-sm-2 control-label">联系人</label>
          <div class="col-sm-10">
             <input type="text" class="form-control" id="lastname" 
                placeholder="请输入联系人">
          </div>
       </div>
       <div class="form-group">
          <label  class="col-sm-2 control-label">电话号码</label>
          <div class="col-sm-10">
             <input type="text" class="form-control" id="lastname" 
                placeholder="请输入电话号码">
          </div>
       </div>
       <div class="form-group">
          <label  class="col-sm-2 control-label">品牌LOGO</label>            
          <label class="control-label" for="bike_type"> </label>
          <input style="display:none" id="newbikephotoName" name="bike_photo" value="" />
          <div>
            <div class="controls">
              <img  id="newbikephoto"/>
              <span class="help-inline"></span>
              <div id="uploadphotoconfirm"></div>
            </div>
            <div id="upload_button"><span>上传LOGO</span></div>  
            <div style="float:left;width:56%;font-size:1rem;">尺寸:100*100像素大小:2M以内
            </div>
          </div>
       </div>
       <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
             <button type="submit" class="btn btn-default">提交</button>
          </div>
       </div>
    </form>
      
  </div>
</div>

<div class="main">


 <div class="listtitle">点金车宝品牌链接列表</div>

 <div class="brandlist">


<table class="table table-hover">
   <caption> <a href="__MODULE__/brand/brandadd">添加品牌</a></caption>
   <thead>
      <tr>
           <th class="number">品牌编号</th>
           <th class="brandname">品牌名</th>
           <th class="shoplink">网店链接</th>
           <th class="category1">一级目录</th>
           <th class="category2">二级目录</th>
           <th class="categorys">自定义分类</th>
           <th class="companyname">公司名</th>
           <th class="connectname">联系人</th>
           <th class="telephone">电话号码</th>
           <th class="brandlogo">品牌logo</th>
           <th class="addtime">添加时间</th>
           <th>操作</th>
      </tr>
   </thead>
   <tbody>
      @foreach ($applylist as $item)
      <tr>
        <td>{{$item->id}}</td>
        <td>{{$item->brandname}}</td>
        <td>{{$item->shoplink}}</td>
        <td>{{$item->category1}}</td>
        <td><span>{{$item->category2}}</td>
        <td><span>{{$item->categorys}}</td>
        <td><span>{{$item->companyname}}</td>
        <td><span>{{$item->connectname}}</td>
        <td><span>{{$item->telephone}}</td>
        <td><img src="__ROOT__/public/{{$item->picpath}}"></td>
        <td>{{$item->addtime}}</td>
         <td><input type="button" value="编辑" onclick="edit({{$item->id}})"><input type="button" value="删除" onclick="del({$vo['id']})"></td>
        </tr>
       @endforeach
      <tr class="content">
                <!--<td colspan="3" bgcolor="#FFFFFF">&nbsp;{$page}</td>-->
        <td colspan="12" bgcolor="#FFFFFF">
          <div class="pages">
               {!! $applylist->render() !!}
          </div>
        </td>  
      </tr>
   </tbody>
</table>
    </div>
    </div>
    
    </body>
    <script type="text/javascript">
   function edit(id){
       $('.md-content').show();
       $.ajax ({
        type:"post",
        url:"__URL__/brandedit",
        data:{
          "id":id, 
      },
       
      success:function(data){
        var data=JSON.parse(data);
        //console.log(typeof data);
       // alert(data.id);
        $("input[name=brandname]").val(data.brandname);
        $("input[name=shoplink]").val(data.shoplink);
        $("select[name=category1]").val(data.category1);
        $("select[name=category2]").val(data.category2);
        $("input[name=categorys]").val(data.categorys);
        $("input[name=companyname]").val(data.companyname); 
        $("input[name=connectname]").val(data.connectname);
        $("input[name=telephone]").val(data.telephone); 
       $("#newbikephoto").attr("src","__ROOT__"/public/data.picpath);
      },
     
    });

   $(document).ready(function() {
   $(".tj").click(function(){
    console.log(1);
      var brandname= $("input[name=brandname]").val();
      var shoplink= $("input[name=shoplink]").val();
      var category1= $("select[name=category1]").val();
      var category2= $("select[name=category2]").val();
      var categorys= $("input[name=categorys]").val();
      var companyname= $("input[name=companyname]").val();
      var connectname= $("input[name=connectname]").val();
      var telephone= $("input[name=telephone]").val();
      var telephone= $("input[name=telephone]").val();
      var picpath= $("input[name=bike_photo]").val();
       $.ajax ({
        type:"post",
        url:"__URL__/editaction",
        data:{
         "id":id,
         "brandname":brandname,
         "shoplink":shoplink,
         "category1":category1,
         "category2":category2,
         "categorys":categorys,
         "companyname":companyname,
         "connectname":connectname,
         "telephone":telephone,
         "picpath":picpath,
      },
       
      success:function(data){
        alert("编辑成功");
        location.reload();
      },
    })

   })
   
   })
  }

    </script>

</html>