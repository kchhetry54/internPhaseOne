@extends('layouts.app')

@section('title', 'User Details')

@section('content')

    <div class="card mt-4">
        <div class="card-header d-flex">
            <h3 class="card-title col-md-10" style="font-size: 1.5rem;    line-height: 1.5">
                User Details
            </h3>

            <div class="card-tools col-md-1 ">
                <a href="{{ route('users.index') }}"
                class="btn btn-primary " >
                Go Back
            </a>
            </div>
        </div>
        <div class="card-body p-0">
            <table class="table table-bordered table-striped">
                <tr>
                    <th>ID</th>
                    <td>{{ $user->id }}</td>
                </tr>
                <tr>
                    <th>Nmae</th>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <th>Created Date</th>
                    <td>{{ $user->created_at }}</td>
                </tr>
                <tr>
                    <th>Updated Date</th>
                    <td>{{ $user->update_at }}</td>
                </tr>
            </table>
        </div>
    </div>

@endsection
