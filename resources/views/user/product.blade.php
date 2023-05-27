@extends('layouts/layout')

@section('title')
    Product - {{ $product->name }}
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

    <div class="container my-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a
                        href="{{ route('shop_cat', $product->cat->id) }}">{{ $product->cat->name }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
            </ol>
        </nav>
        <div class="d-flex align-items-start justify-content-center">
            <div class="col-md-4 d-flex justify-content-center align-items-start ps-4 ps-md-0">
                <div class="image w-100">
                    <img style="min-height:400px" class="w-100" src="/uploads/products/{{ $product->image }}"
                        alt="">
                    <div class="icons fs-4 my-3 d-flex justify-content-start align-items-center">
                        <div class="star px-1">
                            <i class="fas fa-star fs-2"></i>
                        </div>
                        <div class="star px-1">
                            <i class="fas fa-star fs-2"></i>
                        </div>
                        <div class="star px-1">
                            <i class="fas fa-star fs-2"></i>
                        </div>
                        <div class="star px-1">
                            <i class="fas fa-star fs-2"></i>
                        </div>
                        <div class="star px-1">
                            <i class="fas fa-star fs-2"></i>
                        </div>
                    </div>
                    <div class="price">$ {{ $product->price }}</div>
                </div>
            </div>
            <div class="col-md-8 px-4">
                <div class="d-flex justify-content-between align-items-center border-bottom pb-3">
                    <h2 class="fs-2 fw-bold">{{ $product->name }}</h2>
                    <div class="icon share mx-1">
                        <i class="fas fa-share-nodes fs-4"></i>
                    </div>
                </div>
                <h3 class="fs-3 fw-medium my-3 ">$ {{ $product->price }}</h3>
                <p class="my-2">{{ $product->description }}</p>
                <p class="text-success my-2">In Stock</p>
                <form method="POST" action="{{ route('add_to_cart', $product->id) }}">
                    @csrf
                    <input placeholder="Quantity" min="1" class="py-2 px-1 border my-2" name="quantity"
                        value="1" type="number" />
                    <div class="d-flex justify-content-start align-items-center">
                        <button id="profileButton" class="rounded-3 py-2 px-3 my-2" type="submit">
                            Add to cart
                            <i class="fas fa-cart-shopping"></i>
                        </button>
                        <div class="icon heart mx-2">
                            <i class="fas fa-heart fs-4"></i>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    {{-- footer section --}}
    @include('comp.home.footer')
@endsection
