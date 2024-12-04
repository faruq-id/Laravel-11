<x-dashboard-layout>
    <x-slot:title>{{ $title }}</x-slot>
    {{-- <div class="bg-white text-xl p-4 shadow dark:bg-gray-800 sm:p-6 xl:p-8"></div> --}}
    
    <div class="grid grid-cols-1 gap-y-6 dark:bg-gray-900 xl:grid-cols-3 xl:gap-4">
        <div class="col-span-full dark:bg-gray-800 p-4">
            <div class="flex items-center justify-between">
               <!-- Title -->
               <h1 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">
                     {{ $title }} settings
               </h1>
            
               <!-- Navigation -->
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
        

        {{-- <div class="px-4 pt-6"> --}}
            {{-- <div class="flex flex-col"> --}}
                {{-- <div class="overflow-x-auto"> --}}
                   <div class="col-span-full px-4">
                        {{-- Header table --}}
                        <div class="sm:flex mb-4">
                            <div class="mb-3 hidden items-center dark:divide-gray-700 sm:mb-0 sm:flex sm:divide-x sm:divide-gray-100">
                            <form class="lg:pr-3">
                                <label class="text-sm font-medium text-gray-900 dark:text-gray-300 sr-only" for="post-search">Search</label>
                                <div class="relative mt-1 lg:w-64 xl:w-96">
                                    <div class="flex">
                                        <div class="relative w-full"><input class="block w-full border disabled:cursor-not-allowed disabled:opacity-50 bg-gray-50 border-gray-300 text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500 rounded-lg p-2.5 text-sm" id="post-search" type="search" id="search" name="search" placeholder="Search for {{ $title }}"></div>
                                    </div>
                                </div>
                            </form>
                            <div class="mt-3 flex space-x-1 pl-0 sm:mt-0 sm:pl-2">
                                <a href="#" class="inline-flex cursor-pointer justify-center rounded p-1 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                    <span class="sr-only">Configure</span>
                                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" class="text-2xl" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path>
                                    </svg>
                                </a>
                                <a href="#" class="inline-flex cursor-pointer justify-center rounded p-1 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                    <span class="sr-only">Delete</span>
                                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" class="text-2xl" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                </a>
                                <a href="#" class="inline-flex cursor-pointer justify-center rounded p-1 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                    <span class="sr-only">Purge</span>
                                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" class="text-2xl" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                </a>
                                <a href="#" class="inline-flex cursor-pointer justify-center rounded p-1 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                    <span class="sr-only">Settings</span>
                                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" class="text-2xl" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"></path>
                                    </svg>
                                </a>
                            </div>
                            </div>
                            <div class="ml-auto flex items-center space-x-2 sm:space-x-3">
                            <button class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 focus:!ring-2 p-0 font-medium rounded-lg" type="button">
                                <span class="flex items-center rounded-md text-sm px-3 py-2">
                                    <div class="flex items-center gap-x-3">
                                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" class="text-xl" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"></path>
                                        </svg>
                                        Add {{ $title }}
                                    </div>
                                </span>
                            </button>
                            <button class="text-gray-900 bg-white border border-gray-200 hover:bg-gray-100 hover:text-blue-700 disabled:hover:bg-white focus:ring-blue-700 focus:text-blue-700 dark:bg-transparent dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 focus:ring-2 dark:disabled:hover:bg-gray-800 focus:!ring-2 p-0 font-medium rounded-lg" type="button">
                                <span class="flex items-center rounded-md text-sm px-3 py-2">
                                    <div class="flex items-center gap-x-3">
                                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" class="text-xl" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v3.586l-1.293-1.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V8z" clip-rule="evenodd"></path>
                                        </svg>
                                        <span>Export</span>
                                    </div>
                                </span>
                            </button>
                            </div>
                        </div>
                        
                        {{-- Table --}}
                        <div class="overflow-hidden shadow">
                            <div data-testid="table-element" class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                <table class="w-full text-left text-sm text-gray-500 dark:text-gray-400 min-w-full divide-y divide-gray-200 dark:divide-gray-600">
                                    <thead class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400 bg-gray-100 dark:bg-gray-700">
                                        <tr>
                                            <th class="px-6 py-3"><label class="text-sm font-medium text-gray-900 dark:text-gray-300 sr-only" for="select-all">Select all</label><input class="h-4 w-4 rounded border border-gray-300 bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600" type="checkbox" id="select-all" name="select-all"></th>
                                            <th class="px-6 py-3">Name</th>
                                            <th class="px-6 py-3">Slug</th>
                                            <th class="px-6 py-3">Color</th>
                                            <th class="px-6 py-3">Status</th>
                                            <th class="px-6 py-3">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white dark:divide-gray-700 dark:bg-gray-800">
                                            
                                        @foreach ($categorys as $category) 
                                        <tr data-testid="table-row-element" class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                            <td class="px-6 py-4 w-4 p-4">
                                                <div class="flex items-center"><input class="h-4 w-4 rounded border border-gray-300 bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600" type="checkbox" aria-describedby="checkbox-1" id="checkbox-1"><label for="checkbox-1" class="sr-only">checkbox</label></div>
                                            </td>
                                            <td class="px-6 py-4 p-4 text-base font-medium text-gray-900 dark:text-white">{{ $category->name }}</td>
                                            <td class="px-6 py-4 p-4 text-base font-medium text-gray-900 dark:text-white">{{ $category->slug }}</td>
                                            <td class="px-6 py-4 p-4 text-base font-medium text-gray-900 dark:text-white">
                                                <span class="bg-{{ $category->color }}-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                                                    {{ $category->color }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap p-4 text-base font-normal text-gray-900 dark:text-white">
                                                <div class="flex items-center">
                                                    @if ($category->status)
                                                        <div class="mr-2 h-2.5 w-2.5 rounded-full bg-green-400"></div> Active
                                                    @else
                                                        <div class="mr-2 h-2.5 w-2.5 rounded-full bg-red-400"></div> Non-active
                                                    @endif
                                                </div>
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="flex items-center gap-x-3 whitespace-nowrap">
                                                <button class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 focus:!ring-2 p-0 font-medium rounded-lg" type="button">
                                                    <span class="flex items-center rounded-md text-sm px-3 py-2">
                                                        <div class="flex items-center gap-x-2">
                                                            <svg stroke="currentColor" fill="none" stroke-width="0" viewBox="0 0 24 24" class="text-lg" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                            </svg>
                                                            Edit
                                                        </div>
                                                    </span>
                                                </button>
                                                <button class="text-white bg-red-700 border border-transparent hover:bg-red-800 focus:ring-4 focus:ring-red-300 disabled:hover:bg-red-800 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900 dark:disabled:hover:bg-red-600 focus:!ring-2 p-0 font-medium rounded-lg" type="button">
                                                    <span class="flex items-center rounded-md text-sm px-3 py-2">
                                                        <div class="flex items-center gap-x-2">
                                                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" class="text-lg" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                                            </svg>
                                                            Delete
                                                        </div>
                                                    </span>
                                                </button>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach 
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        {{-- Pagenation --}}
                        {{-- Pagenations --}}
                        <div class="py-4 mb-8">
                            {{ $categorys->links() }}
                        </div>
                        {{-- <div class="sticky right-0 bottom-0 w-full items-center border-t border-gray-200 bg-white p-4 dark:border-gray-700 dark:bg-gray-800 sm:flex sm:justify-between">
                            <div class="mb-4 flex items-center sm:mb-0">
                               <a href="#" class="inline-flex cursor-pointer justify-center rounded p-1 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                  <span class="sr-only">Previous page</span>
                                  <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" class="text-2xl" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                     <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                  </svg>
                               </a>
                               <a href="#" class="mr-2 inline-flex cursor-pointer justify-center rounded p-1 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                  <span class="sr-only">Next page</span>
                                  <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" class="text-2xl" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                     <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                  </svg>
                               </a>
                               <span class="text-sm font-normal text-gray-500 dark:text-gray-400">Showing&nbsp;<span class="font-semibold text-gray-900 dark:text-white">1-20</span>&nbsp;of&nbsp;<span class="font-semibold text-gray-900 dark:text-white">2290</span></span>
                            </div>
                            <div class="flex items-center space-x-3">
                               <a href="#" class="inline-flex flex-1 items-center justify-center rounded-lg bg-primary-700 py-2 px-3 text-center text-sm font-medium text-white hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                  <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" class="mr-1 text-base" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                     <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                  </svg>
                                  Previous
                               </a>
                               <a href="#" class="inline-flex flex-1 items-center justify-center rounded-lg bg-primary-700 py-2 px-3 text-center text-sm font-medium text-white hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                  Next
                                  <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" class="ml-1 text-base" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                     <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                  </svg>
                               </a>
                            </div>
                        </div> --}}
                         
                   </div>
                {{-- </div> --}}
             {{-- </div> --}}
             
        {{-- </div> --}}
    </div>
</x-dashboard-layout>
 