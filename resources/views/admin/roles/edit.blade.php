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
                <div class="card-body">
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fa-solid fa-shield"></i>
                    Add Permissions
                </div>
                <div class="card-body">
                    <form>
                        @foreach($permissions as $permission)

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{ $permission->name }}" id="flexCheckIndeterminate">
                                <label class="form-check-label" for="flexCheckIndeterminate">
                                    {{$permission->name}}
                                </label>
                            </div>

                        @endforeach
                    </form>
                </div>
                <div class="card-footer">
                    <button class="btn btn-info float-end">Update Permissions</button>
                </div>
            </div>

        </div>
    </div>
@stop
