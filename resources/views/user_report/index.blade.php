@extends('layouts.user')

@section('main')
<section class="">
    <!-- Header -->
    <div class="bg-blue-600 rounded-bl-xl rounded-br-xl text-white">
        <div class="relative grid grid-cols-1 gap-4 p-4 shadow-lg">
            <div class="relative flex gap-4">
                <a href="{{ route('user.settings') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="h-full" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
                    </svg>
                </a>
                <div class="flex flex-col">
                    <h1 class="text-xl font-semibold capitalize">
                        My disputes
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Content -->
    <section class="items-center justify-center p-4">
        <div class="flow-root">
            <ul role="list" class="space-y-3">
                @foreach ($reports as $report)
                <li class="bg-blue-500 text-white border-2 border-blue-600 rounded-xl shadow-xl">
                    <a href="{{ route('report.show', $report) }}" class="p-3 py-1 flex items-center space-x-4">
                        <div class="flex-1 min-w-0 px-3">
                            <p class="text-lg font-bold truncate">
                                {{ $report->subject  }}
                            </p>
                            <p class="truncate dark:text-gray-400">
                                {{ $report->message }}
                            </p>
                            <p class="text-sm text-gray-200 truncate">
                                {{ $report->updated_at }}
                            </p>
                        </div>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </section>
    <a href="{{ route('report.create') }}" class="fixed flex justify-center align-middle w-16 h-16 bg-[#2557D6] rounded-full active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none lg:right-48 right-4 bottom-20">
        <svg viewBox="0 0 20 20" enable-background="new 0 0 20 20" class="w-8 h-full inline-block">
          <path fill="#FFFFFF" d="M16,10c0,0.553-0.048,1-0.601,1H11v4.399C11,15.951,10.553,16,10,16c-0.553,0-1-0.049-1-0.601V11H4.601 C4.049,11,4,10.553,4,10c0-0.553,0.049-1,0.601-1H9V4.601C9,4.048,9.447,4,10,4c0.553,0,1,0.048,1,0.601V9h4.399 C15.952,9,16,9.447,16,10z"></path>
        </svg>
    </a>
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
