@extends('layouts.user')

@section('main')
<section class="">
    <!-- Header -->
    <div>
        <div class="relative grid grid-cols-1 gap-4 p-4 mb-3 bg-white shadow-lg">
            <div class="relative flex gap-4">
                <img src="https://icons.iconarchive.com/icons/diversity-avatars/avatars/256/charlie-chaplin-icon.png" class="relative rounded-lg bg-white border border-blue-800 h-14 w-14" alt="" loading="lazy">
                <div class="flex flex-col w-full">
                    <p class="mb-1 text-x text-blue-800 whitespace-nowrap truncate overflow-hidden">Hello,</p>
                    <div class="flex flex-row justify-between">
                        <p class="relative text-xl whitespace-nowrap truncate overflow-hidden">{{ auth()->user()->name }}</p>
                        <a class="text-gray-500 text-xl" href="#"><i class="fa-solid fa-trash"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Content -->
    <section class="items-center justify-center p-3">
        <h1 class="text-xl mb-3 font-semibold text-gray-800 capitalize dark:text-white">Edit Gadget</h1>
        <div class="mx-auto w-full max-w-[550px]">
            <form action="{{route('gadget.update', $gadget->id)}}" method="POST">
                @method('PUT')
                @csrf
                <a href="#" class="flex justify-center mb-3">
                    <img class="rounded-lg w-80 h-80" src="{{ asset($gadget->img) }}" alt="">
                </a>
                <div class="mb-3">
                    <select name="status" class="w-full rounded-md border-2 border-[#2557D6] bg-white py-3 px-6 text-base font-medium text-[#2557D6] outline-none focus:border-[#6A64F1] focus:shadow-md">
                        <option value="available" @if ($gadget->status == 'available') selected @endif>Enable</option>
                        <option value="unavailable" @if ($gadget->status == 'unavailable') selected @endif>Disable</option>
                    </select>
                </div>
                <div class="mb-3">
                    <input type="text" name="name" placeholder="Product Name" value="{{ $gadget->name }}" class="w-full rounded-md border-2 border-[#2557D6] bg-white py-3 px-6 text-base font-medium text-[#2557D6] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
                </div>
                <div class="mb-3">
                    <input type="number" name="qty" placeholder="Quantity" value="{{ $gadget->qty }}" class="w-full rounded-md border-2 border-[#2557D6] bg-white py-3 px-6 text-base font-medium text-[#2557D6] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
                </div>
                <div class="mb-3">
                    <input type="text" name="category" placeholder="Category" value="{{ $gadget->category }}" class="w-full rounded-md border-2 border-[#2557D6] bg-white py-3 px-6 text-base font-medium text-[#2557D6] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
                </div>
                <div class="mb-3">
                    <input type="text" name="description" placeholder="Description" value="{{ $gadget->details->description }}" class="w-full rounded-md border-2 border-[#2557D6] bg-white py-3 px-6 text-base font-medium text-[#2557D6] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
                </div>
                <div class="mb-3">
                    <input type="text" name="model" placeholder="Product Model" value="{{ $gadget->details->model }}" class="w-full rounded-md border-2 border-[#2557D6] bg-white py-3 px-6 text-base font-medium text-[#2557D6] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
                </div>
                <div class="mb-3">
                    <input type="text" name="storage" placeholder="Product Storage" value="{{ $gadget->details->storage }}" class="w-full rounded-md border-2 border-[#2557D6] bg-white py-3 px-6 text-base font-medium text-[#2557D6] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
                </div>
                <div class="mb-3">
                    <input type="text" name="condition" placeholder="Condition" value="{{ $gadget->condition }}" class="w-full rounded-md border-2 border-[#2557D6] bg-white py-3 px-6 text-base font-medium text-[#2557D6] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
                </div>
                <div class="mb-3">
                    <input type="text" name="price_original" placeholder="Original Price"  value="{{ $gadget->price_original }}" class="w-full rounded-md border-2 border-[#2557D6] bg-white py-3 px-6 text-base font-medium text-[#2557D6] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
                </div>
                <div class="mb-3">
                    <input type="text" name="price_selling" placeholder="Selling Price" value="{{ $gadget->price_selling }}"class="w-full rounded-md border-2 border-[#2557D6] bg-white py-3 px-6 text-base font-medium text-[#2557D6] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
                </div>
                <div class="mb-3">
                    <select name="installment" id="installment" class="w-full rounded-md border-2 border-[#2557D6] bg-white py-3 px-6 text-base font-medium text-[#2557D6] outline-none focus:border-[#6A64F1] focus:shadow-md" required>
                        <option value="0" @if ($gadget->installment->duration == 0) selected @endif>Installment Disabled</option>
                        <option value="3" @if ($gadget->installment->duration == 3) selected @endif>3 Months Installment</option>
                        <option value="6" @if ($gadget->installment->duration == 6) selected @endif>6 Months Installment</option>
                        <option value="9" @if ($gadget->installment->duration == 9) selected @endif>9 Months Installment</option>
                        <option value="12" @if ($gadget->installment->duration == 12) selected @endif>12 Months Installment</option>
                    </select>
                </div>

                <div class="my-3"><hr></div>

                <div class="mb-3">
                    <div class='flex flex-row p-3'>
                        <label class="flex items-center relative w-max cursor-pointer select-none">
                            <span class="font-bold mr-3">Enable bidding:</span>
                            <input type="checkbox" name="method_bid" value="true" id="bid" class="hidden peer"
                            @if($gadget->methods->bid == 'true') checked @endif
                            @if($gadget->methods->offer == 'true') disabled @endif/>
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
                            @if($gadget->methods->bid == 'true') disabled @endif
                            @if($gadget->methods->offer == 'true') checked @endif/>
                            <span  id="toggle123" class="appearance-none transition-colors cursor-pointer w-20 h-10 rounded-full border-2 border-[#2557D6] peer-checked:bg-[#2557D6]"></span>
                            <span class="absolute font-medium text-sm uppercase right-3 text-[#2557D6] font-bold"> OFF </span>
                            <span class="absolute font-medium text-sm uppercase right-12 text-white font-bold"> ON </span>
                            <span class="w-10 h-10 right-11 absolute rounded-full transform transition-transform bg-gray-500 shadow-lg peer-checked:translate-x-11"/>
                        </label>
                    </div>
                </div>

                <div class="mb-3">
                    <input type="text" name="bidding_min" value="{{ $gadget->bidding_min }}" placeholder="Minimum Bidding Price" class="w-full rounded-md border-2 border-[#2557D6] bg-white py-3 px-6 text-base font-medium text-[#2557D6] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
                </div>
                <div class="mb-3">
                    <label for="">Starting Bidding Date</label>
                    <input type="date" name="bidding_start" value="{{ $gadget->bidding_start }}" placeholder="Minimum Bidding Price" class="w-full rounded-md border-2 border-[#2557D6] bg-white py-3 px-6 text-base font-medium text-[#2557D6] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
                </div>
                <div class="mb-3">
                    <label for="">End Bidding Date</label>
                    <input type="date" name="bidding_end" value="{{ $gadget->bidding_end }}" placeholder="Minimum Bidding Price" class="w-full rounded-md border-2 border-[#2557D6] bg-white py-3 px-6 text-base font-medium text-[#2557D6] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
                </div>
                <div class="my-3"><hr></div>

                <div class="mt-6 mb-2">
                    <button type="submit" class="w-full py-2 px-8 hover:shadow-form rounded-lg bg-[#2557D6] text-base font-semibold text-white outline-none">
                        Submit
                    </button>
                </div>
                <div class="mb-20">
                    <a href="{{ route('gadget.show', $gadget->id) }}" type="submit" class="w-full py-2 px-8 text-center text-base font-semibold hover:shadow-form rounded-lg border-2 border-gray-500">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </section>
</section>
@endsection



@section('scripts')
<script>
    document.querySelector("#bid").addEventListener('click', (event) => {
        document.querySelector("#offer").disabled = event.target.checked;
    });
    document.querySelector("#offer").addEventListener('click', (event) => {
        document.querySelector("#bid").disabled = event.target.checked;
    });
</script>
@endsection
