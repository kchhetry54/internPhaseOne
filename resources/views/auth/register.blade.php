
@extends('layouts.app')

@section('title', 'register')

@section('content')

<div class="row">
    <div class="col-md-4 col-md-offset-4 mx-auto mt-5 bg-warning py-5 px-4 rounded">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <h2 class="fw-bold mb-4 p-2 rounded">Registration Form</h2>

        <form action="{{ route('store') }}" method="POST">
            @csrf
 
            <div class="form-group">
                <label for="name">Full Name</label>
                <input class="form-control" type="text" name="name" id="name" placeholder="Enter Full Name" value=" {{ old('name') }} ">
                <span class="text-danger">@error('name') {{ $message }} @enderror</span>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" type="email" name="email" id="email" placeholder="Enter Email" value="{{ old('email') }}">
                <span class="text-danger">@error('email') {{ $message }} @enderror</span>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" type="password" name="password" id="password" placeholder="Enter Password" value="">
                <span class="text-danger">@error('password') {{ $message }} @enderror</span>
            </div>
            <div class="form-group">
                <label for="password">Confirm Password</label>
                <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" value="">
                <span class="text-danger">@error('password') {{ $message }} @enderror</span>
            </div>
            <div class="form-group">
                <button class="btn btn-primary mt-2" type="submit">Register</button>
            </div>
        </form>
        <p class="mt-2">I already have an account.   
            <a href="{{ route('login') }}"> Login</a>
        </p>
    </div>
</div>

@endsection