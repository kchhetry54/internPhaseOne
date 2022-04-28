@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

    <div class="card mt-4">
        @if (session('success'))
            <div class="alert alert-success" >
                {{ session('success') }}
            </div>
        @endif
        <h2 class="p-2">You are logged in!!!</h2>
        <table class="table table-bordered table-striped">
            <thead>
                <th>Name</th>
                <th>Email</th>
                <th>Last Login Date</th>
                <th>Action</th>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->email }}</td>
                    <td>{{ $data->last_login_at  }}</td>

                    <td>
                        <a href="{{ route('changepassword') }}" class="btn btn-primary">Change Password</a>
                    </td>

                </tr>
            </tbody>
        </table>
    </div>
@endsection