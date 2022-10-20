<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Techdahan</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/css/intlTelInput.css" integrity="sha512-gxWow8Mo6q6pLa1XH/CcH8JyiSDEtiwJV78E+D+QP0EVasFs8wKXq16G8CLD4CJ2SnonHr4Lm/yY2fSI2+cbmw==" crossorigin="anonymous" referrerpolicy="no-referrer"/>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center">
            <main class="relative min-h-screen w-full bg-white">
                <!-- component -->
                <div class="flex justify-center" x-data="app justify-center ">
                    <section class="w-full p-3 pt-20 lg:w-1/3 transform space-y-0 text-center">
                        <h1 class="text-4xl">Techdahan</h1>
                        <div class="p-5 pb-12">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
    
                                <div class="flex items-center space-x-4 my-8">
                                    <hr class="w-full border border-gray-300" />
                                    <div class="font-semibold text-gray-400">Login</div>
                                    <hr class="w-full border border-gray-300" />
                                </div>
                                {{-- <header class="mb-3 text-2xl font-bold">Create your profile</header> --}}
    
                                @if (session('status'))
                                    <div class="mb-4 font-medium text-sm text-green-600">
                                        {{ session('status') }}
                                    </div>
                                @endif
    
                                <!-- EMAIL -->
                                <div class="mb-3">
    
                                    <x-jet-label for="email" value="{{ __('Email') }}" />
                                    <div class="w-full px-3 bg-gray-100 rounded-2xl border-2 border-blue-300 focus-within:border-blue-500">
                                        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" class="my-1 w-full border-0 bg-transparent outline-0 focus:ring-0" required autofocus />
                                    </div>
                                    @error('email')
                                        <div class="error text-red-600">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!-- PASSWORD -->
                                <div class="mb-8">
                                    <x-jet-label for="password" value="{{ __('Password') }}" />
                                    <div class="w-full px-3 bg-gray-100 rounded-2xl border-2 border-blue-300 focus-within:border-blue-500">
                                        <input type="password" name="password" placeholder="Password" class="my-1 w-full border-0 bg-transparent outline-0 focus:ring-0" required autocomplete="current-password"/>
                                    </div>
                                    @error('password')
                                        <div class="error text-red-600">{{ $message }}</div>
                                    @enderror
                                </div>
    
                                <button type="submit" class="w-full rounded-2xl border-b-4 border-b-blue-600 bg-blue-500 py-3 font-bold text-white hover:bg-blue-400 active:translate-y-[0.125rem] active:border-b-blue-400">
                                    LOGIN
                                </button>
                            </form>
    
                            {{-- <form method="POST" action="{{ route('login') }}" class="px-8 py-14">
                                @csrf
    
                                <div class="block mt-4">
                                    <label for="remember_me" class="flex items-center">
                                        <x-jet-checkbox id="remember_me" name="remember" />
                                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                    </label>
                                </div>
    
                                <div class="flex items-center justify-end mt-4">
                                    @if (Route::has('password.request'))
                                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                            {{ __('Forgot your password?') }}
                                        </a>
                                    @endif
    
                                    <x-jet-button class="w-full text-center bg-blue-600">
                                        {{ __('Log in') }}
                                    </x-jet-button>
                                </div>
                            </form> --}}
    
                            <div class="flex items-center space-x-4 my-8">
                                <hr class="w-full border border-gray-300" />
                                <div class="font-semibold text-gray-400">OR</div>
                                <hr class="w-full border border-gray-300" />
                            </div>
    
                            <div class="flex flex-col">
                                <a href="{{ route('user.register') }}" class="rounded-2xl border-b-2 border-b-gray-300 bg-white py-3 px-4 font-bold text-blue-500 ring-2 ring-gray-300 hover:bg-gray-200">
                                    Register
                                </a>
                            </div>
                        </div>
                    </section>
                </div>
            </main>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/intlTelInput.min.js" integrity="sha512-+gShyB8GWoOiXNwOlBaYXdLTiZt10Iy6xjACGadpqMs20aJOoh+PJt3bwUVA6Cefe7yF7vblX6QwyXZiVwTWGg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
          var input = document.querySelector("#phone");
          window.intlTelInput(input, {
            // any initialisation options go here
            initialCountry: 'ph',
            onlyCountries: ['ph'],
            customContainer: 'w-full my-1',
          });
        </script>
    </body>
</html>
