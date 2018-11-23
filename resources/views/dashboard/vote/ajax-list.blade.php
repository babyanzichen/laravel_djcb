<div class="table-responsive ">
    <table class="table table-bordered table-hover">
        <thead>
        <tr class="long-tr">
            <th><input type="checkbox" onclick="checkAll(this)">ID</th>
            <th>logo</th>
            <th>公司名</th>
            <th style="width:20px">联系电话</th>
            <th>参评奖项</th>
            <th>审核状态</th>
            <th>当前票数</th>
            <th>报名时间</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        @forelse( $lists as $v )
            <tr class="long-td">
                <td><input type="checkbox" name="ids[]" value="{{ $v->id }}">{{ $v->id }}</td>
                <td>
                    <a>
                        <img src="{{v->logo}}{{ $v->head}}" class="img-circle fancybox" href="{{ $v->logo }}{{ $v->head}}" title="{{ $v->companyname }}" style="width:35px;height:35px"
                             onerror="this.src='/assets/dashboard/images/head_default.gif'"/>
                    </a>
                </td>
                <td>{{ $v->companyname }}</td>
                
                <td> {{ $v->phone}}</td>
                 <td> {{$v->award->name}}</td>
                <td>
                    @if( $v->is_enabled == 'no')
                        <i class="fa fa-close text-navy change-status hover-point" data-value="yes" data-cv="no" data-id="{{ $v->id }}" data-column="is_enabled" data-table="vote_registers" data-msg="启用" data-todo="1"
                        data-cur="未启用" onclick="changeStatus(this)"> 未启用</i>
                    @else
                    <i class="fa fa-check text-navy change-status hover-point" data-value="no" data-cv="yes" data-id="{{ $v->id }}" data-column="is_enabled" data-table="vote_registers" data-msg="未启用" data-todo="0" data-cur="启用" onclick="changeStatus(this)">启用</i>
                                            @endif
                </td>
                
                <td> {{ $v->votes}}</td>
                <td>{{ $v->created_at }}</td>
                <td>
                    <a href="{{ dashboardUrl('/vote/'.$v->id.'/edit') }}" class="btn btn-primary btn-xs">
                        <i class="fa fa-pencil-square-o"></i> 编辑
                    </a>&nbsp;&nbsp;
                   
                    <a href="javascript:;" class="btn btn-danger btn-xs" onclick="delBtn(this)" data-id="0"
                       data-name="{{ $v->companyname }}" data-url="{{ dashboardUrl('/vote/'.$v->id.'/delete') }}">
                        <i class="fa fa-trash-o"></i> 删除
                    </a>
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
        turl = "/dashboard/vote/ajaxGets" + "?page=" + p;//url
        ajaxList(form, turl);
    });

  
</script>