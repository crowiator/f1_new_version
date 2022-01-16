@extends('layouts.app')
<link href="{{ asset('css/postsIndex.css') }}" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<div clas="container">
    @section('content')


</div>
@foreach($posts as $post)
    <div class="border ">
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

    @endsection
    </div>
