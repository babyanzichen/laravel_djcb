@include('dashboard.layouts.partials.header')
<title>奖项信息修改</title>
</head>
<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5 class="fa fa-bars">奖项信息修改</h5>
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
                            <label class="col-sm-3 control-label">奖项名：</label>
                            <div class="input-group col-sm-4">
                                <input type="text" class="form-control" name="name"
                                       placeholder="奖项名" value="{{ $info->name }}">
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>  不建议修改</span>
                            </div>
                        </div>
                       <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">奖项分类：</label>
                            <div class="form-group">
                                <div class="col-md-2">
                                    <select class="form-control m-b chosen-select" name="category_id">
                                        <option value="">选择奖项分类</option>
                                        @foreach($cateLists as $v)
                                            <option value="{{ $v->id }}"
                                                    @if($info->category_id == $v->id) selected @endif>{{ $v->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">状态：</label>
                            <div class="form-group">
                                <div class="col-md-1">
                                    <select class="form-control m-b" id="attribute" name="is_enabled">
                                        <option value="yes" @if($info->is_enabled == 'yes') selected @endif>启用</option>
                                        <option value="no" @if($info->is_enabled == 'no') selected @endif>非启用</option>
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
@include('UEditor::head')
<script type="text/javascript">
     var ue = UE.getEditor('editor'); 
</script>
<script>
    // /*Markdown ------------start */
    // var simplemde = new SimpleMDE({
    //     element: document.getElementById("editor"),
    //     placeholder: 'Please input the article content.',
    //     autoDownloadFontAwesome: true,
    //     forceSync: false,
    //     tabSize: 8,
    //     lineWrapping: false
    // });
    /*表单提交*/
    $("#saveBtn").click(function () {

        if (isEmpty('', $("input[name=name]").val(), '请输入奖项标题') == false) {
            return false;
        }
        ajaxFormBtn("{{ dashboardUrl('/vote/award/'.$info->id.'/update') }}", 'btnForm');
    });

</script>
</body>
</html>