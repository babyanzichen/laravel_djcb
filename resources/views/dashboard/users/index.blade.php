<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>会员列表</title>
  <link rel="stylesheet" href="{{ asset('/')}}auth/layui/css/layui.css" media="all">
  <script src="{{ asset('/')}}auth/layui/layui.js"></script>
  <script type="text/javascript" src="{{ asset('/')}}auth/js/jquery-2.1.0.js"></script>
</head>
<body>
 
<div class="demoTable">
  搜索ID：
  <div class="layui-inline">
    <input class="layui-input" name="id" id="demoReload" autocomplete="off">
  </div>
  <button class="layui-btn" data-type="reload">搜索</button>
</div>
 
<table class="layui-hide" id="LAY_table_user" lay-filter="user"></table> 
               
<script>
layui.use('table', function(){
  var table = layui.table;
  
  //方法级渲染
  table.render({
    elem: '#LAY_table_user'
    ,url: '/dashboard/users/getUser/'
    ,cols: [[
      {checkbox: true, fixed: true}
      ,{field:'id', title: 'ID', width:80, sort: true, fixed: true}
      ,{field:'nickname', title: '用户名', width:80,event:'setSign', style:'cursor: pointer;'}
      ,{field:'female', title: '性别', width:80, sort: true}
      ,{field:'city', title: '城市', width:80}
      ,{field:'province', title: '省份', width:80}
      ,{field:'country', title: '国家', width:80}

      ,{field:'created_at', title: '注册时间', sort: true, width:185}
    ]]
    ,id: 'testReload'
    ,page: true
    ,height: 315
  });
  
  var $ = layui.$, active = {
    reload: function(){
      var demoReload = $('#demoReload');
      
      table.reload('testReload', {
        where: {
         
            keywors: demoReload.val(),
            type:'search'
         
        }
      });
    }
  };
  
  $('.demoTable .layui-btn').on('click', function(){
    var type = $(this).data('type');
    active[type] ? active[type].call(this) : '';
  });
});
</script>
 
<script>
layui.use('table', function(){
  var table = layui.table; 
  //监听单元格事件
  table.on('tool(user)', function(obj){
    var data = obj.data;
    if(obj.event === 'setSign'){
      layer.prompt({
        formType: 2
        ,title: '修改 ID 为 ['+ data.id +'] 的用户昵称'
        ,value: data.nickname
        
      }, function(value,index){
        layer.close(index);
        console.log(value);
        //这里一般是发送修改的Ajax请求
       $.post("/dashboard/users/getUser/",{id:id,nickname:value},function(result){
          
        });
     
        //同步更新表格和缓存对应的值
        obj.update({
          sign: value
        });
      });
    }
  });
});
</script>

</body>
</html>