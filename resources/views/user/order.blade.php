@extends('layouts/layout')

@section('title')
    My Orders
@endsection

@section('content')
    {{-- nav section --}}
    @include('comp.home.nav')

    {{-- search section --}}
    @include('comp.home.search')

    {{-- navbar section --}}
    @include('comp.home.navbar')

    @if (session()->has('success_message'))
        <div class="alertContainer position-relative">
            <div class="alert alert-success position-fixed w-75 mx-auto d-flex justify-content-between align-items-center">
                <p class="m-0">{{ session()->get('success_message') }}</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif
    @if (session()->has('primary_message'))
        <div class="alertContainer position-relative">
            <div class="alert alert-primary position-fixed w-75 mx-auto d-flex justify-content-between align-items-center">

                <p class="m-0">{{ session()->get('primary_message') }}</p>

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif
    @if (session()->has('danger_message'))
        <div class="alertContainer position-relative">
            <div class="alert alert-danger position-fixed w-75 mx-auto d-flex justify-content-between align-items-center">

                <p class="m-0">{{ session()->get('danger_message') }}</p>

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    <div class="container my-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('profile') }}">User</a></li>
                <li class="breadcrumb-item active" aria-current="page">orders</li>
            </ol>
        </nav>
        <div class="rounded-3 border py-2" style="max-width: 100%;">
            <table class="table table-hover" style="max-width: 100%;">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product</th>
                        <th scope="col">Image</th>
                        <th scope="col" class="d-none d-lg-block" style="min-height: 100%;">Discount</th>
                        <th scope="col">Total</th>
                        <th scope="col" class="d-none d-lg-block" style="min-height: 100%;">Order Date</th>
                        <th scope="col d-none d-lg-block">Action</th>

                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 0;
                    @endphp
                    @foreach ($orders as $order)
                        @php
                            $i++;
                        @endphp
                        <tr style="min-height: 120px;">
                            <th scope="row">{{ $i }}</th>
                            <td>{{ $order->product_name }}</td>
                            <td>
                                <img style="width: 100px; height:100px" src="/uploads/products/{{ $order->product_image }}"
                                    alt="">
                            </td>
                            <td class="d-none d-lg-block" style="min-height: 120px;">%{{ $order->product_discount }}</td>
                            <td>${{ $order->product_total }}</td>
                            <td class="d-none d-lg-block " style="min-height: 120px;">{{ $order->order_date }}</td>
                            <td>
                                <div>
                                    <a class="btn btn-danger" href="{{ route('orders.destroy', $order->id) }}">
                                        Delete
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>


    {{-- footer section --}}
    @include('comp.home.footer')
@endsection
