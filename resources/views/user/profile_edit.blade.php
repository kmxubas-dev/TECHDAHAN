@extends('layouts.user')

@section('main')
<section class="">
    <!-- Header -->
    <div>
        <div class="relative grid grid-cols-1 gap-4 p-4 shadow-lg">
            <div class="relative flex gap-4">
                <a href="{{ route('user.profile') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="h-full" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
                    </svg>
                </a>
                <div class="flex flex-col">
                    <h1 class="text-xl font-semibold capitalize">
                        Profile
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Content -->
    <section class="items-center justify-center">
        <div class="h-full flex flex-col overflow-y-scroll">
            <div class="mb-3 bg-blue-600 shadow-lg rounded-b-3xl">
                <a href="{{ route('user.profile') }}" class="flex justify-center px-8 py-5 rounded-b-3xl bg-gray-100 space-x-6 items-center">
                    <img src="https://api.lorem.space/image/face?w=120&h=120&hash=bart89fe" alt="User" class="h-12 w-12 rounded-full">
                    <div class="flex-">
                        <span class="text-xl font-bold">{{ auth()->user()->name->full }}</span>
                    </div>
                </a>
                <div class="grid px-7 py-2  items-center justify-around gap-1 text-white divide-x divide-solid ">
                    <h5 class="text-center font-bold">Edit your profile</h5>
                </div>
            </div>

            <div class="w-full pb-20">
                <div class="w-full flex flex-col px-5 items-center overflow-hidden">
                    <form action="{{ route('user.update', auth()->user()) }}" method="POST" class="w-full space-y-3 text-center">
                        @method('PUT')
                        @csrf
                        {{-- <header class="mb-3 text-center font-bold">Edit your profile</header> --}}

                        <!-- EMAIL -->
                        <div>
                            <div class="w-full px-3 bg-gray-100 rounded-2xl border-2 border-blue-300 focus-within:border-blue-500">
                                <input type="email" name="email" placeholder="Email" value="{{ $user->email }}" class="my-1 w-full border-0 bg-transparent outline-0 focus:ring-0" />
                            </div>
                            @error('email')
                                <div class="error text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- PASSWORD -->
                        <div>
                            <div class="w-full px-3 bg-gray-100 rounded-2xl border-2 border-blue-300 focus-within:border-blue-500">
                                <input type="password" name="password" placeholder="Password" class="my-1 w-full border-0 bg-transparent outline-0 focus:ring-0" />
                            </div>
                            @error('password')
                                @foreach ($errors->get('password') as $message)
                                <div class="error text-red-600 px-3 pb-3">• {{ $message }}</div>
                                @endforeach
                            @enderror
                        </div>
                        <!-- PASSWORD CONFIRMATION -->
                        <div>
                            <div class="w-full px-3 bg-gray-100 rounded-2xl border-2 border-blue-300 focus-within:border-blue-500">
                                <input type="password" name="password_confirmation" placeholder="Confirm Password" class="my-1 w-full border-0 bg-transparent outline-0 focus:ring-0" />
                            </div>
                            @error('password_confirmation')
                                <div class="error text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="flex items-center space-x-4">
                            <hr class="w-full border border-gray-300" />
                            <div class="font-semibold text-gray-400">Name</div>
                            <hr class="w-full border border-gray-300" />
                        </div>

                        <!-- USERNAME -->
                        <div>
                            <div class="w-full px-3 bg-gray-100 rounded-2xl border-2 border-blue-300 focus-within:border-blue-500">
                                <input type="text" name="username" placeholder="Username" value="{{ $user->username }}" class="my-1 w-full border-0 bg-transparent outline-0 focus:ring-0" />
                            </div>
                            @error('username')
                                <div class="error text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- FIRSTNAME -->
                        <div>
                            <div class="w-full px-3 bg-gray-100 rounded-2xl border-2 border-blue-300 focus-within:border-blue-500">
                                <input type="text" name="firstname" placeholder="First Name" value="{{ $user->name->fname }}" class="my-1 w-full border-0 bg-transparent outline-0 focus:ring-0" />
                            </div>
                            @error('firstname')
                                <div class="error text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- LASTNAME -->
                        <div>
                            <div class="w-full px-3 bg-gray-100 rounded-2xl border-2 border-blue-300 focus-within:border-blue-500">
                                <input type="text" name="lastname" placeholder="Last Name" value="{{ $user->name->lname }}" class="my-1 w-full border-0 bg-transparent outline-0 focus:ring-0" />
                            </div>
                            @error('lastname')
                                <div class="error text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="flex items-center space-x-4">
                            <hr class="w-full border border-gray-300" />
                            <div class="font-semibold text-gray-400">Contact Info</div>
                            <hr class="w-full border border-gray-300" />
                        </div>

                        <div class="flex flex-col">
                            <div class="w-full px-3 bg-gray-100 rounded-2xl border-2 border-blue-300 focus-within:border-blue-500">
                                <input type="tel" name="phone" placeholder="Phonenumber" value="{{ $user->phone }}" id="phone" class="my-1 w-full border-0 bg-transparent outline-0 focus:ring-0" />
                            </div>
                            @error('phone')
                                <div class="error text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <div class="w-full px-3 bg-gray-100 rounded-2xl border-2 border-blue-300 focus-within:border-blue-500">
                                <input type="text" name="address" placeholder="Address" value="{{ $user->address }}" class="my-1 w-full border-0 bg-transparent outline-0 focus:ring-0" />
                            </div>
                            @error('address')
                                <div class="error text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="w-full rounded-2xl border-b-4 border-b-blue-600 bg-blue-500 py-3 font-bold text-white hover:bg-blue-400 active:translate-y-[0.125rem] active:border-b-blue-400">
                            UPDATE PROFILE
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</section>
@endsection
