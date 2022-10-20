@extends('layouts.user')

@section('main')
<section class="">
    <!-- Header -->
    <div>
        <div class="relative grid grid-cols-1 gap-4 p-4 bg-white shadow-lg">
            <div class="relative flex gap-4 text-[#2557D6]">
                <a href="
                    @if ($group->seller->id == auth()->user()->id) 
                        {{ route('message_group.index', ['type'=>'seller']) }}
                    @else
                        {{ route('message_group.index') }}
                    @endif
                ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="h-full" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
                    </svg>
                </a>
                <div class="flex flex-col">
                    <h1 class="text-xl font-semibold capitalize">Message</h1>
                    <h5 class="font-semiblod capitalize">
                        @if ($group->seller->id == auth()->user()->id) 
                            {{ $group->user->name->full }}
                        @else
                            {{ $group->seller->name->full }}
                        @endif
                    </h5>
                </div>
            </div>
        </div>
    </div>

    <!-- Content -->
    <section class="flex flex-col bg-white items-center justify-center">
        <div class="w-full bg-white text-[#2557D6] border border-gray-200">
            <ul id="messages_ul" class="mb-3 p-5 text-lg" style="height:70vh; max-height:70vh; overflow:scroll">
                @foreach ($group->messages as $i => $message)
                @if ($message->user_id == auth()->user()->id)
                    <li class="flex justify-end mb-5">
                        <div class="h-14 w-14">
                            {{-- <img src="{{ asset('img/placeholder.jpg') }}" alt="" class="h-14 w-14 rounded-full"> --}}
                        </div>
                        <div class="ml-3 px-3 py-1 align-middle text-white border-2 bg-[#2557D6] rounded-lg" style="min-width:25%; max-width:80%">
                            <div class="h-full font-semiblod">{{ $message->message }}</div>
                        </div>
                    </li>
                @else
                    <li class="flex mb-5">
                        <div style="min-width:3.5rem;">
                            <img src="{{ asset('img/placeholder.jpg') }}" alt="" class="h-14 w-14 rounded-full">
                        </div>
                        <div class="ml-3 px-3 py-1 align-middle border-2 border-[#2557D6] rounded-lg" style="min-width:25%; max-width:80%">
                            <div class="font-semiblod">{{ $message->message }}</div>
                        </div>
                    </li>
                @endif
                @endforeach
            </ul>
            <form action="{{ route('message_group.message.add', $group) }}" method="POST">
                @csrf
                <div class="flex mb-3 p-5 text-lg">
                    <input type="text" name="message" placeholder="Message here..." autocomplete="off" autofocus class="w-full mr-2 py-2 px-3 bg-white text-base font-medium text-[#2557D6] rounded-md border-2 border-[#2557D6] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
                    <button type="submit" class="flex justify-center w-1/3 py-2 px-3 hover:shadow-form rounded-lg bg-[#2557D6] text-base font-semibold text-white outline-none">Send</button>
                </div>
            </form>
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

@section('scripts')
<script>
    var messages_ul = $('#messages_ul');
    messages_ul.scrollTop(messages_ul.prop('scrollHeight'));
</script>
@endsection
