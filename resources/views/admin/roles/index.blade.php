@extends('layouts.admin')

@section('content')

    <h1 class="mt-4">Roles</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a style="text-decoration: none" href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Roles</li>
    </ol>

    <div class="row">

        <div class="col-sm-4">

            <form action="{{ route('admin.roles.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Name :</label>
                    <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name">
                    <div>
                        @error('name')
                        <span><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add Role</button>
                </div>

            </form>

        </div>

        <div class="col-sm-8">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fa-brands fa-redhat"></i>
                    All Roles
{{--                    <a href="{{ route('admin.index') }}"><button class="btn btn-info btn-sm float-end"><i class="fa fa-plus" aria-hidden="true"></i> Add Roles</button></a>--}}
                </div>
                <div class="card-body">
                    @if($roles)
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <td>{{ $role->name }}</td>

                                <td>
                                    <a class="btn btn-outline-warning btn-sm tooltip-test" title="Edit Role"
                                       href="{{ route('admin.roles.edit', $role->id) }}"><i class="fa-solid fa-pencil"></i></a>
                                    <div class="btn-group me-5">
                                        <form id="role-delete" action="{{ route('admin.roles.destroy', $role->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" title="Delete Role"
                                                    class="btn btn-sm btn-outline-danger"
                                                ><i class="fa-solid fa-trash-can"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @else
                        <h3>No Roles</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
@stop
