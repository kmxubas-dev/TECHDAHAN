@extends('layouts.user')

@section('main')
<section class="">
    <!-- Header -->
    <div>
        <div class="relative grid grid-cols-1 gap-4 p-4 bg-white shadow-lg">
            <div class="relative flex gap-4 text-[#2557D6]">
                <a href="{{ route('gadget_offer.index') }}">
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
    <section class="flex flex-col mb-20 p-3 items-center justify-center">
        <div class="w-full mb-8 p-4 bg-white shadow-md border border-gray-200 rounded-lg border-2 border-[#2557D6]">
            <a href="#" class="flex justify-center">
                <img class="rounded-lg w-14 h-14" src="{{ asset($gadget->img) }}" alt="">
            </a>
            <div class="p-2">
                <a href="#">
                    <h5 class="mb-3 text-[#2557D6] text-xl text-center font-bold tracking-tight multiline-ellipsis-2">
                        {{ $gadget->name }}
                    </h5>
                </a>

                <p class="font-normal text-[#2557D6] mb-3">
                   From: <b>{{ '@'.$offer->user->name }}</b>
                </p>

                <p class="font-normal text-[#2557D6] mb-3">
                    Original Price: <b>₱{{ number_format($gadget->price_original, 2, ".", ",") }}</b>
                </p>
                <p class="font-normal text-[#2557D6] mb-3">
                    Selling Price: <b>₱{{ number_format($gadget->price_selling, 2, ".", ",") }}</b>
                </p>

                <hr class="mb-3">

                <p class="font-normal text-[#2557D6] mb-3">
                    Offered Price: <b>₱{{ number_format($offer->amount, 2, ".", ",") }}</b>
                </p>
                <p class="font-normal text-[#2557D6] mb-3">
                    Date Offered: <b>{{ date_format($offer->updated_at, 'F d, o') }}</b>
                </p>

                <p class="font-normal text-[#2557D6]">
                    Offer note:
                </p>
                <p class="font-normal text-[#2557D6]">
                    <b>"{{ $offer->note }}"</b>
                </p>
            </div>
        </div>

        <div class="flex w-full p-3">
            <button class="flex-1 justify-center w-1/2 mr-2 py-2 px-2 hover:shadow-form rounded-lg bg-[#2557D6] text-center text-base font-semibold text-white outline-none">Accept</button>

            <button class="flex-1 justify-center w-1/2 py-2 px-2 hover:shadow-form rounded-lg bg-[#2557D6] text-center text-base font-semibold text-white outline-none">Decline</button>
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
