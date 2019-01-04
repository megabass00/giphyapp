@extends('admin.templates.main')

@section('title', 'Edit User')
@section('description', 'You can edit user info...')
    
@section('content')

{!! Form::open(['route'=>['admin.users.update', $user], 'method'=>'PUT']) !!}

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
        {!! Form::text('name', $user->name, ['class'=>'form-control', 'placeholder'=>'Name', 'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Last Name') !!}
        {!! Form::text('last_name', $user->last_name, ['class'=>'form-control', 'placeholder'=>'Last Name', 'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Email') !!}
        {!! Form::email('email', $user->email, ['class'=>'form-control', 'placeholder'=>'Email', 'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Password') !!}
        {!! Form::password('password', ['class'=>'form-control', 'placeholder'=>'********']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Profile') !!}
        {!! Form::select('type', ['member'=>'Member','admin'=>'Administrator'], $user->type, ['class'=>'select2 form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Update User', ['class'=>'btn btn-primary']) !!}
    </div>
    
{!! Form::close() !!}

@endsection