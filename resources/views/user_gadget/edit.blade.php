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
        <!-- Author: FormBold Team -->
        <!-- Learn More: https://formbold.com -->
        <div class="mx-auto w-full max-w-[550px]">
            <form action="{{route('gadget.update', $gadget->id)}}" method="POST">
                @method('PUT')
                @csrf
                <a href="#" class="flex justify-center">
                    <img class="rounded-lg w-80 h-80" src="{{ asset($gadget->img) }}" alt="">
                </a>
                <div class="mb-3">
                    <input type="text" name="name" placeholder="Product Name" value="{{ $gadget->name }}" class="w-full rounded-md border-2 border-[#2557D6] bg-white py-3 px-6 text-base font-medium text-[#2557D6] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
                </div>
                <div class="mb-3">
                    <input type="text" name="category" placeholder="Category" value="{{ $gadget->category }}" class="w-full rounded-md border-2 border-[#2557D6] bg-white py-3 px-6 text-base font-medium text-[#2557D6] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
                </div>
                <div class="mb-3">
                    <input type="text" name="description" placeholder="Description" value="{{ $gadget->description }}" class="w-full rounded-md border-2 border-[#2557D6] bg-white py-3 px-6 text-base font-medium text-[#2557D6] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
                </div>
                <div class="mb-3">
                    <input type="text" name="color" placeholder="Product Color" value="{{ $gadget->color }}" class="w-full rounded-md border-2 border-[#2557D6] bg-white py-3 px-6 text-base font-medium text-[#2557D6] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
                </div>
                <div class="mb-3">
                    <input type="text" name="model" placeholder="Product Model" value="{{ $gadget->model }}" class="w-full rounded-md border-2 border-[#2557D6] bg-white py-3 px-6 text-base font-medium text-[#2557D6] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
                </div>
                <div class="mb-3">
                    <input type="text" name="storage" placeholder="Product Storage" value="{{ $gadget->storage }}" class="w-full rounded-md border-2 border-[#2557D6] bg-white py-3 px-6 text-base font-medium text-[#2557D6] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
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
                <div class="my-3"><hr></div>
                <div class="mb-3">
                    <div class='flex flex-row p-3'>
                        <input type="checkbox" name="bidding" id="cb1" class='appearance-none h-6 w-6 bg-gray-400 rounded-full checked:bg-[#2557D6] checked:scale-75 transition-all duration-200 peer'/>
                        <div class='h-6 w-6 absolute rounded-full pointer-events-none
                        peer-checked:border-[#2557D6] peer-checked:border-2'>
                        </div>
                        <label for='cb1' class='flex flex-col justify-center px-2 peer-checked:text-[#2557D6] select-none'>Enable bidding on this product</label>
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
