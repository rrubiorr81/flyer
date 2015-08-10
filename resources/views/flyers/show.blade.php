@extends('layout.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h1>{!!$flyer->street!!}</h1>

                    <h2>${!!$flyer->price!!}</h2>

                    <div class="description">{!!nl2br($flyer->description)!!}</div>
            </div>
            <div class="col-md-9">
                @foreach($flyer->photos as $photos)
                    <img src="{!!$photos->path!!}" alt=""/>
                @endforeach
            </div>
        </div>
    </div>


    <hr/>

    <h1>Add photos</h1>

    <hr/>

    <form
        id="addPhotosForm"
        class="dropzone"
        action="{{ route('store_photo_path', [$flyer->zip, $flyer->street]) }}"
        method="POST">

        {{csrf_field()}}
    </form>
@stop

@section('scripts.footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/dropzone.js"></script>
    <script>
        Dropzone.options.addPhotosForm = {
            paramName: 'photo',
            maxFileSize: 3,
            acceptedFiles: '.jpeg, .jpg, .png, .bmp'
        }
    </script>
@stop