@extends('layouts.admin')

@section('main')
<!-- component -->
<section class="flex justify-center" x-data="app justify-center">
    <div class="w-full lg:w-1/3 p-6 transform space-y-4 text-center">
        <!-- register content -->
        <form action="{{ route('admin.user.update', $user) }}" method="POST" class="space-y-3 text-black">
            @method('PUT')
            @csrf
            <header class="mb-3 text-lg font-bold">Edit Profile</header>

            <!-- TYPE -->
            <div>
                <div class="w-full px-3 bg-gray-100 rounded-2xl border-2 border-blue-300 focus-within:border-blue-500">
                    <select name="type" id="" class="my-1 w-full border-0 bg-transparent outline-0 focus:ring-0">
                        <option selected disabled>--- Select User Type ---</option>
                        <option value="admin" @if ($user->type == 'admin') selected @endif>Admin</option>
                        <option value="user" @if ($user->type == 'user') selected @endif>User</option>
                    </select>
                </div>
                @error('type')
                    <div class="error text-red-600">{{ $message }}</div>
                @enderror
            </div>
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
                    <div class="error text-red-600">{{ $message }}</div>
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
                    <input type="text" name="phone" placeholder="Phonenumber" maxlength="10" value="{{ substr($user->phone, 3, 10); }}" id="phone" class="my-3 w-full border-0 bg-transparent outline-0 focus:ring-0" />
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
                UPDATE ACCOUNT
            </button>
        </form>
    </div>
</section>
@endsection



@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/css/intlTelInput.css" integrity="sha512-gxWow8Mo6q6pLa1XH/CcH8JyiSDEtiwJV78E+D+QP0EVasFs8wKXq16G8CLD4CJ2SnonHr4Lm/yY2fSI2+cbmw==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/intlTelInput.min.js" integrity="sha512-+gShyB8GWoOiXNwOlBaYXdLTiZt10Iy6xjACGadpqMs20aJOoh+PJt3bwUVA6Cefe7yF7vblX6QwyXZiVwTWGg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    var input = document.querySelector("#phone");
    window.intlTelInput(input, {
        // any initialisation options go here
        initialCountry: 'ph',
        onlyCountries: ['ph'],
        customContainer: 'w-full my-1',
    });
</script>
@endsection
