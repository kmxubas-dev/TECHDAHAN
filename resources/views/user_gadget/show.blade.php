@extends('layouts.user')

@section('main')
<section class="">
    <!-- Header -->
    <div>
        <div class="relative grid grid-cols-1 gap-4 p-4 bg-white shadow-lg">
            <div class="relative flex gap-4">
                <img src="https://icons.iconarchive.com/icons/diversity-avatars/avatars/256/charlie-chaplin-icon.png" class="relative rounded-lg bg-white border border-blue-800 h-14 w-14" alt="" loading="lazy">
                <div class="flex flex-col w-full">
                    <p class="mb-1 text-x text-blue-800 whitespace-nowrap truncate overflow-hidden">Hello,</p>
                    <div class="flex flex-row justify-between">
                        <p class="relative text-xl whitespace-nowrap truncate overflow-hidden">{{ auth()->user()->name->full }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content -->
    <section class="flex flex-col mb-20 items-center justify-center">
        {{-- <h1 class="text-xl mb-3 font-semibold text-gray-800 capitalize dark:text-white">Show Gadget</h1> --}}

        <div class="w-full bg-white">
            <div class="flex">
                <img class="w-full" src="{{ asset($gadget->img) }}" alt="">
            </div>

            <div class="p-5">
                <div>
                    <h5 class="mb-3 text-[#2557D6] text-xl font-bold tracking-tight multiline-ellipsis-2">
                        {{ $gadget->name }}
                    </h5>
                </div>
                <p class="font-normal text-[#2557D6] mb-1">
                    Original Price: <b>₱{{ number_format($gadget->price_original, 2, ".", ",") }}</b>
                </p>
                <p class="font-normal text-[#2557D6] mb-3">
                    Selling Price: <b>₱{{ number_format($gadget->price_selling, 2, ".", ",") }}</b>
                </p>
                <div class="flex justify-between align-top">
                    <div class="self-center font-normal text-gray-500 mb-1">
                        Posted {{ $gadget->getElapsedTime($gadget->created_at) }}
                    </div>

                    <form action="{{ route('gadget.wishlist.add', $gadget) }}" method="POST" class="flex items-center text-base font-semibold text-gray-900 dark:text-white">
                        @csrf
                        <button type="submit" class="p-2 text-sm text-[#2557D6] border-2 border-[#2557D6] rounded-lg">
                            <b>+ Add to Wishlist</b>
                        </button>
                    </form>
                </div>

                <hr class="my-3">

                <div class="flex flex-col gap-2 text-[#2557D6]">
                    <h5 class="mb-1 text-[#2557D6] font-bold">Product Details</h5>
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

                    <hr class="my-3">    

                    <div>
                        @if (auth()->user()->id == $gadget->user_id)
                            <a href="{{ route('gadget.edit', $gadget) }}" class="flex justify-center w-full py-2 px-8 hover:shadow-form rounded-lg bg-[#2557D6] text-base font-semibold text-white outline-none">Edit</a>
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
