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

            <ul class="dropdown-menu navDropDown">
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
