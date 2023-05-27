@extends('layouts/layout')

@section('title')
    Home
@endsection
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

@section('content')
    {{-- nav section --}}
    {{-- @include('comp.home.nav') --}}



    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <div class="navbar-brand text-muted fs-6">Free Shipping on All orders Over $75</div>
            <div class="d-none d-lg-block">

                @guest
                    <div class="d-flex justify-content-end w-100">

                        <a class="px-1 text-muted" href="{{ route('login') }}"
                            class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                            in</a>

                        @if (Route::has('register'))
                            <a class="px-1 text-muted" href="{{ route('register') }}"
                                class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    </div>
                @endguest



                @if (Auth::user())
                    @if (Auth::user()->type === 'admin' || Auth::user()->type === 'moderator')
                        <div class="d-flex justify-content-end w-100">
                        </div>
                        <a class="btn btn-primary mx-2" href="/dashboard">Dashboard</a>
                    @endif
                @endif
                @if (Auth::user())
                    @if (Auth::user()->type === 'user')
                        <div class="d-flex justify-content-end w-100">
                            <x-app-layout>
                            </x-app-layout>
                        </div>
                    @endif
                @endif
            </div>

            <div class="dropdown d-block d-lg-none">
                <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="navbar-toggler-icon"></span>
                </a>

                <ul class="dropdown-menu navDropDown" style="z-index: 99999;">
                    @guest
                        <li><a class="dropdown-item" href="{{ route('login') }}">Log
                                in</a></li>
                        @if (Route::has('register'))
                            <li><a class="dropdown-item" href="{{ route('register') }}">Register
                                    in</a></li>
                        @endif
                    @endguest
                    @if (Auth::user())
                        @if (Auth::user()->type === 'admin' || Auth::user()->type === 'moderator')
                            <div class="d-flex justify-content-end w-100">
                            </div>
                            <a class="btn btn-primary mx-2" href="/dashboard">Dashboard</a>
                        @endif
                    @endif
                    @if (Auth::user())
                        @if (Auth::user()->type === 'user')
                            <li><a class="dropdown-item" href="#">
                                    <x-app-layout>
                                    </x-app-layout>
                                </a></li>
                        @endif
                    @endif
                </ul>
            </div>
        </div>
    </nav>









    {{-- search section --}}
    @include('comp.home.search')

    {{-- navbar section --}}
    @include('comp.home.navbar')

    {{-- carousel section --}}
    @include('comp.home.carousel')

    {{-- shop section --}}
    @include('comp.home.shop')

    {{-- items section --}}
    @include('comp.home.items')

    {{-- banner section --}}
    @include('comp.home.banner')

    {{-- trending section --}}
    @include('comp.home.trending')

    {{-- quote section --}}
    @include('comp.home.quote')

    {{-- blog section --}}
    @include('comp.home.blog')

    {{-- brand section --}}
    @include('comp.home.brand')

    {{-- footer section --}}
    @include('comp.home.footer')
@endsection

