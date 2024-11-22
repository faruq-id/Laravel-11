<nav 
x-data="{ scrolled: false, isOpen: false }" 
x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 100 })"
:class="scrolled ? 'bg-white shadow-md dark:bg-gray-900 border-b border-gray-200 dark:border-gray-700' : 'bg-transparent'"
class="sticky top-0 z-40 flex-none mx-auto w-full fixed left-0 py-2" x-data="{ isOpen: false }">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="/img/logo.png" class="h-8" alt="{{ $appName }}" />
                    <span class="self-center text-gray-900 text-2xl font-semibold whitespace-nowrap dark:text-white">SIAKAD</span>
                </a>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        <x-nav-link href="{{ route('home.home') }}" :active="request()->is('/')">Home</x-nav-link>
                        <x-nav-link href="{{ route('home.about') }}" :active="request()->is('about')">About</x-nav-link>
                        <x-nav-link href="{{ route('home.services') }}" :active="request()->is('services')">Service</x-nav-link>
                        <x-nav-link href="{{ route('blog.index') }}" :active="request()->is('blog')">Blog</x-nav-link>
                        <x-nav-link href="{{ route('home.contact') }}" :active="request()->is('contact')">Contact</x-nav-link>
                    </div>
                </div>
            </div>

            <div class="hidden md:block">
                <div class="ml-4 flex items-center md:ml-6">
                    {{-- Search --}}
                    <div class="relative hidden md:block mr-3">
                        <form action="{{ route('blog.index') }}">
                            @if(request('category')) 
                            <input type="hidden" name="category" value="{{ request('category') }}">
                            @endif
            
                            @if(request('author')) 
                            <input type="hidden" name="author" value="{{ request('author') }}">
                            @endif
            
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                </svg>
                                <span class="sr-only">Search icon</span>
                            </div>
                            <input type="search" id="search" name="search" required="" value="{{ request('search') }}" placeholder="Search for posts" class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search...">
                        </form>
                    </div>
                    {{-- Search --}}

                    {{-- Phone Number --}}
                    <div class="flex items-center space-x-6 mr-6 rtl:space-x-reverse">
                        <a href="tel:5541251234" class="flex text-sm  text-gray-900 dark:text-white hover:underline hover:text-blue-500">
                            <svg class="w-6 h-6 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M7.978 4a2.553 2.553 0 0 0-1.926.877C4.233 6.7 3.699 8.751 4.153 10.814c.44 1.995 1.778 3.893 3.456 5.572 1.68 1.679 3.577 3.018 5.57 3.459 2.062.456 4.115-.073 5.94-1.885a2.556 2.556 0 0 0 .001-3.861l-1.21-1.21a2.689 2.689 0 0 0-3.802 0l-.617.618a.806.806 0 0 1-1.14 0l-1.854-1.855a.807.807 0 0 1 0-1.14l.618-.62a2.692 2.692 0 0 0 0-3.803l-1.21-1.211A2.555 2.555 0 0 0 7.978 4Z"/>
                            </svg> (0000)123-4567
                        </a>
                    </div>
                    {{-- Phone Number --}}

                    {{-- Dark Mode --}}
                    <div x-data="{ isDark: localStorage.getItem('theme') === 'dark' }" x-init="$watch('isDark', value => localStorage.setItem('theme', value ? 'dark' : 'light'))" :class="{ 'dark': isDark }">
                        <div class="flex items-center space-x-2 rtl:space-x-reverse mr-2">
                            <button @click="isDark = !isDark" class="costume-dark-mode px-4 py-2.5 text-gray-800 hover:bg-blue-800 hover:text-white rounded-lg dark:text-white focus:ring-2 focus:ring-blue-300">
                                
                                <!-- Ikon Matahari (untuk mode terang) -->
                                <svg x-show="isDark" x-cloak class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 15a5 5 0 1 0 0-10 5 5 0 0 0 0 10Zm0-11a1 1 0 0 0 1-1V1a1 1 0 0 0-2 0v2a1 1 0 0 0 1 1Zm0 12a1 1 0 0 0-1 1v2a1 1 0 1 0 2 0v-2a1 1 0 0 0-1-1ZM4.343 5.757a1 1 0 0 0 1.414-1.414L4.343 2.929a1 1 0 0 0-1.414 1.414l1.414 1.414Zm11.314 8.486a1 1 0 0 0-1.414 1.414l1.414 1.414a1 1 0 0 0 1.414-1.414l-1.414-1.414ZM4 10a1 1 0 0 0-1-1H1a1 1 0 0 0 0 2h2a1 1 0 0 0 1-1Zm15-1h-2a1 1 0 1 0 0 2h2a1 1 0 0 0 0-2ZM4.343 14.243l-1.414 1.414a1 1 0 1 0 1.414 1.414l1.414-1.414a1 1 0 0 0-1.414-1.414ZM14.95 6.05a1 1 0 0 0 .707-.293l1.414-1.414a1 1 0 1 0-1.414-1.414l-1.414 1.414a1 1 0 0 0 .707 1.707Z"></path>
                                </svg>
                    
                                <!-- Ikon Bulan (untuk mode gelap) -->
                                <svg x-show="!isDark" x-cloak class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                    <path d="M17.8 13.75a1 1 0 0 0-.859-.5A7.488 7.488 0 0 1 10.52 2a1 1 0 0 0 0-.969A1.035 1.035 0 0 0 9.687.5h-.113a9.5 9.5 0 1 0 8.222 14.247 1 1 0 0 0 .004-.997Z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>

                    {{-- Nav Right --}}
                    @auth
                        <button type="button" class="relative px-3.5 py-2 rounded-lg text-gray-900 hover:bg-blue-800 hover:text-white dark:text-white dark:hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-blue-300">
                            <span class="absolute -inset-1.5"></span>
                            <span class="sr-only">View notifications</span>
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                                </svg>
                        </button>
    
                        <!-- Profile dropdown -->
                        <div class="relative ml-3" x-data="{ isOpen: false }" @click.away="isOpen = false">
                            <div>
                                <button type="button" title="{{ auth()->user()->name }}"  @click="isOpen = !isOpen" class="relative space-x-3 flex py-1 pr-2 max-w-xs items-center rounded-full bg-gray-100 dark:bg-gray-800 text-sm focus:outline-none hover:bg-blue-500 hover:text-white dark:text-white focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                    <span class="absolute -inset-1.5"></span>
                                    <span class="sr-only">Open user menu</span>
                                    <span class="font-medium text-sm max-w-[18rem] truncate">
                                        {{ auth()->user()->name }}
                                    </span>
                                    {{-- <img class="h-8 w-8 rounded-full" src="{{ auth()->user()->profile_picture ? asset('storage/users/' . auth()->user()->profile_picture) : asset('/img/user.jpeg') }}" alt="{{ auth()->user()->name }}"> --}}
                                    <img class="h-8 w-8 rounded-full" src="{{ imagesView(auth()->user()->profile_picture, null) }}" alt="{{ auth()->user()->name }}">
                                    
                                    
                                </button>
                            </div>
                            <div x-show="isOpen"
                                x-transition:enter="transition ease-out duration-100 transform"
                                x-transition:enter-start="opacity-0 scale-95"
                                x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-75 transform"
                                x-transition:leave-start="opacity-100 scale-100"
                                x-transition:leave-end="opacity-0 scale-95" class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none dark:bg-gray-700" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                                <!-- Active: "bg-gray-100 outline-none", Not Active: "" -->
                                <div class="py-3 px-4 border-b border-gray-200">
                                    <span class="block text-sm font-semibold text-gray-900 dark:text-white">{{ auth()->user()->name }}</span>
                                    <span class="block text-sm text-gray-500 truncate dark:text-gray-400">{{ auth()->user()->email }}</span>
                                </div>
                                <a href="{{ route('admin.profile.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:text-primary-700 dark:text-gray-300 dark:hover:text-blue-500" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
                                <a href="{{ route('admin.dashboard.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:text-primary-700 dark:text-gray-300 dark:hover:text-blue-500" role="menuitem" tabindex="-1" id="user-menu-item-0">Dashboard</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:text-primary-700 dark:text-gray-300 dark:hover:text-blue-500" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>
                                <form action="{{ route('auth.logout') }}" method="POST" class="block px-4 py-2 text-sm text-gray-700 mt-2 border-t border-gray-200 hover:text-primary-700 dark:text-white dark:hover:text-blue-500">
                                    @csrf
                                    <button>Sign out</button>
                                </form>
                            </div>
                        </div>
                    @else
                        <x-nav-link class="text-gray-300 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 hover:text-white rounded-md  px-3 py-2 text-sm font-medium items-center inline-flex" href="{{ route('auth.login') }}" :active="request()->is('/login')">
                            Login <svg class="hidden w-3 h-3 ml-2 xl:inline" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"></path>
                            </svg>
                        </x-nav-link>
                    @endauth
                    {{-- Nav Right --}}
                    
                </div>
            </div>

            <div class="flex md:hidden">
                {{-- Dark Mode --}}
                <div x-data="{ isDark: localStorage.getItem('theme') === 'dark' }" x-init="$watch('isDark', value => localStorage.setItem('theme', value ? 'dark' : 'light'))" :class="{ 'dark': isDark }">
                    <div class="flex items-center space-x-2 rtl:space-x-reverse ">
                        <button @click="isDark = !isDark" class="costume-dark-mode mr-2 px-4 py-2.5 text-gray-800 hover:bg-blue-500 hover:text-white rounded-lg dark:text-gray-800 dark:bg-gray-200 focus:ring-2 focus:ring-blue-300">
                            
                            <!-- Ikon Matahari (untuk mode terang) -->
                            <svg x-show="isDark" x-cloak class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 15a5 5 0 1 0 0-10 5 5 0 0 0 0 10Zm0-11a1 1 0 0 0 1-1V1a1 1 0 0 0-2 0v2a1 1 0 0 0 1 1Zm0 12a1 1 0 0 0-1 1v2a1 1 0 1 0 2 0v-2a1 1 0 0 0-1-1ZM4.343 5.757a1 1 0 0 0 1.414-1.414L4.343 2.929a1 1 0 0 0-1.414 1.414l1.414 1.414Zm11.314 8.486a1 1 0 0 0-1.414 1.414l1.414 1.414a1 1 0 0 0 1.414-1.414l-1.414-1.414ZM4 10a1 1 0 0 0-1-1H1a1 1 0 0 0 0 2h2a1 1 0 0 0 1-1Zm15-1h-2a1 1 0 1 0 0 2h2a1 1 0 0 0 0-2ZM4.343 14.243l-1.414 1.414a1 1 0 1 0 1.414 1.414l1.414-1.414a1 1 0 0 0-1.414-1.414ZM14.95 6.05a1 1 0 0 0 .707-.293l1.414-1.414a1 1 0 1 0-1.414-1.414l-1.414 1.414a1 1 0 0 0 .707 1.707Z"></path>
                            </svg>
                
                            <!-- Ikon Bulan (untuk mode gelap) -->
                            <svg x-show="!isDark" x-cloak class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                <path d="M17.8 13.75a1 1 0 0 0-.859-.5A7.488 7.488 0 0 1 10.52 2a1 1 0 0 0 0-.969A1.035 1.035 0 0 0 9.687.5h-.113a9.5 9.5 0 1 0 8.222 14.247 1 1 0 0 0 .004-.997Z"></path>
                            </svg>
                        </button>
                    </div>
                </div>


                {{-- Mobile menu button --}}
                <button type="button" @click="isOpen = !isOpen"  aria-controls="mobile-menu" aria-expanded="false" class="relative inline-flex p-2 items-center justify-center rounded-md bg-primary-500 text-gray-100 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open main menu</span>
                    <!-- Menu open: "hidden", Menu closed: "block" -->
                    <svg :class="{'hidden': isOpen, 'block': !isOpen }" class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <!-- Menu open: "block", Menu closed: "hidden" -->
                    <svg :class="{'block': isOpen, 'hidden': !isOpen }" class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div x-show="isOpen" 
                @click.away="isOpen = false" 
                x-cloak
                x-transition:enter="transition ease-out duration-200 transform"
                x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-150 transform"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95" 
                class="md:hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <x-nav-link href="{{ route('home.home') }}" :active="request()->is('/')">Home</x-nav-link>
            <x-nav-link href="{{ route('blog.index') }}" :active="request()->is('posts')">Blog</x-nav-link>
            <x-nav-link href="{{ route('home.services') }}" :active="request()->is('services')">Services</x-nav-link>
            <x-nav-link href="{{ route('home.about') }}" :active="request()->is('about')">About</x-nav-link>
            <x-nav-link href="{{ route('home.contact') }}" :active="request()->is('contact')">Contact</x-nav-link>
        </div>
        @auth
            <div class="border-t border-gray-700 pb-3 pt-4">
                <div class="flex items-center px-5">
                    <div class="shrink-0">
                        {{-- <img class="h-10 w-10 rounded-full" src="{{ auth()->user()->profile_picture ? asset('storage/users/' . auth()->user()->profile_picture) : asset('/img/user.jpeg') }}" alt="{{ auth()->user()->name }}"> --}}
                        <img class="h-10 w-10 rounded-full" src="{{ imagesView(auth()->user()->profile_picture, null) }}" alt="{{ auth()->user()->name }}">
                    </div>
                    <div class="ml-3">
                        <div class="text-base/5 font-medium text-white">{{ auth()->user()->name }}</div>
                        <div class="text-sm font-medium text-gray-400">{{ auth()->user()->email }}</div>
                    </div>
                    <button type="button" class="relative ml-auto shrink-0 rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                        <span class="absolute -inset-1.5"></span>
                        <span class="sr-only">View notifications</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                        </svg>
                    </button>
                </div>
                <div class="mt-3 space-y-1 px-2">
                    <a href="{{ route('admin.profile.index') }}" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Your Profile</a>
                    <a href="{{ route('admin.dashboard.index') }}" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Dashboard</a>
                    <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Settings</a>
                    <form action="{{ route('auth.logout') }}" method="POST" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">
                        @csrf
                        <button>Sign out</button>
                    </form>
                </div>
            </div>
        @else
            <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
                <x-nav-link href="{{ route('auth.login') }}" :active="request()->is('/login')">
                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H8m12 0-4 4m4-4-4-4M9 4H7a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h2"/>
                    </svg> Login
                </x-nav-link>
                <x-nav-link href="{{ route('auth.login') }}" :active="request()->is('/login')">
                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12h4m-2 2v-4M4 18v-1a3 3 0 0 1 3-3h4a3 3 0 0 1 3 3v1a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1Zm8-10a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                    </svg> Register
                </x-nav-link>
            </div>
        @endauth
    </div>
</nav>