@extends('layouts.app')


@section('content')
    @include('posts.article',['type' => 'full'])
    @include('comments.index')
@endsection
