@extends('admin.templates.main')

@section('title', 'Giphies List')
@section('description', 'You can view the giphies list')
    
@section('content')
    <a class="btn btn-primary" href="{{ action('GiphiesController@create') }}" role="button">
        <i class="fas fa-plus"></i>
        Create Giphy
    </a>
    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Giphy</th>
            <th scope="col">Rating</th>
            <th scope="col">Title</th>
            <th scope="col">Copies Number</th>
            <th scope="col">Description</th>
            <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($giphies as $giphy)
                <tr>
                    <td>{{ $giphy->id }}</td>
                    <td>
                        <img src="{{ $giphy->url }}" alt="{{ $giphy->title }}" width="auto" height="50px">
                    </td>
                    <td>{{ $giphy->rating }}</td>
                    <td>{{ $giphy->title }}</td>
                    <td>{{ $giphy->copies_number }}</td>
                    <td>
                        @if (strlen($giphy->description) > 20)
                            {{ substr($giphy->description, 0, 20) }}...
                        @else
                            {{ $giphy->description }}
                        @endif
                    </td>

                    <td>
                        <a href="{{ route('admin.giphies.show', $giphy->id)}}" class="btn btn-success">
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.giphies.edit', $giphy->id)}}" class="btn btn-warning">
                            <i class="fas fa-pen"></i>
                        </a>
                        <a href="{{ route('admin.giphies.destroy', $giphy->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                <tr>
            @endforeach
        </tbody>
    </table>
    {!! $giphies->render() !!}
@endsection