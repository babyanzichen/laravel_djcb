    <div style="height:44px"></div>
    <div class="tab-bar tab-bottom">
            <a class="tab-button @if(Session::get('index')==1 )active  @endif" href="{{ asset('/vote/') }}"><span class="tab-button-txt">首页</span></a>
            <a class="tab-button @if(Session::get('index')==5 )active  @endif" href="{{ asset('/vote/laws') }}"><span class="tab-button-txt">规则</span></a>
             <a class="tab-button @if(Session::get('index')==4 )active  @endif" href="{{ asset('/vote/reg') }}"><span class="tab-button-txt">报名</span></a>
            <a class="tab-button @if(Session::get('index')==2 )active  @endif" href="{{ asset('/vote/lists') }}"><span class="tab-button-txt">排行</span></a>
            <a class="tab-button @if(Session::get('index')==3 )active  @endif" href="{{asset('/vote/contact') }}"><span class="tab-button-txt">联系我们</span></a>
           
            
    </div>
    <style>
    .top{
    	overflow: hidden;
    }
		.cover:after{
			position: absolute;
			left: -100%;                    /*改变left的值，让其相对top影藏*/
			top: 0;
			width: 30%;
			height: 100%;
			content: "";
			/* Safari 5.1 - 6.0 */
		  background: -webkit-linear-gradient(left,rgba(255,255,255,0) 0,rgba(255,255,255,.3) 50%,rgba(255,255,255,0) 100%);
		  /* Opera 11.1 - 12.0 */
		  background: -o-linear-gradient(left,rgba(255,255,255,0) 0,rgba(255,255,255,.3) 50%,rgba(255,255,255,0) 100%);
		  /* Firefox 3.6 - 15 */
		  background: -moz-linear-gradient(left,rgba(255,255,255,0) 0,rgba(255,255,255,.3) 50%,rgba(255,255,255,0) 100%);
		  /* 标准的语法 */
		  background: linear-gradient(to right,rgba(255,255,255,0) 0,rgba(255,255,255,.3) 50%,rgba(255,255,255,0) 100%);
	    transform: skewX(-45deg);
		}
		.hover:after{
		left:100%;
	    transition: 1s ease;
		}
	</style>
    <script type="text/javascript">
 
 
	setInterval(function () {
    	$(".cover").addClass("hover");
    	
	}
, 3000);
setInterval(function () {
    	$(".cover").removeClass("hover");
    	
	}
,4000);	
</script>