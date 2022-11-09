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
                <h1 class="text-xl font-semibold capitalize">Bidding</h1>
            </div>
        </div>
    </div>

    <!-- Content -->
    <section class="flex flex-col px-3 pb-20 items-center justify-center">
        <div class="mb-3 p-3 text-[#2557D6] border-2 border-[#2557D6] rounded-xl">
            <div class="flex">
                <div href="#" class="justify-center w-1/3 mr-3">
                    <img class="rounded-lg" src="{{ asset($gadget->img) }}" alt="">
                </div>
                <div class="flex flex-col">
                    <div href="#" class="flex-1 justify-center">
                        <div class="flex-1">
                            <p>{{ '@'.$gadget->seller->name->full }}</p>
                        </div>
                        <div class="flex-1">
                            <h5 class="text-lg font-bold tracking-tight multiline-ellipsis-2">
                                {{ $gadget->name }}
                            </h5>
                        </div>
                        <div class="flex-1">
                            <p class="font-normal text-[#2557D6]">
                                <b>₱{{ number_format($gadget->price_selling, 2, ".", ",")  }}</b>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full bg-white text-[#2557D6] border border-gray-200 rounded-xl shadow-md">
            <div class="p-3 text-center rounded-t-xl">
                <h5 class="text-lg text-center font-bold capitalize">
                    @if (Carbon\Carbon::parse($gadget->bidding_end)->isPast())
                        Bidding Ended
                    @elseif (Carbon\Carbon::parse($gadget->bidding_start)->isPast())
                        Bidding Ongoing
                    @elseif (Carbon\Carbon::parse($gadget->bidding_start)->isFuture())
                        Bidding not yet started
                    @endif
                </h5>
                <p>(Top 10 Highest Bids)</p>
            </div>
            <ul class="mb-3 text-lg bg-blue-400 text-white">
                @foreach ($bids as $i => $b)
                <li class="text-center py-2 border-b border-gray-100">
                    <p>{{ $i+1 }}. <b>₱{{ number_format($b->amount, 2, ".", ",") }}</b></p>
                    @if ($gadget->user_id == auth()->user()->id)
                        <p>
                            {{ $string = Str::mask($b->user->name->fname, '*', 
                                Str::length($b->user->name->fname)/2, 
                                Str::length($b->user->name->fname)/2.5); }}
                            {{ $string = Str::mask($b->user->name->lname, '*', 
                                Str::length($b->user->name->lname)/2, 
                                Str::length($b->user->name->lname)/2.5); }}
                        </p>
                    @endif
                </li>
                @endforeach
            </ul>

            <div class="p-3">
                @if ($gadget->user_id != auth()->user()->id)
                    @if (Carbon\Carbon::parse($gadget->bidding_end)->isPast())
                        <p class="mb-3 text-center">
                            Bidding Ended
                        </p>
                    @elseif (Carbon\Carbon::parse($gadget->bidding_start)->isPast())
                        <form action="{{ route('gadget.bid.add_post', $gadget->id) }}" method="POST">
                            @csrf
                            <div class="flex mb-3 text-lg">
                                <input type="number" name="amount" min="{{ $gadget->bidding_min }}" step="0.01" placeholder="{{ $gadget->bidding_min }}" @isset($bid) value="{{ $bid->amount }}" @endisset class="w-full mr-2 py-2 px-3 bg-white text-base font-medium text-[#2557D6] rounded-md border-2 border-[#2557D6] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
                                <button type="submit" class="flex justify-center w-1/3 py-2 px-3 hover:shadow-form rounded-lg bg-[#2557D6] text-base font-semibold text-white outline-none">Submit</button>
                            </div>
                        </form>
                    @elseif (Carbon\Carbon::parse($gadget->bidding_start)->isFuture())
                    <p class="mb-3 text-center">
                        Bidding starts at {{ date_format(Carbon\Carbon::parse($gadget->bidding_start), 'F d, o') }}
                    </p>
                    @endif
                @endif
                <div class="">
                    @if(isset($bid) && !Carbon\Carbon::parse($gadget->bidding_end)->isPast())
                    <form action="{{ route('gadget_bid.destroy', $bid) }}" method="POST" class="flex items-center text-base font-semibold text-gray-900 dark:text-white" onsubmit="return confirm('Are you sure you want to cancel your bid?')">
                        @method('DELETE')
                        @csrf
                        <button class="w-full mb-2 border-2 border-red-500 p-2 text-sm shadow-sm font-bold tracking-wider text-red-500 rounded-lg hover:shadow-lg hover:bg-red-500 hover:text-white">Cancel Bid</button>
                    </form>
                    @endif
                    <a href="{{ route('gadget.show', $gadget->id) }}" type="button" class="flex justify-center w-full py-2 px-8 hover:shadow-form rounded-lg bg-gray-500 text-base font-semibold text-white outline-none">Back</a>
                </div>
                
                <hr>
                @if (isset($bid) && $bid->status == 'winner')
                    <div class="w-full mt-8 text-[#2557D6]">
                        <h5 class="mb-3 text-lg font-semibold capitalize">
                            <b class="text-green-600">You won the bidding!</b>
                        </h5>

                        <form action="{{ route('gadget.transaction_post', $gadget) }}" method="POST" id="transaction_form">
                            @csrf
                            <input type="hidden" name="method" value="bid">
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

                            <div id="card_input" class="hidden flex flex-col mb-3">
                                <div class="mb-3">
                                    <input type="text" name="card_number" placeholder="Card number" value="{{ old('card_number') }}" class="w-full rounded-md border-2 border-[#2557D6] bg-white py-3 px-6 text-base font-medium text-[#2557D6] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
                                </div>
                                <div class="mb-3">
                                    <input type="text" name="exp_month" placeholder="Exp month" value="{{ old('exp_month') }}" class="w-full rounded-md border-2 border-[#2557D6] bg-white py-3 px-6 text-base font-medium text-[#2557D6] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
                                </div>
                                <div class="mb-3">
                                    <input type="text" name="exp_year" placeholder="Exp year" value="{{ old('exp_year') }}" class="w-full rounded-md border-2 border-[#2557D6] bg-white py-3 px-6 text-base font-medium text-[#2557D6] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
                                </div>
                                <div class="mb-3">
                                    <input type="text" name="cvc" placeholder="CVC" value="{{ old('name') }}" class="w-full rounded-md border-2 border-[#2557D6] bg-white py-3 px-6 text-base font-medium text-[#2557D6] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
                                </div>
                            </div>

                            <div class="">
                                <button type="submit" class="flex justify-center w-full py-2 px-8 hover:shadow-form rounded-lg bg-[#2557D6] text-base font-semibold text-white outline-none">Purchase now</button>
                            </div>
                        </form>
                    </div>
                @endif

                <footer>
                    <div class="mt-8 text- text-gray-500">
                        By purchasing this gadget in TECHDAHAN you agree to our
                        <a href="{{ route('terms-and-condition') }}" class="font-medium text-blue-800">
                            Terms and Conditions
                        </a> and the issuing of
                        <a href="{{ asset('TECHDAHAN-DEED-OF-SALE.docx') }}" class="font-medium text-blue-800" download>
                            Deed of Sale
                        </a>.
                    </div>
                </footer>
            </div>

            
        </div>
    </section>
</section>
@endsection



@section('scripts')
<script>
    var input_method1 = document.querySelector("#payment1");
    var input_method2 = document.querySelector("#payment2");
    var input_type1 = document.querySelector("#amount1");
    var input_type2 = document.querySelector("#amount2");

    input_method1.addEventListener('click', (event) => {
        input_type1.checked = true;
        input_type2.checked = false;
        input_type2.disabled = true;
        document.querySelector("#card_input").classList.add('hidden');
    });
    input_method2.addEventListener('click', (event) => {
        input_type2.disabled = false;
        document.querySelector("#card_input").classList.remove('hidden');
    });

    // document.querySelector('#transaction_form').addEventListener('submit', (event) => {
    //     event.preventDefault();
    //     let body = {};
    //     body.code = document.querySelector('input[name="code"]').value;
    //     body.method = document.querySelector('input[name="method"]').value;
    //     body.payment = (input_method1.checked) ? input_method1.value:input_method2.value;
    //     body.payment_amount = (input_type1.checked) ? input_type1.value:input_type2.value;

    //     const options = {
    //         method: 'POST',
    //         headers: {
    //             'Accept': 'application/json',
    //             'Content-Type': 'application/json',
    //             'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
    //         },
    //         body: JSON.stringify(body)
    //     };
    //     fetch('{!! route('gadget.transaction_post', $gadget) !!}', options)
    //         .then(response => response.json())
    //         .then(response => {
    //             window.location.href = response.link;
    //         })
    //         .catch(err => console.error(err));
    // });
</script>
@endsection
