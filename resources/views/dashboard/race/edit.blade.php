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
                                <input type="text" class="form-control" style="display: none" name="openid"
                                       placeholder="openid" value="{{ $info->openid }}">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">奖项名：</label>
                            <div class="input-group col-sm-4">
                                <input type="text" class="form-control" name="awards" value="{{ $info->awards }}"
                                placeholder="奖项名">
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i> 必填</span>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">申报理由：</label>
                            <div class="input-group col-sm-4">
                                <textarea type="text" class="form-control" name="reason" 
                                placeholder="申报理由">{{ $info->reason }}</textarea> 
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i> 必填</span>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">一级类目：</label>
                            <div class="input-group col-sm-4">
                                <input type="text" class="form-control" name="c1" value="{{ $info->c1}}" placeholder="一级类目">
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i> 一级类目为奖项打的分类</span>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">二级类目：</label>
                            <div class="input-group col-sm-4">
                                <input type="text" class="form-control" name="c2" value="{{ $info->c2}}"
                                       placeholder="二级类目">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">是否立即上线参评：</label>
                            <div class="input-group col-sm-4">
                                <div class="radio i-checks">
                                    <input type="radio" name='status' value="1"
                                           @if($info->status == '1') checked @endif/>是&nbsp;&nbsp;
                                    <input type="radio" name='status' value="0"
                                           @if($info->status == '0') checked @endif/>否
                                        &nbsp;&nbsp;
                                         <input type="radio" name='status' value="2"
                                           @if($info->status == '2') checked @endif/>不通过
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

<script>
    /*表单提交*/
    $("#saveBtn").click(function () {
       
        ajaxFormBtn("{{ dashboardUrl('/vote/'.$info->id.'/update') }}", 'btnForm');
    });

</script>
</body>
</html>