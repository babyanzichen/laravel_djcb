<div class="table-responsive ">
    <table class="table table-bordered table-hover">
        <thead>
        <tr class="long-tr">
            <th><input type="checkbox" onclick="checkAll(this)">ID</th>
            <th>推送类型</th>
            <th>推送方式</th>
            <th>推送用户</th>
            <th>用户头像</th>
            <th>状态码</th>
            <th>推送结果</th>
            <th>推送时间</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        @forelse( $lists as $v )
            <tr class="long-td">
                <td><input type="checkbox" name="ids[]" value="{{ $v->id }}">{{ $v->id }}</td>
                <td>{{ $v->category}}</td>
                <td>定时推送</td>
                <td>{{ $v->user->nickname }}</td>
                <td><a>
                        <img src="{{  $v->user->avatar }}" class="img-circle fancybox" href="{{ $v->avatar }}" title="{{ $v->user_name }}" style="width:35px;height:35px"
                             onerror="this.src='/assets/dashboard/images/head_default.gif'"/>
                    </a>
                </td>
                <td>{{ $v->code }}</td>
                <td>
                    @if( $v->msg == 'ok')
                        推送成功
                    @else
                        推送失败，用户未关注公众号
                    @endif
                </td>
                <td>
                   {{ $v->created_at}}
                </td>
                <td>
                   
                </td>
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
        turl = "/dashboard/templateMsg/ajaxLogs" + "?page=" + p;//url
        ajaxList(form, turl);
    });

    
   
</script>