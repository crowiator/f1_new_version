<link href="{{ asset('css/article.css') }}" rel="stylesheet">
<article class="post {{$type}}">
    <header>
        <h2 class= >
            <a class="title" href="/posts/{{$post->id}}">
                {{$post->title}}
            </a>
        </h2>
    </header>
    <div class="content">
        <p>{{$post->text}}</p>
    </div>
    <div class="footer_article">
        <a href="/users/{{$post->user->id}}" class="author">
            <strong>Author: {{$post->user->name}}</strong>
        </a>
        <!--  -->


    </div>
</article>













