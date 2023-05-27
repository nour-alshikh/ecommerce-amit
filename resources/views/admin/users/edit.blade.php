@extends('admin.dashboard')

@section('dashboardContnet')
    <h3 class="text-primary p-4 fs-1 fw-bold">Edit - {{ $user->name }}</h3>
    <form action="{{ route('users.update', $user->id) }}" method="POST" class="p-4">
        @method('PUT')
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" />
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" />
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
