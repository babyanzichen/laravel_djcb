<form method="POST" action="{{url('vote/'.$data->id.'/comments')}}" accept-charset="UTF-8">
    {{csrf_field()}}

    @if(isset($parentId))
        <input type="hidden" name="parent_id" value="{{$parentId}}">
    @endif

    <div class="form-group">
        <label for="body" class="control-label">评论内容:</label>
        <textarea id="body" name="body"  class="form-control" required="required"></textarea>
    </div>
    <button type="submit" class="btn btn-success">回复</button>
</form>
<link href="//cdn.bootcss.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">