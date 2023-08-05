@extends('adminlte::page')

@section('title', 'Cenec Blog')

@section('content_header')
    <h1>Crear Nuevo Rol</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.roles.store']) !!}

                @include('admin.roles.partials.form')

            {!! Form::submit('Crear Rol', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}

        </div>
    </div>
@stop

@section('js')
    <script src="{{ asset('vendor/speakingurl-master/speakingurl.min.js') }}"></script>
    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-2.1.0/dist/jquery.stringtoslug.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-',
            });
        });
    </script>
@endsection
