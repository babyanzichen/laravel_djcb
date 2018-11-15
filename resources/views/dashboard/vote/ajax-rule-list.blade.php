<div class="table-responsive ">
    <table class="table table-bordered table-hover">
        <thead>
        <tr class="long-tr">
            <th><input type="checkbox" onclick="checkAll(this)">ID</th>
            <th>奖项名</th>
            <th>logo</th>
            <th>公司名</th>
           
            <th style="width:20px">联系电话</th>
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
                <td>{{ $v->awards}}</td>
                <td>
                    <a>
                        <img src="{{  $v->photo }}" class="img-circle fancybox" href="{{ $v->logo }}" title="{{ $v->user_name }}" style="width:35px;height:35px"
                             onerror="this.src='/assets/dashboard/images/head_default.gif'"/>
                    </a>
                </td>
                <td>{{ $v->companyname }}</td>
                
                <td> {{ $v->phone}}</td>
                <td> 
                    @if($v->status==1)
                       已通过
                    @elseif($v->status==2)
                        不通过
                    @else
                        审核中
                    @endif
                </td>
                <td> {{ $v->votes}}</td>
                <td>{{ $v->created_at }}</td>
                <td>
                    <a href="{{ dashboardUrl('/vote/'.$v->id.'/edit') }}" class="btn btn-primary btn-xs">
                        <i class="fa fa-pencil-square-o"></i> 编辑
                    </a>&nbsp;&nbsp;
                    <a href="javascript:;"  onclick="giveUserRoles({{ $v->id }})" title="下线"><span class="fa fa-key"></span>&nbsp;下线</a>&nbsp;&nbsp;
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

    /*管理员-角色-添加*/  //分配权限
    function giveUserRoles(id){
        $("#nodeid").val(id);
        index2 = layer.load(0, {shade: false});
        $.getJSON("{{ dashboardUrl('/vote/roles') }}", {'type' : 'post', 'id' : id}, function(res){
            layer.close(index2);
            if(res.status == 1){
                zNodes = JSON.parse(res.data);
                index = layer.open({
                    type: 1,
                    area:['300px', '400px'],
                    title:'角色分配',
                    skin: 'layui-layer-demo',
                    content: $('#role')
                });

                layer.style(index, {
                    top: '5%'
                });
                var setting = {
                    check:{
                        enable:true
                    },
                    data: {
                        simpleData: {
                            enable: true
                        }
                    }
                };
                $.fn.zTree.init($("#treeType"), setting, zNodes);
                var zTree = $.fn.zTree.getZTreeObj("treeType");
                zTree.expandAll(true);

            }else{
                msg(res.msg);
            }
        });
    }
    //确认分配权限
    $("#postform").click(function(){
        var zTree = $.fn.zTree.getZTreeObj("treeType");
        var nodes = zTree.getCheckedNodes(true);
        var NodeString = '';
        $.each(nodes, function (n, value) {
            if(n>0){
                NodeString += ',';
            }
            NodeString += value.id;
        });
        var id = $("#nodeid").val();
        $.post("{{ dashboardUrl('/vote/roles') }}", {'type' : 'give', 'id' : id, 'data' : NodeString}, function(res){
            layer.close(index);
            if(res.status == 1){
                msg(res.msg,{icon:1,time:1500,shade: 0.1});
            }else{
                msg(res.msg);
            }
        }, 'json')
    })
</script>