@extends('layouts.user')

@section('main')
<section class="">
    <!-- Header -->
    <div>
        <div class="relative grid grid-cols-1 gap-4 p-4 bg-white shadow-lg">
            <div class="relative flex gap-4 text-[#2557D6]">
                <a href="{{ route('user.settings') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="h-full" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
                    </svg>
                </a>
                <div class="flex flex-col">
                    <h1 class="text-xl font-semibold capitalize">
                        Offer Requests
                    </h1>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Content -->
    <section class="items-center justify-center p-3">
        <div class="p-3 pb-14">
            <div class="flow-root">
                <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach ($offers as $offer)
                    <li class="gadget-li mb-3 rounded-lg shadow" style="border-width:2px; border-color:#2557D6;">
                        <a href="{{ route('gadget_offer.show', $offer) }}" class="p-3 py-1 flex items-center space-x-4">
                            <div class="flex-shrink-0">
                                <img class="w-14 h-14 rounded-lg" src="{{ asset($offer->gadget->img) }}" alt="Neil image">
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-lg font-bold text-[#2557D6] truncate">
                                    {{ $offer->gadget->name  }}
                                </p>
                                <p class="text-lg text-[#2557D6] truncate dark:text-gray-400">
                                    {{ $offer->user->name }}
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    ₱{{ number_format($offer->amount, 2, ".", ",") }}
                                </p>
                            </div>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
</section>
@endsection

@section('styles')
<style>
    .gadget-li {
        border-width: 2px;
        border-color: #2557D6;
    }
</style>
@endsection
