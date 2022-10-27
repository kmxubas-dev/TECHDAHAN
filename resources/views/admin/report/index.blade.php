@extends('layouts.admin')

@section('main')
<section>
    <!-- Client Table -->
    <div class="mt-4 mx-4">
        <h3 class="mb-3 text-xl font-semibold">
            Reports
        </h3>
        <div class="w-full overflow-hidden rounded-xl shadow-xl border border-gray-300">
            <div class="w-full overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-100 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">No.</th>
                            <th class="px-4 py-3">User</th>
                            <th class="px-4 py-3">Subject</th>
                            <th class="px-4 py-3">Date Submitted</th>
                            {{-- <th class="px-4 py-3">Status</th> --}}
                            <th class="px-4 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach ($reports as $report)
                        <tr class="bg-gray-100 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3 text-sm">{{ $loop->index+1 }}</td>
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                        <img class="object-cover w-full h-full rounded-full" src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=200&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjE3Nzg0fQ" alt="" loading="lazy" />
                                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                    </div>
                                    <div>
                                        <p class="font-semibold">{{ $report->user->name->full }}</p>
                                        {{-- <p class="text-xs text-gray-600 dark:text-gray-400">10x Developser</p> --}}
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">{{ $report->subject }}</td>
                            <td class="px-4 py-3 text-sm">{{ date_format($report->updated_at, 'F d, o') }}</td>
                            {{-- <td class="px-4 py-3 text-xs">
                                <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100"> Approved </span>
                            </td> --}}
                            <td class="flex items-center space-x-2 width-100 px-4 py-3 text-sm" >
                                <a href="{{ route('admin.report.show', $report) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16" class="w-5 h-5 text-blue-500 hover:text-slate-700 hover:cursor-pointer">
                                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                    </svg>
                                    {{-- <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16" class="w-5 h-5 text-blue-500 hover:text-slate-700 hover:cursor-pointer">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg>                      --}}
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="grid px-4 py-2 bg-gray-100 dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600">
                {{ $reports->links() }}
            </div>
        </div>
    </div>
    <!-- ./Client Table -->
</section>
@endsection
