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
                <h1 class="text-xl font-semibold capitalize">Order Summary</h1>
            </div>
        </div>
    </div>
    
    <!-- Content -->
    <section class="flex flex-col px-3 pb-20 items-center justify-center">
        <div class="w-full mb-3 p-4 bg-white shadow-md border border-gray-200 rounded-lg">
            <div class="p-3 text-[#2557D6] border-2 border-[#2557D6] rounded-lg">
                <div class="flex flex-col text-center">
                    <p>{{ '@'.auth()->user()->name }}</p>
                    <h5 class="mb-3 text-[#2557D6] text-xl text-center font-bold tracking-tight multiline-ellipsis-2">
                        {{ $gadget->name }}
                    </h5>
                </div>
                <div class="flex">
                    <div href="#" class="justify-center w-1/3 mr-3">
                        <img class="rounded-lg" src="{{ asset($gadget->img) }}" alt="">
                    </div>
                    <div class="flex flex-col">
                        <div href="#" class="flex-1 justify-center">
                            <div class="flex-1">
                                {{ $gadget->model }}
                            </div>
                            <div class="flex-1">
                                {{ $gadget->storage }}
                            </div>
                            <div class="flex-1">
                                {{ $gadget->color }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-3">
                <p class="font-normal text-[#2557D6]">
                    Total Payment: <b>{{ $gadget->price_selling }} PHP</b>
                </p>

                <p class="font-normal text-[#2557D6]">
                    Purchase Order ID: <b>{{ '#22'.strtoupper(substr(md5(microtime()),rand(0,26),6)).'TD'; }}</b>
                </p>
            </div>
        </div>

        <div class="w-full p-4 bg-white text-[#2557D6] border border-gray-200 rounded-lg shadow-md">
            <h5 class="text-lg font-semibold capitalize">Payment Method</h5>
            <form action="{{ route('gadget.proceed_post', $gadget->id) }}" method="POST">
                @csrf
                <div class="flex mb-3">
                    <div class='flex flex-row p-3'>
                        <input type="radio" name="amount" id="amount1" class='appearance-none h-6 w-6 bg-gray-400 rounded-full checked:bg-[#2557D6] checked:scale-75 transition-all duration-200 peer' required/>
                        <div class='h-6 w-6 absolute rounded-full pointer-events-none peer-checked:border-[#2557D6] peer-checked:border-2'></div>
                        <label for='amount1' class='flex flex-col justify-center px-2 peer-checked:text-[#2557D6] select-none'>Full Payment</label>
                    </div>
                    <div class='flex flex-row p-3'>
                        <input type="radio" name="amount" id="amount2" class='appearance-none h-6 w-6 bg-gray-400 rounded-full checked:bg-[#2557D6] checked:scale-75 transition-all duration-200 peer' required/>
                        <div class='h-6 w-6 absolute rounded-full pointer-events-none peer-checked:border-[#2557D6] peer-checked:border-2'></div>
                        <label for='amount2' class='flex flex-col justify-center px-2 peer-checked:text-[#2557D6] select-none'>Installment</label>
                    </div>
                </div>

                <ul role="list" style="min-height: 125px">
                    <li class="mb-2 text-white border- border-[#2557D6] rounded-lg hover:bg-[#2557D6">
                        <input type="radio" name="payment" id="payment1" value="gcash" class='sr-only appearance-none h-6 w-6 bg-gray-400 rounded-full checked:bg-[#2557D6] checked:scale-75 transition-all duration-200 peer' required/>
                        <label for='payment1' class="flex px-3 py-2 items-center space-x-4 text-[#2557D6] border-2 border-[#2557D6] peer-checked:bg-[#2557D6] peer-checked:text-white rounded-lg">
                            <div class="w-10 mr-3">
                                <img src="{{ asset('img/placeholder.jpg') }}" class="rounded-lg">
                            </div>
                            Gcash
                        </label>
                    </li>
                    <li class="mb-2 text-white border- border-[#2557D6] rounded-lg hover:bg-[#2557D6">
                        <input type="radio" name="payment" id="payment2" value="credit" class='sr-only appearance-none h-6 w-6 bg-gray-400 rounded-full checked:bg-[#2557D6] checked:scale-75 transition-all duration-200 peer' required/>
                        <label for='payment2' class="flex px-3 py-2 items-center space-x-4 text-[#2557D6] border-2 border-[#2557D6] peer-checked:bg-[#2557D6] peer-checked:text-white rounded-lg">
                            <div class="w-10 mr-3">
                                <img src="{{ asset('img/placeholder.jpg') }}" class="rounded-lg">
                            </div>
                            Credit Card
                        </label>
                    </li>
                </ul>

                <div class="">
                    <button type="submit" class="flex justify-center w-full py-2 px-8 hover:shadow-form rounded-lg bg-[#2557D6] text-base font-semibold text-white outline-none">Proceed to payment</button>
                </div>
            </form>
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
