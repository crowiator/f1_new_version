@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{asset('css/imageUpload.css')}}">
<base href="https://s3-us-west-2.amazonaws.com/s.cdpn.io/4273/">
<div class="container">
<div id="captioned-gallery">
    <figure class="slider">
        @foreach($images as $index => $image)
        <figure>
            <img class="d-block w-100" src="{{ asset('uploads/images/'.$image->image_path) }}" alt="First slide">
            <figcaption>Hobbiton, New Zealand</figcaption>
        </figure>
        @endforeach

    </figure>
</div>
</div>
@endsection


