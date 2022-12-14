@extends('layouts.admin')

@section('main')
<section>
    <!-- Content -->
    <div class="p-5">
        <div class="flex justify-between items-center mb-3 ">
            <h3 class="text-xl font-semibold align-middle">Gadgets</h3>
            <a href="{{ route('admin.gadget.index') }}" type="button" class="flex items-center w-max mr-2 px-5 py-2 bg-white text-sm text-center font-semibold rounded-2xl border border-gray-300 shadow-lg dark:text-gray-100 dark:bg-gray-800 ">
                All Gadgets
            </a>
        </div>

        <div class="flex justify-center ">
            <div class="flex flex-col w-full border-2 border-blue-600 rounded-xl shadow-xl lg:w-1/2 dark:bg-gray-800 dark:border-gray-400">
                <div class="flex">
                    <img class="w-full rounded-t-xl" src="{{ asset($gadget->img) }}" alt="">
                </div>
    
                <div class="">
                    <div class="flex flex-col p-5 text-blue-600 dark:text-white">
                        <h5 class="mb-3  text-xl font-bold tracking-tight multiline-ellipsis-2">
                            {{ $gadget->name }}
                        </h5>
                        <p class="font-normal">
                            Original Price: <b>₱{{ number_format($gadget->price_original, 2, ".", ",") }}</b>
                        </p>
                        <p class="font-normal">
                            Selling Price: <b>₱{{ number_format($gadget->price_selling, 2, ".", ",") }}</b>
                        </p>
                        <div class="flex justify-between items-center">
                            <div class="self-center font-normal text-gray-500">
                                Posted {{ $gadget->getElapsedTime($gadget->created_at) }}
                            </div>
                        </div>
                    </div>
    
                    <div id="btn_ratings" class="flex justify-between p-5 py-3 text-[#2557D6] border border-gray-200 dark:text-white">
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
                    <div id="ratings_body" class="flex flex-col gap-2 p-5 bg-blue-400 shadow-inner dark:bg-gray-600" style="display:none">
                        <div class="flex justify-between items-center">
                            <h5 class="text-xl text-white font-bold">Feedbacks</h5>
                        </div>
    
                        @foreach ($gadget->ratings as $g_rating)
                        <div class="relative max-w-md mx-auto md:max-w-2xl mt-10 min-w-0 break-words bg-white w-full shadow-lg rounded-xl">
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
                                        <input type="hidden" value="{{ $g_rating->rate }}" class="rate_input_hidden">
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
    
                    <div id="product" class="flex justify-between p-5 py-3 text-[#2557D6] border border-gray-200 shadow-lg dark:text-white">
                        <h5 class="mb-1 font-bold">Product Details</h5>
                        <p class="">Click to open</p>
                    </div>
                    <div id="product_body" class="accordion flex flex-col gap-2 p-5 text-white bg-blue-400 shadow-inner dark:bg-gray-600">
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
                    
                    <div class="p-5">
                        <form action="{{ route('admin.gadget.status', $gadget) }}" method="POST">
                            @csrf
                            @if ($gadget->status == 'available')
                                <button type="submit" name="value" value="unavailable" class="flex justify-center w-full px-8 py-2 font-bold text-red-500 border-2 border-red-500 rounded-xl shadow-xl hover:bg-red-500 hover:text-white">Disable</button>
                            @elseif ($gadget->status == 'disable')
                                <button type="submit" name="value" value="available" class="flex justify-center w-full px-8 py-2 bg-blue-600 font-bold text-white rounded-xl shadow-xl">Enable</button>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
    })

    @isset($rating)
        rating_input_children[{!! $rating->rate !!}-1].click();
    @endisset

    $(document).on('click', '#btn_ratings', function(e) {
        $('#ratings_body').slideToggle();
    });

    $(document).on('click', '#product', function(e) {
        $('#product_body').slideToggle();
    });
</script>
@endsection
