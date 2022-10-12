@extends('layouts.user')

@section('main')
<section class="">
    <!-- Header -->
    <div>
        <div class="relative grid grid-cols-1 gap-4 p-4 bg-white shadow-lg">
            <div class="relative flex gap-4 text-[#2557D6]">
                <a href="
                    @if ($offer->user_id == auth()->user()->id)
                        {{ route('gadget_offer.index', ['type' => 'buyer']) }}
                    @else
                        {{ route('gadget_offer.index', ['type' => 'seller']) }}
                    @endif
                ">
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
    <section class="flex flex-col pb-20 p-3 items-center justify-center">
        @if ($offer->user_id == auth()->user()->id)
            <div class="w-full mb-8 p-4">
                <div class="w-full mb-5 p-4 bg-white shadow-md border rounded-lg border-2 border-[#2557D6]">
                    <a href="#" class="flex justify-center">
                        <img class="rounded-lg w-14 h-14" src="{{ asset($gadget->img) }}" alt="">
                    </a>

                    <div class="p-2">
                        <a href="#">
                            <h5 class="mb-3 text-[#2557D6] text-xl text-center font-bold tracking-tight multiline-ellipsis-2">
                                {{ $gadget->name }}
                            </h5>
                        </a>

                        <p class="font-normal text-[#2557D6] mb-1">
                            From: <b>{{ '@'.$offer->user->name }}</b>
                        </p>
                        <p class="font-normal text-[#2557D6] mb-1">
                            Original Price: <b>₱{{ number_format($gadget->price_original, 2, ".", ",") }}</b>
                        </p>
                        <p class="font-normal text-[#2557D6]">
                            Selling Price: <b>₱{{ number_format($gadget->price_selling, 2, ".", ",") }}</b>
                        </p>

                        <hr class="my-3">

                        <p class="font-normal text-[#2557D6] mb-1">
                            Offered Price: <b>₱{{ number_format($offer->amount, 2, ".", ",") }}</b>
                        </p>
                        <p class="font-normal text-[#2557D6] mb-1">
                            Date Offered: <b>{{ date_format($offer->updated_at, 'F d, o') }}</b>
                        </p>
                        <p class="font-normal text-[#2557D6]">
                            Offer note:
                        </p>
                        <p class="font-normal text-[#2557D6] multiline-ellipsis-2">
                            <b>"{{ $offer->note }}"</b>
                        </p>
                    </div>
                </div>
        
                <div class="w-full p-4 bg-white text-[#2557D6] border border-gray-200 rounded-lg shadow-md">
                    <h5 class="text-lg font-semibold capitalize">Payment Method</h5>
                    <form action="{{ route('gadget.proceed_post', $gadget->id) }}" method="POST">
                        @csrf
                        <ul role="list" style="min-height: 125px" class="mt-3">
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
        
                        <div class="flex mb-3">
                            <div class='flex flex-row p-3'>
                                <input type="radio" name="amount" id="amount1" class='appearance-none h-6 w-6 bg-gray-400 rounded-full checked:bg-[#2557D6] checked:scale-75 transition-all duration-200 peer' required/>
                                <div class='h-6 w-6 absolute rounded-full pointer-events-none peer-checked:border-[#2557D6] peer-checked:border-2'></div>
                                <label for='amount1' class='flex flex-col justify-center px-2 peer-checked:text-[#2557D6] select-none'>Direct Payment</label>
                            </div>
                            <div class='flex flex-row p-3'>
                                <input type="radio" name="amount" id="amount2" class='appearance-none h-6 w-6 bg-gray-400 rounded-full checked:bg-[#2557D6] checked:scale-75 transition-all duration-200 peer' required/>
                                <div class='h-6 w-6 absolute rounded-full pointer-events-none peer-checked:border-[#2557D6] peer-checked:border-2'></div>
                                <label for='amount2' class='flex flex-col justify-center px-2 peer-checked:text-[#2557D6] select-none peer-disabled:line-through'>Installment</label>
                            </div>
                        </div>
        
                        <div class="">
                            <button type="submit" class="flex justify-center w-full py-2 px-8 hover:shadow-form rounded-lg bg-[#2557D6] text-base font-semibold text-white outline-none">Purchase now</button>
                        </div>
                    </form>
                </div>
            </div>
        @else
            <div class="w-full mb-8 p-4">
                <div class="w-full mb-8 p-4 bg-white shadow-md border rounded-lg border-2 border-[#2557D6]">
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

                <form action="{{ route('gadget_offer.response', $offer) }}" method="POST" class="flex w-full p-3">
                    @csrf
                    <button type="submit" name="status" value="accepted" class="flex-1 justify-center w-1/2 mr-2 py-2 px-2 hover:shadow-form rounded-lg bg-[#2557D6] text-center text-base font-semibold text-white outline-none">Accept</button>

                    <button type="submit" name="status" value="declined" class="flex-1 justify-center w-1/2 py-2 px-2 hover:shadow-form rounded-lg bg-[#2557D6] text-center text-base font-semibold text-white outline-none">Decline</button>
                </form>
            </div>
        @endif
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

    .gadget-li {
        border-width: 2px;
        border-color: #2557D6;
    }
</style>
@endsection

@section('scripts')
<script>
    document.querySelector("#payment1").addEventListener('click', (event) => {
        if (event.target && event.target.matches("input[type='radio']")) {
            document.querySelector("#amount2").checked = false;
            document.querySelector("#amount2").disabled = true;
        }
    });
    document.querySelector("#payment2").addEventListener('click', (event) => {
        if (event.target && event.target.matches("input[type='radio']")) {
            document.querySelector("#amount2").disabled = false;
        }
    });
</script>
@endsection
