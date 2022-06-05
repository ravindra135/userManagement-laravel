@extends('layouts.admin')

@section('content')

    <h1 class="mt-4">Roles</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a style="text-decoration: none" href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a style="text-decoration: none" href="{{ route('admin.roles.index') }}">Role</a></li>
        <li class="breadcrumb-item active">Edit Role</li>
    </ol>

    <div class="row">

        <div class="col-sm-4">

            <form action="{{ route('admin.roles.update', $role->id) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="name">Name :</label>
                    <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $role->name }}" name="name">
                    <div>
                        @error('name')
                        <span><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update Role</button>
                </div>

            </form>

        </div>

        <div class="col-sm-8">

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fa-solid fa-shield"></i>
                    Role Permission
                </div>
                <div class="card-body bg-light">
                    @if($role->permissions)
                        @foreach ($role->permissions as $role_permission)
                            <span class="badge rounded-pill bg-dark text-light">{{ $role_permission->name }}</span>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fa-solid fa-shield"></i>
                    Add Permissions
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Permissions</th>
                            <th>Attach</th>
                            <th>Revoke</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($permissions as $permission)
                        <tr>
                            <td>{{ $permission->name }}</td>
                            <td>
                                <form method="post" action="{{ route('admin.role.attachPermission', $role) }}">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="permission" value="{{ $permission->id }}">
                                    <button type="submit" class="btn btn-sm btn-outline-success"
                                         @if($role->hasPermissionTo($permission))
                                             hidden
                                    @endif
                                    >Assign</button>
                                </form>
                            </td>
                            <td>
                                <form method="post" action="{{ route('admin.role.detachPermission', $role) }}">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="permission" value="{{ $permission->id }}">
                                    <button type="submit" class="btn btn-sm btn-outline-danger"
                                        @if(!$role->hasPermissionTo($permission))
                                        hidden
                                    @endif
                                    >Revoke</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@stop
