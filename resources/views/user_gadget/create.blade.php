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
        <h1 class="text-xl mb-3 font-semibold text-gray-800 capitalize dark:text-white">Create Gadget Listing</h1>
        <!-- Author: FormBold Team -->
        <!-- Learn More: https://formbold.com -->
        <div class="mx-auto w-full max-w-[550px]">
            <form action="{{route('gadget.store')}}" method="POST">
                @csrf
                {{-- <div class="mb-5">
                    <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">
                        Full Name
                    </label>
                    <input type="text" name="name" id="name" placeholder="Full Name" class="w-full rounded-md border-2 border-[#2557D6] bg-white py-3 px-6 text-base font-medium text-[#2557D6] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
                </div> --}}
                <div class="mb-3">
                    <input type="text" name="name" placeholder="Product Name" class="w-full rounded-md border-2 border-[#2557D6] bg-white py-3 px-6 text-base font-medium text-[#2557D6] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
                </div>
                <div class="mb-3">
                    <input type="text" name="color" placeholder="Product Color" class="w-full rounded-md border-2 border-[#2557D6] bg-white py-3 px-6 text-base font-medium text-[#2557D6] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
                </div>
                <div class="mb-3">
                    <input type="text" name="model" placeholder="Product Model" class="w-full rounded-md border-2 border-[#2557D6] bg-white py-3 px-6 text-base font-medium text-[#2557D6] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
                </div>
                <div class="mb-3">
                    <input type="text" name="storage" placeholder="Product Storage" class="w-full rounded-md border-2 border-[#2557D6] bg-white py-3 px-6 text-base font-medium text-[#2557D6] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
                </div>
                <div class="mb-3">
                    <input type="text" name="condition" placeholder="Condition" class="w-full rounded-md border-2 border-[#2557D6] bg-white py-3 px-6 text-base font-medium text-[#2557D6] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
                </div>
                <div class="mb-3">
                    <input type="text" name="price_original" placeholder="Original Price" class="w-full rounded-md border-2 border-[#2557D6] bg-white py-3 px-6 text-base font-medium text-[#2557D6] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
                </div>
                <div class="mb-3">
                    <input type="text" name="price_selling" placeholder="Selling Price" class="w-full rounded-md border-2 border-[#2557D6] bg-white py-3 px-6 text-base font-medium text-[#2557D6] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
                </div>
                {{-- <div class="mb-3">
                    <label for="name" class="mb-1 block text-base font-medium text-[#2557D6]">
                        Mode of Payment
                    </label>
                    <select type="text" name="name" class="w-full rounded-md border-2 border-[#2557D6] bg-white py-3 px-6 text-base font-medium text-[#2557D6] outline-none focus:border-[#6A64F1] focus:shadow-md">
                        <option value="">--- Select Mode of Payment ---</option>
                    </select>
                </div> --}}
                <div class="mb-3">
                    <label for="name" class="mb-1 block text-base font-medium text-[#2557D6]">
                        Availability of the original receipt
                    </label>
                    <select type="text" name="receipt" class="w-full rounded-md border-2 border-[#2557D6] bg-white py-3 px-6 text-base font-medium text-[#2557D6] outline-none focus:border-[#6A64F1] focus:shadow-md">
                        <option value="" disabled selected>--- Select Availability ---</option>
                        <option value="Available">Available</option>
                        <option value="Not Available">Not Available</option>
                    </select>
                </div>
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
