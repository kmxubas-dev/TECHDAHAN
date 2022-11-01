@extends('layouts.admin')

@section('main')
<section>
    <!-- Client Table -->
    <div class="mt-4 mx-4">
        <div class="flex justify-between items-center mb-3 ">
            <h3 class="text-xl font-semibold align-middle">Reports</h3>
            <a href="{{ route('admin.report.index') }}" type="button" class="flex items-center w-max mr-2 px-5 py-2 bg-white text-sm text-center font-semibold rounded-2xl border border-gray-300 shadow-lg dark:text-gray-100 dark:bg-gray-800 ">
                See All
            </a>
        </div>

        <div class="flex flex-col space-y-3 mb-6">
            <div class="flex items-center justify-between p-3 dark:bg-gray-800 border-2">
                <div class="flex items-center">
                    <img src="https://vojislavd.com/ta-template-demo/assets/img/message3.jpg" class="rounded-full w-8 h-8 border border-gray-500">
                    <div class="flex flex-col ml-2">
                        <span class="font-semibold">{{ $report->user->name->full }}</span>
                        <span class="text-gray-500">From: {{ $report->user->email }}</span>
                    </div>
                </div>
                <span class="text-gray-500">{{ date_format($report->updated_at, 'F d, o') }}</span>
            </div>
            <div class="flex flex-col space-y-4 p-3 dark:bg-gray-800 border-2">
                <!-- Subject -->
                <h4 class="text-lg text-gray-800 font-bold dark:text-white">
                    {{ $report->subject }}
                </h4>
                <!-- Message -->
                <div class="text-gray-700 dark:text-white">
                    {{ $report->message }}
                </div>
            </div>
            <form action="{{ route('admin.report.update', $report) }}" method="POST" class="flex flex-col space-y-3">
                @method('PUT')
                @csrf
                <h3 class="pt-10 text-bold">Response</h3>
                <textarea name="response" id="" cols="30" rows="5" placeholder="Response here..." class="p-3 border-2 border-gray-300 dark:bg-gray-800 dark:text-white"@if ($report->status != 'pending') disabled @endif>{{ $report->response }}</textarea>

                <select name="status" id="" class="border-2 border-gray-300 dark:bg-gray-800 dark:text-white" 
                @if ($report->status != 'pending')
                    disabled
                @endif>
                    <option value="agreed" @if ($report->status == 'agreed') selected @endif>Agreed</option>
                    <option value="rejected" @if ($report->status == 'rejected') selected @endif>Rejected</option>
                </select>

                @if ($report->status == 'pending')
                    <button type="submit" class="w-32 flex items-center justify-center space-x-2 py-1.5 text-gray-600 border-2 border-gray-300 rounded-lg dark:hover:bg-gray-900 dark:bg-gray-800 dark:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.707 3.293a1 1 0 010 1.414L5.414 7H11a7 7 0 017 7v2a1 1 0 11-2 0v-2a5 5 0 00-5-5H5.414l2.293 2.293a1 1 0 11-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span>Submit</span>
                    </button>
                @endif
            </form>
        </div>  
    </div>
    <!-- ./Client Table -->
</section>
@endsection
