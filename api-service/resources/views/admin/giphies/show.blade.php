@extends('admin.templates.main')

@section('title', 'Giphy Info')
@section('description', 'You can view the giphy info')
    
@section('content')
    <h3>
        {{ $giphy->title }}
    </h3>
    <img class="mr-2" src="{{ $giphy->url }}" alt="{{ $giphy->title }}" width="auto" height="150px">
    <table class="table">
        <tbody>
            <tr>
                <td>ID: </td>
                <td>{{ $giphy->id }}</td>
            </tr>
            <tr>
                <td>TITLE: </td>
                <td>
                    <strong>
                        {{ $giphy->title }}
                    </strong>
                </td>
            </tr>
            <tr>
                <td>URL: </td>
                <td>
                    <a href="{{ $giphy->url }}" target="_blank">
                        {{ $giphy->url }}
                    </a>
                </td>
            </tr>
            <tr>
                <td>Rating: </td>
                <td>{{ $giphy->rating }}</td>
            </tr>
            <tr>
                <td>Copies Number: </td>
                <td>{{ $giphy->copies_number }}</td>
            </tr>
        </tbody>
    </table>
@endsection