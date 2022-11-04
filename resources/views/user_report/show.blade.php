@extends('layouts.user')

@section('main')
<section class="">
    <!-- Header -->
    <div class="bg-blue-600 rounded-bl-xl rounded-br-xl text-white">
        <div class="relative grid grid-cols-1 gap-4 p-4 shadow-lg">
            <div class="relative flex gap-4">
                <a href="{{ route('report.index') }}">
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
    <section class="flex flex-col pb-20 p-3 items-center justify-center">
        <div class="w-full p-4 bg-white text-[#2557D6] border border-gray-200 rounded-lg shadow-md">
            <h5 class="mb-5 text-lg text-center font-bold">
                @if ($report->status == 'pending')
                    Edit Report
                @else
                    View Report
                @endif
            </h5>
            <div class="flex justify-center">
                <img src="{{ asset('img/app/report/report.webp') }}" alt="" class="w-full lg:w-1/3 mb-5">
            </div>

            <h5 class="mb-5 text-lg text-center font-bold">
                Status: 
                @if ($report->status == 'pending')
                    <span class="text-yellow-600 capitalize">{{ $report->status }}</span>
                @elseif ($report->status == 'accepted')
                    <span class="text-green-600 capitalize">{{ $report->status }}</span>
                @else
                    <span class="text-red-600 capitalize">{{ $report->status }}</span>
                @endif
            </h5>
            <img src="{{ asset($report->img) }}" alt="">
            <form action="{{ route('report.update', $report) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label for="subject"><b></b></label>
                    <input type="text" name="subject" placeholder="Subject..." value="{{ $report->subject }}" class="w-full py-3 rounded-md border-2 border-[#2557D6] bg-white text-base font-medium text-[#2557D6] outline-none focus:border-[#6A64F1] focus:shadow-md" @if ($report->status != 'pending') disabled @endif/>
                </div>

                <div class="mb-3">
                    <label for="message"><b></b></label>
                    <textarea name="message" id="message" cols="30" rows="5" maxlength="1000" placeholder="Issue here..." class="w-full py-3 rounded-lg border-2 border-[#2557D6] font-medium text-[#2557D6] outline-none focus:border-[#6A64F1] focus:shadow-md" 
                    @if ($report->status != 'pending') disabled @endif>{{ $report->message }}</textarea>
                </div>

                <div class="mb-3">
                    @if ($report->status == 'pending')
                        <button type="submit" class="flex justify-center w-full py-2 px-8 hover:shadow-form rounded-lg bg-[#2557D6] text-base font-semibold text-white outline-none">
                            Update Report
                        </button>
                    @else
                        <label for="message"><b>Response</b></label>
                        <textarea name="message" id="message" cols="30" rows="5" maxlength="1000" placeholder="Issue here..." class="w-full py-3 rounded-lg border-2 border-[#2557D6] font-medium text-[#2557D6] outline-none focus:border-[#6A64F1] focus:shadow-md" disabled>{{ $report->response }}</textarea>
                    @endif
                </div>
            </form>

            @if ($report->status == 'pending')
                <form action="{{ route('report.destroy', $report) }}" method="POST" class="flex items-center text-base font-semibold text-gray-900 dark:text-white" onsubmit="return confirm('Are you sure you want to cancel your report?')">
                    @method('DELETE')
                    @csrf
                    <button class="w-full mb-2 p-2 border-2 border-red-500 shadow-sm font-bold tracking-wider text-red-500 rounded-lg hover:shadow-lg hover:bg-red-500 hover:text-white">Cancel Report</button>
                </form>
            @endif
        </div>
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
