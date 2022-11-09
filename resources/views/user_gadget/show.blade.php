@extends('layouts.user')

@section('main')
<section class="">
    <!-- Header -->
    <div class="mb-3 bg-blue-600 shadow-lg rounded-b-3xl">
        <div id="user_type" class="flex flex-col justify-center px-8 py-5 rounded-b-3xl bg-gray-100 space-y-3 click:bg-gray-300">
            <div class="flex justify-center items-center space-x-5">
                <img src="https://api.lorem.space/image/face?w=120&h=120&hash=bart89fe" alt="User" class="h-12 w-12 rounded-full">
                <div class="flex-">
                    <span class="text-xl font-bold">{{ auth()->user()->name->full }}</span>
                </div>
            </div>
        </div>
        <div class="grid px-7 py-2  items-center justify-around gap-1 text-white divide-x divide-solid ">
            <h5 class="text-center font-bold">Add Gadget</h5>
        </div>
    </div>

    <!-- Content -->
    <section class="flex flex-col mb-20 items-center justify-center">
        {{-- <h1 class="text-xl mb-3 font-semibold text-gray-800 capitalize dark:text-white">Show Gadget</h1> --}}

        <div class="w-full bg-white">
            <div class="flex">
                <img class="w-full" src="{{ asset($gadget->img) }}" alt="">
            </div>

            <div class="">
                <div class="flex flex-col p-5">
                    <h5 class="mb-3 text-[#2557D6] text-xl font-bold tracking-tight multiline-ellipsis-2">
                        {{ $gadget->name }}
                    </h5>
                    <p class="font-normal text-[#2557D6]">
                        Original Price: <b>₱{{ number_format($gadget->price_original, 2, ".", ",") }}</b>
                    </p>
                    <p class="font-normal text-[#2557D6]">
                        Selling Price: <b>₱{{ number_format($gadget->price_selling, 2, ".", ",") }}</b>
                    </p>
                    <div class="flex justify-between items-center">
                        <div class="self-center font-normal text-gray-500">
                            Posted {{ $gadget->getElapsedTime($gadget->created_at) }}
                        </div>
    
                        @if ($gadget->user_id != auth()->user()->id)
                            <form action="{{ route('gadget.wishlist.add', $gadget) }}" method="POST" class="flex text-gray-900">
                                @csrf
                                <button type="submit" class="w-36 p-2 text-sm text-[#2557D6] border-2 border-[#2557D6] rounded-lg">
                                    <b>+ Add to Wishlist</b>
                                </button>
                            </form>
                        @endif
                    </div>
                    <div class="flex justify-between items-center">
                        <div class="social-btn-sp my-3">
                            <div id="social-links">
                                <div id="social-links">
                                    <ul class="flex space-x-3">
                                        <li>
                                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('gadget.show', $gadget) }}" class="social-button " id="" title="" rel="">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                                                </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://twitter.com/intent/tweet?text=Default+share+text&amp;url={{ route('gadget.show', $gadget) }}" class="social-button " id="" title="" rel="">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                                                    <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
                                                </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://www.linkedin.com/sharing/share-offsite?mini=true&amp;url={{ route('gadget.show', $gadget) }}" class="social-button " id="" title="" rel="">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                                                    <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"/>
                                                </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" href="https://telegram.me/share/url?url={{ route('gadget.show', $gadget) }}" class="social-button " id="" title="" rel="">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-telegram" viewBox="0 0 16 16">
                                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.287 5.906c-.778.324-2.334.994-4.666 2.01-.378.15-.577.298-.595.442-.03.243.275.339.69.47l.175.055c.408.133.958.288 1.243.294.26.006.549-.1.868-.32 2.179-1.471 3.304-2.214 3.374-2.23.05-.012.12-.026.166.016.047.041.042.12.037.141-.03.129-1.227 1.241-1.846 1.817-.193.18-.33.307-.358.336a8.154 8.154 0 0 1-.188.186c-.38.366-.664.64.015 1.088.327.216.589.393.85.571.284.194.568.387.936.629.093.06.183.125.27.187.331.236.63.448.997.414.214-.02.435-.22.547-.82.265-1.417.786-4.486.906-5.751a1.426 1.426 0 0 0-.013-.315.337.337 0 0 0-.114-.217.526.526 0 0 0-.31-.093c-.3.005-.763.166-2.984 1.09z"/>
                                                </svg>
                                            </a>
                                        </li>
                                        {{-- <li>
                                            <a target="_blank" href="https://wa.me/?text=https://makitweb.com/how-to-upload-multiple-files-with-vue-js-and-php/" class="social-button " id="" title="" rel=""><span class="fab fa-whatsapp"></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" href="https://www.reddit.com/submit?title=Default+share+text&amp;url=https://makitweb.com/how-to-upload-multiple-files-with-vue-js-and-php/" class="social-button " id="" title="" rel=""><span class="fab fa-reddit"></span>
                                            </a>
                                        </li> --}}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="btn_ratings" class="flex justify-between p-5 py-3  text-[#2557D6] border border-gray-200">
                    <div class="self-center font-normal text-gray-500 mb-1">
                        <a class="flex text-center">
                            <div class='rating flex flex-row justify-center gap-1 bg-sky-300'>
                                <div>
                                    <svg id="star1" class="h-5 fill-current text-yellow-500 cursor-pointer"
                                        viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <path
                                            d="M575.852903 115.426402L661.092435 288.054362c10.130509 20.465674 29.675227 34.689317 52.289797 37.963825l190.433097 27.62866c56.996902 8.288598 79.7138 78.281203 38.475467 118.496253l-137.836314 134.35715c-16.372539 15.963226-23.84251 38.987109-19.954032 61.49935l32.540421 189.716799c9.721195 56.792245-49.833916 100.077146-100.793444 73.267113L545.870691 841.446188a69.491196 69.491196 0 0 0-64.67153 0l-170.376737 89.537324c-50.959528 26.810033-110.51464-16.474868-100.793444-73.267113L242.569401 667.9996c3.888478-22.512241-3.581493-45.536125-19.954032-61.49935L84.779055 472.245428c-41.238333-40.215049-18.521435-110.207655 38.475467-118.496252l190.433097-27.62866c22.61457-3.274508 42.159288-17.498151 52.289797-37.963826L451.319277 115.426402c25.479764-51.675827 99.053862-51.675827 124.533626 0z"
                                            ></path>
                                    </svg>
                                </div>

                                <div>
                                    <svg id="star2" class="h-5 fill-current text-gray-400 cursor-pointer"
                                        viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <path
                                            d="M575.852903 115.426402L661.092435 288.054362c10.130509 20.465674 29.675227 34.689317 52.289797 37.963825l190.433097 27.62866c56.996902 8.288598 79.7138 78.281203 38.475467 118.496253l-137.836314 134.35715c-16.372539 15.963226-23.84251 38.987109-19.954032 61.49935l32.540421 189.716799c9.721195 56.792245-49.833916 100.077146-100.793444 73.267113L545.870691 841.446188a69.491196 69.491196 0 0 0-64.67153 0l-170.376737 89.537324c-50.959528 26.810033-110.51464-16.474868-100.793444-73.267113L242.569401 667.9996c3.888478-22.512241-3.581493-45.536125-19.954032-61.49935L84.779055 472.245428c-41.238333-40.215049-18.521435-110.207655 38.475467-118.496252l190.433097-27.62866c22.61457-3.274508 42.159288-17.498151 52.289797-37.963826L451.319277 115.426402c25.479764-51.675827 99.053862-51.675827 124.533626 0z"
                                            ></path>
                                    </svg>
                                </div>

                                <div>
                                    <svg id="star3" class="h-5 fill-current text-gray-400 cursor-pointer"
                                        viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <path
                                            d="M575.852903 115.426402L661.092435 288.054362c10.130509 20.465674 29.675227 34.689317 52.289797 37.963825l190.433097 27.62866c56.996902 8.288598 79.7138 78.281203 38.475467 118.496253l-137.836314 134.35715c-16.372539 15.963226-23.84251 38.987109-19.954032 61.49935l32.540421 189.716799c9.721195 56.792245-49.833916 100.077146-100.793444 73.267113L545.870691 841.446188a69.491196 69.491196 0 0 0-64.67153 0l-170.376737 89.537324c-50.959528 26.810033-110.51464-16.474868-100.793444-73.267113L242.569401 667.9996c3.888478-22.512241-3.581493-45.536125-19.954032-61.49935L84.779055 472.245428c-41.238333-40.215049-18.521435-110.207655 38.475467-118.496252l190.433097-27.62866c22.61457-3.274508 42.159288-17.498151 52.289797-37.963826L451.319277 115.426402c25.479764-51.675827 99.053862-51.675827 124.533626 0z"
                                            ></path>
                                    </svg>
                                </div>

                                <div>
                                    <svg id="star4"class="h-5 fill-current text-gray-400 cursor-pointer"
                                        viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <path
                                            d="M575.852903 115.426402L661.092435 288.054362c10.130509 20.465674 29.675227 34.689317 52.289797 37.963825l190.433097 27.62866c56.996902 8.288598 79.7138 78.281203 38.475467 118.496253l-137.836314 134.35715c-16.372539 15.963226-23.84251 38.987109-19.954032 61.49935l32.540421 189.716799c9.721195 56.792245-49.833916 100.077146-100.793444 73.267113L545.870691 841.446188a69.491196 69.491196 0 0 0-64.67153 0l-170.376737 89.537324c-50.959528 26.810033-110.51464-16.474868-100.793444-73.267113L242.569401 667.9996c3.888478-22.512241-3.581493-45.536125-19.954032-61.49935L84.779055 472.245428c-41.238333-40.215049-18.521435-110.207655 38.475467-118.496252l190.433097-27.62866c22.61457-3.274508 42.159288-17.498151 52.289797-37.963826L451.319277 115.426402c25.479764-51.675827 99.053862-51.675827 124.533626 0z"
                                            ></path>
                                    </svg>
                                </div>

                                <div>
                                    <svg id="star5" class="h-5 fill-current text-gray-400 cursor-pointer"
                                        viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <path
                                            d="M575.852903 115.426402L661.092435 288.054362c10.130509 20.465674 29.675227 34.689317 52.289797 37.963825l190.433097 27.62866c56.996902 8.288598 79.7138 78.281203 38.475467 118.496253l-137.836314 134.35715c-16.372539 15.963226-23.84251 38.987109-19.954032 61.49935l32.540421 189.716799c9.721195 56.792245-49.833916 100.077146-100.793444 73.267113L545.870691 841.446188a69.491196 69.491196 0 0 0-64.67153 0l-170.376737 89.537324c-50.959528 26.810033-110.51464-16.474868-100.793444-73.267113L242.569401 667.9996c3.888478-22.512241-3.581493-45.536125-19.954032-61.49935L84.779055 472.245428c-41.238333-40.215049-18.521435-110.207655 38.475467-118.496252l190.433097-27.62866c22.61457-3.274508 42.159288-17.498151 52.289797-37.963826L451.319277 115.426402c25.479764-51.675827 99.053862-51.675827 124.533626 0z"></path>
                                    </svg>
                                </div>
                            </div>
                            <span class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ml-3">{{ $gadget->getAverage() }}</span>
                        </a>
                    </div>
                    <p>Click to open</p>
                </div>
                <div id="ratings_body" class="flex flex-col gap-2 p-5 bg-blue-400 shadow-inner" style="display:none">
                    <div class="flex justify-between items-center">
                        <h5 class="text-xl text-white font-bold">Feedbacks</h5>

                        {{-- @if ($gadget->user_id != auth()->user()->id)
                            <a href="{{ route('gadget.rating.rate', $gadget) }}" class="w-36 p-2 text-sm text-center bg-white border-2 border-gray-300 rounded-xl shadow-lg">
                                <b>Rate this product</b>
                            </a>
                        @endif --}}
                    </div>

                    @foreach ($gadget->ratings as $g_rating)
                    <div class="rating_wrapper relative max-w-md mx-auto md:max-w-2xl mt-10 min-w-0 break-words bg-white w-full shadow-lg rounded-xl">
                        <div class="px-6">
                            <div class="flex flex-wrap justify-center">
                                <div class="w-full flex justify-center">
                                    <div class="flex h-10">
                                        <img src="https://github.com/creativetimofficial/soft-ui-dashboard-tailwind/blob/main/build/assets/img/team-2.jpg?raw=true" class="h-16 shadow-xl rounded-full align-middle border-none  -mt-8 max-w-[150px]"/>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center mt-2">
                                <h3 class="text-slate-700 font-bold leading-normal mb-1">{{ $g_rating->user->name->full }}</h3>
                                {{-- <div class="text-xs mt-0 mb-2 text-slate-400 font-bold uppercase">
                                    <i class="fas fa-map-marker-alt mr-2 text-slate-400 opacity-75"></i>Paris, France
                                </div> --}}
                            </div>
                            <div class="mt-3 py-b border-t border-slate-200 text-center">
                                <div class="flex flex-wrap justify-center space-y-3">
                                    <input type="hidden" name="rating_input" value="{{ $g_rating->rate }}" class="rate_input_hidden">
                                    <div class='rating flex flex-row justify-center gap-3 bg-sky-300'>
                                        <div>
                                            <svg id="star1" class="h-5 fill-current text-yellow-500 cursor-pointer"
                                                viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <path
                                                    d="M575.852903 115.426402L661.092435 288.054362c10.130509 20.465674 29.675227 34.689317 52.289797 37.963825l190.433097 27.62866c56.996902 8.288598 79.7138 78.281203 38.475467 118.496253l-137.836314 134.35715c-16.372539 15.963226-23.84251 38.987109-19.954032 61.49935l32.540421 189.716799c9.721195 56.792245-49.833916 100.077146-100.793444 73.267113L545.870691 841.446188a69.491196 69.491196 0 0 0-64.67153 0l-170.376737 89.537324c-50.959528 26.810033-110.51464-16.474868-100.793444-73.267113L242.569401 667.9996c3.888478-22.512241-3.581493-45.536125-19.954032-61.49935L84.779055 472.245428c-41.238333-40.215049-18.521435-110.207655 38.475467-118.496252l190.433097-27.62866c22.61457-3.274508 42.159288-17.498151 52.289797-37.963826L451.319277 115.426402c25.479764-51.675827 99.053862-51.675827 124.533626 0z"
                                                    ></path>
                                            </svg>
                                        </div>

                                        <div>
                                            <svg id="star2" class="h-5 fill-current text-gray-400 cursor-pointer"
                                                viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <path
                                                    d="M575.852903 115.426402L661.092435 288.054362c10.130509 20.465674 29.675227 34.689317 52.289797 37.963825l190.433097 27.62866c56.996902 8.288598 79.7138 78.281203 38.475467 118.496253l-137.836314 134.35715c-16.372539 15.963226-23.84251 38.987109-19.954032 61.49935l32.540421 189.716799c9.721195 56.792245-49.833916 100.077146-100.793444 73.267113L545.870691 841.446188a69.491196 69.491196 0 0 0-64.67153 0l-170.376737 89.537324c-50.959528 26.810033-110.51464-16.474868-100.793444-73.267113L242.569401 667.9996c3.888478-22.512241-3.581493-45.536125-19.954032-61.49935L84.779055 472.245428c-41.238333-40.215049-18.521435-110.207655 38.475467-118.496252l190.433097-27.62866c22.61457-3.274508 42.159288-17.498151 52.289797-37.963826L451.319277 115.426402c25.479764-51.675827 99.053862-51.675827 124.533626 0z"
                                                    ></path>
                                            </svg>
                                        </div>

                                        <div>
                                            <svg id="star3" class="h-5 fill-current text-gray-400 cursor-pointer"
                                                viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <path
                                                    d="M575.852903 115.426402L661.092435 288.054362c10.130509 20.465674 29.675227 34.689317 52.289797 37.963825l190.433097 27.62866c56.996902 8.288598 79.7138 78.281203 38.475467 118.496253l-137.836314 134.35715c-16.372539 15.963226-23.84251 38.987109-19.954032 61.49935l32.540421 189.716799c9.721195 56.792245-49.833916 100.077146-100.793444 73.267113L545.870691 841.446188a69.491196 69.491196 0 0 0-64.67153 0l-170.376737 89.537324c-50.959528 26.810033-110.51464-16.474868-100.793444-73.267113L242.569401 667.9996c3.888478-22.512241-3.581493-45.536125-19.954032-61.49935L84.779055 472.245428c-41.238333-40.215049-18.521435-110.207655 38.475467-118.496252l190.433097-27.62866c22.61457-3.274508 42.159288-17.498151 52.289797-37.963826L451.319277 115.426402c25.479764-51.675827 99.053862-51.675827 124.533626 0z"
                                                    ></path>
                                            </svg>
                                        </div>

                                        <div>
                                            <svg id="star4"class="h-5 fill-current text-gray-400 cursor-pointer"
                                                viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <path
                                                    d="M575.852903 115.426402L661.092435 288.054362c10.130509 20.465674 29.675227 34.689317 52.289797 37.963825l190.433097 27.62866c56.996902 8.288598 79.7138 78.281203 38.475467 118.496253l-137.836314 134.35715c-16.372539 15.963226-23.84251 38.987109-19.954032 61.49935l32.540421 189.716799c9.721195 56.792245-49.833916 100.077146-100.793444 73.267113L545.870691 841.446188a69.491196 69.491196 0 0 0-64.67153 0l-170.376737 89.537324c-50.959528 26.810033-110.51464-16.474868-100.793444-73.267113L242.569401 667.9996c3.888478-22.512241-3.581493-45.536125-19.954032-61.49935L84.779055 472.245428c-41.238333-40.215049-18.521435-110.207655 38.475467-118.496252l190.433097-27.62866c22.61457-3.274508 42.159288-17.498151 52.289797-37.963826L451.319277 115.426402c25.479764-51.675827 99.053862-51.675827 124.533626 0z"
                                                    ></path>
                                            </svg>
                                        </div>

                                        <div>
                                            <svg id="star5" class="h-5 fill-current text-gray-400 cursor-pointer"
                                                viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <path
                                                    d="M575.852903 115.426402L661.092435 288.054362c10.130509 20.465674 29.675227 34.689317 52.289797 37.963825l190.433097 27.62866c56.996902 8.288598 79.7138 78.281203 38.475467 118.496253l-137.836314 134.35715c-16.372539 15.963226-23.84251 38.987109-19.954032 61.49935l32.540421 189.716799c9.721195 56.792245-49.833916 100.077146-100.793444 73.267113L545.870691 841.446188a69.491196 69.491196 0 0 0-64.67153 0l-170.376737 89.537324c-50.959528 26.810033-110.51464-16.474868-100.793444-73.267113L242.569401 667.9996c3.888478-22.512241-3.581493-45.536125-19.954032-61.49935L84.779055 472.245428c-41.238333-40.215049-18.521435-110.207655 38.475467-118.496252l190.433097-27.62866c22.61457-3.274508 42.159288-17.498151 52.289797-37.963826L451.319277 115.426402c25.479764-51.675827 99.053862-51.675827 124.533626 0z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="w-full px-4">
                                        <p class="font-light leading-relaxed text-slate-600 mb-4">{{ $g_rating->feedback }}</p>
                                        {{-- <a href="javascript:;" class="font-normal text-slate-700 hover:text-slate-400">Follow Account</a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div id="product" class="flex justify-between p-5 py-3  text-[#2557D6] border border-gray-200 shadow-lg">
                    <h5 class="mb-1 font-bold">Product Details</h5>
                    <p class="">Click to open</p>
                </div>
                <div id="product_body" class="accordion flex flex-col gap-2 p-5 text-white bg-blue-400 shadow-inner">
                    <div class="flex justify-between">
                        <div class="flex-1">
                            Quantity
                        </div>
                        <div class="flex-1 font-bold">
                            {{ $gadget->qty }}
                        </div>
                    </div>
                    <div class="flex justify-between">
                        <div class="flex-1">
                            Category
                        </div>
                        <div class="flex-1 font-bold">
                            {{ $gadget->category }}
                        </div>
                    </div>
                    <div class="flex justify-between">
                        <div class="flex-1">
                            Brand
                        </div>
                        <div class="flex-1 font-bold">
                            {{ $gadget->details->model }}
                        </div>
                    </div>
                    <div class="flex justify-between">
                        <div class="flex-1">
                            Model
                        </div>
                        <div class="flex-1 font-bold">
                            {{ $gadget->details->model }}
                        </div>
                    </div>
                    <div class="flex justify-between">
                        <div class="flex-1">
                            Storage
                        </div>
                        <div class="flex-1 font-bold">
                            {{ $gadget->details->storage }}
                        </div>
                    </div>
                    <div class="flex justify-between">
                        <div class="flex-1">
                            Type
                        </div>
                        <div class="flex-1 font-bold">
                            Type
                        </div>
                    </div>
                    <div class="flex justify-between">
                        <div class="flex-1">
                            Condition
                        </div>
                        <div class="flex-1 font-bold">
                            {{ $gadget->condition }}
                        </div>
                    </div>
                    <div class="flex justify-between">
                        <div class="flex-1">
                            Description
                        </div>
                        <div class="flex-1 font-bold">
                            {{ $gadget->details->description }}
                        </div>
                    </div>
                    <div class="flex justify-between">
                        <div class="flex-1">
                            Location
                        </div>
                        <div class="flex-1 font-bold">
                            Location
                        </div>
                    </div>
                </div>

                <div id="receipt" class="flex justify-between p-5 py-3  text-[#2557D6] border border-gray-200 shadow-lg">
                    <h5 class="mb-1 font-bold">Original Receipt</h5>
                    <p class="">Click to open</p>
                </div>
                <div id="receipt_body" class="accordion flex flex-col gap-2 p-5 bg-blue-400 shadow-inner" style="display:none">
                    <a href="{{ asset($gadget->img_receipt) }}" class="w-36 p-1 text-center bg-white border-2 border-gray-300 rounded-xl shadow-lg" download>
                        <b>Download</b>
                    </a>
                    <div class="flex justify-between">
                        <img class="rounded-xl" src="{{ asset($gadget->img_receipt) }}" alt="">
                    </div>
                </div>

                <div class="p-5">
                    @if (auth()->user()->id == $gadget->user_id)
                        <a href="{{ route('gadget.edit', $gadget) }}" class="flex justify-center w-full px-8 py-2 bg-blue-600 font-bold text-white rounded-xl shadow-xl">Edit</a>
                        
                        @if ($gadget->methods->bid)
                            <a href="{{ route('gadget.bid.add', $gadget) }}" class="flex justify-center w-full mt-3 px-8 py-2 bg-blue-600 font-bold text-white rounded-xl shadow-xl">See bidding</a>
                        @endif
                    @else
                    <div class="flex mb-3">
                        @if ($gadget->methods->bid)
                            <a href="{{ route('gadget.bid.add', $gadget) }}" class="flex-1 justify-center mr-2 py-2 px-8 hover:shadow-form rounded-lg bg-[#2557D6] text-center text-base font-semibold text-white outline-none">Place a Bid</a>
                        @else
                            <button disabled class="flex-1 justify-center mr-2 py-2 px-8 hover:shadow-form rounded-lg bg-gray-500 text-center text-base font-semibold text-white outline-none">Place a Bid</button>
                        @endif
                        @if ($gadget->methods->offer)
                            <a href="{{ route('gadget.offer.add', $gadget) }}" class="flex-1 justify-center py-2 px-8 hover:shadow-form rounded-lg bg-[#2557D6] text-center text-base font-semibold text-white outline-none">Make Offer</a>
                        @else
                            <button disabled class="flex-1 justify-center py-2 px-8 hover:shadow-form rounded-lg bg-gray-500 text-center text-base font-semibold text-white outline-none">Make Offer</button>
                        @endif
                    </div>
                    <div class="flex">
                        @if (!$gadget->methods->bid)
                            <a href="{{ route('gadget.proceed', $gadget) }}" class="flex-1 justify-center w-1/2 mr-2 py-2 px-2 hover:shadow-form rounded-lg bg-[#2557D6] text-center text-base font-semibold text-white outline-none">Purchase now</a>
                        @else
                            <button disabled class="flex-1 justify-center w-1/2 mr-2 py-2 px-2 hover:shadow-form rounded-lg bg-gray-500 text-center text-base font-semibold text-white outline-none">Purchase now</button>
                        @endif
                        <a href="{{ route('message_group', $gadget) }}" class="flex-1 justify-center w-1/2 py-2 px-2 hover:shadow-form rounded-lg bg-[#2557D6] text-center text-base font-semibold text-white outline-none">Contact Seller</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
</section>
@endsection



@section('scripts')
<script>
    var ratings = document.querySelectorAll('.rating');
    ratings.forEach((rating, rating_i) => {
        var rating_input_children = Array.from(rating.children);
        rating_input_children.forEach((element, i) => {
            if (i < {!! $gadget->getAverage() !!})
                element.children[0].classList.add('text-yellow-500');
            else
                element.children[0].classList.remove('text-yellow-500');
        });
    });

    var rating_wrapper = document.querySelectorAll('.rating_wrapper');
    rating_wrapper.forEach((tr, tr_i) => {
        let rating = tr.querySelectorAll('.rating')[0];
        let rating_value = tr.querySelector('input[name="rating_input"]').value;
        let rating_input_children = Array.from(rating.children);
        rating_input_children.forEach((element, i) => {
            if (i < rating_value)
                element.children[0].classList.add('text-yellow-500');
            else
                element.children[0].classList.remove('text-yellow-500');
        });
    });

    @isset($rating)
        rating_input_children[{!! $rating->rate !!}-1].click();
    @endisset

    $(document).on('click', '#btn_ratings', function(e) {
        $('#ratings_body').slideToggle();
    });

    $(document).on('click', '#product', function(e) {
        $('#product_body').slideToggle();
    });

    $(document).on('click', '#receipt', function(e) {
        $('#receipt_body').slideToggle();
    });
</script>
@endsection