@include('common.create')
<link href="{{ asset('/')}}admins/sbadmin/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="{{ asset('/')}}admins/sbadmin/bower_components/jquery/dist/jquery.min.js"></script> 
<script src="{{ asset('/')}}admins/js/jquery.form.js"></script> 
<style type="text/css">
.thumb-wrap{
    overflow: hidden;
}
.thumb-wrap img{
    margin-top: 10px;
}
.pic-upload{
    width: 100%;
    height: 34px;
    margin-bottom: 10px;
}
#thumb-show{
    max-width: 100%;
    max-height: 300px;
}
.upload-mask{
    position: fixed;
    top:0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,.4);
    z-index: 1000;
}
.upload-file .close{
    cursor: pointer;
    font-size: 14px;
}

.upload-file{
    position: absolute;
    top: 50%;
    left: 50%;
    margin-top: -105px;
    margin-left: -150px;
    max-width: 300px;
    z-index: 1001;
    display: none;
}

.upload-mask{
    display: none;
}
</style>
<div class="upload-mask">
</div>
<div class="panel panel-info upload-file">
    <div class="panel-heading">
        上传图片
        <span class="close pull-right">关闭</span>
    </div>
    <div class="panel-body">
        <div id="validation-errors"></div>
        <form action="{{url('admin/imgUpload') }}" method="post"  "id"="imgForm" enctype="multipart/form-data" >
        <div class="form-group">
            <label>图片上传</label>
            <span class="require">(*)</span>
            <input id="thumb" name="file" type="file"  required="required">
            <input id="imgID"  type="hidden" name="id" value="">

        </div>
        </form>
    </div>
    <div class="panel-footer">
    </div>
</div>
<script type="text/javascript">
$(function(){
    //上传图片相关

    $('.upload-mask').on('click',function(){
        $(this).hide();
        $('.upload-file').hide();
    })

    $('.upload-file .close').on('click',function(){
        $('.upload-mask').hide();
        $('.upload-file').hide();
    })

    var imgSrc = $('.pic-upload').next().attr('src');
    console.log(imgSrc);
    if(imgSrc == ''){
        $('.pic-upload').next().css('display','none');
    }
    $('.pic-upload').on('click',function(){
        $('.upload-mask').show();
        $('.upload-file').show();
        console.log($(this).next().attr('id'));
        var imgID = $(this).next().attr('id');
        $('#imgID').attr('value',imgID);
    })

    //ajax 上传
    $(document).ready(function() {
        var options = {
            beforeSubmit:  showRequest,
            success:       showResponse,
            dataType: 'json'
        };
        $('#imgForm input[name=file]').on('change', function(){
            //$('#upload-avatar').html('正在上传...');
            $('#imgForm').ajaxForm(options).submit();
        });
    });

    function showRequest() {
        $("#validation-errors").hide().empty();
        $("#output").css('display','none');
        return true;
    }

    function showResponse(response)  {
        if(response.success == false)
        {
            var responseErrors = response.errors;
            $.each(responseErrors, function(index, value)
            {
                if (value.length != 0)
                {
                    $("#validation-errors").append('<div class="alert alert-error"><strong>'+ value +'</strong><div>');
                }
            });
            $("#validation-errors").show();
        } else {

            $('.upload-mask').hide();
            $('.upload-file').hide();
            $('.pic-upload').next().css('display','block');

            console.log(response.pic);

            $("#"+response.id).attr('src',response.pic);
            $("#"+response.id).next().attr('value',response.pic);
        }
    }

})
</script>