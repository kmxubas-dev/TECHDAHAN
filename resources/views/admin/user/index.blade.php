@extends('layouts.admin')

@section('main')
<section>
    <!-- Table -->
    <div class="mt-4 mx-4">
        <div class="flex justify-between items-center mb-3 ">
            <h3 class="text-xl font-semibold align-middle">Users</h3>
            <a href="{{ route('admin.user.create') }}" type="button" class="flex items-center w-max mr-2 px-5 py-2 bg-white text-sm text-center font-semibold rounded-2xl border border-gray-300 shadow-lg dark:text-gray-100 dark:bg-gray-800 ">
                +
                <div class='font-mono pt-0.5 pl-2'>
                    Add User
                </div>
            </a>
        </div>
        <div class="w-full overflow-hidden rounded-xl shadow-xl border border-gray-300">
            <div class="w-full overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-100 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Users</th>
                            <th class="px-4 py-3">Type</th>
                            <th class="px-4 py-3">Name</th>
                            <th class="px-4 py-3">Email</th>
                            <th class="px-4 py-3">Phone</th>
                            <th class="px-4 py-3">Address</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach ($users as $user)
                        <tr class="bg-gray-100 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3 text-sm">{{ $loop->index+1 }}</td>
                            <td class="px-4 py-3 text-sm capitalize">{{ $user->type }}</td>
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                        <img class="object-cover w-full h-full rounded-full" src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=200&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjE3Nzg0fQ" alt="" loading="lazy" />
                                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                    </div>
                                    <div>
                                        <p class="font-semibold">{{ $user->name->full }}</p>
                                        {{-- <p class="text-xs text-gray-600 dark:text-gray-400">10x Developser</p> --}}
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">{{ $user->email }}</td>
                            <td class="px-4 py-3 text-sm">{{ $user->phone }}</td>
                            <td class="px-4 py-3 text-sm">{{ $user->address }}</td>
                            <td class="px-4 py-3 text-xs">
                                @if ($user->status == 'enabled')
                                    <span class="px-2 py-1 font-semibold leading-tight text-green-700 capitalize bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100"> {{$user->status}} </span>
                                @else
                                    <span class="px-2 py-1 font-semibold leading-tight text-red-700 capitalize bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100"> {{$user->status}} </span>
                                @endif
                            </td>
                            <td class="flex items-center space-x-2 width-100 px-4 py-3 text-sm" >
                                <a href="{{ route('admin.user.show', $user) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16" class="w-6 h-6 text-blue-500 hover:text-slate-700 hover:cursor-pointer">
                                        <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/>
                                        <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                                    </svg>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="grid px-4 py-2 bg-gray-100 dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600">
                {{ $users->links() }}
            </div>
            {{-- <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                <span class="flex items-center col-span-3"> Showing 21-30 of 100 </span>
                <span class="col-span-2"></span>
                <!-- Pagination -->
                <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                    {{ $users->links() }}
                    <nav aria-label="Table navigation">
                        <ul class="inline-flex items-center">
                            <li>
                                <button class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple" aria-label="Previous">
                                    <svg aria-hidden="true" class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                        <path d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </li>
                            <li>
                                <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">1</button>
                            </li>
                            <li>
                                <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">2</button>
                            </li>
                            <li>
                                <button class="px-3 py-1 text-white dark:text-gray-800 transition-colors duration-150 bg-blue-600 dark:bg-gray-100 border border-r-0 border-blue-600 dark:border-gray-100 rounded-md focus:outline-none focus:shadow-outline-purple">3</button>
                            </li>
                            <li>
                                <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">4</button>
                            </li>
                            <li>
                                <span class="px-3 py-1">...</span>
                            </li>
                            <li>
                                <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">8</button>
                            </li>
                            <li>
                                <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">9</button>
                            </li>
                            <li>
                                <button class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple" aria-label="Next">
                                    <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                                        <path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </li>
                        </ul>
                    </nav>
                </span>
            </div> --}}
        </div>
    </div>
    <!-- ./Table -->
</section>
@endsection



@section('scripts')
<script>
    function delete_user (button) {
        alertify.confirm('Delete User', 'Are you sure you want to delete this user?',
        () => button.parentElement.submit(), () => { })
        .set('labels', {ok:'Yes', cancel:'No'});
    }
</script>
@endsection