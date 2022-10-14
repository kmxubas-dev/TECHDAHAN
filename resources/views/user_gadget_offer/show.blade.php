@extends('layouts.user')

@section('main')
<section class="">
    <!-- Header -->
    <div>
        <div class="relative grid grid-cols-1 gap-4 p-4 bg-white shadow-lg">
            <div class="relative flex gap-4 text-[#2557D6]">
                <a href="
                    @if (isset($offer))
                        @if ($offer->user_id == auth()->user()->id)
                            {{ route('gadget_offer.index', ['type' => 'buyer']) }}
                        @else
                            {{ route('gadget_offer.index', ['type' => 'seller']) }}
                        @endif
                    @else
                        {{ route('gadget.show', $gadget) }}
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
                        @if(isset($offer) && $offer->user_id != auth()->user()->id)
                            From: <b>{{ '@'.$offer->user->name }}</b>
                        @endif
                    </p>
                    <p class="font-normal text-[#2557D6] mb-1">
                        Original Price: <b>₱{{ number_format($gadget->price_original, 2, ".", ",") }}</b>
                    </p>
                    <p class="font-normal text-[#2557D6]">
                        Selling Price: <b>₱{{ number_format($gadget->price_selling, 2, ".", ",") }}</b>
                    </p>

                    <hr class="my-3">

                    <p class="font-normal text-[#2557D6] mb-1">
                        @isset($offer)
                            Offered Price: <b>₱{{ number_format($offer->amount, 2, ".", ",") }}</b>
                        @endisset
                    </p>
                    <p class="font-normal text-[#2557D6] mb-1">
                        @isset($offer)
                            Date Offered: <b>{{ date_format($offer->updated_at, 'F d, o') }}</b>
                        @endisset
                    </p>
                    
                    @isset($offer)
                        <p class="font-normal text-[#2557D6]">
                            Offer note:
                        </p>
                        <p class="font-normal text-[#2557D6] multiline-ellipsis-2">
                            <b>"{{ $offer->note }}"</b>
                        </p>
                    @endisset
                </div>
            </div>

            @if (isset($offer) && $offer->user_id == auth()->user()->id)
                @if ($offer->status == 'pending')
                    <div class="w-full p-4 bg-white text-[#2557D6] border border-gray-200 rounded-lg shadow-md">
                        <h5 class="mb-3 text-lg font-semibold capitalize">
                            Your offer - <b class="text-yellow-600">Pending</b>
                        </h5>
                        
                        <form action="{{ route('gadget.offer.add_post', $gadget->id) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name"><b>Amount:</b></label>
                                <input type="text" name="amount" placeholder="Input price offer" @isset($offer) value="{{ $offer->amount }}" @endisset class="w-full rounded-md border-2 border-[#2557D6] bg-white py-3 px-6 text-base font-medium text-[#2557D6] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
                            </div>
            
                            <div class="mb-3">
                                <label for="note"><b>Input additional note here.</b></label>
                                <textarea name="note" id="note" cols="30" rows="5" placeholder="Note..." class="w-full rounded-md border-2 border-[#2557D6] bg-gray-200 py-3 text-base font-medium text-[#2557D6] outline-none focus:border-[#6A64F1] focus:shadow-md">@isset($offer){{ $offer->note }}@endisset</textarea>
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

                        <form action="{{ route('gadget_offer.destroy', $offer) }}" method="POST" class="flex items-center text-base font-semibold text-gray-900 dark:text-white" onsubmit="return confirm('Are you sure you want to cancel your offer?')">
                            @method('DELETE')
                            @csrf
                            <button class="w-full mb-2 border-2 border-red-500 p-2 text-sm shadow-sm font-bold tracking-wider text-red-500 rounded-lg hover:shadow-lg hover:bg-red-500 hover:text-white">Cancel Offer</button>
                        </form>
                    </div>
                @elseif ($offer->status == 'accepted')
                    <div class="w-full p-4 bg-white text-[#2557D6] border border-gray-200 rounded-lg shadow-md">
                        <h5 class="mb-3 text-lg font-semibold capitalize">
                            Your offer - <b class="text-green-600">Accepted</b>
                        </h5>

                        <form action="{{ route('gadget.transaction', $gadget) }}" method="POST">
                            @csrf
                            <input type="hidden" name="method" value="offer">
                            <input type="hidden" name="code" value="{{ '#22'.strtoupper(substr(md5(microtime()),rand(0,26),6)).'TD' }}">
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
                                    <input type="radio" name="payment_amount" value="direct" id="amount1" class='appearance-none h-6 w-6 bg-gray-400 rounded-full checked:bg-[#2557D6] checked:scale-75 transition-all duration-200 peer' required/>
                                    <div class='h-6 w-6 absolute rounded-full pointer-events-none peer-checked:border-[#2557D6] peer-checked:border-2'></div>
                                    <label for='amount1' class='flex flex-col justify-center px-2 peer-checked:text-[#2557D6] select-none'>Direct Payment</label>
                                </div>
                                <div class='flex flex-row p-3'>
                                    @if ($gadget->installment->status)
                                        <input type="radio" name="payment_amount" value="installment" id="amount2" class='appearance-none h-6 w-6 bg-gray-400 rounded-full checked:bg-[#2557D6] checked:scale-75 transition-all duration-200 peer' required/>
                                        <div class='h-6 w-6 absolute rounded-full pointer-events-none peer-checked:border-[#2557D6] peer-checked:border-2'></div>
                                        <label for='amount2' class='flex flex-col justify-center px-2 peer-checked:text-[#2557D6] select-none peer-disabled:line-through'>Installment</label>
                                    @endif
                                </div>
                            </div>

                            <div class="">
                                <button type="submit" class="flex justify-center w-full py-2 px-8 hover:shadow-form rounded-lg bg-[#2557D6] text-base font-semibold text-white outline-none">Purchase now</button>
                            </div>
                        </form>
                    </div>
                @endif
            @elseif (isset($offer))
                @isset($offer)
                    <form action="{{ route('gadget_offer.response', $offer) }}" method="POST" class="flex w-full p-3">
                        @csrf
                        <button type="submit" name="status" value="accepted" class="flex-1 justify-center w-1/2 mr-2 py-2 px-2 hover:shadow-form rounded-lg bg-[#2557D6] text-center text-base font-semibold text-white outline-none">Accept</button>

                        <button type="submit" name="status" value="declined" class="flex-1 justify-center w-1/2 py-2 px-2 hover:shadow-form rounded-lg bg-[#2557D6] text-center text-base font-semibold text-white outline-none">Decline</button>
                    </form>
                @endisset
            @else
                <div class="w-full p-4 bg-white text-[#2557D6] border border-gray-200 rounded-lg shadow-md">
                    <h5 class="mb-3 text-lg font-semibold capitalize">Your offer</h5>
                    <form action="{{ route('gadget.offer.add_post', $gadget->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name"><b>Amount:</b></label>
                            <input type="text" name="amount" placeholder="Input price offer" @isset($offer) value="{{ $offer->amount }}" @endisset class="w-full rounded-md border-2 border-[#2557D6] bg-white py-3 px-6 text-base font-medium text-[#2557D6] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
                        </div>
        
                        <div class="mb-3">
                            <label for="note"><b>Input additional note here.</b></label>
                            <textarea name="note" id="note" cols="30" rows="5" placeholder="Note..." class="w-full rounded-md border-2 border-[#2557D6] bg-gray-200 py-3 text-base font-medium text-[#2557D6] outline-none focus:border-[#6A64F1] focus:shadow-md">@isset($offer){{ $offer->note }}@endisset</textarea>
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
