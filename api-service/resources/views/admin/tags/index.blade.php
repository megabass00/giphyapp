@extends('admin.templates.main')

@section('title', 'Tag List')
@section('description', 'You can view the tag list')
    
@section('content')
    <a class="btn btn-primary" href="{{ action('TagsController@create') }}" role="button">
        <i class="fas fa-plus"></i>
        Create Tag
    </a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tags as $tag)
                <tr>
                    <td>{{ $tag->id }}</td>
                    <td>{{ $tag->name }}</td>

                    <td>
                        <a href="{{ route('admin.tags.show', $tag->id)}}" class="btn btn-success">
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.tags.edit', $tag->id)}}" class="btn btn-warning">
                            <i class="fas fa-pen"></i>
                        </a>
                        <a href="{{ route('admin.tags.destroy', $tag->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                <tr>
            @endforeach
        </tbody>
    </table>
    {!! $tags->render() !!}
@endsection