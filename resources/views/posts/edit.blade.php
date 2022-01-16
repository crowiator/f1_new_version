@extends('layouts.app')

@section('content')
<link href="{{ asset('css/evenEdit.css') }}" rel="stylesheet">
<div class="container">
    <div class="row">
        <div class="col-sm col-md-1">
            <div>
                <a class="btn btn-primary" href="{{ route('posts.index') }}"> Back</a>
            </div>
        </div>
        <div class="col-sm col-md-10">
            <h1>Edit post</h1>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif









    <form action="{{ route('posts.update',$post->id) }}" method="POST" enctype="multipart/form-data" >
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Title:</strong>
                    <input required type="text" name="title" value="{{ $post->title }}" class="form-control" placeholder="Title">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Text:</strong>
                    <textarea required type="text" name="text" value="{{ $post->text }}" class="form-control" placeholder="Text"></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
</div>
@endsection
