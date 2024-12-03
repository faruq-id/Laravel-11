<x-layout>
    <x-slot:title>{{ $title }}</x-slot>
    {{-- <h3 class="text-xl">Halaman Login</h3> --}}

    <section class="bg-gray-50 h-screen dark:bg-gray-900 rounded-md shadow-md">

        <div class="flex flex-col pt-10 items-center justify-center px-4 py-16 mx-auto {{--md:h-screen--}} lg:py-16">
            
            <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                <img class="w-10 h-10 mr-2" src="/img/logo.png" alt="{{ $appName }} ">
                {{ $appName }}    
            </a>

            <div class="w-full sm:max-w-md mb-2">
                <x-alert type="error" />
                <x-alert type="success" />
                <x-alert type="warning" />
                <x-alert type="info" />
            </div>
            
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Sign in to your account
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="{{ route('auth.login.proses') }}" method="POST">
                        @csrf
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email <span class="text-red-500">*</span></label>
                            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('email') border-red-600 focus:ring-red-600 focus:border-red-600 dark:border-red-500 @enderror" placeholder="name@company.com" required="" autofocus value="{{ old('email') }}">
                            
                            <x-field-error field="email" type="filed" />
                        </div>
                        <div x-data="{ show: false }">
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Password <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <input 
                                    :type="show ? 'text' : 'password'" 
                                    name="password" 
                                    id="password" 
                                    placeholder="••••••••" 
                                    class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 pr-10 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('password') border-red-600 focus:ring-red-600 focus:border-red-600 dark:border-red-500 @enderror" 
                                    required>
                                {{-- BTN Show/Hide Password --}}
                                <span type="button" @click="show = !show" class="absolute cursor-pointer inset-y-0 right-0 flex items-center px-3 text-gray-600 dark:text-gray-400">
                                    <div x-show="show" title="Hide password">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                    </div>
                                    <div x-show="!show"  title="Show password">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path>
                                        </svg>
                                    </div>
                                </span>
                            </div>

                            <x-field-error field="password" type="filed" />
                        </div>
                        
                        <div class="flex items-center justify-between">
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="remember" aria-describedby="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800" required="">
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="remember" class="text-gray-500 dark:text-gray-300">Remember me</label>
                                </div>
                            </div>
                            <a href="{{ route('auth.forgot.pasword') }}" class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">Forgot password?</a>
                        </div>
                        <button type="submit" class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Sign in to account</button>
                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            Don’t have an account yet? <a href="{{ route('auth.register') }}" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Sign up</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>

        
    </section>
    
</x-layout>