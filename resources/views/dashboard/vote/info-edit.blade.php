@include('dashboard.layouts.partials.header')
<title>活动规则信息修改</title>
</head>
<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5 class="fa fa-bars">活动规则信息修改</h5>
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
                            <label class="col-sm-3 control-label">活动标题：</label>
                            <div class="input-group col-sm-4">
                                <input type="text" class="form-control" name="name"
                                       placeholder="活动标题" value="{{ $info->name }}">
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>  不建议修改</span>
                            </div>
                        </div>
                         <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">举办地点：</label>
                            <div class="input-group col-sm-4">
                                <input type="text" class="form-control" name="address"
                                       placeholder="举办地点" value="{{ $info->address }}">
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>  不建议修改</span>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">举办时间：</label>
                            <div class="input-group col-sm-4">
                                <input type="text" class="form-control" name="hold_at"
                                       placeholder="举办时间" value="{{ $info->hold_at }}">
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i> 非倒计时用的举办时间</span>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group avalue">
                            <label class="col-sm-3 control-label">报名提示：</label>
                            <div class="input-group col-sm-8">
                                <script id="editor1" name="tips" type="text/plain" style="width:724px;height:500px;">{!!$info->tips!!}</script>
                                <textarea name="tips" style="display:none"></textarea>
                            </div>
                        </div>
                         <div class="hr-line-dashed"></div>
                        <div class="form-group avalue">
                            <label class="col-sm-3 control-label">投票规则：</label>
                            <div class="input-group col-sm-8">
                                <script id="editor2" name="rules" type="text/plain" style="width:724px;height:500px;">{!!$info->rules!!}</script>
                                <textarea name="rules" style="display:none"></textarea>
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
     var ue1 = UE.getEditor('editor1'); 
      var ue2 = UE.getEditor('editor2'); 
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

        $("textarea[name=tips]").val(ue1.getContent());
        $("textarea[name=rules]").val(ue2.getContent());
        if (isEmpty('', $("input[name=name]").val(), '请输入活动标题') == false) {
            return false;
        }
        if (isEmpty('', $("textarea[name=rules]").val(), '请输入 投票规则') == false) {
            return false;
        }
        if (isEmpty('', $("textarea[name=tips]").val(), '请输入 报名提示') == false) {
            return false;
        }
        ajaxFormBtn("{{ dashboardUrl('/vote/info/'.$info->id.'/update') }}", 'btnForm');
    });

</script>
</body>
</html>