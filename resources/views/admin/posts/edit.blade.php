@extends('adminlte::page')

@section('title', 'Cenec Blog')

@section('content_header')
    <h1>Editar Post</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            {!! Form::model($post, [
                'route' => ['admin.posts.update', $post],
                'method' => 'put',
                'autocomplete' => 'off',
                'files' => true,
            ]) !!}

            @include('admin.posts.partials.form')

            {!! Form::submit('Actualizar Post', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <style>
        .image-wrapper {
            position: relative;
            padding-bottom: 56.25%;
        }

        .image-wrapper img {
            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
    </style>
@stop

@section('js')
    <script src="{{ asset('vendor/speakingurl-master/speakingurl.min.js') }}"></script>
    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-2.1.0/dist/jquery.stringtoslug.min.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    <script>
        $(document).ready(function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-',
            });
        });

        ClassicEditor
            .create(document.querySelector('#extract'))
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#body'), {
                ckfinder: {
                    uploadUrl: '{{ route('image.upload') . '?_token=' . csrf_token() }}',
                }
            })
            .catch(error => {
                console.error(error);
            });


        $(document).ready(function() {

            $('#file').change(function(e) {

                let file = e.target.files[0];

                let reader = new FileReader();

                reader.onload = (event) => {

                    $('#picture').attr('src', event.target.result)

                };

                reader.readAsDataURL(file);

            })

        });
    </script>


@endsection
