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
                        <p class="relative text-xl whitespace-nowrap truncate overflow-hidden">{{auth()->user()->name}}</p>
                        <a class="text-gray-500 text-xl" href="#"><i class="fa-solid fa-trash"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Content -->
    <section class="items-center justify-center p-3">
        <h1 class="text-xl mb-3 font-semibold text-gray-800 capitalize dark:text-white">Gadget Listing</h1>

        <div class="rounded-lg pb-14">
            <div class="flow-root">
                <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach ($gadgets as $gadget)
                    <li class="gadget-li mb-2 rounded-lg shadow" style="border-width:2px; border-color:#2557D6;">
                        <a href="{{ route('gadget.show', $gadget->id) }}" class="p-3 flex items-center space-x-4">
                            {{-- <div class="flex-shrink-0">
                                <img class="w-8 h-8 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-1.jpg" alt="Neil image">
                            </div> --}}
                            <div class="flex-1 min-w-0">
                                <p class="text-lg font-bold text-[#2557D6] truncate">
                                    {{ $gadget->name  }}
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    Original Price PHP {{ number_format($gadget->price_original, 2) }}
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    Selling Price PHP {{ number_format($gadget->price_selling, 2) }}
                                </p>
                            </div>
                            <form action="{{ route('gadget.destroy', $gadget->id) }}" method="POST" class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white" onsubmit="return confirm('Are you sure you want to delete this gadget?')">
                                @method('DELETE')
                                @csrf
                                <button class="mb-2 md:mb-0 border-2 border-red-500 px-2 py-1 text-sm shadow-sm font-bold tracking-wider text-red-500 rounded-full hover:shadow-lg hover:bg-red-500 hover:text-white">Delete</button>
                            </form>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
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
