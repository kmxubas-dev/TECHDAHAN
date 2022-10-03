@extends('layouts.user')
@section('main')
<section class="">
    <!-- Header -->
    <div>
        <div class="relative grid grid-cols-1 gap-4 p-4 mb-3 bg-white shadow-lg">
            <div class="relative flex gap-4">
                <img src="https://icons.iconarchive.com/icons/diversity-avatars/avatars/256/charlie-chaplin-icon.png" class="relative rounded-lg bg-white border border-blue-800 h-14 w-14" alt="" loading="lazy">
                <div class="flex flex-col w-full">
                    <p class="mb-1 text-x text-blue-800 whitespace-nowrap truncate overflow-hidden">Hello,</p>
                    <div class="flex flex-row justify-between">
                        <p class="relative text-xl whitespace-nowrap truncate overflow-hidden">{{auth()->user()->name}}</p>
                        <a class="text-gray-500 text-xl" href="#"><i class="fa-solid fa-trash"></i></a>
                    </div>
                </div>
            </div>
            <div class="flex justify-between">
                <button type="button" class="flex-1 text-white bg-[#2557D6] hover:bg-[#2557D6]/90 focus:ring-4 focus:ring-[#2557D6]/50 font-medium rounded-lg text-xs px-2 py-2 text-center items-center dark:focus:ring-[#2557D6]/50 mr-1">
                    Featured Gadget
                </button>
                <button type="button" class="flex-1 text-white bg-[#2557D6] hover:bg-[#2557D6]/90 focus:ring-4 focus:ring-[#2557D6]/50 font-medium rounded-lg text-xs px-2 py-2 text-center items-center dark:focus:ring-[#2557D6]/50 mr-1">
                    Gadget Near Me
                </button>
                <button type="button" class="flex-1 text-white bg-[#2557D6] hover:bg-[#2557D6]/90 focus:ring-4 focus:ring-[#2557D6]/50 font-medium rounded-lg text-xs px-2 py-2 text-center items-center dark:focus:ring-[#2557D6]/50 mr-1">
                    Watch List
                </button>
            </div>
        </div>
    </div>
    
    <!-- Content -->
    <section class="">
        <div class="container px-3 py-3 mx-auto">
            <h1 class="text-xl font-semibold text-gray-800 capitalize lg:text-4xl dark:text-white">Gadgets</h1>

            <div class="grid grid-cols-2 gap-3 mt-3 md:grid-cols-3">
                @foreach ($gadgets as $gadget)
                <a href="{{ route('gadget.show', $gadget->id) }}" class="bg-white shadow-md border border-gray-200 rounded-lg max-w-sm dark:bg-gray-800 dark:border-gray-700">
                    <div href="#">
                        <img class="rounded-t-lg" src="{{ asset($gadget->img) }}" alt="">
                    </div>
                    <div class="p-2">
                        <div href="#">
                            <h5 class="text-gray-900 font-bold tracking-tight mb-1 dark:text-white multiline-ellipsis-2">
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
