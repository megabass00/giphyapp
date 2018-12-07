@extends('admin.templates.main')

@section('title', 'User Info')
@section('description', 'You can view the user info')
    
@section('content')
    <h3>
        {{ $user->name }}
    </h3>
    <table class="table">
        <tbody>
            <tr>
                <td>ID: </td>
                <td>{{ $user->id }}</td>
            </tr>
            <tr>
                <td>NAME: </td>
                <td>{{ $user->name }}</td>
            </tr>
            <tr>
                <td>EMAIL: </td>
                <td>{{ $user->email }}</td>
            </tr>
            <tr>
                <td>PROFILE: </td>
                <td>
                    @if ($user->type == 'admin')
                        <span class="badge badge-info">{{ $user->type }}</span>
                    @else
                        <span class="badge badge-primary">{{ $user->type }}</span>
                    @endif
                </td>
            </tr>
        </tbody>
    </table>
@endsection