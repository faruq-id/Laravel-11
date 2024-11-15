<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="img/logo.png" type="image/x-icon" />
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>{{ $title }}</title>
</head>
<body class="h-full bg-gray-50 dark:bg-gray-900 antialiased">
    <divc class="root">
        <x-dashboard-header></x-dashboard-header>

        <div class="flex items-start pt-16">
            <x-dashboard-nav></x-dashboard-nav>
            {{-- <x-dashboard-main></x-dashboard-main> --}}
            <div class="overflow-y-auto relative w-full h-full bg-gray-50 dark:bg-gray-900 lg:ml-64">
                {{ $slot }}
                <x-dashboard-footer></x-dashboard-footer>
            </div>
            
        </div>
    </div>

</body>
</html>