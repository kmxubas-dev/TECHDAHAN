@extends('layouts.user')

@section('main')
<section class="">
    <!-- Header -->
    <div class="bg-blue-600 rounded-bl-xl rounded-br-xl text-white">
        <div class="relative grid grid-cols-1 gap-4 p-4 shadow-lg">
            <div class="relative flex gap-4">
                <a href="{{ route('gadget.show', $gadget->id) }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="h-full" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
                    </svg>
                </a>
                <div class="flex flex-col">
                    <h1 class="text-xl font-semibold capitalize">
                        Order Summary
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Content -->
    <section class="flex flex-col px-3 pt-4 pb-20 items-center justify-center">
        <div class="w-full mb-3 p-4 text-[#2557D6] border-2 border-[#2557D6] rounded-xl shadow-xl">
            <div class="flex justify-center">
                <img class="rounded-lg w-14 h-14" src="{{ asset($gadget->img) }}" alt="">
            </div>

            <div class="p-2">
                <div class="text-center">
                    <p>{{ '@'.$gadget->seller->name->full }}</p>
                    <h5 class="mb-3 text-[#2557D6] text-xl font-bold tracking-tight multiline-ellipsis-2">
                        {{ $gadget->name }}
                    </h5>
                </div>
                <p class="font-normal text-[#2557D6] mb-1">
                    Original Price: <b>₱{{ number_format($gadget->price_original, 2, ".", ",") }}</b>
                </p>
                <p class="font-normal text-[#2557D6] mb-1">
                    Selling Price: <b>₱{{ number_format($gadget->price_selling, 2, ".", ",") }}</b>
                </p>
                <p class="font-normal text-[#2557D6] mb-1">
                    Total Payment: <b>₱{{ number_format($gadget->price_selling, 2, ".", ",") }}</b>
                </p>

                <p class="font-normal text-[#2557D6] mb-1">
                    @isset($offer)
                        Offered Price: <b>₱{{ number_format($offer->amount, 2, ".", ",") }}</b>
                    @endisset
                </p>
                <p class="font-normal text-[#2557D6] mb-1">
                    {{ 'Posted '.$gadget->getElapsedTime($gadget->created_at) }}
                </p>
            </div>
        </div>

        <div class="w-full p-4 bg-white text-[#2557D6] border border-gray-200 rounded-lg shadow-md">
            <h5 class="text-lg font-semibold capitalize">Direct Purchase</h5>

            <form action="{{ route('gadget.transaction_post', $gadget) }}" method="POST" id="transaction_form">
                @csrf
                <input type="hidden" name="method" value="default">
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

                <div class="text-white">
                    <button type="submit" class="w-full py-3 bg-blue-600 font-bold rounded-xl">Purchase now</button>
                </div>

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
