<div class="col-md-12">
    <h5><span style="color:#31b0d5">{{$comment->owner->nickname}}</span>:</h5>
    <h5>{{$comment->body}}</h5>

    @include('comments.form',['parentId'=>$comment->id])

    @if(isset($comments[$comment->id]))
        @include('comments.list',['collections'=>$comments[$comment->id]])
    @endif
    <hr>
</div>
<link href="//cdn.bootcss.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">