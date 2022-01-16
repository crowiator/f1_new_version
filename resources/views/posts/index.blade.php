@extends('layouts.app')
<link href="{{ asset('css/postsIndex.css') }}" rel="stylesheet">
@section('content')
    <div clas="container">
        <div class="row">
            <div class="col-sm col-md-2">
                <div>
                    <a class="btn btn-success" href="{{ route('posts.create') }}"> Create New Post</a>
                </div>
            </div>
            <div class="col-sm col-md-10">
                <h1>Posts</h1>
            </div>

        </div>
        @foreach($posts as $post)
            <div class="container p-5 my-5 border clanok">
                @include('posts.article',['type' => 'listing'])
                <form action="{{ route('posts.destroy',$post->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('posts.show',$post->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('posts.edit',$post->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>


        @endforeach
    </div>
@endsection
