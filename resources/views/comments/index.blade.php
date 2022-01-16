<section id="comments" class="align-content-center">
    <div class="col-lg-6">
        @auth()
            @include('comments.create')
        @endauth
        <div class="card-body text-center">
            <h4 class="card-title">Latest Comments</h4>
        </div>
        <div class="comment-widgets">
            @foreach($post->comments as $comment)
                @include('comments.show')

            @endforeach
        </div>
    </div>
</section>
