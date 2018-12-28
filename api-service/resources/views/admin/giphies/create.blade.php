@extends('admin.templates.main')

@section('title', 'New Giphy')
@section('description', 'You can create new giphies...')

@section('css')
<style>
            
</style>
@endsection

    
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
        {!! Form::textarea('description', null, ['class'=>'form-control', 'rows'=>3, 'placeholder'=>'Description', 'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('URL') !!}
        {!! Form::text('url', null, ['class'=>'form-control', 'placeholder'=>'Enter url', 'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Tags') !!}
        {!! Form::select('tags[]', $tags, null, ['class'=>'form-control select-tags', 'multiple']) !!}
        {!! Form::button('New Tag', ['class'=>'btn btn-primary', 'data-toggle'=>'modal', 'data-target'=>'#newTag']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Create Giphy', ['class'=>'btn btn-primary']) !!}
    </div>
    
{!! Form::close() !!}

<!-- Add Tag Modal -->
<div class="modal fade" id="newTag" tabindex="-1" role="dialog" aria-labelledby="newTagLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newTagLabel">
                    Add new tag
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    {!! Form::label('Tag Name') !!}
                    {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Enter tag name...', 'required']) !!}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                {!! Form::submit('Update giphy', ['class'=>'btn btn-primary new-tag-submit']) !!}
            </div>
        </div>
    </div>
</div>

@endsection


@section('js')
    <script>
        $(document).ready(function() {
            $('.select-tags').select2({
                placeholder: 'Select max 3 tags...',
                maximumSelectionLength: 3
            });
        });
    </script>
@endsection