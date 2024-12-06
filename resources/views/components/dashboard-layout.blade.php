<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="/img/logo.png" type="image/x-icon" />
    @vite(['resources/css/app.css', 'resources/css/customs.css'])
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <!-- Import Map -->
    <script type="importmap">
        {
            "imports": {
                "https://esm.sh/v135/prosemirror-model@1.22.3/es2022/prosemirror-model.mjs": "https://esm.sh/v135/prosemirror-model@1.19.3/es2022/prosemirror-model.mjs", 
                "https://esm.sh/v135/prosemirror-model@1.22.1/es2022/prosemirror-model.mjs": "https://esm.sh/v135/prosemirror-model@1.19.3/es2022/prosemirror-model.mjs"
            }
        }
    </script>
    <title>{{ $title }} - SIAKAD</title>
</head>
<body class="h-full bg-gray-50 dark:bg-gray-900 antialiased">
    <div class="root" x-data="{ openSidebar: false }">
        <x-dashboard-header></x-dashboard-header>
    
        <div class="flex items-start pt-16">
            {{-- Sidebar --}}
            <div x-data="{ 
                openSidebar: JSON.parse(localStorage.getItem('openSidebar')) ?? true 
            }"
            x-init="$watch('openSidebar', value => localStorage.setItem('openSidebar', JSON.stringify(value)))"
            @toggle-sidebar.window="openSidebar = !openSidebar"
            :class="!openSidebar ? 'w-64' : 'w-16'" class="lg:!block hidden pt-10 flex-shrink-0 transition-all duration-300">
                <x-dashboard-nav></x-dashboard-nav>
            </div>
    
            {{-- Konten Utama --}}
            <main class="overflow-y-auto relative w-full h-full bg-gray-50 dark:bg-gray-900">
                <div class="overflow-y-auto relative w-full h-full bg-gray-50 dark:bg-gray-900">
                    {{ $slot }}
                    <x-dashboard-footer></x-dashboard-footer>
                </div>
            </main>
        </div>
    </div>

    {{-- Tombol Back to Top --}}
    <x-backtotop></x-backtotop>

    {{-- JavaScript --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @vite(['resources/js/app.js', 'resources/js/customs.js','resources/js/editor.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>