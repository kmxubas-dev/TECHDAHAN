@extends('layouts.user')

@section('main')
<section class="">
    <!-- Header -->
    <div>
        <div class="relative grid grid-cols-1 gap-4 p-4 shadow-lg">
            <div class="relative flex gap-4">
                <a href="{{ route('user.profile') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="h-full" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
                    </svg>
                </a>
                <div class="flex flex-col">
                    <h1 class="text-xl font-semibold capitalize">
                        Settings
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Content -->
    <section class="items-center justify-center">
        <div class="mb-3 bg-blue-600 shadow-lg rounded-b-3xl">
            <div id="user_type" class="flex flex-col justify-center px-8 pt-5 pb-3 rounded-b-3xl bg-gray-100 space-y-3 click:bg-gray-300">
                <div class="flex justify-center items-center space-x-5">
                    <img src="https://api.lorem.space/image/face?w=120&h=120&hash=bart89fe" alt="User" class="h-12 w-12 rounded-full">
                    <div class="flex-">
                        <span class="text-xl font-bold">{{ auth()->user()->name->full }}</span>
                    </div>
                </div>
                <p id="user_type___txt-sm" class="text-center">Click here for seller</p>
            </div>
            <div class="grid px-7 py-2  items-center justify-around gap-1 text-white divide-x divide-solid ">
                <h5 id="user_type___txt"  class="text-center font-bold">Buyer</h5>
            </div>
        </div>

        <div id="buyer_wrapper" class="p-5 pb-20">
            <div id="buyer " class="rounded-lg sm:p-8">
                <div class="flow-root">
                    <ul role="list" class="flex flex-col space-y-3">
                        <li class="text-white rounded-xl bg-blue-600 shadow-xl">
                            <a href="" class="flex py-3 px-5 items-center space-x-4">
                                <p class="text-lg font-medium truncate hover:text-white font-bold">
                                    Payment Methods
                                </p>
                            </a>
                        </li>

                        <li class="text-white rounded-xl bg-blue-600 shadow-xl">
                            <a href="{{ route('message_group.index') }}" class="flex py-3 px-5 items-center space-x-4">
                                <p class="text-lg font-medium truncate hover:text-white font-bold">
                                    Messages
                                </p>
                            </a>
                        </li>

                        <li class="text-white rounded-xl bg-blue-600 shadow-xl">
                            <a href="{{ route('transaction.index', ['type' => 'buyer']) }}" class="flex py-3 px-5 items-center space-x-4">
                                <p class="text-lg font-medium truncate hover:text-white font-bold">
                                    My Transactions
                                </p>
                            </a>
                        </li>

                        <li class="text-white rounded-xl bg-blue-600 shadow-xl">
                            <a href="{{ route('gadget_offer.index', ['type' => 'buyer']) }}" class="flex py-3 px-5 items-center space-x-4">
                                <p class="text-lg font-medium truncate hover:text-white font-bold">
                                    My Offers
                                </p>
                            </a>
                        </li>

                        <li class="text-white rounded-xl bg-blue-600 shadow-xl">
                            <a href="{{ route('report.index', ['type' => 'buyer']) }}" class="flex py-3 px-5 items-center space-x-4">
                                <p class="text-lg font-medium truncate hover:text-white font-bold">
                                    My Disputes
                                </p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div id="seller_wrapper" class="hidden p-5">
            <div class="rounded-lg sm:p-8">
                <div class="flow-root">
                    <ul role="list" class="flex flex-col space-y-3">
                        <li class="text-white rounded-xl bg-blue-600 shadow-xl">
                            <a href="{{ route('gadget.index') }}" class="flex py-3 px-5 items-center space-x-4">
                                <p class="text-lg font-medium truncate hover:text-white font-bold">
                                    My Products
                                </p>
                            </a>
                        </li>

                        <li class="text-white rounded-xl bg-blue-600 shadow-xl">
                            <a href="{{ route('message_group.index', ['type'=>'seller']) }}" class="flex py-3 px-5 items-center space-x-4">
                                <p class="text-lg font-medium truncate hover:text-white font-bold">
                                    Product Messages
                                </p>
                            </a>
                        </li>

                        <li class="text-white rounded-xl bg-blue-600 shadow-xl">
                            <a href="{{ route('transaction.index', ['type' => 'seller']) }}" class="flex py-3 px-5 items-center space-x-4">
                                <p class="text-lg font-medium truncate hover:text-white font-bold">
                                    Gadget Transactions
                                </p>
                            </a>
                        </li>

                        <li class="text-white rounded-xl bg-blue-600 shadow-xl">
                            <a href="{{ route('gadget_offer.index', ['type' => 'seller']) }}" class="flex py-3 px-5 items-center space-x-4">
                                <p class="text-lg font-medium truncate hover:text-white font-bold">
                                    Offer Requests
                                </p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</section>
@endsection



@section('scripts')
<script>
    document.querySelector("#user_type").addEventListener('click', (event) => {
        document.querySelector("#buyer_wrapper").classList.toggle('hidden');
        document.querySelector("#seller_wrapper").classList.toggle('hidden');
        document.querySelector("#user_type").classList.toggle('bg-gray-300');
        setTimeout(() => {
            document.querySelector("#user_type").classList.toggle('bg-gray-300');
        }, 100);

        if (document.querySelector("#user_type___txt").innerHTML === 'Buyer') {
            document.querySelector("#user_type___txt-sm").innerHTML = 'Click here for Buyer';
            document.querySelector("#user_type___txt").innerHTML = 'Seller';
        } else {
            document.querySelector("#user_type___txt-sm").innerHTML = 'Click here for Seller';
            document.querySelector("#user_type___txt").innerHTML = 'Buyer';
        }
    });
</script>
@endsection
