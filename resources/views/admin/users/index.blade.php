@extends('layouts.admin')

@section('content')

    <h1 class="mt-4">Users</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a style="text-decoration: none" href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Users</li>
    </ol>

    @if($users)
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-users"></i>
            All Users
            <a href="{{ route('admin.index') }}"><button class="btn btn-info btn-sm float-end"><i class="fa fa-plus" aria-hidden="true"></i> Add User</button></a>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                @foreach($users as $user)
                <tbody>
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->getRoleNames() }}</td>
                        <td></td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
    @endif
@stop
