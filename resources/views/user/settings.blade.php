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
                        <p class="relative text-xl whitespace-nowrap truncate overflow-hidden">{{auth()->user()->name->full}}</p>
                        <a class="text-gray-500 text-xl" href="#"><i class="fa-solid fa-trash"></i></a>
                    </div>
                </div>
            </div>

            <div class="flex justify-between">
                <button type="button" id="buyer" class="flex-1 text-white bg-[#2557D6] hover:bg-[#2557D6]/90 focus:ring-4 focus:ring-[#2557D6]/50 font-medium rounded-lg text-xs px-2 py-2 text-center items-center dark:focus:ring-[#2557D6]/50 mr-1">
                    Buyer
                </button>
                <button type="button" id="seller" class="flex-1 text-white bg-[#2557D6] hover:bg-[#2557D6]/90 focus:ring-4 focus:ring-[#2557D6]/50 font-medium rounded-lg text-xs px-2 py-2 text-center items-center dark:focus:ring-[#2557D6]/50 mr-1">
                    Seller
                </button>
            </div>
        </div>
    </div>

    <!-- Content -->
    <section class="items-center justify-center p-3">
        <div id="buyer_wrapper">
            <h2 class="text-xl mb-3 font-semibold text-gray-800 capitalize dark:text-white">Buyer</h2>
    
            <div id="buyer " class="rounded-lg sm:p-8">
                <div class="flow-root">
                    <ul role="list" class="">
                        <li class="mb-4 text-white border-2 border-[#2557D6] rounded-lg hover:bg-[#2557D6]">
                            <a href="{{ route('wishlist.index') }}" class="flex p-3 items-center space-x-4">
                                <div class="flex-1 min-w-0">
                                    <p class="text-lg font-medium text-[#2557D6] truncate hover:text-white">
                                        My Wishlist
                                    </p>
                                </div>
                            </a>
                        </li>
                        
                        <li class="mb-4 text-white border-2 border-[#2557D6] rounded-lg hover:bg-[#2557D6]">
                            <a href="" class="flex p-3 items-center space-x-4">
                                <div class="flex-1 min-w-0">
                                    <p class="text-lg font-medium text-[#2557D6] truncate hover:text-white">
                                        Payment Methods
                                    </p>
                                </div>
                            </a>
                        </li>

                        <li class="mb-4 text-white border-2 border-[#2557D6] rounded-lg hover:bg-[#2557D6]">
                            <a href="{{ route('message_group.index') }}" class="flex p-3 items-center space-x-4">
                                <div class="flex-1 min-w-0">
                                    <p class="text-lg font-medium text-[#2557D6] truncate hover:text-white">
                                        Messages
                                    </p>
                                </div>
                            </a>
                        </li>

                        <li class="mb-4 text-white border-2 border-[#2557D6] rounded-lg hover:bg-[#2557D6]">
                            <a href="{{ route('transaction.index', ['type' => 'buyer']) }}" class="flex p-3 items-center space-x-4">
                                <div class="flex-1 min-w-0">
                                    <p class="text-lg font-medium text-[#2557D6] truncate hover:text-white">
                                        My Transactions
                                    </p>
                                </div>
                            </a>
                        </li>

                        <li class="mb-4 text-white border-2 border-[#2557D6] rounded-lg hover:bg-[#2557D6]">
                            <a href="{{ route('gadget_offer.index', ['type' => 'buyer']) }}" class="flex p-3 items-center space-x-4">
                                <div class="flex-1 min-w-0">
                                    <p class="text-lg font-medium text-[#2557D6] truncate hover:text-white">
                                        My Offers
                                    </p>
                                </div>
                            </a>
                        </li>

                        <li class="mb-4 text-white border-2 border-[#2557D6] rounded-lg hover:bg-[#2557D6]">
                            <a href="{{ route('report.index', ['type' => 'buyer']) }}" class="flex p-3 items-center space-x-4">
                                <div class="flex-1 min-w-0">
                                    <p class="text-lg font-medium text-[#2557D6] truncate hover:text-white">
                                        My Disputes
                                    </p>
                                </div>
                            </a>
                        </li>
                        
                        <li class="mb-4 text-white border-2 border-[#2557D6] rounded-lg hover:bg-[#2557D6]">
                            <form method="POST" action="{{ route('logout') }}" class="flex items-center">
                                @csrf
                                {{-- <div class="flex-1 min-w-0"> --}}
                                <a class="w-full p-3 text-lg font-medium text-[#2557D6] truncate hover:text-white" href="http://techdahan.test/logout" onclick="event.preventDefault(); this.closest('form').submit();">Log Out</a>
                                {{-- </div> --}}
                            </form>
    
                            <script>
                                document.addEventListener("alpine:init", () => {
                                    Alpine.data("layout", () => ({
                                        profileOpen: false,
                                        asideOpen: true,
                                    }));
                                });
                            </script>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div id="seller_wrapper" class="hidden">
            <h2 class="text-xl mb-3 font-semibold text-gray-800 capitalize dark:text-white">Seller</h2>

            <div id="buyer " class="rounded-lg sm:p-8">
                <div class="flow-root">
                    <ul role="list" class="">
                        <li class="mb-4 text-white border-2 border-[#2557D6] rounded-lg hover:bg-[#2557D6]">
                            <a href="{{ route('gadget.index') }}" class="flex p-3 items-center space-x-4">
                                <div class="flex-1 min-w-0">
                                    <p class="text-lg font-medium text-[#2557D6] truncate hover:text-white">
                                        My Products
                                    </p>
                                </div>
                            </a>
                        </li>

                        <li class="mb-4 text-white border-2 border-[#2557D6] rounded-lg hover:bg-[#2557D6]">
                            <a href="{{ route('message_group.index', ['type'=>'seller']) }}" class="flex p-3 items-center space-x-4">
                                <div class="flex-1 min-w-0">
                                    <p class="text-lg font-medium text-[#2557D6] truncate hover:text-white">
                                        Product Messages
                                    </p>
                                </div>
                            </a>
                        </li>

                        <li class="mb-4 text-white border-2 border-[#2557D6] rounded-lg hover:bg-[#2557D6]">
                            <a href="{{ route('transaction.index', ['type' => 'seller']) }}" class="flex p-3 items-center space-x-4">
                                <div class="flex-1 min-w-0">
                                    <p class="text-lg font-medium text-[#2557D6] truncate hover:text-white">
                                        Gadget Transactions
                                    </p>
                                </div>
                            </a>
                        </li>
                        
                        <li class="mb-4 text-white border-2 border-[#2557D6] rounded-lg hover:bg-[#2557D6]">
                            <a href="{{ route('gadget_offer.index', ['type' => 'seller']) }}" class="flex p-3 items-center space-x-4">
                                <div class="flex-1 min-w-0">
                                    <p class="text-lg font-medium text-[#2557D6] truncate hover:text-white">
                                        Offer Requests
                                    </p>
                                </div>
                            </a>
                        </li>

                        <li class="mb-4 text-white border-2 border-[#2557D6] rounded-lg hover:bg-[#2557D6]">
                            <form method="POST" action="{{ route('logout') }}" class="flex items-center">
                                @csrf
                                {{-- <div class="flex-1 min-w-0"> --}}
                                <a class="w-full p-3 text-lg font-medium text-[#2557D6] truncate hover:text-white" href="http://techdahan.test/logout" onclick="event.preventDefault(); this.closest('form').submit();">Log Out</a>
                                {{-- </div> --}}
                            </form>

                            <script>
                                document.addEventListener("alpine:init", () => {
                                    Alpine.data("layout", () => ({
                                        profileOpen: false,
                                        asideOpen: true,
                                    }));
                                });
                            </script>
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
    document.querySelector("#buyer").addEventListener('click', (event) => {
        document.querySelector("#buyer_wrapper").classList.remove('hidden');
        document.querySelector("#seller_wrapper").classList.add('hidden');
    });
    document.querySelector("#seller").addEventListener('click', (event) => {
        document.querySelector("#buyer_wrapper").classList.add('hidden');
        document.querySelector("#seller_wrapper").classList.remove('hidden');
    });
</script>
@endsection
