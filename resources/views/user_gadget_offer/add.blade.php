@extends('layouts.user')

@section('main')
<section class="">
    <!-- Header -->
    <div>
        <div class="relative grid grid-cols-1 gap-4 p-4 mb-3 bg-white shadow-lg">
            <div class="relative flex gap-4 text-[#2557D6]">
                <a href="{{ route('gadget.show', $gadget->id) }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
                    </svg>
                </a>
                <h1 class="text-xl font-semibold capitalize">Make an offer</h1>
            </div>
        </div>
    </div>

    <!-- Content -->
    <section class="flex flex-col px-3 pb-20 items-center justify-center">
        <div class="w-full mb-3 p-4 bg-white shadow-md border border-gray-200 rounded-lg">
            <div class="p-3 text-[#2557D6] border-2 border-[#2557D6] rounded-lg">
                <div class="flex">
                    <div href="#" class="justify-center w-1/3 mr-3">
                        <img class="rounded-lg" src="{{ asset($gadget->img) }}" alt="">
                    </div>
                    <div class="flex flex-col">
                        <div href="#" class="flex-1 justify-center">
                            <div class="flex-1">
                                <p>{{ '@'.auth()->user()->name }}</p>
                            </div>
                            <div class="flex-1">
                                <h5 class="text-lg font-bold tracking-tight multiline-ellipsis-2">
                                    {{ $gadget->name }}
                                </h5>
                            </div>
                            <div class="flex-1">
                                <p class="font-normal text-[#2557D6]">
                                    <b>{{ $gadget->price_selling }} PHP</b>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full p-4 bg-white text-[#2557D6] border border-gray-200 rounded-lg shadow-md">
            <h5 class="mb-3 text-lg font-semibold capitalize">Your offer</h5>
            <form action="{{ route('gadget.offer.add_post', $gadget->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name">Note: <b>One offer at a time only.</b></label>
                    <input type="text" name="amount" placeholder="Input price offer" @isset($offer) value="{{ $offer->amount }}" @endisset class="w-full rounded-md border-2 border-[#2557D6] bg-white py-3 px-6 text-base font-medium text-[#2557D6] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
                </div>

                <div class="mb-3">
                    <label for="note"><b>Input additional note here.</b></label>
                    <textarea name="note" id="note" cols="30" rows="8" placeholder="Input price offer" class="w-full rounded-md border-2 border-[#2557D6] bg-gray-200 py-3 text-base font-medium text-[#2557D6] outline-none focus:border-[#6A64F1] focus:shadow-md">@isset($offer){{ $offer->note }}@endisset</textarea>
                </div>

                <div class="">
                    <button type="submit" class="flex justify-center w-full mb-3 py-2 px-8 hover:shadow-form rounded-lg bg-[#2557D6] text-base font-semibold text-white outline-none">
                        @if (!isset($offer))
                            Submit Offer
                        @else
                            Update Offer  
                        @endif 
                    </button>
                </div>
            </form>

            @isset($offer)
            <form action="{{ route('gadget_offer.destroy', $offer) }}" method="POST" class="flex items-center text-base font-semibold text-gray-900 dark:text-white" onsubmit="return confirm('Are you sure you want to cancel your offer?')">
                @method('DELETE')
                @csrf
                <button class="w-full mb-2 border-2 border-red-500 p-2 text-sm shadow-sm font-bold tracking-wider text-red-500 rounded-lg hover:shadow-lg hover:bg-red-500 hover:text-white">Cancel Offer</button>
            </form>
            @endisset

            <a href="{{ route('gadget.show', $gadget->id) }}" type="button" class="flex justify-center w-full py-2 px-8 hover:shadow-form rounded-lg bg-gray-500 text-base font-semibold text-white outline-none">Back</a>
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
