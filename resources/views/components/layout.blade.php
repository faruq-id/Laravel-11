<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="/img/logo.png" type="image/x-icon" />
    @vite(['resources/css/app.css', 'resources/css/customs.css'])
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    {{-- <title>@yield('title', 'SIAKAD')</title> --}}
    <title>{{ $title ?? 'Default Title' }}</title>
</head>
<body class="h-full">
   {{-- <!--
   This example requires updating your template:

   ```
   <html class="h-full bg-gray-100">
   <body class="h-full">
   ```
   --> --}}
   <div class="min-h-full  bg-white dark:bg-gray-900">
      <x-navbar></x-navbar>

      @if (!Request::is('/'))
         {{-- <x-header>{{ $title }}</x-header> --}}
      @endif

      @if (Request::is('/'))
         <x-banner></x-banner>
      @endif

      <main>
         {{-- <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8"> --}}
         <div class="w-full mx-auto {{-- py-6 --}}">
               {{ $slot }}
         </div>
      </main>
   </div>

   <x-footer></x-footer>

   <x-contact-form></x-contact-form>

   {{-- Tombol Back to Top --}}
   <x-backtotop></x-backtotop>

   {{-- JavaScript --}}
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   @vite(['resources/js/app.js', 'resources/js/customs.js'])
   <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>