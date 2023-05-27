@extends('layouts/layout')

@section('title')
    Dashboard
@endsection

@section('content')
    @auth
        <div class="d-flex justify-content-end w-100">
            <x-app-layout>
            </x-app-layout>
        </div>
    @endauth

    <div class="d-grid dashboard">
        @include('comp.dashboard.topBar')
        @include('comp.dashboard.sideBar')
        <div class="content">
            @yield('dashboardContnet')
        </div>
    </div>
@endsection
