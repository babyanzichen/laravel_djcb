<div class="table-responsive ">
    <table class="table table-bordered table-hover">
        <thead>
        <tr class="long-tr">
            <th>ID</th>
            <th>订单号</th>
            <th style="width:100px">姓名</th>
           
            <th style="width:100px">城市</th>
           <th style="width:100px">订单金额（元）</th>
            <th style="width:200px">联系电话</th>
            <th style="width:100px">订单状态</th>
           
            <th>下单时间</th>
           
        </tr>
        </thead>
        <tbody>
        @forelse( $lists as $v )
            <tr class="long-td">
                <td>{{ $v->id }}</td>
                 <td>{{ $v->ordersn}}</td>
                <td>{{ $v->username}}</td>
                <td>
                   {{ $v->city}}
                </td>
                <td>{{ $v->price }}</td>
                
                <td> {{ $v->phone}}</td>
              
                </td>
                <td> 
                     @if($v->status==1)
                      已支付
                    @elseif($v->status==2)
                       未支付
                    @else
                        状态未知
                    @endif
                </td>
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
        turl = "/dashboard/ticket/ajaxGets" + "?page=" + p;//url
        ajaxList(form, turl);
    });

    
</script>