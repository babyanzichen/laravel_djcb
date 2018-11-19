<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8" />
        <title>2018-2019年度汽车服务行业财富金字塔颁奖盛典报名</title>
        <meta name="_token" content="{!! csrf_token() !!}" />
        <meta name="renderer" content="webkit" />
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
        <link rel="stylesheet" href="{{asset('/')}}index/vote/layui/css/layui.css" media="all" />
        <link rel="stylesheet" type="text/css" href="{{asset('/')}}index/vote/ui.css?v=323" />
         
        <script type="text/javascript" src="https://res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
        <!-- 注意：如果你直接复制所有代码到本地，上述css路径需要改成你本地的-->
       
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
        desc: '2019年2月24日 东莞·广东现代国际展览中心邀您共鉴荣耀时刻', // 分享描述
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
        
    </head>
    
    <body>
<style>
@media screen and (max-width:350px) and (orientation:portrait)
{
  .layui-input-block
  {
    margin-left: 5px;
    min-height: 36px;
    width: 65%;
    float: left;
  }

  .container
  {
    width: 100%;
    top: 200px;
     height: 1000px;
    margin: 50px auto 0;
    overflow: inherit;
    color: #fff !important;
  }

  .tips
  {
    font-size: 12px;
  }
}

@media screen and (min-width:351px) and (max-width:400px)
{
  .layui-input-block
  {
    margin-left: 5px;
    min-height: 36px;
    width: 68%;
    float: left;
  }

  .container
  {
    width: 100%;
    position: relative;
     height: 1000px;
    margin: 10px auto 0;
    overflow: inherit;
    color: #fff !important;
  }

  .tips
  {
    font-size: 14px;
  }
}

@media screen and (min-width:401px) and (max-width:450px)
{
  .layui-input-block
  {
    margin-left: 5px;
    min-height: 36px;
    width: 74%;
    float: left;
  }

  .container
  {
    width: 100%;
    height: 1000px;
    top: 350px;
    margin: 50px auto 0;
    overflow: inherit;
    color: #fff !important;
  }

  .tips
  {
    font-size: 16px;
  }
}

@media screen and (min-width:451px) and (max-width:500px)
{
}

@media screen and (min-width:501px)
{ 
  .container{
      margin-top: 1350px;
      margin-left: 15%;
  }
    
}

*
{
  padding: 0;
  margin: 0
}

body
{
  background: #000;
  font-family: 微软雅黑;
}

.top img
{
  width: 100%
}

.container .nav
{
  width: 100%;
  border: 1px solid #311e00;
  height: 40px;
}

.container .nav span
{
  display: block;
  width: 30%;
  border: 1px solid #311e00;
  text-align: center;
  line-height: 40px;
  color: rgb(213,146,4);
  float: left;
  cursor: pointer;
}

.container .nav span.active
{
  background: rgb(213,146,4);
  color: #fff;
  width: 40%;
}

.content
{
  border: 2px solid #b97c02;
  width: 100%;
  top: -3px;
  position: relative;
  min-height: 860px;
  margin-bottom:100px;
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
.content ul
{
  float: left;
  margin-top: 10px;
  width: 33.3%;
}

.content ul li
{
  display: block;
  height: 198px;
  width: 219px;
  float: left;
  border: 1px solid #aaa;
  text-align: center;
  line-height: 218px;
}

.content ul li+li
{
  margin-left: -1px;
}

.layui-form-select dl
{
  width: 100%;
}

.layui-form-select .layui-select-group dd
{
  padding-left: 0px;
  color: black;
  font-size: 12px;
}

.layui-form-select dl
{
  width: 130%;
  left: -70px;
}

.layui-upload-img
{
  width: 30%;
  float: left;
  margin-left: 5%;
}

.layui-field-title
{
          /* margin: 10px 0 20px; */
  border: none;
  float: left;
}

.tips
{
  text-align: initial;
  height: 500px;
  padding: 3%;
}

button
{
  border: none;
  margin: 10px;
  background-color: rgb(213,146,4)!important;
}

#button1
{
  background-color: #de7113;
  width: 100%;
  color: white;
  height: 40px;
  font-size: 20px;
  border-radius: 10px;
}

#button2
{
  background-color: #ffffff;
  width: 100%;
  color: #bb7238;
  height: 40px;
  font-size: 20px;
  border-radius: 10px;
}

.layui-form-label
{
  float: left;
  display: block;
  padding: 5px 5px;
  width: 90px;
}
</style>
        <div class="top">
            <img src="{{asset('/')}}index/vote/banner.png" />
        </div>
        <div class="container">
            <div class="nav">
                <span class="active">企业奖</span>
                <span class="">人物奖</span>
                <span class="">项目奖</span></div>
            <div class="content">
                <div class="box" style="width: 5505px; left: 0px;">
                    <ul>
                        <form class="layui-form"  style="width: 95%;padding-top:10px;padding-bottom: 10px;" id="form1">
                            <div class="layui-form-item">
                                <label class="layui-form-label">公司全称
                                    <font style="color:red">*</font></label>
                                <div class="layui-input-block">
                                    <input type="text" name="companyname" lay-verify="title" autocomplete="off" placeholder="请输入公司全称" class="layui-input" /></div>
                            </div>
                            <div class="layui-form-item layui-form-text">
                                <label class="layui-form-label"></label>
                                <div class="layui-input-block">
                                    <textarea name="reason" placeholder="自荐理由" class="layui-textarea"></textarea>
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">品牌名称
                                    <font style="color:red">*</font></label>
                                <div class="layui-input-block">
                                    <input type="text" name="brandname"  placeholder="请输入品牌名称" autocomplete="off" class="layui-input" /></div>
                            </div>

                             <div class="layui-form-item">
                                <label class="layui-form-label">logo
                                    <font style="color:red">*</font></label>
                                 <div class="layui-upload" style="margin:5%">
                               
                                <div class="layui-upload-list">
                                    <img class="layui-upload-img"  id="demo1" src="{{asset('/')}}index/vote/nopic.png"/>
                                      <input type="text" value="" id="logo1" style="display:none;"
                                    name="logo">
                                    <p id="demoText1"></p>
                                     <button style="width:30%" type="button" class="layui-btn" id="test1">上传图片</button>
                                </div>
                            </div>
                            </div>



                            
                            <div class="layui-form-item">
                                <label class="layui-form-label">联系方式
                                    <font style="color:red">*</font></label>
                                <div class="layui-input-block">
                                    <input type="tel" name="phone" lay-verify="phone" autocomplete="off" placeholder="请输入联系方式" class="layui-input" /></div>
                            </div>
                            <div class="layui-form-item">
                                <div class="layui-inline">
                                    <label class="layui-form-label">申报奖项
                                        <font style="color:red">*</font></label>
                                    <div class="layui-input-block">
                                        <select name="award_id">
                                            <option value="">请选择想要参评奖项</option>
                                         <!--   <optgroup label="十大年度大奖">
                                                <option value="2017-2018十大年度品牌奖">2017-2018十大年度品牌奖</option>
                                                <option value="2017-2018十大年度营销奖">2017-2018十大年度营销奖</option>
                                                <option value="2017-2018十大年度创新奖">2017-2018十大年度创新奖</option></optgroup>-->
                                                @foreach($awardCategory as $category)
                                               @if($category->id=="7")
                                                <optgroup label="{{$category->name}}">
                                                  @foreach($category->award as $award)
                                                   <option value="{{$award->id}}">{{$award->name}}</option>
                                                   @endforeach
                                                </optgroup>
                                                @endif
                                              @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <button class="layui-btn"  lay-filter="demo1">申请报名</button></div>
                        </form>
                         {!!$info->tips!!}
                        <!--数量自己定义,只要总宽度跟content的宽度一样就好-->
                      </ul>
                      <!--人物奖-->
                    <ul>
                        <form class="layui-form" style="width: 95%;padding-top: 30px;padding-bottom: 10px;" id="form2">
                            <div class="layui-form-item">
                                <label class="layui-form-label">姓名
                                    <font style="color:red">*</font></label>
                                <div class="layui-input-block">
                                    <input type="text" name="username" lay-verify="title" autocomplete="off" placeholder="请输入姓名" class="layui-input" /></div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">单位
                                    <font style="color:red">*</font></label>
                                <div class="layui-input-block">
                                    <input type="text" name="companyname" lay-verify="title" autocomplete="off" placeholder="请输入单位" class="layui-input" /></div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">职务
                                    <font style="color:red">*</font></label>
                                <div class="layui-input-block">
                                    <input type="text" name="position" lay-verify="title" autocomplete="off" placeholder="请输入职务" class="layui-input" /></div>
                            </div>
                            <div class="layui-form-item layui-form-text">
                                <label class="layui-form-label"></label>
                                <div class="layui-input-block">
                                    <textarea name="reason" placeholder="自荐理由" class="layui-textarea"></textarea>
                                </div>
                            </div>
                            
                            <div class="layui-form-item">
                                <label class="layui-form-label">照片
                                    <font style="color:red">*</font></label>
                                 <div class="layui-upload" style="margin:5%">
                               
                                <div class="layui-upload-list">
                                    <img class="layui-upload-img"  id="demo2" src="{{asset('/')}}index/vote/nopic.png"/>
                                      <input type="text" value="" id="logo2" style="display:none;"
                                    name="head">
                                    <p id="demoText2"></p>
                                     <button style="width:30%" type="button" class="layui-btn" id="test2">上传图片</button>
                                </div>
                            </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">联系方式
                                    <font style="color:red">*</font></label>
                                <div class="layui-input-block">
                                    <input type="tel" name="phone" lay-verify="phone" autocomplete="off" placeholder="请输入联系方式" class="layui-input" /></div>
                            </div>
                            <div class="layui-form-item">
                                <div class="layui-inline">
                                    <label class="layui-form-label">申报奖项
                                        <font style="color:red">*</font></label>
                                    <div class="layui-input-block">
                                        <select name="award_id">
                                            <option value="">请选择想要参评奖项</option>
                                            <optgroup>
                                              @foreach($awardCategory as $category)
                                               @if($category->id=="8")
                                               @foreach($award as $award)
                                                <option value="{{$award->id}}">{{$award->name}}</option>
                                                @endforeach
                                                @endif
                                                @endforeach
                                               </optgroup>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <button  class="layui-btn"  lay-filter="demo2">申请报名</button></div>
                        </form>
                         {!!$info->tips!!}
                    </ul>
                    <!--项目奖-->
                    <ul>
                        <form class="layui-form" style="width: 95%;padding-top: 30px;padding-bottom: 10px;" id="form3">
                            <div class="layui-form-item">
                                <label class="layui-form-label">公司全称
                                    <font style="color:red">*</font></label>
                                <div class="layui-input-block">
                                    <input type="text" name="companyname" lay-verify="title" autocomplete="off" placeholder="请输入公司全称" class="layui-input" /></div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">项目名称
                                    <font style="color:red">*</font></label>
                                <div class="layui-input-block">
                                    <input type="text" name="projectname" lay-verify="title" autocomplete="off" placeholder="请输入项目名称" class="layui-input" /></div>
                            </div>
                            <div class="layui-form-item layui-form-text">
                                <label class="layui-form-label"></label>
                                <div class="layui-input-block">
                                    <textarea name="reason" placeholder="项目介绍" class="layui-textarea"></textarea>
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">logo
                                    <font style="color:red">*</font></label>
                                 <div class="layui-upload" style="margin:5%">
                               
                                <div class="layui-upload-list">
                                    <img class="layui-upload-img"  id="demo3" src="{{asset('/')}}index/vote/nopic.png"/>
                                    <input type="text" value="" id="logo3" style="display:none;"
                                    name="logo">
                                    <p id="demoText3"></p>
                                     <button style="width:30%" type="button" class="layui-btn" id="test3">上传图片</button>
                                </div>
                            </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">联系方式
                                    <font style="color:red">*</font></label>
                                <div class="layui-input-block">
                                    <input type="tel" name="phone" lay-verify="phone" autocomplete="off" placeholder="请输入联系方式" class="layui-input" /></div>
                            </div>
                            <div class="layui-form-item">
                                <div class="layui-inline">
                                    <label class="layui-form-label">申报奖项
                                        <font style="color:red">*</font></label>
                                    <div class="layui-input-block">
                                        <select name="award_id">
                                            <option value="">请选择想要参评奖项</option>
                                            @foreach($awardCategory as $category)
                                               @if($category->id=="5")
                                               
                                            <optgroup label="{{$category->name}}">
                                               @foreach($award as $award)
                                                <option value="{{$award->id}}">{{$award->name}}</option>
                                                 @endforeach
                                                 @endif
                                                @endforeach
                                            </optgroup>
                                             @foreach($awardCategory as $category)
                                               @if($category->id=="6")
                                               
                                            <optgroup label="{{$category->name}}">
                                               @foreach($award as $award)
                                                <option value="{{$award->id}}">{{$award->name}}</option>
                                                 @endforeach
                                                 @endif
                                                @endforeach
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <button class="layui-btn"   lay-filter="demo3">申请报名</button></div>

                        </form>
                        <!--数量自己定义,只要总宽度跟content的宽度一样就好-->
                        {!!$info->tips!!}
                      </ul>
                </div>
            </div>
        </div>
   @include('layout.app')      
<script type="text/javascript" src="{{asset('/index/vote/jquery-1.9.1.min.js') }}"></script>
<script type="text/javascript">
  $(function() {

                //var width = 1101; //跟外面盒子的宽度一样，或者写成 
                var width = $(".content").width();
                var ulNum = $(".content ul").length; //获取ul的个数
                var contentWidth = width * ulNum; //获取整个box应该的长度，刚开始box设置成了1100，但是应该把所有的ul防到一行里面去，这样box向左移动的时候才是无缝滚动
                $(".box").width(contentWidth); //给box设置宽度  .width() 是获取宽度  .width(value)是设置宽度
                $(".nav span").click(function() {

                    //$(this)表示点击的这个元素 ，.addClass()表示添加的样式名称，.siblings()表示这个元素的所有兄弟级元素，此处表示span，
                    // .removeClass()表示删除的样式名称
                    $(this).addClass('active').siblings().removeClass('active');

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

            });</script>
 
        <script src="{{asset('/')}}index/vote/layui/layui.js" charset="utf-8"></script>

<script>
layui.use(['form', 'layedit', 'laydate'], function(){
  var form = layui.form
  ,layer = layui.layer
  ,layedit = layui.layedit
  ,laydate = layui.laydate;
  
  //日期
  
  

  
 $("#form1").submit(function () {
        $.ajax({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        },
          url: '/vote/sub',
          type: "POST",
          data: $('#form1').serialize(),

          success: function (data) {
          
            layer.alert((data.msg), {
              title: '提示'
          })
           if(data.status==200){
              window.location.href='/vote/reg'; 
            }
            },
            error:function(res){
              alert('系统错误，请刷新页面重试');
            }
        });
                return false;//////////阻止表单提交
    });
   
 
  


$("#form2").submit(function () {
        $.ajax({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        },
          url: '/vote/sub',
          type: "POST",
          data: $('#form2').serialize(),

          success: function (data) {
          
            layer.alert((data.msg), {
              title: '提示'
          })
             if(data.status==200){
              window.location.href='/vote/reg'; 
            }
            },
            error:function(res){
              alert('系统错误，请刷新页面重试');
            }
        });
                return false;//////////阻止表单提交
    });


$("#form3").submit(function () {
        $.ajax({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        },
          url: '/vote/sub',
          type: "POST",
          data: $('#form3').serialize(),

          success: function (data) {
           
            layer.alert((data.msg), {
              title: '提示'
          })
            if(data.status==200){
              window.location.href='/vote/reg'; 
            }
            
            },
            error:function(res){
              alert('系统错误，请刷新页面重试');
            }
        });
                return false;//////////阻止表单提交
    });












   
  });




</script>
<script>
layui.use('upload', function(){
  var $ = layui.jquery
  ,upload = layui.upload;
  
  //普通图片上传
  var uploadInst = upload.render({
    elem: '#test1'
    ,url: '/upload/upimg'
    ,before: function(obj){
      //预读本地文件示例，不支持ie8
      obj.preview(function(index, file, result){
        $('#demo1').attr('src', result); //图片链接（base64）
      });
    }
    ,done: function(res){
      //如果上传失败
      if(res.code > 0){
        return layer.msg('上传成功');
      }
        $('#logo1').val(res.data.src);
      var demoText = $('#demoText1');
      demoText.html('图片上传成功');
      //上传成功
    }
    ,error: function(){
      //演示失败状态，并实现重传
      var demoText = $('#demoText1');
      demoText.html('图片未上传成功，请检查图片格式（限jpg、png、gif）或者大小（限制2M内)是否正确');
     
    }
  });
  
  //多图片上传


  //普通图片上传
  var uploadInst = upload.render({
    elem: '#test2'
    ,url: '/upload/upimg'
    ,before: function(obj){
      //预读本地文件示例，不支持ie8
      obj.preview(function(index, file, result){
        $('#demo2').attr('src', result); //图片链接（base64）
      });
    }
    ,done: function(res){
      //如果上传失败
      if(res.code > 0){
        return layer.msg('上传成功');
      }
        $('#logo2').val(res.data.src);
      var demoText = $('#demoText2');
      demoText.html('图片上传成功');
      //上传成功
    }
    ,error: function(){
      //演示失败状态，并实现重传
      var demoText = $('#demoText2');
      demoText.html('图片未上传成功，请检查图片格式（限jpg、png、gif）或者大小（限制2M内)是否正确');
     
    }
  });
  




  //普通图片上传
  var uploadInst = upload.render({
    elem: '#test3'
    ,url: '/upload/upimg'
    ,before: function(obj){
      //预读本地文件示例，不支持ie8
      obj.preview(function(index, file, result){
        $('#demo3').attr('src', result); //图片链接（base64）
      });
    }
    ,done: function(res){
      //如果上传失败
      if(res.code > 0){
        return layer.msg('上传成功');
      }
      $('#logo3').val(res.data.src);
      var demoText = $('#demoText3');
      demoText.html('图片上传成功');
      //上传成功
    }
    ,error: function(){
      //演示失败状态，并实现重传
      var demoText = $('#demoText3');
      demoText.html('图片未上传成功，请检查图片格式（限jpg、png、gif）或者大小（限制2M内)是否正确');
     
    }
  });
  

  
});
</script>


</html>