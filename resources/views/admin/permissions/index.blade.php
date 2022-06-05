@extends('layouts.admin')

@section('content')

    <h1 class="mt-4">Permissions</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a style="text-decoration: none" href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Permissions</li>
    </ol>

    <div class="row">

        <div class="col-sm-4">

            <form action="{{ route('admin.permissions.store') }}" method="post">
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
                    <button type="submit" class="btn btn-primary">Add Permission</button>
                </div>

            </form>

        </div>

        <div class="col-sm-8">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fa-solid fa-shield"></i>
                    All Permission
                </div>
                <div class="card-body">
                    @if(!$permissions)
                        <h3>No Permissions</h3>
                        @else
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($permissions as $permission)
                                <tr>
                                    <td>{{ $permission->name }}</td>
                                    <td>
                                        <a class="btn btn-outline-info btn-sm" href="{{ route('admin.index') }}"><i class="fa-solid fa-shield"></i></a>

                                        <div class="btn-group me-5">
                                            <form id="permission-delete" action="{{ route('admin.permissions.destroy', $permission->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash-can"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop
