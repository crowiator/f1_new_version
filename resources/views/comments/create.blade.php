@include('errors')
<form action="{{ route('comments.store') }}" method="POST" class="add-comment-form">
    @csrf
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Comment</label>
        <textarea name="text" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
    <div class="control">
        <button type="submit" class="btn btn-outline-danger">Add comment</button>
    </div>
    <input type="hidden" name="post_id" value="{{$post->id}}">
</form>
