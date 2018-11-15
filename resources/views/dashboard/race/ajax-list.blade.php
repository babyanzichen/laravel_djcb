<div class="table-responsive ">
    <table class="table table-bordered table-hover">
        <thead>
        <tr class="long-tr">
            <th><input type="checkbox" onclick="checkAll(this)">ID</th>
            <th>姓名</th>
            <th>头像</th>
            <th>昵称</th>
           
            <th style="width:20px">联系电话</th>
            
            <th>当前票数</th>
            <th>报名时间</th>
           
        </tr>
        </thead>
        <tbody>
        @forelse( $lists as $v )
            <tr class="long-td">
                <td>{{ $v->id }}</td>
                <td>{{ $v->username}}</td>
                <td>
                    <a>
                        <img src="{{  $v->headpic }}" class="img-circle fancybox" href="{{ $v->headpic }}" title="{{ $v->username }}" style="width:35px;height:35px"
                             onerror="this.src='/assets/dashboard/images/head_default.gif'"/>
                    </a>
                </td>
                <td>{{ $v->nickname }}</td>
                
                <td> {{ $v->phone}}</td>
              
                </td>
                <td> {{ $v->votes}}</td>
                <td>{{ $v->created_at }}</td>
               
            </tr>
        @empty
            <tr>
                <td colspan="20" style="padding-top:10px;padding-bottom:10px;font-size:16px;text-align:center">暂无数据</td>
            </tr>
        @endforelse
        </tbody>
    </table>
    <div class="pull-right">
        {!! preg_replace("(<a[^>]*page[=|/](\d+).+?>(.+?)<\/a>)","<a data-p=$1 href='javascript:void($1);'>$2</a>",$lists->links()) !!}
    </div>
</div>
<script type="text/javascript">
    //分页
    $('.pagination a').click(function () {
        form = 'subForm';//表单id 全局变量
        p = $(this).data('p');//当前分页
        turl = "/dashboard/race/ajaxGets" + "?page=" + p;//url
        ajaxList(form, turl);
    });

    
</script>