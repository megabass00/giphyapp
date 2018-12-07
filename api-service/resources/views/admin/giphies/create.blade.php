@extends('admin.templates.main')

@section('title', 'New Giphy')
@section('description', 'You can create new giphies...')
    
@section('content')

{!! Form::open(['action'=>'GiphiesController@store', 'method'=>'POST']) !!}
    
    @if (count($errors) > 0)
        <div class="alert alert-danger" role="alert">
            <ul>
            @foreach ($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>
            @endforeach
            </ul>
        </div>
    @endif

    <div class="form-group">
        {!! Form::label('Title') !!}
        {!! Form::text('title', null, ['class'=>'form-control', 'placeholder'=>'Title', 'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Description') !!}
        {!! Form::textarea('description', null, ['class'=>'form-control', 'placeholder'=>'Description', 'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('URL') !!}
        {!! Form::text('url', null, ['class'=>'form-control', 'placeholder'=>'Enter url', 'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Create Giphy', ['class'=>'btn btn-primary']) !!}
    </div>
    
{!! Form::close() !!}

@endsection