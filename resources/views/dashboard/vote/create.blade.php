@include('dashboard.layouts.partials.header')
<title>报名添加</title>
</head>
<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5 class="fa fa-bars">报名添加</h5>
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
                                       placeholder="公司名">
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>  不建议修改</span>
                            </div>
                        </div>
                         <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">品牌名称：</label>
                            <div class="input-group col-sm-4">
                                <input type="text" class="form-control" name="brandname"
                                       placeholder="品牌名称">
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>项目奖必填</span>
                            </div>
                        </div>
                         <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">项目名称：</label>
                            <div class="input-group col-sm-4">
                                <input type="text" class="form-control" name="projectname"
                                       placeholder="项目名称">
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>项目奖必填</span>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">姓名：</label>
                            <div class="input-group col-sm-4">
                                <input type="text" class="form-control" name="username"
                                       placeholder="姓名">
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>人物奖必填</span>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">职位：</label>
                            <div class="input-group col-sm-4">
                                <input type="text" class="form-control" name="username"
                                       placeholder="职位">
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>人物奖必填</span>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">联系方式：</label>
                            <div class="input-group col-sm-4">
                                <input type="text" class="form-control" name="phone" value=""
                                placeholder="联系方式">
                            </div>
                        </div>
                        
                         <div class="hr-line-dashed"></div>
                        <div class="form-group avalue">
                            <label class="col-sm-3 control-label">申报理由：</label>
                            <div class="input-group col-sm-8">
                                <textarea name="reason" id="editor" class="form-control"
                                          placeholder="申报理由"></textarea>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">logo：</label>
                            <div class="input-group col-sm-1">
                                <a class="btn btn-info" href="javascript:void(0);" style="float: left"
                                   uploader="logo"
                                   data-url="{{ url('file/upload') }}" data-path="temp">+ 浏览文件
                                    <input type="hidden" name="logo" id="logo" value="">
                                </a>
                                <img height="100px" id="logo_img"
                                     style="float:left;margin-left: 120px;margin-top: -50px;"
                                     onerror="this.src='/assets/dashboard/images/no_img.jpg'"
                                     src=""/>
                            </div>
                        </div>
                         <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">头像：</label>
                            <div class="input-group col-sm-1">
                                <a class="btn btn-info" href="javascript:void(0);" style="float: left"
                                   uploader="head"
                                   data-url="{{ url('file/upload') }}" data-path="temp">+ 浏览文件
                                    <input type="hidden" name="head" id="head" value="">
                                </a>
                                  <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>人物奖必须上传</span>
                                <img height="100px" id="head_img"
                                     style="float:left;margin-left: 120px;margin-top: -50px;"
                                     onerror="this.src='/assets/dashboard/images/no_img.jpg'"
                                     src=""/>
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
                                            <option value="{{ $v->id }}">{{ $v->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                         <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">作假票数：</label>
                            <div class="input-group col-sm-4">
                                <input type="text" class="form-control" name="cheat" value=""
                                placeholder="作假票数">
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>请填需要增加的票数</span>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">是否立即上线参评：</label>
                            <div class="input-group col-sm-4">
                                <div class="radio i-checks">
                                    <input type="radio" name='is_enabled' value="yes"/>是&nbsp;&nbsp;
                                    <input type="radio" name='is_enabled' value="no"/>否 
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
   /*Markdown ------------start */
    var simplemde = new SimpleMDE({
        spellChecker: false,
        autosave: {
            enabled: true,
            delay: 2000,
            unique_id: "dashboard_vote_register_create_content"
        },
        element: document.getElementById("editor"),
        forceSync: true,
        tabSize: 4,
    });

   
    /*表单提交*/
    $("#saveBtn").click(function () {
        

        ajaxFormBtn("{{ dashboardUrl('/vote/store') }}", 'btnForm');
    });

</script>
</body>
</html>