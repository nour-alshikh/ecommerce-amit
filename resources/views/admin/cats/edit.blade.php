@extends('admin.dashboard')

@section('dashboardContnet')
    <h3 class="text-primary p-4 fs-1 fw-bold">Edit - {{ $cat->name }}</h3>
    <form action="{{ route('cats.update', $cat->id) }}" method="POST" class="p-4">
        @method('PUT')
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $cat->name }}" />
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
