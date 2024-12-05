<x-layout>
    <x-slot:title>{{ $title }}</x-slot>
    {{-- <h3 class="text-xl">Halaman Login</h3> --}}

    <section class="bg-gray-50 -pb-10 dark:bg-gray-900 rounded-md">
        <div class="flex flex-col items-center justify-center px-4 py-16 mx-auto {{--md:h-screen--}} lg:py-16">
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
                <div 
                    x-data="{ 
                        {{-- name: '',  --}}
                        name: '{{ old('name') }}',
                        nameValid: true, 
                        nameError: '', 
                        validateName() {
                            const nameRegex = /^[a-zA-Z\s']+$/;
                            if (!this.name) {
                                this.nameValid = false;
                                this.nameError = 'Name is required.';
                            } else if (this.name.length < 2) {
                                this.nameValid = false;
                                this.nameError = 'Name must be at least 2 characters long.';
                            } else if (!nameRegex.test(this.name)) {
                                this.nameValid = false;
                                this.nameError = 'Name can only contain letters and spaces.';
                            } else if (this.name.trimEnd() !== this.name) {
                                this.nameValid = false;
                                this.nameError = 'Name cannot end with a space.';
                            } else {
                                this.nameValid = true;
                                this.nameError = '';
                            }
                        },
                        {{-- username: '',  --}}
                        username: '{{ old('username') }}',
                        usernameValid: true, 
                        usernameError: '', 
                        validateUsername() {
                            const usernameRegex = /^[a-zA-Z0-9._]{6,}$/;
                            if (!this.username) {
                                this.usernameValid = false;
                                this.usernameError = 'Username is required.';
                            } else if (!usernameRegex.test(this.username)) {
                                this.usernameValid = false;
                                this.usernameError = 'Username must be at least 6 characters and contain only letters and numbers.';
                            } else {
                                this.usernameValid = true;
                                this.usernameError = '';
                            }
                        },
                        {{-- phone: '', --}}
                        phone: '{{ old('phone_number') }}',
                        phoneValid: true,
                        phoneError: '',
                        validatePhone() {
                            const phoneRegex = /^[0-9]{10,15}$/;
                            if (!this.phone) {
                                this.phoneValid = false;
                                this.phoneError = 'Phone number is required.';
                            } else if (!phoneRegex.test(this.phone)) {
                                this.phoneValid = false;
                                this.phoneError = 'Phone number must contain only digits and be between 10 and 15 characters.';
                            } else {
                                this.phoneValid = true;
                                this.phoneError = '';
                            }
                        },
                        {{-- email: '', --}}
                        email:'{{ old('email') }}',
                        emailValid: true,
                        emailError: '',
                        password: '', 
                        validateEmail() {
                            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                            if (!this.email) {
                                this.emailValid = false;
                                this.emailError = 'Email is required.';
                            } else if (!emailRegex.test(this.email)) {
                                this.emailValid = false;
                                this.emailError = 'Invalid email format.';
                            } else {
                                this.emailValid = true;
                                this.emailError = '';
                            }
                        },
                        showPassword: false, 
                        passwordValid: true,
                        passwordError: '',
                        confirmPassword: '', 
                        showConfirmPassword: false, 
                        confirmPasswordValid: true,
                        confirmPasswordError: '',
                        validatePassword() {
                            const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;
                            if (!this.password) {
                                this.passwordValid = false;
                                this.passwordError = 'Password is required.';
                            } else if (!passwordRegex.test(this.password)) {
                                this.passwordValid = false;
                                this.passwordError = 'Password must be at least 8 characters long, contain one uppercase letter, one lowercase letter, and one number.';
                            } else {
                                this.passwordValid = true;
                                this.passwordError = '';
                            }

                            if (!this.confirmPassword) {
                                this.confirmPasswordValid = false;
                                this.confirmPasswordError = 'Confirm password is required.';
                            } else if (this.confirmPassword !== this.password) {
                                this.confirmPasswordValid = false;
                                this.confirmPasswordError = 'Passwords do not match.';
                            } else {
                                this.confirmPasswordValid = true;
                                this.confirmPasswordError = '';
                            }
                        },
                        files: null, 
                        profileValid: true, 
                        profileError: '',
                        previewUrl: null,  
                        validateProfilePicture(event) {
                            const maxFileSize = 1 * 1024 * 1024; // 1MB
                            {{-- const allowedFormats = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif']; --}}
                            const allowedFormats = ['image/jpeg', 'image/png', 'image/jpg'];

                            const file = event.target.files[0];
                            if (!file) {
                                this.profileValid = false;
                                this.profileError = 'Profile picture is required.';
                                this.files = null;
                                return;
                            }

                            if (!allowedFormats.includes(file.type)) {
                                this.profileValid = false;
                                {{-- this.profileError = 'Only JPG, JPEG, PNG, or GIF formats are allowed.'; --}}
                                this.profileError = 'Only JPG, JPEG, or PNG formats are allowed.';
                                this.files = null;
                                return;
                            }

                            if (file.size > maxFileSize) {
                                this.profileValid = false;
                                this.profileError = 'File size must not exceed 1MB.';
                                this.files = null;
                                return;
                            }

                            this.profileValid = true;
                            this.profileError = '';
                            this.files = [file];

                            // Generate preview URL
                            this.previewUrl = URL.createObjectURL(file);
                        },
                        clearImage() {
                            this.files = null;
                            this.previewUrl = null;
                        }
                    }" class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Create an account
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="{{ route('auth.register.proses') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white @error('name') !text-red-600 !dark:text-red-500 @enderror">Your name <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400 @error('name') text-red-600 dark:text-red-500 @enderror" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 13 16h-2a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 12 21Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                    </svg>
                                </div>
                                <input x-model="name" 
                                    @input="validateName" 
                                    :class="!nameValid && '!border-red-600 focus:ring-red-600 focus:border-red-600 dark:focus:ring-red-600 dark:focus:border-red-600'"
                                    type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('name') border-red-600 focus:ring-red-600 focus:border-red-600 dark:border-red-500 @enderror" placeholder="Name" required="" value="{{ old('name') }}">
                            </div>

                            {{-- Client-side Validation Error  --}}
                            <span x-show="!nameValid" class="text-red-500 text-sm" x-text="nameError"></span>
                            <x-field-error field="name" type="filed" />
                        </div>
                        
                        <div>
                            <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white @error('username') !text-red-600 !dark:text-red-500 @enderror">Your username <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400 @error('username') text-red-600 dark:text-red-500 @enderror" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M6.94318 11h-.85227l.96023-2.90909h1.07954L9.09091 11h-.85227l-.63637-2.10795h-.02272L6.94318 11Zm-.15909-1.14773h1.60227v.59093H6.78409v-.59093ZM9.37109 11V8.09091h1.25571c.2159 0 .4048.04261.5667.12784.162.08523.2879.20502.3779.35937.0899.15436.1349.33476.1349.5412 0 .20833-.0464.38873-.1392.54119-.0918.15246-.2211.26989-.3878.35229-.1657.0824-.3593.1236-.5809.1236h-.75003v-.61367h.59093c.0928 0 .1719-.0161.2372-.0483.0663-.03314.1169-.08002.152-.14062.036-.06061.054-.13211.054-.21449 0-.08334-.018-.15436-.054-.21307-.0351-.05966-.0857-.10511-.152-.13636-.0653-.0322-.1444-.0483-.2372-.0483h-.2784V11h-.78981Zm3.41481-2.90909V11h-.7898V8.09091h.7898Z"/>
                                        <path stroke="currentColor" stroke-linejoin="round" stroke-width="2" d="M8.31818 2c-.55228 0-1 .44772-1 1v.72878c-.06079.0236-.12113.04809-.18098.07346l-.55228-.53789c-.38828-.37817-1.00715-.37817-1.39543 0L3.30923 5.09564c-.19327.18824-.30229.44659-.30229.71638 0 .26979.10902.52813.30229.71637l.52844.51468c-.01982.04526-.03911.0908-.05785.13662H3c-.55228 0-1 .44771-1 1v2.58981c0 .5523.44772 1 1 1h.77982c.01873.0458.03802.0914.05783.1366l-.52847.5147c-.19327.1883-.30228.4466-.30228.7164 0 .2698.10901.5281.30228.7164l1.88026 1.8313c.38828.3781 1.00715.3781 1.39544 0l.55228-.5379c.05987.0253.12021.0498.18102.0734v.7288c0 .5523.44772 1 1 1h2.65912c.5523 0 1-.4477 1-1v-.7288c.1316-.0511.2612-.1064.3883-.1657l.5435.2614v.4339c0 .5523.4477 1 1 1H14v.0625c0 .5523.4477 1 1 1h.0909v.0625c0 .5523.4477 1 1 1h.6844l.4952.4823c1.1648 1.1345 3.0214 1.1345 4.1863 0l.2409-.2347c.1961-.191.3053-.454.3022-.7277-.0031-.2737-.1183-.5342-.3187-.7207l-6.2162-5.7847c.0173-.0398.0342-.0798.0506-.12h.7799c.5522 0 1-.4477 1-1V8.17969c0-.55229-.4478-1-1-1h-.7799c-.0187-.04583-.038-.09139-.0578-.13666l.5284-.51464c.1933-.18824.3023-.44659.3023-.71638 0-.26979-.109-.52813-.3023-.71637l-1.8803-1.8313c-.3883-.37816-1.0071-.37816-1.3954 0l-.5523.53788c-.0598-.02536-.1201-.04985-.1809-.07344V3c0-.55228-.4477-1-1-1H8.31818Z"/>
                                    </svg>
                                      
                                </div>
                                <input 
                                    x-model="username" 
                                    @input="validateUsername" 
                                    :class="!usernameValid && '!border-red-600 focus:ring-red-600 focus:border-red-600 dark:focus:ring-red-600 dark:focus:border-red-600'" 
                                    type="text" name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('username') border-red-600 focus:ring-red-600 focus:border-red-600 dark:border-red-500 @enderror" placeholder="Username" required="">
                            </div>

                            {{-- Client-side Validation --}}
                            <span x-show="!usernameValid" class="text-red-500 text-sm" x-text="usernameError"></span>
                            {{-- Server-side Validation Error --}}
                            <x-field-error field="username" type="filed" />
                        </div>

                        <div>
                            <label for="phone_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white @error('phone_number') !text-red-600 !dark:text-red-500 @enderror">Phone number <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                   <svg class="w-4 h-4 text-gray-500 dark:text-gray-400 @error('phone_number') text-red-600 dark:text-red-500 @enderror" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 19 18">
                                        <path d="M18 13.446a3.02 3.02 0 0 0-.946-1.985l-1.4-1.4a3.054 3.054 0 0 0-4.218 0l-.7.7a.983.983 0 0 1-1.39 0l-2.1-2.1a.983.983 0 0 1 0-1.389l.7-.7a2.98 2.98 0 0 0 0-4.217l-1.4-1.4a2.824 2.824 0 0 0-4.218 0c-3.619 3.619-3 8.229 1.752 12.979C6.785 16.639 9.45 18 11.912 18a7.175 7.175 0 0 0 5.139-2.325A2.9 2.9 0 0 0 18 13.446Z"/>
                                    </svg>
                                </div>
                                <input x-model="phone" 
                                    @input="validatePhone" 
                                    :class="!phoneValid && '!border-red-600 focus:ring-red-600 focus:border-red-600 dark:focus:ring-red-600 dark:focus:border-red-600'" 
                                    type="tel" name="phone_number" id="phone_number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('phone_number') border-red-600 focus:ring-red-600 focus:border-red-600 dark:border-red-500 @enderror" placeholder="Phone number" required="">
                            </div>
                            
                            <span x-show="!phoneValid" class="text-red-500 text-sm" x-text="phoneError"></span>
                            <x-field-error field="phone_number" type="filed" />
                        </div>
                        
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white @error('email') !text-red-600 !dark:text-red-500 @enderror">Your email <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400 @error('email') text-red-600 dark:text-red-500 @enderror" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m3.5 5.5 7.893 6.036a1 1 0 0 0 1.214 0L20.5 5.5M4 19h16a1 1 0 0 0 1-1V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Z"/>
                                    </svg>
                                </div>
                                <input x-model="email" 
                                    @input="validateEmail" 
                                    :class="!emailValid && '!border-red-600 focus:ring-red-600 focus:border-red-600 dark:focus:ring-red-600 dark:focus:border-red-600'" 
                                    type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('email') border-red-600 focus:ring-red-600 focus:border-red-600  dark:border-red-500 @enderror" placeholder="name@company.com" required="">
                            </div>
                            
                            <span x-show="!emailValid" class="text-red-500 text-sm" x-text="emailError"></span>
                            <x-field-error field="email" type="filed" />
                        </div>

                        <div>
                            {{-- Password Input --}}
                            <div class="mb-4">
                                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white @error('password') !text-red-600 !dark:text-red-500 @enderror">Password <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400 @error('password') text-red-600 dark:text-red-500 @enderror" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a28.076 28.076 0 0 1-1.091 9M7.231 4.37a8.994 8.994 0 0 1 12.88 3.73M2.958 15S3 14.577 3 12a8.949 8.949 0 0 1 1.735-5.307m12.84 3.088A5.98 5.98 0 0 1 18 12a30 30 0 0 1-.464 6.232M6 12a6 6 0 0 1 9.352-4.974M4 21a5.964 5.964 0 0 1 1.01-3.328 5.15 5.15 0 0 0 .786-1.926m8.66 2.486a13.96 13.96 0 0 1-.962 2.683M7.5 19.336C9 17.092 9 14.845 9 12a3 3 0 1 1 6 0c0 .749 0 1.521-.031 2.311M12 12c0 3 0 6-2 9"/>
                                        </svg>
                                    </div>
                                    <input :type="showPassword ? 'text' : 'password'" id="password" 
                                            x-model="password" 
                                            @input="validatePassword" 
                                            :class="!passwordValid && '!border-red-600 focus:ring-red-600 focus:border-red-600 dark:focus:ring-red-600 dark:focus:border-red-600'" 
                                            type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('password') border-red-600 focus:ring-red-600 focus:border-red-600  dark:border-red-500 @enderror" required=""/>
                                    <span type="button" @click="showPassword = !showPassword" class="absolute cursor-pointer inset-y-0 right-0 flex items-center px-3 text-gray-600 dark:text-gray-400">
                                        <template x-if="showPassword">
                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </template>
                                        <template x-if="!showPassword">
                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                            </svg>
                                        </template>
                                    </span>
                                </div>
                                {{--  Client-side Validation Error  --}}
                                <span x-show="!passwordValid" class="text-red-500 text-sm" x-text="passwordError"></span>
                                {{-- Server-side Validation Error --}}
                                <x-field-error field="password" type="filed" />
                            </div>
                        
                            {{-- Confirm Password Input --}}
                            <div>
                                <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white @error('password_confirmation') !text-red-600 !dark:text-red-500 @enderror">Confirm password <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400 @error('password') text-red-600 dark:text-red-500 @enderror" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a28.076 28.076 0 0 1-1.091 9M7.231 4.37a8.994 8.994 0 0 1 12.88 3.73M2.958 15S3 14.577 3 12a8.949 8.949 0 0 1 1.735-5.307m12.84 3.088A5.98 5.98 0 0 1 18 12a30 30 0 0 1-.464 6.232M6 12a6 6 0 0 1 9.352-4.974M4 21a5.964 5.964 0 0 1 1.01-3.328 5.15 5.15 0 0 0 .786-1.926m8.66 2.486a13.96 13.96 0 0 1-.962 2.683M7.5 19.336C9 17.092 9 14.845 9 12a3 3 0 1 1 6 0c0 .749 0 1.521-.031 2.311M12 12c0 3 0 6-2 9"/>
                                        </svg>
                                    </div>
                                    <input :type="showConfirmPassword ? 'text' : 'password'" id="password_confirmation" 
                                            x-model="confirmPassword" 
                                            @input="validatePassword" 
                                            :class="!confirmPasswordValid && '!border-red-600 focus:ring-red-600 focus:border-red-600 dark:focus:ring-red-600 dark:focus:border-red-600'" 
                                            type="password" name="password_confirmation" id="password_confirmation" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('password_confirmation') border-red-600 focus:ring-red-600 focus:border-red-600  dark:border-red-500 @enderror" required/>
                                    <span type="button" @click="showConfirmPassword = !showConfirmPassword" class="absolute cursor-pointer inset-y-0 right-0 flex items-center px-3 text-gray-600 dark:text-gray-400">
                                        <template x-if="showPassword">
                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </template>
                                        <template x-if="!showPassword">
                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                            </svg>
                                        </template>
                                    </span>
                                </div>
                                {{--  Client-side Validation Error  --}}
                                <span x-show="!confirmPasswordValid" class="text-red-500 text-sm" x-text="confirmPasswordError"></span>
                                {{-- Server-side Validation Error --}}
                                <x-field-error field="password_confirmation" type="filed" />
                            </div>
                        </div>
                        
                        <div class="w-full sm:flex-1 mt-3 sm:mt-0">
                            <label class="w-full flex flex-wrap items-center mt-1 px-3 py-3 bg-white dark:text-gray-400
                                dark:bg-gray-700 rounded-md shadow-md border border-gray-300
                                dark:border-gray-600 cursor-pointer hover:bg-gray-600 dark:hover:bg-black
                                hover:text-white text-gray-600 ease-linear transition-all duration-150">

                                {{-- Icon dan Detail --}}
                                <div class="flex-1 flex items-center space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <div class="flex flex-col">
                                        <span class="text-sm leading-normal">Search for images <span class="text-red-500">*</span></span>
                                        <span class="text-xs">(Max Size 1MB)</span>
                                        <span x-text="files ? files.map(file => file.name).join(', ') : 'No file selected...'" class="text-xs max-w-[12rem] truncate"></span>
                                    </div>
                                </div>

                                {{-- Preview Image --}}
                                <template x-if="previewUrl">
                                    <div class="ml-4 flex flex-col items-center relative">
                                        {{-- Clear Button --}}
                                        <button type="button" x-on:click="clearImage" class="absolute top-0 left-1/2 -translate-x-1/2 z-10 bg-white text-red-500 text-xs px-1.5 rounded-full shadow-md hover:bg-red-500 hover:text-white">
                                            x
                                        </button>
                                        <img :src="previewUrl" alt="Profile Preview" class="w-12 h-12 object-cover rounded-md shadow-md border border-gray-300" />
                                    </div>
                                </template>
                        
                                <input type="file" accept="image/*" name="profile_picture" class="hidden" x-on:change="validateProfilePicture($event)" required />
                            </label>
                        
                            {{-- Error Message --}}
                            <template x-if="!profileValid">
                                <p class="text-red-500 text-sm mt-1" x-text="profileError"></p>
                            </template>

                            <x-field-error field="profile_picture" type="filed" />
                        </div>

                        {{-- <div>
                            <label for="profile_picture" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white @error('profile_picture') text-red-600 dark:text-red-500 @enderror">Profile picture</label>
                            <div class="relative">
                                <input type="file" accept="image/*" name="profile_picture" required class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 @error('profile_picture') border-red-600 focus:ring-red-600 focus:border-red-600  dark:border-red-500 @enderror">
                            </div>

                            <x-field-error field="profile_picture" type="filed" />
                        </div> --}}

                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                              <input id="terms" name="terms" aria-describedby="terms" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800" required="">
                            </div>
                            <div class="ml-3 text-sm">
                              <label for="terms" class="font-light text-gray-500 dark:text-gray-300">I accept the <a class="font-medium text-primary-600 hover:underline dark:text-primary-500" href="#">Terms and Conditions</a></label>
                            </div>
                        </div>
                        <button 
                            :disabled="!nameValid || !usernameValid || !phoneValid || !emailValid || !passwordValid || !confirmPasswordValid || !profileValid" 
                            type="submit" class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 disabled:!bg-gray-400 disabled:!cursor-not-allowed">Create an account</button>
                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            Already have an account? 
                            <a href="{{ route('auth.login') }}" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Login here</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-layout>