@extends('admin.templates.main')

@section('title', 'New Tag')
@section('description', 'You can create new tags...')
    
@section('content')

{!! Form::open(['action'=>'TagsController@store', 'method'=>'POST']) !!}
    
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
        {!! Form::label('Name') !!}
        {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Name', 'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Create Tag', ['class'=>'btn btn-primary']) !!}
    </div>
    
{!! Form::close() !!}

@endsection