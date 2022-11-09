@extends('layouts.user')

@section('main')
<section class="">
    <!-- Header -->
    <div class="mb-3 bg-blue-600 shadow-lg rounded-b-3xl">
        <div id="user_type" class="flex flex-col justify-center px-8 py-5 rounded-b-3xl bg-gray-100 space-y-3 click:bg-gray-300">
            <div class="flex justify-center items-center space-x-5">
                <img src="https://api.lorem.space/image/face?w=120&h=120&hash=bart89fe" alt="User" class="h-12 w-12 rounded-full">
                <div class="flex-">
                    <span class="text-xl font-bold">{{ auth()->user()->name->full }}</span>
                </div>
            </div>
        </div>
        <div class="grid px-7 py-2  items-center justify-around gap-1 text-white divide-x divide-solid ">
            <h5 class="text-center font-bold">Add Gadget</h5>
        </div>
    </div>

    <!-- Content -->
    <section class="items-center justify-center p-5">
        <div class="mx-auto w-full max-w-[550px]">
            <form action="{{route('gadget.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- <div class="mb-5">
                    <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">
                        Full Name
                    </label>
                    <input type="text" name="name" id="name" placeholder="Full Name" class="w-full rounded-md border-2 border-[#2557D6] bg-white py-3 px-6 text-base font-medium text-[#2557D6] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
                </div> --}}<!-- component -->
                <div class="mb-3">
                    <label for="input-file-now">Gadget Image</label>
                    <input type="file" name="img" id="input-file-now" class="dropify" data-height="150"/>
                </div>
                <div class="mb-3">
                    <input type="text" name="name" placeholder="Product Name" value="{{ old('name') }}" class="w-full rounded-md border-2 border-[#2557D6] bg-white py-3 px-6 text-base font-medium text-[#2557D6] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
                </div>
                <div class="mb-3">
                    <input type="number" name="qty" placeholder="Quantity" value="{{ old('qty') }}" class="w-full rounded-md border-2 border-[#2557D6] bg-white py-3 px-6 text-base font-medium text-[#2557D6] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
                </div>
                <div class="mb-3">
                    <input type="text" name="category" placeholder="Category" value="{{ old('category') }}" class="w-full rounded-md border-2 border-[#2557D6] bg-white py-3 px-6 text-base font-medium text-[#2557D6] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
                </div>
                <div class="mb-3">
                    <input type="text" name="description" placeholder="Description" value="{{ old('description') }}" class="w-full rounded-md border-2 border-[#2557D6] bg-white py-3 px-6 text-base font-medium text-[#2557D6] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
                </div>
                <div class="mb-3">
                    <input type="text" name="model" placeholder="Product Model" value="{{ old('model') }}" class="w-full rounded-md border-2 border-[#2557D6] bg-white py-3 px-6 text-base font-medium text-[#2557D6] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
                </div>
                <div class="mb-3">
                    <input type="text" name="storage" placeholder="Product Storage" value="{{ old('storage') }}" class="w-full rounded-md border-2 border-[#2557D6] bg-white py-3 px-6 text-base font-medium text-[#2557D6] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
                </div>
                <div class="mb-3">
                    <input type="text" name="condition" placeholder="Condition" value="{{ old('condition') }}" class="w-full rounded-md border-2 border-[#2557D6] bg-white py-3 px-6 text-base font-medium text-[#2557D6] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
                </div>
                <div class="mb-3">
                    <input type="text" name="price_original" placeholder="Original Price" value="{{ old('price_original') }}" class="w-full rounded-md border-2 border-[#2557D6] bg-white py-3 px-6 text-base font-medium text-[#2557D6] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
                </div>
                <div class="mb-3">
                    <input type="text" name="price_selling" placeholder="Selling Price" value="{{ old('price_selling') }}" class="w-full rounded-md border-2 border-[#2557D6] bg-white py-3 px-6 text-base font-medium text-[#2557D6] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
                </div>
                <div class="mb-3">
                    <select name="installment" id="installment" class="w-full rounded-md border-2 border-[#2557D6] bg-white py-3 px-6 text-base font-medium text-[#2557D6] outline-none focus:border-[#6A64F1] focus:shadow-md" required>
                        <option value="0" @if (old('installment') == 0) selected @endif>Installment Disabled</option>
                        <option value="3" @if (old('installment') == 3) selected @endif>3 Months Installment</option>
                        <option value="6" @if (old('installment') == 6) selected @endif>6 Months Installment</option>
                        <option value="12" @if (old('installment') == 12) selected @endif>12 Months Installment</option>
                    </select>
                </div>

                <div class="my-3"><hr></div>

                <div class="mb-3">
                    <div class='flex flex-row p-3'>
                        <label class="flex items-center relative w-max cursor-pointer select-none">
                            <span class="font-bold mr-3">Enable bidding:</span>
                            <input type="checkbox" name="method_bid" value="true" id="bid" class="hidden peer"
                            @if(old('method_bid') == 'true') checked @endif
                            @if(old('method_offer') == 'true') disabled @endif/>
                            <span  id="toggle123" class="appearance-none transition-colors cursor-pointer w-20 h-10 rounded-full border-2 border-[#2557D6] peer-checked:bg-[#2557D6]"></span>
                            <span class="absolute font-medium text-sm uppercase right-3 text-[#2557D6] font-bold"> OFF </span>
                            <span class="absolute font-medium text-sm uppercase right-12 text-white font-bold"> ON </span>
                            <span class="w-10 h-10 right-11 absolute rounded-full transform transition-transform bg-gray-500 shadow-lg peer-checked:translate-x-11"/>
                        </label>
                    </div>

                    <div class='flex flex-row p-3'>
                        <label class="flex items-center relative w-max cursor-pointer select-none">
                            <span class="font-bold mr-6">Enable offers:</span>
                            <input type="checkbox" name="method_offer" value="true" id="offer" class="hidden peer" 
                            @if(old('method_bid') == 'true') disabled @endif
                            @if(old('method_offer') == 'true') checked @endif/>
                            <span  id="toggle123" class="appearance-none transition-colors cursor-pointer w-20 h-10 rounded-full border-2 border-[#2557D6] peer-checked:bg-[#2557D6]"></span>
                            <span class="absolute font-medium text-sm uppercase right-3 text-[#2557D6] font-bold"> OFF </span>
                            <span class="absolute font-medium text-sm uppercase right-12 text-white font-bold"> ON </span>
                            <span class="w-10 h-10 right-11 absolute rounded-full transform transition-transform bg-gray-500 shadow-lg peer-checked:translate-x-11"/>
                        </label>
                    </div>
                </div>

                <div id="bid_inputs" class="hidden">
                    <div class="mb-3">
                        <input type="text" name="bidding_min" placeholder="Minimum Bidding Price" class="w-full rounded-md border-2 border-[#2557D6] bg-white py-3 px-6 text-base font-medium text-[#2557D6] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
                    </div>
                    <div class="mb-3">
                        <label for="">Starting Bidding Date</label>
                        <input type="date" name="bidding_start" placeholder="Minimum Bidding Price" class="w-full rounded-md border-2 border-[#2557D6] bg-white py-3 px-6 text-base font-medium text-[#2557D6] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
                    </div>
                    <div class="mb-3">
                        <label for="">End Bidding Date</label>
                        <input type="date" name="bidding_end" placeholder="Minimum Bidding Price" class="w-full rounded-md border-2 border-[#2557D6] bg-white py-3 px-6 text-base font-medium text-[#2557D6] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
                    </div>
                </div>
                <div class="my-3"><hr></div>

                <div class="mb-3">
                    <label for="input-file-now">Upload original receipt</label>
                    <input type="file" name="img_receipt" id="input-file-now" class="dropify" data-height="150"/>
                </div>
                {{-- <div class="mb-3">
                    <label for="name" class="mb-1 block text-base font-medium text-[#2557D6]">
                        Mode of Payment
                    </label>
                    <select type="text" name="name" class="w-full rounded-md border-2 border-[#2557D6] bg-white py-3 px-6 text-base font-medium text-[#2557D6] outline-none focus:border-[#6A64F1] focus:shadow-md">
                        <option value="">--- Select Mode of Payment ---</option>
                    </select>
                </div> --}}
                <div class="mt-6 mb-20">
                    <button type="submit" class="w-full py-2 px-8 hover:shadow-form rounded-lg bg-[#2557D6] text-base font-semibold text-white outline-none">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </section>
</section>
@endsection



@section('styles')
<style>
    .dropify-wrapper .dropify-message p {
        font-size: 0.5em;
    }
</style>
@endsection

@section('scripts')
<script>
    var method_bid = document.querySelector('input[name="method_bid"]');
    var method_offer = document.querySelector('input[name="method_offer"]');
    method_bid.addEventListener('change', (event) => {
        console.log(method_bid.checked);
        if (method_bid.checked)
            document.querySelector("#bid_inputs").classList.remove('hidden');
        else
            document.querySelector("#bid_inputs").classList.add('hidden');
    });



    document.querySelector("#bid").addEventListener('click', (event) => {
        document.querySelector("#offer").disabled = event.target.checked;
    });
    document.querySelector("#offer").addEventListener('click', (event) => {
        document.querySelector("#bid").disabled = event.target.checked;
    });
</script>
@endsection
