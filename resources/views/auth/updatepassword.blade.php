
@extends('layouts.app')

@section('title', 'change password')

@section('content')

<div class="row">

    <div class="col-md-4  mx-auto mt-5 bg-warning py-5 px-4 rounded">
            <h2 class="fw-bold mb-4 p-2">Change password</h2>

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if($errors)
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                @endif
                <form  method="POST" action="{{ route('updatepassword') }}">
                    @csrf
                    @method('GET')

                    <div class="form-group{{ $errors->has('current_password') ? ' has-error' : '' }}">
                        <label for="current_password" class=" control-label">Current Password</label>

                        <div class="">
                            <input id="current_password" type="password" class="form-control" name="current_password" required>

                            @if ($errors->has('current_password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('current_password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                        <label for="new_password" class="col-md-4 control-label">New Password</label>

                        <div class="">
                            <input id="new_password" type="password" class="form-control" name="new_password" required>

                            @if ($errors->has('new-password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('new_password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="new_password-confirm" class="control-label">Confirm New Password</label>

                        <div class="">
                            <input id="new_password-confirm" type="password" class="form-control" name="new_password_confirmation" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class=" ">
                            <button type="submit" class="btn btn-primary mt-2">
                                Change Password
                            </button>
                        </div>
                    </div>
                </form>
    </div>
</div>

@endsection