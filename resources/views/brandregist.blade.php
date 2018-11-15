<!doctype html>
<html>
<head>
<meta name="_token" content="{!! csrf_token() !!}"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script type="text/javascript" src="https://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<link href="{{ asset('/index/css/brand.css') }}" type="text/css" rel="stylesheet">
<script type="text/javascript" src="{{asset('/index/js/jquery.js') }}" /></script>
<title>让你的网店更多流量，现在加入点金车宝吧！</title>
</head>
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
    var city = document.getElementById("city");
    var cityArr = arr[0].split(",");
    for(var i=0;i<cityArr.length;i++)
    {
             city[i]=new Option(cityArr[i],cityArr[i]);
    }
}

function getCity()
{    
    var pro = document.getElementById("province");
    var city = document.getElementById("city");
    var index = pro.selectedIndex;
    var cityArr = arr[index].split(",");   
    
    city.length = 0;
    //将城市数组中的值填充到城市下拉框中
    for(var i=0;i<cityArr.length;i++)
    {
             city[i]=new Option(cityArr[i],cityArr[i]);
         }
}
</script>
<body >
<div class="all">
    <div class="top">
        <h1>“点金车宝”企业进驻申请表</h1>
         <p>尊敬的点金武汉展的参展商伙伴：</p>
            <p>更好的服务是“不断创新”和“说到做到”！为了帮助品牌展商网店引流，我们推出了“点金车宝”（2C引流平台）--一个“品牌电商搜索引擎”。</p>
            <p>我们专业成立了一个务实的推广团队运营“点金车宝”，1.0版的“点金车宝”的主要使命是：“引消费者流”到您的网店（天猫、京东等，或您企业的自营网店）。</p>
            <p>“点金车宝”刚刚建成，需要完善您的企业资料。请您将对应的公司资料填入下表提交即可。</p>
			<p style="text-align: center;color: red;">了解“点金车宝”，请您扫码了解。</p>
           
    </div>
    <div class="middle">
        <div class="leftpic"><img src="{{asset('/')}}index/images/ewm.jpg"></div>
    </div>
    <div class="bottom">
    <form id="uploadForm">
                 <div class="biao">
                      <ul class="writein">
                        <li><span>品牌简称</span><input type="text" placeholder="4字以内" name="brandname" maxlength="4"></li>
                        <li><span>商城网址</span><input type="text" name="shoplink" placeholder="天猫、京东、自有电商等"></li>
                        <li class="lei"><span style="margin-top:2.5%;">类&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;目</span>
                            <div class="type" style="margin-left: 15%;width: 80%;padding-left:8%;">
								<select id="province" size=1 name="category1" onChange="getCity()" > 
										<option value=>请选择</option>
										<option value="精品车饰">精品车饰</option> 
										<option value="电子导航">电子导航</option> 
										<option value="美容养护" >美容养护</option> 
										<option value="汽车改装">汽车改装</option> 
										<option value="房车">房车</option> 
										<option value="大牌配件">大牌配件</option> 
								</select>
								<select id="city" name="category2"></select> 
                            </div>
							<div class="zidingyi"><input type="text" name="categorys" placeholder="自定义类目"></div>
                        </li>
                            <p style="text-align:justify;width:78%;padding-left: 8%;float:left;padding-left: 10%;margin-top:2%;font-size:0.8rem;">注：如“点金车宝”里没有贵公司项目的对应的类目，可在自定义里填写新类目进行申请。</p>
                    </ul>
                </div>
                 <div class="sub"><span>提交</span></div>
        </div>
        </form>
    </div>
</div>


<script>
     $(".sub").click(function(){
        var token = $('meta[name="_token"]').attr('content');
        var brandname= $("input[name=brandname]").val();
        var shoplink= $("input[name=shoplink]").val();
		var category1= $("select[name=category1]").val();
		var category2= $("select[name=category2]").val();
		var categorys= $("input[name=categorys]").val();
        if( brandname==""||shoplink==""||category1==""&&categorys==""){
			alert("请检查表格是否填写完整")
				return false;
        }else{
        $.ajax({
            type:"post",
            url:"{{ url('home/brandadd') }}",
            data:{
                
                "_token": token,
                "shoplink":shoplink,
                "brandname":brandname,
				"category1":category1,
				"category2":category2,
				"categorys":categorys,
            },
            success:function(){
              alert("提交成功");
			  location.reload();
            },
            async:true
        });
        }
    });
</script>

</body>
</html>
