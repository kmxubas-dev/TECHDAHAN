@extends('layouts.admin')

@section('main')
<section>
    <!-- Table -->
    <div class="mt-4 mx-4">
        <div class="flex justify-between items-center">
            <h3 class="text-xl font-semibold align-middle">Users</h3>
            
            <div class="flex space-x-3">
                @if ($user->type != 'admin')
                    @if ($user->status == 'enabled')
                        <form action="{{ route('admin.user.update', $user) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <button type="submit" name="status" value="disabled" class="flex items-center w-max px-5 py-2 bg-red-500 text-sm text-center text-gray-100 font-semibold rounded-2xl border border-gray-300 shadow-lg">
                                Disable User
                            </button>
                        </form>
                    @else
                        <form action="{{ route('admin.user.update', $user) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <button type="submit" name="status" value="enabled" class="flex items-center w-max px-5 py-2 bg-white text-sm text-center font-semibold rounded-2xl border border-gray-300 shadow-lg dark:text-gray-100 dark:bg-gray-800">
                                Enable User
                            </button>
                        </form>
                    @endif
                @endif
                <a href="{{ route('admin.user.index') }}" class="flex items-center w-max px-5 py-2 bg-white text-sm text-center font-semibold rounded-2xl border border-gray-300 shadow-lg dark:text-gray-100 dark:bg-gray-800 ">
                    All Users
                </a>
            </div>
        </div>

        <div class="flex justify-center w-full">
            <div class="w-full p-8 bg-white shadow mt-16 rounded-xl lg:w-1/2">
                <div class="grid grid-cols-1 mb-10 md:grid-cols-3">
                    <div class="grid grid-cols-3 text-center order-last md:order-first mt-10 md:mt-0">
                        {{-- <div>
                            <p class="font-bold text-gray-700 text-xl">22</p>
                            <p class="text-gray-400">Friends</p>
                        </div>
                        <div>
                            <p class="font-bold text-gray-700 text-xl">10</p>
                            <p class="text-gray-400">Photos</p>
                        </div>
                        <div>
                            <p class="font-bold text-gray-700 text-xl">89</p>
                            <p class="text-gray-400">Comments</p>
                        </div> --}}
                    </div>
                    <div class="relative">
                        <img src="{{ asset($user->profile_photo_path) }}" class="w-36 h-36 bg-indigo-100 mx-auto rounded-full shadow-2xl absolute inset-x-0 top-0 -mt-24 flex items-center justify-center text-indigo-500"/>
                    </div>
                    <div class="space-x-8 flex justify-between mt-10 md:mt-0 md:justify-center">
                        {{-- <button class="text-white py-2 px-4 uppercase rounded bg-blue-400 hover:bg-blue-500 shadow hover:shadow-lg font-medium transition transform hover:-translate-y-0.5"> Connect</button>
                        <button class="text-white py-2 px-4 uppercase rounded bg-gray-700 hover:bg-gray-800 shadow hover:shadow-lg font-medium transition transform hover:-translate-y-0.5"> Message</button> --}}
                    </div>
                </div>
                <div class="grid grid-cols-3 mt-0 pb-3 text-center order-last md:order-first text-center border-b md:mt-0">
                    <div>
                        <p class="font-bold text-gray-700 text-xl">{{ $gadgets_count }}</p>
                        <p class="text-gray-400">Gadgets</p>
                    </div>
                    <div>
                        {{-- <p class="font-bold text-gray-700 text-xl">10</p>
                        <p class="text-gray-400">Photos</p> --}}
                    </div>
                    <div>
                        <p class="font-bold text-gray-700 text-xl">{{ $transactions_count }}</p>
                        <p class="text-gray-400">Sales</p>
                    </div>
                </div>
                <div class="flex flex-col space-y-1 mt-4 pb-4 text-center">
                    <h3 class="text-4xl font-medium text-gray-700">{{ $user->name->full }}</h3>
                    <p class="font-light text-gray-600 mt-3">
                        <div class="flex justify-center text-center">
                            <input type="hidden" name="rating_input" value="
                                @if ($user->ratings->count() != 0)
                                    {{ $user->ratings->sum('rate')/$user->ratings->count() }}
                                @else
                                    0
                                @endif
                            ">
                            <div class='rating flex flex-row justify-center gap-1 bg-sky-300'>
                                <div>
                                    <svg id="star1" class="h-5 fill-current text-gray-400 cursor-pointer"
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
                        </div>
                    </p>
                    <p class="mt-8 text-gray-500">{{ $user->email }}</p>
                    <p class="mt-8 text-gray-500">{{ $user->phone }}</p>
                    <p class="mt-2 text-gray-500">{{ $user->address }}</p>
                </div>
                {{-- <div class="mt-12 flex flex-col justify-center">
                    <p class="text-gray-600 text-center font-light lg:px-16">An artist of considerable range, Ryan — the name taken by Melbourne-raised, Brooklyn-based Nick Murphy — writes, performs and records all of his own music, giving it a warm, intimate feel with a solid groove structure. An artist of considerable range.</p>
                    <button class="text-indigo-500 py-2 px-4  font-medium mt-4"> Show more</button>
                </div> --}}
            </div>
        </div>

        <div class="container px-3 pt-5 pb-20 mx-auto rounded-tl-xl rounded-tr-xl">
            <h1 class="text-xl font-semibold capitalize dark:text-white">Gadgets</h1>

            <div class="grid grid-cols-2 gap-3 mt-3 md:grid-cols-3">
                @foreach ($gadgets as $gadget)<!-- component -->
                <div class="gadget-item py-1">
                    <input type="hidden" name="topseller_rating" value="
                        @if ($gadget->ratings->count() != 0)
                            {{ $gadget->ratings->sum('rate')/$gadget->ratings->count() }}
                        @else
                            0
                        @endif
                    ">
                    <div class="flex max-w-md bg-white shadow-lg rounded-lg overflow-hidden">
                        <div class="w-1/3 bg-cover" style="
                            background-repeat:no-repeat;
                            background-position: center;
                            background-size: cover; 
                            background-image: url('{{ asset($gadget->img) }}')">
                        </div> 
                        <div class="w-2/3 p-4">
                        <h1 class="text-gray-900 font-bold text-lg">{{ $gadget->name }}</h1>
                        <p class="mt-2 text-gray-600 text-sm">{{$gadget->address}}</p>
                        <div class='rating flex flex-row justify-left gap-1 bg-sky-300'>
                            <div>
                                <svg id="star1" class="h-5 fill-current text-gray-400 cursor-pointer"
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
                        <div class="flex item-center justify-between mt-3">
                            <h1 class="text-gray-700 font-bold">₱{{ number_format($gadget->price_selling, 2, ".", ",") }}</h1>
                            {{-- <button class="px-3 py-2 bg-gray-800 text-white text-xs font-bold uppercase rounded">Add to Card</button> --}}
                        </div>
                        </div>
                    </div>
                </div>
                {{-- <a href="{{ route('gadget.show', $gadget->id) }}" class="bg-white shadow-lg border border-gray-200 rounded-lg max-w-sm dark:bg-gray-800 dark:border-gray-700">
                    <div href="#">
                        <img class="rounded-t-lg" src="{{ asset($gadget->img) }}" alt="">
                    </div>
                    <div class="p-2">
                        <div href="#">
                            <h5 class="text-gray-900 font-bold tracking-tight mb-1 multiline-ellipsis-2">
                                {{ $gadget->name }}
                            </h5>
                        </div>
                        <p class="font-normal text-gray-700 mb-3 dark:text-gray-400">
                            Php {{ number_format($gadget->price_selling, 2) }}
                        </p>
                        <div class="flex font-normal text-gray-700 mb-3 dark:text-gray-400">
                            <div class="mr-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="inline-flex" viewBox="0 0 16 16">
                                    <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                                </svg>
                            </div>
                            <div class="multiline-ellipsis-2">
                                Address
                            </div>
                        </div>
                        <p class="float-right font-bold text-xs text-gray-700 mb-2 dark:text-gray-400">See Details</p>
                    </div>
                </a> --}}
                @endforeach
            </div>
        </div>
    </div>
    <!-- ./Table -->
</section>
@endsection



@section('scripts')
<script>
    var topseller_trs = document.querySelectorAll('.gadget-item');
    topseller_trs.forEach((tr, tr_i) => {
        let rating = tr.querySelectorAll('.rating')[0];
        let rating_value = tr.querySelector('input[name="topseller_rating"]').value;
        let rating_input_children = Array.from(rating.children);
        rating_input_children.forEach((element, i) => {
            if (i < rating_value)
                element.children[0].classList.add('text-yellow-500');
            else
                element.children[0].classList.remove('text-yellow-500');
        });
    });

    let rating = document.querySelector('.rating');
    let rating_value = document.querySelector('input[name="rating_input"]').value;
    let rating_input_children = Array.from(rating.children);
    rating_input_children.forEach((element, i) => {
        console.log(element.children[0].classList);
        if (i < rating_value)
            element.children[0].classList.add('text-yellow-500');
        else
            element.children[0].classList.remove('text-yellow-500');
    });
</script>
@endsection
