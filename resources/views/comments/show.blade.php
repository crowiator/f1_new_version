<!-- Comment Row -->
<!-- Comment Row -->
<link rel="stylesheet" href="{{ asset('css/commentShow.css') }}">
<div class="d-flex flex-row comment-row m-t-0">
    <div class="comment-text">
        <h6 class="font-medium"><a href="/users/{{$comment->user->id}}" class="author">
                <strong>{{$comment->user->name}}</strong>
            </a></h6> <span class="m-b-15 d-block">{{$comment->text}}</span>

        <form action="{{ route('comments.destroy',$comment->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
</div>

</div>

