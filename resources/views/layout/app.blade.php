    <div style="height:44px"></div>
    <div class="tab-bar tab-bottom">
            <a class="tab-button @if(Session::get('index')==1 )active  @endif" href="{{ asset('/vote/') }}"><span class="tab-button-txt">首页</span></a>
            <a class="tab-button @if(Session::get('index')==5 )active  @endif" href="{{ asset('/vote/laws') }}"><span class="tab-button-txt">规则</span></a>
             <a class="tab-button @if(Session::get('index')==4 )active  @endif" href="{{ asset('/vote/reg') }}"><span class="tab-button-txt">报名</span></a>
            <a class="tab-button @if(Session::get('index')==2 )active  @endif" href="{{ asset('/vote/lists') }}"><span class="tab-button-txt">排行</span></a>
            <a class="tab-button @if(Session::get('index')==3 )active  @endif" href="{{asset('/vote/contact') }}"><span class="tab-button-txt">联系我们</span></a>
           
            
    </div>