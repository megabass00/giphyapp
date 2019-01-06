@extends('admin.templates.main')

@section('title', 'Edit giphy')
@section('description', 'You can edit giphy info...')
    
@section('content')

{!! Form::open(['route'=>['admin.giphies.update', $giphy], 'method'=>'PUT']) !!}

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
        {!! Form::text('title', $giphy->title, ['class'=>'form-control', 'placeholder'=>'Title', 'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Description') !!}
        {!! Form::textarea('description', $giphy->description, ['class'=>'form-control', 'rows'=>3, 'placeholder'=>'Description', 'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('URL') !!}
        {!! Form::text('url', $giphy->url, ['class'=>'form-control', 'placeholder'=>'Description', 'required']) !!}
        <img class="mt-3" src="{{ $giphy->url }}" alt="{{ $giphy->title }}" width="auto" height="150px">
    </div>

    <div class="form-group">
        {!! Form::label('Tags') !!} 
        <div class="input-group">
            {!! Form::select('tags[]', $tags, $selectedTags, ['class'=>'form-control select-tags', 'multiple']) !!}
            <span class="input-group-btn">
                    {!! Form::button('New Tag', ['class'=>'btn btn-primary', 'data-toggle'=>'modal', 'data-target'=>'#newTag']) !!}
            </span>
        </div>
    </div>

    <div class="form-group">
        {!! Form::submit('Update giphy', ['class'=>'btn btn-primary']) !!}
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
                <button type="submit" class="btn btn-primary new-tag-submit">
                    <simple-spinner></simple-spinner>
                    Add Tag
                </button>
            </div>
        </div>
    </div>
</div>

@endsection


@section('js')
    <script>
        $(document).ready(function() {
            $('.simple-spinner-container').hide();

            $('.select-tags').select2({
                placeholder: 'Select max 3 tags...',
                maximumSelectionLength: 3
            });

            $('.new-tag-submit').click(function() {
                $('.simple-spinner-container').show();
                var modal = $('#newTag');
                var name = modal.find('input[name="name"]').val();
                var list = $('.select-tags');
                $.ajax({
                    data: {
                        name: name
                    },
                    type: 'POST',
                    url: '{{ url('admin/ajax/giphies/addTag') }}',
                    success: function(data) {
                        $('.simple-spinner-container').hide();
                        if (data.success) {
                            var newTag = data.tag;
                            var newOption = new Option(newTag.name, newTag.id, false, false);
                            list.append(newOption).trigger('change');
                            modal.find('input[name="name"]').val('');
                        }
                        modal.modal('toggle');
                    },
                    error: function() {
                        $('.simple-spinner-container').hide();
                        alert('AJAX ERROR');
                        modal.modal('toggle');
                    }
                });
            });
        });
    </script>
@endsection