<x-guest-layout>
    <style>
        #email,
        #password,
        #name,
        #password_confirmation {
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
    </style>

    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form class="px-4 py-6 w-full" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="flex justify-between align-center mb-4">

                <p class="mb-4" style="font-weight:700; font-size: 30px;">Sign Up</p>
                <div
                    style="width: 40px; height: 40px; border-radius:50%; border: 1px solid #ddd; display: flex; justify-content:center; align-items: center;">
                    <a href="" class="text-gray-400 hover:text-gray-500 transition">
                        <i class="fab fa-facebook-f" style="font-size: 22px;"></i>
                    </a>
                </div>
            </div>
            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full text-gray-700" type="text" name="name"
                    :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full text-gray-700" type="email" name="email"
                    :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full text-gray-700" type="password" name="password" required
                    autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full text-gray-700" type="password"
                    name="password_confirmation" required autocomplete="new-password" />
            </div>

            <x-button class="button">
                {{ __('Register') }}
            </x-button>
            {{-- @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                    'terms_of_service' =>
                                        '<a target="_blank" href="' .
                                        route('terms.show') .
                                        '" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
                                        __('Terms of Service') .
                                        '</a>',
                                    'privacy_policy' =>
                                        '<a target="_blank" href="' .
                                        route('policy.show') .
                                        '" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
                                        __('Privacy Policy') .
                                        '</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif --}}


            <div class="text-center mt-4">
                <p>Already registered?<a class="signUp" href="{{ url('/login') }}">Sign In</a></p>
            </div>

        </form>
    </x-authentication-card>
</x-guest-layout>
