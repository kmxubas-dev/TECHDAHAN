<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/x-icon" href="{{ asset('img/logo-dark.png') }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

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
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
            <main class="relative min-h-screen w-full bg-white">
                <!-- component -->
                <div class="flex justify-center" x-data="app justify-center ">
                    <section class="w-full lg:w-1/3 p-6 transform space-y-4 text-center">
                        <div class="flex justify-center">
                            <img src="{{ asset('img/logo-dark.png') }}" alt="" class="h-40">
                        </div>
                        <!-- register content -->
                        <form action="{{ route('user.register_post') }}" method="POST" class="space-y-3">
                            @csrf
                            <header class="mb-3 text-lg font-bold">Create your profile</header>

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
                                <div class="flex items-center w-full px-3 bg-gray-100 rounded-2xl border-2 border-blue-300 focus-within:border-blue-500">
                                    <a  tabindex="0" role="link" aria-label="tooltip 2" class="focus:outline-none focus:ring-gray-300 rounded-full focus:ring-offset-2 focus:ring-2 focus:bg-gray-200 relative" onmouseover="showTooltip(2)" onfocus="showTooltip(2)" onmouseout="hideTooltip(2)">
                                        <div class=" cursor-pointer">
                                            <svg aria-haspopup="true" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-info-circle" width="25" height="25" viewBox="0 0 24 24" stroke-width="1.5" stroke="#A0AEC0" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" />
                                                <circle cx="12" cy="12" r="9" />
                                                <line x1="12" y1="8" x2="12.01" y2="8" />
                                                <polyline points="11 12 12 12 12 16 13 16" />
                                            </svg>
                                        </div>
                                        <div id="tooltip2" role="tooltip" class="z-20 -mt-36 w-64 absolute transition duration-150 ease-in-out left-0 ml-8 shadow-lg bg-blue-600 p-4 rounded">
                                            <svg class="absolute left-0 -ml-2 -mt-3 bottom-0 top-0 h-full fill-current text-blue-600" width="9px" height="16px" viewBox="0 0 9 16" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <g id="Tooltips-" transform="translate(-874.000000, -1029.000000)" fill="#2563EB">
                                                        <g id="Group-3-Copy-16" transform="translate(850.000000, 975.000000)">
                                                            <g id="Group-2" transform="translate(24.000000, 0.000000)">
                                                                <polygon id="Triangle" transform="translate(4.500000, 62.000000) rotate(-90.000000) translate(-4.500000, -62.000000) " points="4.5 57.5 12.5 66.5 -3.5 66.5"></polygon>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
                                            <ul class="text-left  text-white">
                                                <li>• The password must be at least 8 characters.</li>
                                                <li>• The password must contain at least one uppercase and one lowercase letter.</li>
                                                <li>• The password must contain at least one symbol.</li>
                                                <li>• The password must contain at least one number.</li>
                                            </ul>
                                            <div class="flex justify-between mt-3">
                                                <div class="flex items-center">
                                                    {{-- <span class="text-xs font-bold text-white">Step 1 of 4</span> --}}
                                                </div>
                                                <div class="flex items-center">
                                                    <!-- <button class="focus:outline-none focus:underline focus:text-indigo-200 text-xs text-white underline mr-2 cursor-pointer">Skip Tour</button> -->
                                                    <button type="button" onclick="hideTooltip()" onblur="hideTooltip()" class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 focus:bg-indigo-400 focus:outline-none focus:text-white bg-white transition duration-150 ease-in-out focus:outline-none hover:bg-gray-200 rounded text-indigo-700 px-5 py-1">Okay</button>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <input type="password" name="password" placeholder="Password" class="my-1 w-full border-0 bg-transparent outline-0 focus:ring-0" />
                                </div>
                                @error('password')
                                    @foreach ($errors->get('password') as $message)
                                    <div class="error text-red-600 px-3 pb-3">• {{ $message }}</div>
                                    @endforeach
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

                            <div class="flex justify-center items-center space-x-3 mb-8">
                                <input id="showPassword" type="checkbox" onclick="showPassword1()">
                                <label for="showPassword">Show Password</label>
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
                                    <a href="{{ route('terms-and-condition') }}" class="font-medium text-gray-500">
                                        Terms and Conditions
                                    </a>.
                                </div>
                            </footer>
                        </form>

                        <div class="flex items-center space-x-4">
                            <hr class="w-full border border-gray-300" />
                            <div class="font-semibold text-gray-400">OR</div>
                            <hr class="w-full border border-gray-300" />
                        </div>

                        <div class="flex flex-col pb-10">
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

            function showTooltip(flag) {
                document.getElementById("tooltip2").classList.remove("hidden");
            }
            function hideTooltip(flag) {
                document.getElementById("tooltip2").classList.add("hidden");
            }
            
            function showPassword1() {
                var x = document.querySelector('input[name="password"]');
                var xx = document.querySelector('input[name="password_confirmation"]');
                if (x.type === "password") {
                    x.type = "text";
                    xx.type = "text";
                } else {
                    x.type = "password";
                    xx.type = "password";
                }
            }
        </script>
    </body>
</html>
