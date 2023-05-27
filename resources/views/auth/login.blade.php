<x-guest-layout>
    <style>
        #email,
        #password {
            border: 1px solid #aaa;
        }

        #email:focus,
        #password:focus {
            border: 1px solid #e13ed7;
            outline: none;
            --tw-ring-color: transparent;
        }

        .button {
            background-color: #e13ed7;
            text-align: center;
            margin: 20px 0;
        }

        .button:hover {
            background-color: #d626ca;
        }

        #remember_me:checked {
            background-color: #e13ed7;
            color: white;
            --tw-ring-color: transparent
        }

        #remember_me:focus {
            --tw-ring-color: transparent
        }

        #remember_me:checked+.label {
            color: #e13ed7;
        }


        .signUp {
            color: #e13ed7;
        }

        .con {
            display: flex;
            flex-direction: column;
        }

        .img {
            width: 100%;
        }

        @media(min-width:767px) {
            .con {
                flex-direction: row;
                padding: 10px 20px;
            }

            .img {
                width: 50%
            }
        }
    </style>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>


        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif


        <div style="width: 100%">

            <form class="px-4 py-6 w-full" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="flex justify-between align-center mb-4">
                    <p class="mb-0" style="font-weight:700; font-size: 30px;">Sign In</p>
                    <div
                        style="width: 40px; height: 40px; border-radius:50%; border: 1px solid #ddd; display: flex; justify-content:center; align-items: center;">
                        <a href="{{ url('auth/facebook') }}" class="text-gray-400 hover:text-gray-500 transition">
                            <i class="fab fa-facebook-f" style="font-size: 22px;"></i>
                        </a>
                    </div>
                    <div
                        style="width: 40px; height: 40px; border-radius:50%; border: 1px solid #ddd; display: flex; justify-content:center; align-items: center;">
                        <a href="{{ url('auth/google') }}" class="text-gray-400 hover:text-gray-500 transition">
                            <i class="fab fa-google" style="font-size: 22px;"></i>
                        </a>
                    </div>
                </div>
                <div>
                    <x-label for="email" value="{{ __('Email') }}" />
                    <x-input id="email" class="block mt-1 w-full text-gray-700" type="email" name="email"
                        :value="old('email')" required autofocus autocomplete="username" />
                </div>

                <div class="mt-4">
                    <x-label for="password" value="{{ __('Password') }}" />
                    <x-input id="password" class="block mt-1 w-full text-gray-700" type="password" name="password"
                        required autocomplete="current-password" />
                </div>

                <x-validation-errors class="mb-4" />
                <x-button class="button">
                    {{ __('Sign In') }}
                </x-button>

                <div class="flex items-center justify-between mt-4">
                    <div class="flex">
                        <input type="checkbox" checked class="rounded border-gray-300 text-none shadow-sm"
                            id="remember_me" name="remember" />
                        <label for="remember_me" class="flex items-center label">
                            <span class="ml-2 text-sm ">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    @if (Route::has('password.request'))
                        <a class="text-sm text-gray-600 hover:text-gray-900 rounded-md"
                            href="{{ route('password.request') }}">
                            {{ __('Forgot password?') }}
                        </a>
                    @endif

                </div>

                <div class="text-center mt-4">
                    <p>Not a member?<a class="signUp" href="{{ url('/register') }}">Sign Up</a></p>
                </div>
            </form>
        </div>

    </x-authentication-card>
</x-guest-layout>
