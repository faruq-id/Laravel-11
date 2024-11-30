@props([
    'type' => 'error', // Tipe alert, default 'error'
    'message' => session($type), // Pesan alert diambil otomatis dari session
    'timeout' => 10000 // Waktu tampil alert dalam ms
])

@php
    $alertClasses = match ($type) {
        'success' => 'border-green-300 text-green-800 bg-green-50 dark:bg-gray-800 dark:text-green-400',
        'warning' => 'border-yellow-300 text-yellow-800 bg-yellow-50 dark:bg-gray-800 dark:text-yellow-400',
        'info' => 'border-blue-300 text-blue-800 bg-blue-50 dark:bg-gray-800 dark:text-blue-400',
        default => 'border-red-300 text-red-800 bg-red-50 dark:bg-gray-800 dark:text-red-400'
    };
    $iconPath = match ($type) {
        'success' => 'M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z',
        'warning' => 'M5 8a5 5 0 1 0 10 0A5 5 0 0 0 5 8Z',
        'info' => 'M4.75 8a1 1 0 0 0 2 0 1 1 0 0 0-2 0Z',
        default => 'M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z'
    };
@endphp

@if($message)
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, {{ $timeout }})" x-show="show" class="col-span-full mx-4 mt-2 mb-2 p-4 flex items-center border rounded-lg {{ $alertClasses }}" role="alert">
        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="{{ $iconPath }}" />
        </svg>
        <span class="sr-only">{{ ucfirst($type) }}</span>
        <div class="ms-3 text-sm font-medium">
            <span class="font-medium">{{ ucfirst($type) }}!</span> {{ $message }}
        </div>
        <button type="button" class="ms-auto -mx-1.5 -my-1.5 rounded-lg focus:ring-2 p-1.5 hover:bg-opacity-80 inline-flex items-center justify-center h-8 w-8 dark:hover:bg-opacity-80" aria-label="Close" @click="show = false">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
        </button>
    </div>
@endif



{{-- Cara Pemanggilan --}}
{{-- 
<x-alert type="success" message="Data berhasil disimpan!" timeout="5000" />
<x-alert type="error" message="Terjadi kesalahan pada sistem." />
<x-alert type="warning" message="Perhatian! Ada informasi penting yang perlu Anda cek." timeout="7000" />
<x-alert type="info" message="Silakan cek email untuk verifikasi akun Anda." /> 
--}}
