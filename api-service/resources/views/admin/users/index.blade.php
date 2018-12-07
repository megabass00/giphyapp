@extends('admin.templates.main')

@section('title', 'Users List')
@section('description', 'You can view the users list')
    
@section('content')
    <a class="btn btn-primary" href="{{ action('UsersController@create') }}" role="button">
        <i class="fas fa-plus"></i>
        Create User
    </a>
    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Profile</th>
            <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if ($user->type == 'admin')
                            <span class="badge badge-info">{{ $user->type }}</span>
                        @else
                            <span class="badge badge-primary">{{ $user->type }}</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.users.show', $user->id)}}" class="btn btn-success">
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.users.edit', $user->id)}}" class="btn btn-warning">
                            <i class="fas fa-pen"></i>
                        </a>
                        <a href="{{ route('admin.users.destroy', $user->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                <tr>
            @endforeach
        </tbody>
    </table>
    {!! $users->render() !!}
@endsection