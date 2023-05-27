@extends('admin.dashboard')

@section('dashboardContnet')
    <h3 class="text-primary p-4 fs-1 fw-bold">Categories</h3>

    @if (session()->has('success_message'))
        <div class="alertContainerDash position-relative">
            <div class="alert alert-success  w-50 mx-1 d-flex justify-content-between align-items-center">
                <p class="m-0">{{ session()->get('success_message') }}</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif
    @if (session()->has('primary_message'))
        <div class="alertContainerDash position-relative">
            <div class="alert alert-primary  w-50 mx-1 d-flex justify-content-between align-items-center">

                <p class="m-0">{{ session()->get('primary_message') }}</p>

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif
    @if (session()->has('danger_message'))
        <div class="alertContainerDash position-relative">
            <div class="alert alert-danger  w-50 mx-1 d-flex justify-content-between align-items-center">

                <p class="m-0">{{ session()->get('danger_message') }}</p>

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    <div style="padding: 30px">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    @if (Auth::user()->type === 'admin')
                        <th scope="col">Actions</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;
                @endphp
                @foreach ($cats as $cat)
                    <tr>
                        <th scope="row">{{ $i }}</th>
                        @php
                            $i++;
                        @endphp
                        <td>{{ $cat->name }}</td>
                        @if (Auth::user()->type === 'admin')
                            <td class="d-flex align-items-center">

                                <form action="{{ route('cats.destroy', $cat->id) }}" method="POST">
                                    @csrf
                                    <button>
                                        <i class="fas fa-trash-can text-danger fs-5"></i>
                                    </button>
                                    @method('DELETE')
                                </form>
                                <a href="{{ route('cats.edit', $cat->id) }}" class="cursor-pointer p-1 fs-5">
                                    <i class="fa-solid fa-pen text-success"></i>
                                </a>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
