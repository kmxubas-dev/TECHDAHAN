@extends('layouts.user')

@section('main')
<section class="">
    <!-- Header -->
    <div class="bg-blue-600 rounded-bl-xl rounded-br-xl text-white">
        <div class="relative grid grid-cols-1 gap-4 p-4 shadow-lg">
            <div class="relative flex gap-4">
                <a href="
                    @if ($transaction->buyer_id == auth()->user()->id)
                        {{ route('transaction.index', ['type' => 'buyer']) }}
                    @elseif ($transaction->seller_id == auth()->user()->id)
                        {{ route('transaction.index', ['type' => 'seller']) }}
                    @endif
                ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="h-full" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
                    </svg>
                </a>
                <div class="flex flex-col">
                    <h1 class="text-xl font-semibold capitalize">
                        My Transactions
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Content -->
    <section class="flex flex-col p-4 py-5 pb-20 items-center justify-center">
        <div class="w-full mb-8">
            <div class="w-full mb-5 p-4 bg-white shadow-md rounded-lg border border-2 border-[#2557D6]">
                <a href="#" class="flex justify-center">
                    <img class="rounded-lg w-14 h-14" src="{{ asset($transaction->info->img) }}" alt="">
                </a>

                <div class="p-2">
                    <a href="#" class="text-center">
                        <h5 class="mb- text-[#2557D6] text-xl font-bold tracking-tight multiline-ellipsis-2">
                            {{ $transaction->info->name }}
                        </h5>
                        <p class="font-normal text-[#2557D6]">
                            <b>{{ $transaction->code }}</b>
                        </p>
                    </a>

                    <hr class="my-3">

                    <div class="font-normal text-[#2557D6] mb-3">
                        @if ($transaction->buyer_id == auth()->user()->id)
                            Sold by: <b>{{ '@'.$transaction->seller->name->full }}</b>
                        @elseif ($transaction->seller_id == auth()->user()->id)
                            Bought by: <b>{{ '@'.$transaction->buyer->name->full }}</b>
                        @endif
                    </div>

                    <div class="font-normal text-[#2557D6] mb-3">
                        <p class="font-normal text-[#2557D6] mb-1">
                            Bought for:
                        </p>
                        <p class="font-normal text-[#2557D6] mb-1">
                            <b>₱{{ number_format($transaction->price, 2, ".", ",") }}</b>
                        </p>
                    </div>

                    <div class="font-normal text-[#2557D6] mb-3">
                        <p class="font-normal text-[#2557D6] mb-1">
                            Bought at:
                        </p>
                        <p class="font-normal text-[#2557D6] mb-1">
                            <b>{{ date_format($transaction->created_at, 'F d, o') }}</b>
                        </p>
                    </div>

                    <hr class="my-3">

                    <div class="mb-3">
                        <p class="font-normal text-[#2557D6] mb-1">
                            Payment Method:
                        </p>
                        <p class="font-normal text-[#2557D6] mb-1">
                            <b>{{ ucfirst($transaction->payment->method).' - '.ucfirst($transaction->payment->type) }}</b>
                        </p>
                    </div>

                    <div class="mb-3">
                        <p class="font-normal text-[#2557D6] mb-1">
                            By:
                        </p>
                        <p class="font-normal text-[#2557D6] mb-1">
                            <b>{{ ucfirst($transaction->method) }}</b>
                        </p>
                    </div>
                </div>
            </div>

            @if ($transaction->payment->type == 'installment')
                <div class="w-full mb-5 p-4 bg-white shadow-md rounded-lg">
                    <div class="p-2">
                        <div class="text-center">
                            <h5 class="mb- text-[#2557D6] text-xl font-bold tracking-tight multiline-ellipsis-2">
                                Installment Details
                            </h5>
                        </div>

                        <hr class="my-3">

                        <div class="font-normal text-[#2557D6] mb-3">
                            <p class="font-normal text-[#2557D6] mb-1">
                                Months to pay: <b>{{ $transaction->info->installment->duration }}</b>
                            </p>
                        </div>

                        <div class="font-normal text-[#2557D6] mb-3">
                            <b>Next billing dates:</b>
                        </div>
                        
                        <div class="flex flex-col gap-3 text-gray-600">
                            @for ($i=0; $i < $transaction->info->installment->duration; $i++)
                                <div class="flex justify-between font-bold">
                                    <div class="flex-1">
                                        {{ date('F d, o', strtotime('+'.$i.' months', strtotime($transaction->created_at))) }}
                                    </div>
                                    <div class="flex-1">
                                        ₱{{ number_format($transaction->price/$transaction->info->installment->duration, 2, ".", ",") }}
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
            @endif
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
