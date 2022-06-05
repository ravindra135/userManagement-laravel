@extends('layouts.admin')

@section('content')

    <h1 class="mt-4">Create User</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a style="text-decoration: none" href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a style="text-decoration: none" href="{{ route('admin.users.index') }}">Users</a></li>
        <li class="breadcrumb-item active">Create User</li>
    </ol>


    <div style="text-align: center;" class="card w-50">
        <div class="card-header">
            <i class="fas fa-users"></i>
            Create User
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('admin.users.store') }}">
                @csrf
                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Name :</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" id="name">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Email :</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="email" id="email">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="password" class="col-sm-2 col-form-label">Password :</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="role" class="col-sm-2 col-form-label">Role :</label>
                    <div class="col-sm-10">
                        <select class="form-select" name="role" id="role">
                            <option value="0" selected>Select</option>
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="d-grid gap-2 col-6 mx-auto">
                    <button class="btn btn-primary" type="submit">Create User</button>
                </div>
            </form>
        </div>
    </div>

@stop
