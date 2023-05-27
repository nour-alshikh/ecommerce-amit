@extends('layouts/layout')

@section('title')
    Cart
@endsection

@section('content')
    {{-- nav section --}}
    @include('comp.home.nav')

    {{-- search section --}}
    @include('comp.home.search')

    {{-- navbar section --}}
    @include('comp.home.navbar')

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
                <li class="breadcrumb-item"><a href="{{ route('cart') }}">Cart</a></li>
            </ol>
        </nav>
        <div class="d-flex flex-wrap">
            <div class="col-md-8 p-2">
                <div class="border rounded-3 d-flex flex-column align-items-start justify-content-center my-4">
                    <h2 class="p-4 fw-bold fs-3 border-bottom w-100">Cart - {{ $cart_count }} items</h2>
                    @if ($cart !== null)
                        @foreach ($cart as $item)
                            <div class="p-3 d-flex flex-wrap justify-content-start p-2 align-items-start">
                                <div class="col-lg-4">
                                    <img style="min-height:400px" class="w-100" src="/uploads/products/{{ $item->image }}"
                                        alt="">
                                </div>
                                <div class="col-lg-4 d-flex p-2 flex-column justify-content-between h-100">
                                    <h4 class="fs-4 fw-bold mb-5">{{ $item->product_name }}</h4>
                                    <p class="text-success">In Stock</p>
                                    <p>Remaining : 142 Item</p>

                                    <a href="{{ route('cart.delete', $item->id) }}"
                                        class="trash text-white p-2 bg-danger cursor-pointer" style="width: fit-content;">
                                        <i class="fas fa-trash-can"></i>
                                    </a>
                                </div>
                                <div class="col-lg-4 p-4 d-flex flex-column align-items-center">
                                    <form action="{{ route('decrease', $item->id) }}" method="POST"
                                        class="d-flex align-items-center">
                                        @csrf
                                        <input type="hidden" value="1" name="quantity" />
                                        <button type="submit" style="width: 50px; height:80px;"
                                            class="minus px-2 py-1 fw-bold fs-3 bg-primary cursor-pointer rounded-3 text-white d-flex justify-content-center align-items-center">
                                            -
                                        </button>
                                    </form>
                                    <div class="p-2 border-2 m-2 rounded-3 d-flex flex-column"
                                        style="max-width: 150px; height: 80px;">
                                        <label class="text-muted">Quantity</label>
                                        <input type="number" disabled style="outline: none; border:none;"
                                            value="{{ $item->quantity }}" />
                                    </div>
                                    <form action="{{ route('increase', $item->id) }}" method="POST"
                                        class="d-flex align-items-center">
                                        @csrf
                                        <input type="hidden" value="1" name="quantity" />
                                        <button type="submit" style="width: 50px; height:80px;"
                                            class="minus px-2 py-1 fw-bold fs-3 bg-primary cursor-pointer rounded-3 text-white d-flex justify-content-center align-items-center">
                                            +
                                        </button>
                                    </form>
                                    <p class="fw-bold fs-4">Price : $ {{ $item->price }}</p>
                                    <p class="fw-bold fs-4">Total : $ {{ $item->price }}</p>

                                </div>
                            </div>
                        @endforeach
                        <div class="d-flex justify-content-center align-items-center w-100">
                            {{ $cart->links() }}
                        </div>
                    @else
                        <p class="p-4 fw-medium">There are no items</p>
                    @endif
                </div>
                <div class="border rounded-3 d-flex flex-column flex-wrap align-items-start justify-content-center my-4">
                    <h2 class="p-4 fw-bold fs-3 border-bottom w-100">Expected shippeng delivery</h2>
                    <p class="p-4 fw-medium">08 Mar 2023 - 12 Mar 2023</p>
                </div>
                <div class="border rounded-3 d-flex flex-column flex-wrap align-items-start justify-content-center my-4">
                    <h2 class="p-4 fw-bold fs-3 border-bottom w-100">We accept</h2>
                    <div class="footerItem mb-0 d-flex justify-content-center align-items-center mb-0 p-4">
                        <i class="fa-brands fa-cc-visa fs-3 px-1"></i>
                        <span class="fst-italic px-1 masterCardIcon fw-medium" style="border-radius: 3px;">Master
                            Card</span>
                        <i class="fa-brands fa-cc-paypal fs-3 px-1"></i>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 p-2">
                <div class="border rounded-3 my-4">
                    <h2 class="p-4 fw-bold fs-3 border-bottom w-100">Summary</h2>
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="p-4 fw-medium">Products</p>
                        <h6 class="p-4 fw-medium">$ <span id="price">{{ $total_price ?? 0 }}</span></h6>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="p-4 fw-medium">Tax</p>
                        <h6 class="p-4 fw-medium">$ 12.00</h6>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="px-4 fw-bold fs-6 w-100">Total amount</p>
                            <p class="px-4 fw-bold fs-6 w-100">(Including VAT)</p>
                        </div>
                        <h6 class="p-4 fw-bold">$<span id="total">{{ $total_price + ($total_price * 12) / 100 }}</span>
                        </h6>
                    </div>
                    <a href="{{ route('make_order') }}" class="btn btn-primary m-4">Go to checkout</a>
                </div>
            </div>
        </div>
    </div>
    {{-- footer section --}}
    @include('comp.home.footer')
@endsection
