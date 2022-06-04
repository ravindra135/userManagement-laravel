@extends('layouts.admin')

@section('content')

    <h1 class="mt-4">Users</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a style="text-decoration: none" href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Users</li>
    </ol>

@stop
