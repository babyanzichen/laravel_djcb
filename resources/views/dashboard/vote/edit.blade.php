@include('dashboard.layouts.partials.header')
<title>报名信息修改</title>
</head>
<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5 class="fa fa-bars">报名信息修改</h5>
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
                            <label class="col-sm-3 control-label">公司名：</label>
                            <div class="input-group col-sm-4">
                                <input type="text" class="form-control" name="companyname"
                                       placeholder="公司名" value="{{ $info->companyname }}">
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>  不建议修改</span>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">联系方式：</label>
                            <div class="input-group col-sm-4">
                                <input type="text" class="form-control" name="phone" value="{{ $info->phone }}"
                                placeholder="联系方式">
                            </div>
                        </div>
                        
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">申报理由：</label>
                            <div class="input-group col-sm-4">
                               <script id="editor" name="reason" type="text/plain" style="width:724px;height:500px;">{!!$info->reason!!}</script>
                                <textarea name="reason" style="display:none"></textarea>
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i> 必填</span>
                            </div>
                        </div>
                       <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">参评奖项：</label>
                            <div class="form-group">
                                <div class="col-md-2">
                                    <select class="form-control m-b chosen-select" name="award_id">
                                        <option value="">选择参评奖项</option>
                                        @foreach($awardList as $v)
                                            <option value="{{ $v->id }}"
                                                    @if($info->award_id == $v->id) selected @endif>{{ $v->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                         <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">作假票数：</label>
                            <div class="input-group col-sm-4">
                                <input type="text" class="form-control" name="cheat" value="{{ $info->cheat }}"
                                placeholder="作假票数">
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>请填需要增加的票数</span>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">是否立即上线参评：</label>
                            <div class="input-group col-sm-4">
                                <div class="radio i-checks">
                                    <input type="radio" name='is_enabled' value="yes"
                                           @if($info->is_enabled == 'yes') checked @endif/>是&nbsp;&nbsp;
                                    <input type="radio" name='is_enabled' value="no"
                                           @if($info->is_enabled == 'no') checked @endif/>否
                                        
                                </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-3">
                                <a class="btn btn-primary saveBtn" id="saveBtn"><i class="fa fa-save"></i> 保存</a>&nbsp;&nbsp;&nbsp;
                                <a class="btn btn-danger" href="javascript:history.go(-1);"><i class="fa fa-close"></i>
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
@include('dashboard.layouts.partials.footer')
@include('UEditor::head')
<script type="text/javascript">
     var ue = UE.getEditor('editor'); 
</script>
<script>
    /*表单提交*/
    $("#saveBtn").click(function () {
        $("textarea[name=reason]").val(ue.getContent());
        ajaxFormBtn("{{ dashboardUrl('/vote/'.$info->id.'/update') }}", 'btnForm');
    });

</script>
</body>
</html>