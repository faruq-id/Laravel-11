<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="img/logo.png" type="image/x-icon" />
    @vite(['resources/css/app.css', 'resources/css/customs.css'])
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <title>{{ $title }}</title>
</head>
<body class="h-full">
   {{-- <!--
   This example requires updating your template:

   ```
   <html class="h-full bg-gray-100">
   <body class="h-full">
   ```
   --> --}}
   <div class="min-h-full  bg-gray-100 dark:bg-gray-900">
      <x-navbar></x-navbar>

      @if (!Request::is('/'))
         <x-header>{{ $title }}</x-header>
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
   <button title="Back to top" id="backToTopBtn" class="fixed bottom-5 right-5 p-3 px-4 bg-blue-600 text-white h-11 w-11 rounded-full shadow-lg hover:bg-blue-700 focus:outline-none hidden">
      ↑ 
   </button>

   {{-- JavaScript --}}
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   @vite(['resources/js/app.js', 'resources/js/customs.js'])
   <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>