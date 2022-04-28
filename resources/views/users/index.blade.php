@extends('layouts.app')

@section('title', 'User list')

@section('content')

    <div class="card my-4 ">
        @if (session('success'))
        
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
            </div>
          @endif
          
        <div class="card-header d-flex ">

            <h3 class="card-title fw-bold col-md-10" style="font-size: 1.5rem;    line-height: 1.5">
                Users Lists
            </h3>

            <div class="card-tools col-md-1 ">
                <a href="{{ route('dashboard') }}"
                class="btn btn-primary" >
                Go Back
            </a>
            </div>
        </div>
        <div class="card-body table-responsive p-0">
            @if (count($users) > 0)
                    <table class="table table-bordered table-striped">
                        <thead class="bg-primary">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach ($users as $item)

                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td class="row">
                                            <div class="col-sm">
                                                <a href="{{ route('users.edit', $item) }}" class="btn btn-primary">Edit</a>
                                            </div>
                                            <div class="col-sm">
                                                <a href="{{ route('users.show', $item) }}" class="btn btn-success">Details</a>
                                            </div>


                                            <div class="col-sm">
                                                <form action="{{ route('users.destroy', $item) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                        <button class="btn btn-danger" type="submit">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>

                             @endforeach

                        </tbody>
                    </table>
            @else
                <div class="alert alert-warning">
                    There is no item in the table.
                </div>
            @endif

        </div>
        {{-- @if ($users->perpage()<$users->toal())
            <div class="card-footer bg-warning">
                {{ $users->links() }}
            </div>
        @endif --}}
    </div>

@endsection