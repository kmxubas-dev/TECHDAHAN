@extends('layouts.user')

@section('main')
<section class="">
    <!-- Header -->
    <div class="bg-blue-600 rounded-bl-xl rounded-br-xl text-white">
        <div class="relative grid grid-cols-1 gap-4 p-4 shadow-lg">
            <div class="relative flex gap-4">
                <a href="{{ route('transaction.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="h-full" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
                    </svg>
                </a>
                <div class="flex flex-col">
                    <h1 class="text-xl font-semibold capitalize">
                        Transaction Payment Status
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Content -->
    <section class="flex flex-col py-5 pb-16 items-center justify-center">
        <div class="flex flex-col space-y-5 w-full mb-5 bg-white rounded-lg">
            <div class="flex flex-col justify-center">
                <img src="
                    @if (request()->query('status') == 'success')
                        {{ asset('img/app/transaction/success.webp') }}
                    @else
                        {{ asset('img/app/transaction/failed.webp') }}
                    @endif
                " alt="" class="w-full lg:w-1/3">

                <h5 class="text-xl text-center font-bold capitalize">
                    Payment {{ request()->query('status') }}
                </h5>
            </div>

            <div class="p-5 bg-blue-600 text-white shadow-inner">
                <a href="#" class="flex justify-center mb-2">
                    <img class="rounded-lg w-14 h-14" src="{{ asset($transaction->info->img) }}" alt="">
                </a>

                <div class="text-center">
                    <h5 class=" text-xl font-bold tracking-tight multiline-ellipsis-2">
                        {{ $transaction->info->name }}
                    </h5>
                    <p class="font-normal">
                        <b>{{ $transaction->code }}</b>
                    </p>
                </div>

                <hr class="my-3">

                <div class="mb-3">
                    <p class="font-normal mb-1">
                        Payment Method:
                    </p>
                    <p class="font-normal mb-1">
                        <b>{{ ucfirst($transaction->payment->method).' - '.ucfirst($transaction->payment->type) }}</b>
                    </p>
                </div>

                <div class="mb-5">
                    <p class="font-normal mb-1">
                        By:
                    </p>
                    <p class="font-normal mb-1">
                        <b>{{ ucfirst($transaction->method) }}</b>
                    </p>
                </div>
                
                <div class="flex mb-1">
                    <a href="
                        @if ($transaction->payment->status == 'success')
                            {{ route('transaction.show', $transaction) }}
                        @else
                            {{ route('gadget.show', $transaction->gadget) }}
                        @endif
                    " class="w-full px-3 py-2 bg-white text-center text-black font-bold rounded-xl shadow-xl">
                        Finish
                    </a>
                </div>
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
