{{-- @props(['field'])

@error($field)
    <p id="{{ $field }}_error_help" class="mt-1 text-xs text-red-600 dark:text-red-400">
        <span class="font-medium">Oops! </span> {{ $message }}
    </p>
@enderror --}}

@props(['field', 'type' => 'field']) 
{{-- Tambahkan properti type dengan default 'field --}}

@error($field)
    @if ($type === 'alert')
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 10000)" x-show="show" 
             class="col-span-full mx-4 mt-2 mb-2 p-4 flex items-center border border-red-300 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" 
             role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="sr-only">Error</span>
            <div class="ms-3 text-sm font-medium">
                <span class="font-medium">Oops!</span> {{ $message }}
            </div>
            <button @click="show = false" type="button" 
                    class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" 
                    aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>
        </div>
    @else
        <p id="{{ $field }}_error_help" class="mt-1 text-xs text-red-600 dark:text-red-400">
            <span class="font-medium">Oops! </span> {{ $message }}
        </p>
    @endif
@enderror
