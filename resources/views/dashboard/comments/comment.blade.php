<div class="col-md-12">
    <h5><span style="color:#31b0d5">{{$comment->owner->name}}</span>:</h5>
    <h5>{{$comment->body}}</h5>

    @include('comments.form',['parentId'=>$comment->id])

    @if(isset($comments[$comment->id]))
        @include('comments.list',['collections'=>$comments[$comment->id]])
    @endif
    <hr>
</div>