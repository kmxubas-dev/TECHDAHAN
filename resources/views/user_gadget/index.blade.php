@extends('layouts.user')

@section('main')
<section class="">
    <!-- Header -->
    <div class="bg-blue-600 rounded-bl-xl rounded-br-xl text-white">
        <div class="relative grid grid-cols-1 gap-4 p-4 shadow-lg">
            <div class="relative flex gap-4">
                <a href="{{ route('user.profile') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="h-full" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
                    </svg>
                </a>
                <div class="flex flex-col">
                    <h1 class="text-xl font-semibold capitalize">
                        My gadgets
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Content -->
    <section class="items-center justify-center px-5 py-8">
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
                                    {{ $gadget->name }}
                                </p>
                                <p class="text-sm text-[#2557D6] truncate dark:text-gray-400">
                                    Selling Price: <b>₱{{ number_format($gadget->price_selling, 2, ".", ",") }}</b>
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    {{ 'Posted '.$gadget->getElapsedTime($gadget->created_at) }}
                                </p>
                            </div>
                            <form action="{{ route('gadget.destroy', $gadget->id) }}" method="POST" class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white" onsubmit="return confirm('Are you sure you want to delete this gadget?')">
                                @method('DELETE')
                                @csrf
                                <button class="mb-2 md:mb-0 border-2 border-red-500 px-2 py-1 text-sm shadow-sm font-bold tracking-wider text-red-500 rounded-lg hover:shadow-lg hover:bg-red-500 hover:text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                    </svg>
                                </button>
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
