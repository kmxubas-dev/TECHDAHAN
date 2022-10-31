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
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
            <main class="relative min-h-screen w-full bg-white">
                <!-- component -->
                <div class="flex justify-center" x-data="app justify-center ">
                    <section class="w-full lg:w-1/3 p-6 transform space-y-4 text-center">
                        <div class="flex justify-center">
                            <img src="{{ asset('img/logo-dark.webp') }}" alt="">
                        </div>
            
                        <div class="flex items-center space-x-4">
                            <hr class="w-full border border-gray-300" />
                            <div class="text-lg font-bold text-gray-400">VERIFY EMAIL</div>
                            <hr class="w-full border border-gray-300" />
                        </div>

                        <div class="flex flex-col space-y-3 pb-10">
                            <div class="my-5 text-gray-400">
                                Thank you for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.
                            </div>

                            @if (session('status') == 'verification-link-sent')
                                <div class="font-medium text-s text-green-600">
                                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                                </div>
                            @endif
                            <form method="POST" action="{{ route('verification.send') }}">
                                @csrf
                                <div>
    
                                    <button type="submit" class="w-full rounded-2xl border-b-4 border-b-blue-600 bg-blue-500 py-3 font-bold text-white hover:bg-blue-400 active:translate-y-[0.125rem] active:border-b-blue-400">
                                        {{ __('Resend Verification Email') }}
                                    </button>
                                </div>
                            </form>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                
                                <button type="submit" class="w-full rounded-2xl border-b-2 border-b-gray-300 bg-white py-3 px-4 font-bold text-blue-500 ring-2 ring-gray-300 hover:bg-gray-200">
                                    {{ __('Log Out') }}
                                </button>
                            </form>
                        </div>
                    </section>
                </div>
            </main>
        </div>
    </body>
</html>
