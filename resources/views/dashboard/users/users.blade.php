<x-dashboard-layout>
    <x-slot:title>{{ $title }}</x-slot>
    {{-- <div class="bg-white text-xl p-4 shadow dark:bg-gray-800 sm:p-6 xl:p-8"></div> --}}
    
    <div class="grid grid-cols-1 gap-y-6 dark:bg-gray-900 xl:grid-cols-3 xl:gap-4">
        <div class="col-span-full dark:bg-gray-800 p-4">
            <div class="flex items-center justify-between">
                {{-- Title --}}
                <h1 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">
                    All {{ $title }}
                </h1>
            
                {{-- Navigation --}}
                <nav aria-label="Breadcrumb" class="text-right">
                    <ol class="flex items-center">
                        <li class="group flex items-center">
                            <svg stroke="currentColor" fill="none" stroke-width="0" viewBox="0 0 24 24" aria-hidden="true" class="mx-1 h-6 w-6 text-gray-400 group-first:hidden md:mx-2" data-testid="flowbite-breadcrumb-separator" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                            <a class="flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white" data-testid="flowbite-breadcrumb-item" href="/dashboard">
                                <div class="flex items-center gap-x-3">
                                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" class="text-xl" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                                    </svg>
                                    <span class="dark:text-white">Dashboard</span>
                                </div>
                            </a>
                        </li>
                        <li class="group flex items-center">
                            <svg stroke="currentColor" fill="none" stroke-width="0" viewBox="0 0 24 24" aria-hidden="true" class="mx-1 h-6 w-6 text-gray-400 group-first:hidden md:mx-2" data-testid="flowbite-breadcrumb-separator" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                            <a class="flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white" data-testid="flowbite-breadcrumb-item" href="{{ route('admin.users.index') }}">{{ $title }}</a>
                        </li>
                        <li class="group flex items-center">
                            <svg stroke="currentColor" fill="none" stroke-width="0" viewBox="0 0 24 24" aria-hidden="true" class="mx-1 h-6 w-6 text-gray-400 group-first:hidden md:mx-2" data-testid="flowbite-breadcrumb-separator" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                            <span class="flex items-center text-sm font-medium text-gray-500 dark:text-gray-400" data-testid="flowbite-breadcrumb-item">List</span>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        

        {{-- <x-alert type="success" message="Data berhasil disimpan!" timeout="5000" /> --}}
        <x-alert type="error" />
        <x-alert type="success" />
        <x-alert type="warning" />
        <x-alert type="info" />

        {{-- Response error filed type Alert --}}
        <x-field-error field="name" type="alert" />
        <x-field-error field="username" type="alert" />
        <x-field-error field="email" type="alert" />
        <x-field-error field="phone_number" type="alert" />
        <x-field-error field="password" type="alert" />
        <x-field-error field="password_confirmation" type="alert" />
        <x-field-error field="is_admin" type="alert" />
        <x-field-error field="status" type="alert" />
        <x-field-error field="profile_picture" type="alert" />
        

        <div class="col-span-full px-4">
            {{-- Start block --}}
            <section class="bg-gray-50 dark:bg-gray-900 antialiased">
                <div class="w-full">
                    {{-- Start coding here --}}
                    <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                        <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                            <div class="w-full md:w-1/2">
                                <form class="flex items-center">
                                    <label for="simple-search" class="sr-only">Search</label>
                                    <div class="relative w-full">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <input id="post-search" type="search" id="search" name="search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search for {{ $title }}" value="{{ request('search') }}" required="">
                                    </div>
                                </form>
                            </div>
                            <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                                <button type="button" id="createProductModalButton" data-modal-target="createProductModal" data-modal-toggle="createProductModal" class="flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                                    <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                                    </svg>
                                    Add {{ $title }}
                                </button>
                                <div class="flex items-center space-x-3 w-full md:w-auto">
                                    <button id="actionsDropdownButton" data-dropdown-toggle="actionsDropdown" class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" type="button">
                                        <svg class="-ml-1 mr-1.5 w-5 h-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path clip-rule="evenodd" fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                        </svg>
                                        Actions
                                    </button>
                                    <div id="actionsDropdown" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="actionsDropdownButton">
                                            <li>
                                                <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Mass Edit</a>
                                            </li>
                                        </ul>
                                        <div class="py-1">
                                            <a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete all</a>
                                        </div>
                                    </div>
                                    <button id="filterDropdownButton" data-dropdown-toggle="filterDropdown" class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" type="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="h-4 w-4 mr-2 text-gray-400" viewbox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z" clip-rule="evenodd" />
                                        </svg>
                                        Filter
                                        <svg class="-mr-1 ml-1.5 w-5 h-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path clip-rule="evenodd" fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                        </svg>
                                    </button>
                                    <div id="filterDropdown" class="z-10 hidden w-56 p-3 bg-white rounded-lg shadow dark:bg-gray-700">
                                        <h6 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">Category</h6>
                                        <ul class="space-y-2 text-sm" aria-labelledby="filterDropdownButton">
                                            <li class="flex items-center">
                                                <input id="apple" type="checkbox" value="" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                <label for="apple" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Apple (56)</label>
                                            </li>
                                            <li class="flex items-center">
                                                <input id="fitbit" type="checkbox" value="" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                <label for="fitbit" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Fitbit (56)</label>
                                            </li>
                                            <li class="flex items-center">
                                                <input id="dell" type="checkbox" value="" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                <label for="dell" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Dell (56)</label>
                                            </li>
                                            <li class="flex items-center">
                                                <input id="asus" type="checkbox" value="" checked="" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                <label for="asus" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Asus (97)</label>
                                            </li>
                                            <li class="flex items-center">
                                                <input id="logitech" type="checkbox" value="" checked="" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                <label for="logitech" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Logitech (97)</label>
                                            </li>
                                            <li class="flex items-center">
                                                <input id="msi" type="checkbox" value="" checked="" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                <label for="msi" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">MSI (97)</label>
                                            </li>
                                            <li class="flex items-center">
                                                <input id="bosch" type="checkbox" value="" checked="" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                <label for="bosch" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Bosch (176)</label>
                                            </li>
                                            <li class="flex items-center">
                                                <input id="sony" type="checkbox" value="" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                <label for="sony" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Sony (234)</label>
                                            </li>
                                            <li class="flex items-center">
                                                <input id="samsung" type="checkbox" value="" checked="" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                <label for="samsung" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Samsung (76)</label>
                                            </li>
                                            <li class="flex items-center">
                                                <input id="canon" type="checkbox" value="" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                <label for="canon" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Canon (49)</label>
                                            </li>
                                            <li class="flex items-center">
                                                <input id="microsoft" type="checkbox" value="" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                <label for="microsoft" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Microsoft (45)</label>
                                            </li>
                                            <li class="flex items-center">
                                                <input id="razor" type="checkbox" value="" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                <label for="razor" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Razor (49)</label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="overflow-x-auto">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th class="px-6 py-3"><label class="text-sm font-medium text-gray-900 dark:text-gray-300 sr-only" for="select-all">Select all</label><input class="h-4 w-4 rounded border border-gray-300 bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600" type="checkbox" id="select-all" name="select-all"></th>
                                        <th scope="col" class="px-4 py-4">Name</th>
                                        <th scope="col" class="px-4 py-3">Username</th>
                                        <th scope="col" class="px-4 py-3">Phone Number</th>
                                        <th scope="col" class="px-4 py-3">Admin</th>
                                        <th scope="col" class="px-4 py-3">Status</th>
                                        <th scope="col" class="px-4 py-3">Last Login</th>
                                        <th scope="col" class="px-4 py-3">
                                            <span class="sr-only">Actions</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($users as $user) 
                                    <tr class="border-b dark:border-gray-700">
                                        <td class="px-6 py-4 w-4 p-4">
                                            <div class="flex items-center"><input class="h-4 w-4 rounded border border-gray-300 bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600" type="checkbox" aria-describedby="checkbox-1" id="checkbox-1"><label for="checkbox-1" class="sr-only">checkbox</label></div>
                                        </td>
                                        <td class="px-6 py-4 mr-12 flex items-center space-x-3 whitespace-nowrap p-4 lg:mr-0">
                                            <img class="h-10 w-10 rounded-full" src="{{ imagesView($user->profile_picture, null) }}" alt="{{ $user->name }}">
                                            {{-- <img class="h-10 w-10 rounded-full" src="{{ $user->profile_picture }}" alt="{{ $user->name }}"> --}}
                                            {{-- <img class="h-10 w-10 rounded-full" src="{{ $user->profile_picture && Storage::url($user->profile_picture) ? Storage::url($user->profile_picture) : Storage::url('/users/no-image.png') }}" alt="{{ $user->name }}}}"> --}}
                                            <div class="text-sm font-normal text-gray-500 dark:text-gray-400">
                                                <div class="text-base font-semibold text-gray-900 dark:text-white">{{ $user->name }}</div>
                                                <div class="text-sm font-normal text-gray-500 dark:text-gray-400">{{ $user->email }}</div>
                                            </div>
                                        </td>
                                        <th title="{{ $user->username }}" scope="row" class="px-4 py-3  max-w-[18rem] truncate font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $user->username }}
                                        </th>
                                        <th title="{{ $user->phone_number }}" scope="row" class="px-4 py-3  max-w-[18rem] truncate font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $user->phone_number }}
                                        </th>
                                        <td class="px-4 py-3">
                                            <div class="flex items-center">
                                                @if ($user->is_admin)
                                                    <div class="mr-2 h-2.5 w-2.5 rounded-full bg-green-400"></div> Admin
                                                @else
                                                    <div class="mr-2 h-2.5 w-2.5 rounded-full bg-red-400"></div> Guest
                                                @endif
                                            </div>
                                        </td>
                                        <td class="px-4 py-3">
                                            <div class="flex items-center">
                                                @if ($user->status == 'active')
                                                    <div class="mr-2 h-2.5 w-2.5 rounded-full bg-green-400"></div> Active
                                                @else
                                                    <div class="mr-2 h-2.5 w-2.5 rounded-full bg-red-400"></div> Non-active
                                                @endif
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 max-w-[12rem] truncate">{{ $user->last_login_at ?? "-" }}</td>
                                        <td class="px-4 py-3 flex items-center justify-end">
                                            <button id="{{ md5($user->id) }}-dropdown-button" data-dropdown-toggle="{{ md5($user->id) }}-dropdown" class="inline-flex items-center text-sm font-medium hover:bg-gray-100 dark:hover:bg-gray-700 p-1.5 dark:hover-bg-gray-800 text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100" type="button">
                                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                                </svg>
                                            </button>
                                            <div id="{{ md5($user->id) }}-dropdown" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                                <ul class="py-1 text-sm" aria-labelledby="{{ md5($user->id) }}-dropdown-button">
                                                    <li>
                                                        <button type="button" data-modal-target="updateUsersModal" data-modal-toggle="updateUsersModal" 
                                                            data-id="{{ Crypt::encrypt($user->id) }}" 
                                                            data-name="{{ $user->name }}"
                                                            data-username="{{ $user->username }}"
                                                            data-email="{{ $user->email }}"
                                                            data-phone="{{ $user->phone_number }}"
                                                            data-status="{{ $user->status }}"
                                                            data-is_admin="{{ $user->is_admin }}"
                                                            class="flex w-full items-center py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white text-gray-700 dark:text-gray-200">
                                                            <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                                <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" />
                                                            </svg>
                                                            Edit
                                                        </button>
                                                    </li>
                                                    <li>
                                                        <button type="button" data-modal-target="readUserModal" data-modal-toggle="readUserModal" 
                                                            data-id="{{ Crypt::encrypt($user->id) }}" 
                                                            data-image="{{ imagesView($user->profile_picture, null) }}" 
                                                            data-name="{{ $user->name }}"
                                                            data-username="{{ $user->username }}"
                                                            data-email="{{ $user->email }}"
                                                            data-phone="{{ $user->phone_number }}"
                                                            data-status="{{ $user->status }}"
                                                            data-is_admin="{{ $user->is_admin }}"
                                                            data-last_login="{{ $user->last_login_at ?? "-" }}"
                                                            class="flex w-full items-center py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white text-gray-700 dark:text-gray-200">
                                                            <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" />
                                                            </svg>
                                                            Preview
                                                        </button>
                                                    </li>
                                                    <li>
                                                        <button data-id="{{ Crypt::encrypt($user->id) }}" type="button" data-modal-target="deleteModal" data-modal-toggle="deleteModal" class="delete-button flex w-full items-center py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 text-red-500 dark:hover:text-red-400">
                                                            <svg class="w-4 h-4 mr-2" viewbox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                                <path fill-rule="evenodd" clip-rule="evenodd" fill="currentColor" d="M6.09922 0.300781C5.93212 0.30087 5.76835 0.347476 5.62625 0.435378C5.48414 0.523281 5.36931 0.649009 5.29462 0.798481L4.64302 2.10078H1.59922C1.36052 2.10078 1.13161 2.1956 0.962823 2.36439C0.79404 2.53317 0.699219 2.76209 0.699219 3.00078C0.699219 3.23948 0.79404 3.46839 0.962823 3.63718C1.13161 3.80596 1.36052 3.90078 1.59922 3.90078V12.9008C1.59922 13.3782 1.78886 13.836 2.12643 14.1736C2.46399 14.5111 2.92183 14.7008 3.39922 14.7008H10.5992C11.0766 14.7008 11.5344 14.5111 11.872 14.1736C12.2096 13.836 12.3992 13.3782 12.3992 12.9008V3.90078C12.6379 3.90078 12.8668 3.80596 13.0356 3.63718C13.2044 3.46839 13.2992 3.23948 13.2992 3.00078C13.2992 2.76209 13.2044 2.53317 13.0356 2.36439C12.8668 2.1956 12.6379 2.10078 12.3992 2.10078H9.35542L8.70382 0.798481C8.62913 0.649009 8.5143 0.523281 8.37219 0.435378C8.23009 0.347476 8.06631 0.30087 7.89922 0.300781H6.09922ZM4.29922 5.70078C4.29922 5.46209 4.39404 5.23317 4.56282 5.06439C4.73161 4.8956 4.96052 4.80078 5.19922 4.80078C5.43791 4.80078 5.66683 4.8956 5.83561 5.06439C6.0044 5.23317 6.09922 5.46209 6.09922 5.70078V11.1008C6.09922 11.3395 6.0044 11.5684 5.83561 11.7372C5.66683 11.906 5.43791 12.0008 5.19922 12.0008C4.96052 12.0008 4.73161 11.906 4.56282 11.7372C4.39404 11.5684 4.29922 11.3395 4.29922 11.1008V5.70078ZM8.79922 4.80078C8.56052 4.80078 8.33161 4.8956 8.16282 5.06439C7.99404 5.23317 7.89922 5.46209 7.89922 5.70078V11.1008C7.89922 11.3395 7.99404 11.5684 8.16282 11.7372C8.33161 11.906 8.56052 12.0008 8.79922 12.0008C9.03791 12.0008 9.26683 11.906 9.43561 11.7372C9.6044 11.5684 9.69922 11.3395 9.69922 11.1008V5.70078C9.69922 5.46209 9.6044 5.23317 9.43561 5.06439C9.26683 4.8956 9.03791 4.80078 8.79922 4.80078Z" />
                                                            </svg>
                                                            Delete
                                                        </button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                        
                        {{-- Pagenumber --}}
                        <nav class="flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4" aria-label="Table navigation">
                            {{ $users->links() }}
                        </nav>
                    </div>
                </div>
            </section>
            {{-- End block --}}
            
            {{-- Create modal --}}
            @include('dashboard.users.form-add')

            {{-- Update modal --}}
            @include('dashboard.users.form-edit')

            {{-- Read modal --}}
            @include('dashboard.users.read-user')

            {{-- Delete modal --}}
            @include('dashboard.users.delete-user')

        </div>
    </div>
</x-dashboard-layout>
 

<script>
// Read
document.addEventListener("DOMContentLoaded", function () {
    const updateButtons = document.querySelectorAll("[data-modal-toggle='readUserModal']");
    const modal = document.getElementById("readUserModal");

    updateButtons.forEach(button => {
        button.addEventListener("click", () => {
            // Ambil data dari atribut tombol
            const id = button.getAttribute("data-id");
            const dataimage = button.getAttribute("data-image");
            const name = button.getAttribute("data-name");
            const username = button.getAttribute("data-username");
            const email = button.getAttribute("data-email");
            const phone = button.getAttribute("data-phone");
            const status = button.getAttribute("data-status");
            const is_admin = button.getAttribute("data-is_admin");
            if(is_admin==1) {
                var adm = "Admin";
            } else {
                var adm = "Guest";
            }
            const last_login = button.getAttribute("data-last_login");

            // Isi data ke input form di modal
            modal.querySelector("#name").innerHTML = name;
            modal.querySelector("#username").innerHTML = username;
            modal.querySelector("#email").innerHTML = email;
            modal.querySelector("#phone-number").innerHTML = phone;
            modal.querySelector("#status").innerHTML = status;
            modal.querySelector("#is_admin").innerHTML = adm;
            modal.querySelector("#last_login").innerHTML = last_login;

            const imageElement = document.querySelector("#dataimages"); // Ambil elemen img
            const imageUrl = dataimage; // URL gambar baru
            // Set nilai atribut src
            imageElement.src = imageUrl;
            imageElement.alt = name;


            // Ambil tombol target
            const editButton = modal.querySelector("#editButtonView");

            // Set atribut tombol target di modal
            editButton.setAttribute("data-id", id);
            editButton.setAttribute("data-name", name);
            editButton.setAttribute("data-username", username);
            editButton.setAttribute("data-email", email);
            editButton.setAttribute("data-phone", phone);
            editButton.setAttribute("data-status", status);
            editButton.setAttribute("data-is_admin", is_admin);
            editButton.setAttribute("data-last_login", last_login);


            // Ambil tombol target
            const deleteButton = modal.querySelector("#deleteButtonView");
            // Set atribut tombol target di modal
            deleteButton.setAttribute("data-id", id);
 
        });
    });
});

// Update
document.addEventListener("DOMContentLoaded", function () {
    const updateButtons = document.querySelectorAll("[data-modal-toggle='updateUsersModal']");
    const modal = document.getElementById("updateUsersModal");

    updateButtons.forEach(button => {
        button.addEventListener("click", () => {
            // Ambil data dari atribut tombol
            const id = button.getAttribute("data-id");
            const name = button.getAttribute("data-name");
            const username = button.getAttribute("data-username");
            const email = button.getAttribute("data-email");
            const phone = button.getAttribute("data-phone");
            const status = button.getAttribute("data-status");
            const is_admin = button.getAttribute("data-is_admin");

            // Isi data ke input form di modal
            modal.querySelector("#name").value = name;
            // modal.querySelector(".title-name").textContent = name;
            modal.querySelector("#username").value = username;
            modal.querySelector("#email").value = email;
            modal.querySelector("#phone").value = phone;
            modal.querySelector("#status").value = status;
            modal.querySelector("#is_admin").value = is_admin;
                
            const updateUserUrl = "{{ route('admin.users.update', ':id') }}";

            // Set action URL form
            const form = document.getElementById('editUserForm');
            // form.action = '/users/'+id; // Sesuaikan dengan route Anda
            // Generate URL dengan mengganti placeholder :id
            form.action = updateUserUrl.replace(':id', id);
        });
    });
});


document.querySelectorAll('.delete-button').forEach(button => {
    button.addEventListener('click', function () {
        const id = this.getAttribute('data-id');
        const form = document.querySelector('#deleteModal form');
        const deleteUserUrl = "{{ route('admin.users.destroy', ':id') }}";

        form.action = deleteUserUrl.replace(':id', id);
    });
});
</script>