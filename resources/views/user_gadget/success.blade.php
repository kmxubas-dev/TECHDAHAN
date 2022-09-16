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
                        <p class="relative text-xl whitespace-nowrap truncate overflow-hidden">{{ auth()->user()->name }}</p>
                        <a class="text-gray-500 text-xl" href="#"><i class="fa-solid fa-trash"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Content -->
    <section class="items-center justify-center p-3">
        <div class="flex flex-col justify-center bg-green-100 rounded-lg p-4 mb-4 text-sm text-green-700" role="alert">
            <div class="flex w-full justify-center">
                <svg class="w-44 h-44 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            </div>
            <div class="flex flex-col text-center">
                <div class="mb-8 font-bold text-xl">Success!</div>
                <a href="{{ route('index') }}" class="font-bold text-xl text-white bg-green-500 p-3 rounded">Go to Homepage</a>
            </div>
        </div>
    </section>
</section>
@endsection
