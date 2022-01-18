@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-sm col-md-10">
            <h1>Images</h1>
        </div>

        <div class="container mt-5">
            <h3 class="text-center mb-5">Image Upload in Laravel</h3>
            <form action="{{route('imageUpload')}}" method="post" enctype="multipart/form-data">
                @csrf
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <strong>{{ $message }}</strong>
                    </div>
                @endif

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="user-image mb-3 text-center">
                    <div class="imgPreview"></div>
                </div>

                <div class="custom-file">
                    <input type="file" name="imageFile[]" class="custom-file-input" id="images" multiple="multiple">
                    <label class="custom-file-label" for="images">Choose image</label>
                </div>

                <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
                    Upload Images
                </button>
            </form>
        </div>
    </div>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script>
        $(function () {
            // Multiple images preview with JavaScript
            var multiImgPreview = function (input, imgPreviewPlaceholder) {

                if (input.files) {
                    var filesAmount = input.files.length;

                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();

                        reader.onload = function (event) {
                            $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
                        }

                        reader.readAsDataURL(input.files[i]);
                    }
                }

            };

            $('#images').on('change', function () {
                multiImgPreview(this, 'div.imgPreview');
            });
        });
    </script>
@endsection('content')
