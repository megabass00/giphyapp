@extends('admin.templates.main')

@section('title', 'Edit tag')
@section('description', 'You can edit tag info...')
    
@section('content')

{!! Form::open(['route'=>['admin.tags.update', $tag], 'method'=>'PUT']) !!}

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
        {!! Form::text('name', $tag->name, ['class'=>'form-control', 'placeholder'=>'Name', 'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Update tag', ['class'=>'btn btn-primary']) !!}
    </div>
    
{!! Form::close() !!}

@endsection