
@extends('layouts.app')

@section('title', 'edit')

@section('content')

<div class="row">
    <div class="col-md-4 col-md-offset-4 mx-auto mt-5 bg-warning py-5 px-4 rounded">
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
        </div>
    @endif
        <h2 class="fw-bold mb-4 p-2 rounded">Update Details</h2>

        <form action="{{ route('users.update', $user) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Full Name</label>
                <input class="form-control" type="text" name="name" id="name" placeholder="Enter Full Name" value=" {{ old('name') ?? $user->name }} ">
                <span class="text-danger">@error('name') {{ $message }} @enderror</span>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" type="email" name="email" id="email" placeholder="Enter Email" value="{{ old('email')?? $user->email  }}">
                <span class="text-danger">@error('email') {{ $message }} @enderror</span>
            </div>

            <div class="form-group">
                <button class="btn btn-primary mt-2" type="submit">Update</button>
            </div>
        </form>

    </div>
</div>

@endsection