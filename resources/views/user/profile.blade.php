@extends('layouts/layout')

@section('title')
    Profile
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
                <li class="breadcrumb-item"><a href="#">User</a></li>
                <li class="breadcrumb-item active" aria-current="page">Profile</li>
            </ol>
        </nav>
        <div class="border rounded-3 d-flex flex-wrap align-items-start justify-content-center">
            <div class="col-md-4 d-flex justify-content-center align-items-start ps-4 ps-md-0">
                <div style="font-size: 200px; color: #aaa;">
                    <i class="fas fa-user"></i>
                </div>
            </div>
            <div class="col-md-8">
                <form action={{ route('users.update', Auth::user()->id) }} method="POST">
                    @csrf
                    @method('PUT')
                    <div class="d-flex flex-wrap">
                        <div class="col-12 col-md-6 p-1">
                            <div class="my-1">
                                <label for="email">Email</label>
                                <input id="email" name="email" value="{{ Auth::user()->email }}"
                                    class="form-control w-100" />
                            </div>
                            <div class="col-12 col-md-6 p-1 w-100">
                                <div class="my-1">
                                    <label for="phone">Phone</label>
                                    <input id="phone" value="{{ Auth::user()->phone }}" class="form-control w-100" />
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 p-1">
                            <div class="my-1">
                                <label for="name">Name</label>
                                <input id="name" name="name" value="{{ Auth::user()->name }}"
                                    class="form-control w-100" />
                            </div>
                        </div>
                        <div class="w-100 p-1">
                            <div class="my-1">
                                <label for="address1">Address</label>
                                <input id="address1" value="{{ Auth::user()->address }}" class="form-control w-100" />
                            </div>
                        </div>
                        <div class="w-100 p-1">
                            <div class="my-1">
                                <label for="address2">Address2</label>
                                <input id="address2" value="{{ Auth::user()->address_2 }}" class="form-control w-100" />
                            </div>
                        </div>

                        <div class="col-12 col-md-6 p-1">
                            <div class="my-1">
                                <label for="country">Country</label>
                                <input id="country" value="{{ Auth::user()->country }}" class="form-control w-100" />
                            </div>
                        </div>
                        <div class="col-12 col-md-6 p-1">
                            <div class="my-1">
                                <label for="city">City</label>
                                <input id="city" value="{{ Auth::user()->city }}" class="form-control w-100" />
                            </div>
                        </div>

                        <div class="col-12 col-md-6 p-1">
                            <div class="my-1">
                                <label for="state">State</label>
                                <input id="state" value="{{ Auth::user()->state }}" class="form-control w-100" />
                            </div>
                        </div>
                        <div class="col-12 col-md-6 p-1">
                            <div class="my-1">
                                <label for="zip">Zip</label>
                                <input id="zip" value="{{ Auth::user()->zip }}" class="form-control w-100" />
                            </div>
                        </div>
                    </div>
                    <div class="my-1 d-flex justify-content-end p-4">
                        <button id="profileButton" type="submit" class="form-control">Update</button>
                    </div>
            </div>
        </div>
        </form>
    </div>
    </div>
    </div>


    {{-- footer section --}}
    @include('comp.home.footer')
@endsection
