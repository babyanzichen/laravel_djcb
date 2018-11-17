@include('dashboard.layouts.partials.header')
<title>分类添加</title>
</head>
<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5 class="fa fa-bars">分类信息添加</h5>
                    <div class="ibox-tools">
                        <a href="javascript:history.go(-1)" title="返回">
                            <i class="fa fa-reply"> 返回</i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <form class="form-horizontal m-t" id="btnForm" accept-charset="UTF-8">
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">奖项分类名：</label>
                            <div class="input-group col-sm-4">
                                <input type="text" class="form-control" name="name"
                                       placeholder="奖项分类名" value="">
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>  不建议修改</span>
                            </div>
                        </div>
                        
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">状态：</label>
                            <div class="form-group">
                                <div class="col-md-1">
                                    <select class="form-control m-b" id="attribute" name="is_enabled">
                                        <option value="yes">启用</option>
                                        <option value="no")>非启用</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-3">
                                <a class="btn btn-primary saveBtn" id="saveBtn"><i class="fa fa-save"></i> 保存</a>&nbsp;&nbsp;&nbsp;
                                <a class="btn btn-danger" href="javascript:history.go(-1);"><i
                                            class="fa fa-close"></i>
                                    返回</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('dashboard.layouts.partials.footer')

<script>
    /*表单提交*/
    $("#saveBtn").click(function () {
        if (isEmpty('', $("input[name=name]").val(), '请输入分类标题') == false) {
            return false;
        }

        ajaxFormBtn("{{ dashboardUrl('/vote/category/store') }}", 'btnForm');
    });

</script>
</body>
</html>