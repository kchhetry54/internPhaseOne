
@extends('layouts.app')

@section('title', 'Login')

@section('content')

<div class="row">
    <div class="col-md-4 col-md-offset-4 mx-auto mt-5 bg-warning py-5 px-4 rounded">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
            </div>
        @endif
        @if (session('fail'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('fail') }}
        </div>
    @endif

        <h2 class="fw-bold mb-4 p-2 rounded">Login Page</h2>

        <form action="{{ route('loginuser') }}" method="POST">
            @csrf
 
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
                <button class="btn btn-primary mt-2" type="submit">Login</button>
            </div>
        </form>
        <p class="mt-2">I do not have an account.   
            <a href="{{ route('register') }}"> Register</a>
        </p>
    </div>
</div>

@endsection