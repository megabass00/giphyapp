@extends('admin.templates.main')

@section('title', 'Tag Info')
@section('description', 'You can view the tag info')
    
@section('content')
    <h3>
        {{ $tag->name }}
    </h3>
    
    <table class="table">
        <tbody>
            <tr>
                <td>ID: </td>
                <td>{{ $tag->id }}</td>
            </tr>
            <tr>
                <td>NAME: </td>
                <td>
                    <strong>
                        {{ $tag->name }}
                    </strong>
                </td>
            </tr>
        </tbody>
    </table>
@endsection