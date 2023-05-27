@extends('layouts/layout')

@section('title')
    Products
@endsection

@section('content')
    {{-- nav section --}}
    @include('comp.home.nav')

    {{-- search section --}}
    @include('comp.home.search')

    {{-- navbar section --}}
    @include('comp.home.navbar')


    <div class="container my-5">
        <h2 class="m-0 items text-center fs-2 position-relative">{{ $title }}</h2>
        <div class="d-flex flex-wrap ">
            <div class="col-12 col-md-4 pe-4 my-5">
                <p class="w-100 bg-ee p-2 link m-0">Categories</p>
                <div class="d-flex flex-column w-100 p-2 link">
                    <a href="{{ route('shop') }}">All</a>
                </div>
                @foreach ($cats as $cat)
                    <div class="d-flex flex-column p-2 link">
                        <a href="{{ route('shop_cat', $cat->id) }}">{{ $cat->name }}</a>
                    </div>
                @endforeach
            </div>
            <div class="col-md-8 p-1 my-4 d-flex flex-wrap">
                @foreach ($products as $product)
                    <div class="col-md-4 p-1 my-3 ">
                        <div class="image">
                            <div class="itemOverlay">
                                <div class="eye">
                                    <a href="{{ route('products.show', $product->id) }}">
                                        <i class="fas fa-eye text-white fs-1"></i>
                                    </a>
                                </div>
                            </div>
                            <img style="min-height:400px" class="w-100" src="/uploads/products/{{ $product->image }}"
                                alt="">

                            <div class="price">$ {{ $product->price }}</div>
                        </div>
                        <h3 class="my-2">{{ $product->name }}</h3>
                        <div class="icons fs-4 my-3 d-flex justify-content-start align-items-center">
                            <div class="star">
                                <i class="fas fa-star fs-2"></i>
                            </div>
                            <div class="star">
                                <i class="fas fa-star fs-2"></i>
                            </div>
                            <div class="star">
                                <i class="fas fa-star fs-2"></i>
                            </div>
                            <div class="star">
                                <i class="fas fa-star fs-2"></i>
                            </div>
                            <div class="star">
                                <i class="fas fa-star fs-2"></i>
                            </div>
                        </div>
                        <div class="share d-flex justify-content-start align-items-center">
                            <div class="icon heart mx-1">
                                <i class="fas fa-heart fs-4"></i>
                            </div>
                            <div class="icon cart mx-1">
                                <i class="fas fa-cart-shopping fs-4"></i>
                            </div>
                            <div class="icon share mx-1">
                                <i class="fas fa-share-nodes fs-4"></i>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="d-flex justify-content-center align-items-center w-100">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>

        {{-- footer section --}}
    @include('comp.home.footer')
