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
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            <main class="relative min-h-screen w-full bg-white">
                <!-- component -->
                <div class="flex justify-center" x-data="app justify-center ">
                    <section class="w-full lg:w-1/3 p-6 transform space-y-4 text-center">
                        <!-- register content -->
                        <form action="{{ route('user.register_post') }}" method="POST" class="space-y-3">
                            @csrf
                            <header class="mb-3 text-2xl font-bold">Create your profile</header>

                            <!-- EMAIL -->
                            <div>
                                <div class="w-full px-3 bg-gray-100 rounded-2xl border-2 border-blue-300 focus-within:border-blue-500">
                                    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" class="my-1 w-full border-0 bg-transparent outline-0 focus:ring-0" />
                                </div>
                                @error('email')
                                    <div class="error text-red-600">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- PASSWORD -->
                            <div>
                                <div class="w-full px-3 bg-gray-100 rounded-2xl border-2 border-blue-300 focus-within:border-blue-500">
                                    <input type="password" name="password" placeholder="Password" class="my-1 w-full border-0 bg-transparent outline-0 focus:ring-0" />
                                </div>
                                @error('password')
                                    <div class="error text-red-600">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- PASSWORD CONFIRMATION -->
                            <div>
                                <div class="w-full px-3 bg-gray-100 rounded-2xl border-2 border-blue-300 focus-within:border-blue-500">
                                    <input type="password" name="password_confirmation" placeholder="Confirm Password" class="my-1 w-full border-0 bg-transparent outline-0 focus:ring-0" />
                                </div>
                                @error('password_confirmation')
                                    <div class="error text-red-600">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="flex items-center space-x-4">
                                <hr class="w-full border border-gray-300" />
                                <div class="font-semibold text-gray-400">Name</div>
                                <hr class="w-full border border-gray-300" />
                            </div>

                            <!-- USERNAME -->
                            <div>
                                <div class="w-full px-3 bg-gray-100 rounded-2xl border-2 border-blue-300 focus-within:border-blue-500">
                                    <input type="text" name="username" placeholder="Username" value="{{ old('username') }}" class="my-1 w-full border-0 bg-transparent outline-0 focus:ring-0" />
                                </div>
                                @error('username')
                                    <div class="error text-red-600">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- FIRSTNAME -->
                            <div>
                                <div class="w-full px-3 bg-gray-100 rounded-2xl border-2 border-blue-300 focus-within:border-blue-500">
                                    <input type="text" name="firstname" placeholder="First Name" value="{{ old('firstname') }}" class="my-1 w-full border-0 bg-transparent outline-0 focus:ring-0" />
                                </div>
                                @error('firstname')
                                    <div class="error text-red-600">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- LASTNAME -->
                            <div>
                                <div class="w-full px-3 bg-gray-100 rounded-2xl border-2 border-blue-300 focus-within:border-blue-500">
                                    <input type="text" name="lastname" placeholder="Last Name" value="{{ old('lastname') }}" class="my-1 w-full border-0 bg-transparent outline-0 focus:ring-0" />
                                </div>
                                @error('lastname')
                                    <div class="error text-red-600">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="flex items-center space-x-4">
                                <hr class="w-full border border-gray-300" />
                                <div class="font-semibold text-gray-400">Contact Info</div>
                                <hr class="w-full border border-gray-300" />
                            </div>

                            <div class="flex flex-col">
                                <div class="w-full px-3 bg-gray-100 rounded-2xl border-2 border-blue-300 focus-within:border-blue-500">
                                    <input type="tel" name="phone" placeholder="Phonenumber" value="{{ old('phone') }}" id="phone" class="my-3 w-full border-0 bg-transparent outline-0 focus:ring-0" />
                                </div>
                                @error('phone')
                                    <div class="error text-red-600">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <div class="w-full px-3 bg-gray-100 rounded-2xl border-2 border-blue-300 focus-within:border-blue-500">
                                    <input type="text" name="address" placeholder="Address" value="{{ old('address') }}" class="my-1 w-full border-0 bg-transparent outline-0 focus:ring-0" />
                                </div>
                                @error('address')
                                    <div class="error text-red-600">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="w-full rounded-2xl border-b-4 border-b-blue-600 bg-blue-500 py-3 font-bold text-white hover:bg-blue-400 active:translate-y-[0.125rem] active:border-b-blue-400">
                                CREATE ACCOUNT
                            </button>
            
                            <footer>
                                <div class="mt-8 text-sm text-gray-400">
                                    By signing in to TECHDAHAN you agree to our
                                    <a href="#" class="font-medium text-gray-500">Terms</a> and
                                    <a href="#" class="font-medium text-gray-500">Privacy Policy</a>.
                                </div>
                            </footer>
                        </form>
            
                        <!-- login content -->
                        {{-- <div x-show="!isLoginPage" class="space-y-4">
                            <header class="mb-3 text-2xl font-bold">Log in</header>
                            <div class="w-full rounded-2xl bg-gray-50 px-4 ring-2 ring-gray-200 focus-within:ring-blue-400">
                                <input type="text" placeholder="Email or username"
                                    class="my-3 w-full border-none bg-transparent outline-none focus:outline-none" />
                            </div>
                            <div
                                class="flex w-full items-center space-x-2 rounded-2xl bg-gray-50 px-4 ring-2 ring-gray-200 focus-within:ring-blue-400">
                                <input type="password" placeholder="Password"
                                    class="my-3 w-full border-none bg-transparent outline-none" />
                                <a href="#" class="font-medium text-gray-400 hover:text-gray-500">FORGOT?</a>
                            </div>
                            <button
                                class="w-full rounded-2xl border-b-4 border-b-blue-600 bg-blue-500 py-3 font-bold text-white hover:bg-blue-400 active:translate-y-[0.125rem] active:border-b-blue-400">
                                LOG IN
                            </button>
                        </div> --}}
            
                        <div class="flex items-center space-x-4">
                            <hr class="w-full border border-gray-300" />
                            <div class="font-semibold text-gray-400">OR</div>
                            <hr class="w-full border border-gray-300" />
                        </div>

                        <div class="flex flex-col pb-20">
                            <div class="my-5 text-sm text-gray-400">
                                Already have an account?
                            </div>
                            <a href="{{ route('login') }}" class="rounded-2xl border-b-2 border-b-gray-300 bg-white py-3 px-4 font-bold text-blue-500 ring-2 ring-gray-300 hover:bg-gray-200">
                                LOGIN
                            </a>
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
