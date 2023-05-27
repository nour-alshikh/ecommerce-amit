@extends('admin.dashboard')

@section('dashboardContnet')
    <h3 class="text-primary p-4 fs-1 fw-bold">Products</h3>
    @if (session()->has('success_message'))
        <div class="alertContainerDash position-relative">
            <div class="alert alert-success w-50 mx-auto d-flex justify-content-between align-items-center">
                <p class="m-0">{{ session()->get('success_message') }}</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif
    @if (session()->has('primary_message'))
        <div class="alertContainerDash position-relative">
            <div class="alert alert-primary w-50 mx-auto d-flex justify-content-between align-items-center">

                <p class="m-0">{{ session()->get('primary_message') }}</p>

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif
    @if (session()->has('danger_message'))
        <div class="alertContainerDash position-relative">
            <div class="alert alert-danger w-50 mx-auto d-flex justify-content-between align-items-center">

                <p class="m-0">{{ session()->get('danger_message') }}</p>

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif
        <div style="padding: 30px" class="tableContainer col-lg-12">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Sale</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">category</th>
                    <th scope="col">Image</th>
                    @if (Auth::user()->type === 'admin')
                        <th scope="col">Actions</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;
                @endphp
                @foreach ($products as $product)
                    <tr height="180px">
                        <th scope="row">{{ $i }}</th>
                        @php
                            $i++;
                        @endphp
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->sale }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->cat->name }}</td>
                        <td style="width: 150px; height: 150px;">
                            <img class="w-100 h-100" src="/uploads/products/{{ $product->image }}" />
                        </td>
                        @if (Auth::user()->type === 'admin')
                            <td class="d-flex align-items-center" height="180px">
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                    @csrf
                                    <button>
                                        <i class="fas fa-trash-can text-danger fs-5"></i>
                                    </button>
                                    @method('DELETE')
                                </form>
                                <a href="{{ route('products.edit', $product->id) }}" class="cursor-pointer p-1 fs-5">
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
