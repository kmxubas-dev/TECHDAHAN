@extends('layouts.user')

@section('main')
<section class="">
    <!-- Header -->
    <div>
        <div class="relative grid grid-cols-1 gap-4 p-4 bg-white shadow-lg">
            <div class="relative flex gap-4 text-[#2557D6]">
                <a href="{{ route('user.settings') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="h-full" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
                    </svg>
                </a>
                <div class="flex flex-col">
                    <h1 class="text-xl font-semibold capitalize">
                        Wishlist
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Content -->
    <section class="items-center justify-center p-3">
        <div class="w-full p-3 bg-whte rounded-lg ">
                {{-- <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Latest Customers</h3>
                    <a href="#" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
                        View all
                    </a>
                </div> --}}

            <div class="flow-root">
                <ul role="list" class="divide-ysa divide-[#2557D6] space-y-2">
                    @foreach ($wishlists as $wishlist)
                    <li class="flex bg-white rounded-lg" style="border-width:2px; border-color:#2557D6;">
                        <a href="{{ route('gadget.show', $wishlist->gadget_id) }}" class="flex-1 flex items-center space-x-4 p-3">
                            <div class="flex-shrink-0">
                                <img class="w-10 h-10 rounded-full" src="{{ asset($wishlist->gadget->img) }}" alt="Neil image">
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="font-bold text-[#2557D6] truncate">
                                    {{ $wishlist->gadget->name }}
                                </p>
                                <p class="text-sm truncate">
                                    <b>₱{{ number_format($wishlist->gadget->price_selling, 2, ".", ",") }}</b>
                                </p>
                                <p class="text-sm text-gray-500 truncate">
                                    {{ $wishlist->updated_at }}
                                </p>
                            </div>
                            <div class="inline-flex items-center text-base font-semibold text-[#2557D6] dark:text-white">
                            </div>
                        </a>

                        <form action="{{ route('wishlist.destroy', $wishlist) }}" method="POST" class="flex items-center text-base font-semibold text-gray-900 dark:text-white"  onsubmit="return confirm('Are you sure you want to remove gadget from wishlist?')">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="w-full h-full p-5 text-sm text-red-600 rounded-lg hover:bg-red-600 hover:text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" viewBox="0 0 16 16" class="self-center">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                                </svg>
                            </button>
                        </form>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        {{-- <div class="flow-root">
            <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                @foreach ($wishlists as $wishlist)
                <li class="mb-3 rounded-lg shadow bg-white" style="border-width:2px; border-color:#2557D6;">
                    <a href="{{ route('gadget.show', $wishlist->gadget_id) }}" class="p-3 py-1 flex items-center space-x-4">
                        <div class="flex-1 min-w-0 px-3">
                            <p class="text-lg font-bold text-[#2557D6] truncate">
                                {{ $wishlist->gadget->name  }}
                            </p>
                            <p class="text-[#2557D6] truncate dark:text-gray-400">
                                {{ $wishlist->gadget->name  }}
                            </p>
                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                {{ $wishlist->gadget->updated_at  }}
                            </p>
                        </div>
                    </a>
                </li>
                @endforeach
            </ul>
        </div> --}}
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
</style>
@endsection
