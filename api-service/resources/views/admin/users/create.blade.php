@extends('admin.templates.main')

@section('title', 'New User')
@section('description', 'You can create new users...')
    
@section('content')

{!! Form::open(['action'=>'UsersController@store', 'method'=>'POST']) !!}

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
        {!! Form::label('Last Name') !!}
        {!! Form::text('last_name', null, ['class'=>'form-control', 'placeholder'=>'Last Name', 'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Email') !!}
        {!! Form::email('email', null, ['class'=>'form-control', 'placeholder'=>'Email', 'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Password') !!}
        {!! Form::password('password', ['class'=>'form-control', 'placeholder'=>'********', 'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Profile') !!}
        {!! Form::select('type', [''=>'Select a profile','member'=>'Member','admin'=>'Administrator'], null, ['class'=>'select2 form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Create User', ['class'=>'btn btn-primary']) !!}
    </div>
    
{!! Form::close() !!}

@endsection
