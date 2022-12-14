@extends('layouts.admin')

@section('main')
<section>
    <!-- Client Table -->
    <div class="mt-4 mx-4">
        <h3 class="mb-3 text-xl font-semibold">
            Gadgets
        </h3>
        <div class="w-full overflow-hidden rounded-xl shadow-xl border border-gray-300">
            <div class="w-full overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-100 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">No.</th>
                            <th class="px-4 py-3">Name</th>
                            <th class="px-4 py-3">Price</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Date Submitted</th>
                            <th class="px-4 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach ($gadgets as $gadget)
                        <tr class="bg-gray-100 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3 text-sm">{{ $loop->index+1 }}</td>
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <div class="relative hidden w-20 h-20 mr-3 rounded-xl md:block">
                                        <img class="object-cover w-full h-full rounded-xl" src="{{ asset($gadget->img) }}" alt="" loading="lazy" />
                                        <div class="absolute inset-0 rounded-xl shadow-inner" aria-hidden="true"></div>
                                    </div>
                                    <div>
                                        <p class="font-semibold">{{ $gadget->name }}</p>
                                        <p class="text-xs text-gray-600 dark:text-gray-400">{{ $gadget->seller->name->full }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">???{{ number_format($gadget->price_original, 2, ".", ",") }}</td>
                            <td class="px-4 py-3 text-xs">
                                @if ($gadget->status == 'available')
                                    <span class="px-2 py-1 font-semibold leading-tight text-green-700 capitalize bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100"> {{ $gadget->status }} </span>
                                @elseif ($gadget->status == 'unavailable')
                                    <span class="px-2 py-1 font-semibold leading-tight text-red-700 capitalize bg-red-100 rounded-full dark:bg-green-700 dark:text-green-100"> Disabled </span>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-sm">{{ date_format($gadget->updated_at, 'F d, o') }}</td>
                            <td class="px-4 py-3 text-sm" >
                                <div class="flex space-x-2">
                                    <a href="{{ route('admin.gadget.show', $gadget) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16" class="w-6 h-6 text-blue-500 hover:text-slate-700 hover:cursor-pointer">
                                            <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/>
                                            <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                                        </svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="grid px-4 py-2 bg-gray-100 dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600">
                {{ $gadgets->links() }}
            </div>
        </div>
    </div>
    <!-- ./Client Table -->
</section>
@endsection
