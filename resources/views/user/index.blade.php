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
        <div class="grid px-7 py-2  items-center justify-around grid-cols-2 gap-1 text-white divide-x divide-solid ">
            <div class="col-span-1  px-3 flex flex-col items-center text-center">
                <span class=" font-bold">Featured<br> Seller</span>
                <span class="text font-medium 0"></span>
            </div>
            <div class="col-span-1 flex items-center">
                <a href="{{ route('wishlist.index') }}" class="flex flex-col w-full text-center">
                    <span class=" font-bold">My <br> Wishlist</span>
                    <span class="text font-medium 0"></span>
                </a>
            </div>
            {{-- <div class="col-span-1 h-full px-3 flex flex-col items-center text-center">
                <span class=" font-bold">My <br> Wishlist</span>
                <span class="text font-medium 0"></span>
            </div> --}}
        </div>
    </div>
    
    <!-- Content -->
    <section class="rounded-tl-xl rounded-tr-xl">
        <div class="container px-3 pt-5 pb-20 mx-auto bg-blue-400 rounded-tl-xl rounded-tr-xl" style="min-height:800px">
            <h1 class="text-xl font-semibold text-white capitalize lg:text-4xl">Gadgets</h1>

            <div class="grid grid-cols-2 gap-3 mt-3 md:grid-cols-3">
                @foreach ($gadgets as $gadget)
                <a href="{{ route('gadget.show', $gadget->id) }}" class="bg-white shadow-lg border border-gray-200 rounded-lg max-w-sm dark:bg-gray-800 dark:border-gray-700">
                    <div class="bg-cover rounded-t-lg" style="
                    height:200px;
                    background-repeat:no-repeat;
                    background-position: center;
                    background-size: cover; 
                    background-image: url('{{ asset($gadget->img) }}')">
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
                </a>
                @endforeach
            </div>
        </div>
    </section>
</section>
@endsection



@section('styles')
<style>
    .multiline-ellipsis-2 {
        display: -webkit-box;
        max-width: 100%;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>
@endsection
