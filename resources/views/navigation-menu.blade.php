<nav x-data="{ open: false }" class="" style="z-index: 9999">
    <!-- Settings Dropdown -->
    <div class="relative d-inline d-lg-flex align-items-center">
        @if (Auth::user()->type === 'user')
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <button
                            class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                            <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                                alt="{{ Auth::user()->name }}" />
                        </button>
                    @else
                        <span class="rounded-md d-none d-lg-inline-flex nav-item">
                            <button type="button"
                                class="inline-flex items-center px-3 py-2 text-sm leading-4 font-medium rounded-md text-gray-500 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150 ">
                                <i class="fas fa-user fs-6 pe-2"></i>
                                {{ Auth::user()->name }}

                                <div class="arrow"></div>
                            </button>
                        </span>
                        <span class="rounded-md d-block d-lg-none" style="margin: -20px;">
                            <a class="text-center py-2 d-block text-secondary" href="{{ route('profile') }}">Profile</a>
                            <a class="text-center py-2 d-block text-secondary"
                                href="{{ route('wishlist') }}">Wishlist</a>
                            <a class="text-center py-2 d-block text-secondary" href="{{ route('orders') }}">Orders</a>
                            <a class="text-center py-2 d-block text-secondary"
                                href="{{ route('change_password') }}">Change
                                Password</a>
                        </span>
                    @endif
                </x-slot>

                <x-slot name="content">
                    <x-dropdown-link href="{{ route('profile') }}">
                        {{ __('Profile') }}
                    </x-dropdown-link>

                    <x-dropdown-link href="{{ route('wishlist') }}">
                        {{ __('Wishlist') }}
                    </x-dropdown-link>

                    <div class="border-t border-gray-200"></div>

                    <x-dropdown-link href="{{ route('orders') }}">
                        {{ __('My Orders') }}
                    </x-dropdown-link>
                    <x-dropdown-link href="{{ route('change_password') }}">
                        {{ __('Change Password') }}
                    </x-dropdown-link>
                </x-slot>
            </x-dropdown>
        @endif

        <div class="d-flex justify-content-lg-end justify-content-center w-100">

            <ul class="navbar-nav mb-lg-0 text-center">
                @if (Auth::user()->type === 'user')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cart') }}">
                            <i class="fas fa-cart-shopping fs-6 pe-1"></i>
                            My Cart ()</a>
                    </li>
                @endif
                @if (Auth::user()->type === 'user')
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf
                                <button type="submit" @click.prevent="$root.submit();">
                                    {{ __('Log Out') }}
                                </button>
                            </form>
                    </li>
                @endif

            </ul>
        </div>
    </div>
</nav>
