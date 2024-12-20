<div id="updateUsersModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        {{-- Modal content --}}
        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
            {{-- Modal header --}}
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Update {{ $title }} <span class="title-name"></span></h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="updateUsersModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            {{-- Modal body --}}
            <form id="editUserForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="grid gap-4 mb-4 sm:grid-cols-2">
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <input type="text" name="name" id="name" value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Name" required>
                    </div>
                    <div>
                        <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                        <input type="text" name="username" id="username" value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Username" required>
                    </div>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="email" name="email" id="email" value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Email" required>
                    </div>
                    
                    
                    <div x-data="{
                            phone: '',
                            isTouched: false,
                            maxLength: 15,
                            showTooltip: false,
                            get error() {
                                if (!this.phone && this.isTouched) return 'Phone number is required.';
                                const phoneRegex = /^[0-9]{10,15}$/;
                                if (this.phone.length > 4 && !phoneRegex.test(this.phone)) return 'Invalid phone number format.';
                                if (this.phone.length > this.maxLength) return `Phone number cannot exceed ${this.maxLength} characters.`;
                                return null;
                            },
                            get success() {
                                return this.phone.length > 4 && this.phone.length <= this.maxLength && !this.error;
                            },
                            hideTooltip() {
                                if (this.success) {
                                    this.showTooltip = false;
                                }
                            }
                        }" 
                        class="relative w-full"
                        @click.away="hideTooltip()">
                        <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone Number</label>
                    
                        <!-- Input -->
                        <input
                            type="tel"
                            name="phone"
                            id="phone"
                            x-model="phone"
                            @input="isTouched = true; showTooltip = true"
                            :maxlength="maxLength"
                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            :placeholder="error || 'Phone Number'"
                            :class="{
                                'text-gray-900 dark:text-white': phone.length <= 4 && !error && !success,
                                'border-red-500 focus:border-red-500 focus:ring-2 focus:ring-red-500 dark:border-red-500 dark:focus:border-red-500 dark:focus:ring-2 dark:focus:ring-red-500 placeholder-red-500 dark:placeholder-red-500 text-red-500 dark:text-red-500': phone.length > 4 && error,
                                'border-green-500 focus:border-green-500 focus:ring-2 focus:ring-green-500 dark:border-green-500 dark:focus:border-green-500 dark:focus:ring-2 dark:focus:ring-green-500 text-green-500 dark:text-green-500': success
                            }">
                
                        <!-- Tooltip -->
                        <div 
                            x-show="showTooltip && (phone.length > 4 && (error || success))"
                            x-cloak
                            x-transition:enter="transition opacity duration-300 ease-out"
                            x-transition:leave="transition opacity duration-300 ease-in"
                            class="absolute top-0 left-0 w-full p-2 mt-2 text-sm rounded-lg shadow-lg -translate-y-full"
                            :class="{
                                'bg-red-500 text-white': phone.length > 4 && error, 
                                'bg-green-500 text-white': phone.length > 4 && success
                            }">
                            <!-- Tooltip content -->
                            <div x-show="phone.length > 4 && error" x-text="error" class="w-full"></div>
                            <div x-show="phone.length > 4 && success" 
                                x-text="`${phone.length}/${maxLength} characters used`"
                                class="w-full"></div>
                    
                            <!-- Triangle Pointer -->
                            <div 
                                class="absolute bottom-[-6px] left-1/2 transform -translate-x-1/2 w-0 h-0"
                                :class="{
                                    'border-t-red-500': phone.length > 4 && error, 
                                    'border-t-green-500': phone.length > 4 && success
                                }"
                                style="border-left: 8px solid transparent; border-right: 8px solid transparent; border-top-width: 8px;"
                            ></div>
                        </div>
                    </div>
                
                
                    {{-- <div>
                        <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone Number</label>
                        <input type="telp" name="phone" id="phone" value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Phone Number">
                    </div> --}}
                    <div>
                        <label for="is_admin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Is Admin</label>
                        <select id="is_admin" name="is_admin" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                            <option value="">--Pilihan--</option>
                            <option value="1">Admin</option>
                            <option value="0">Guest</option>
                        </select>
                    </div>
                    <div>
                        <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                        <select id="status" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                            <option value="">--Pilihan--</option>
                            <option value="active">Active</option>
                            <option value="inactive">In Active</option>
                        </select>
                    </div>
                    <div>
                        <label for="profile_picture" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white @error('profile_picture') !text-red-600 !dark:text-red-500 @enderror">Profile Picture</label>
                        <div class="relative">
                            <input type="file" accept="image/jpeg, image/jpg, image/png" name="profile_picture" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 !dark:border-gray-600 dark:placeholder-gray-400 @error('profile_picture') border-red-600 focus:ring-red-600 focus:border-red-600  dark:border-red-500 @enderror">
                        </div>
                    </div>
                    
                    {{-- <div class="sm:col-span-2"><label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                        <textarea id="description" rows="5" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Write a description...">Standard glass, 3.8GHz 8-core 10th-generation Intel Core i7 processor, Turbo Boost up to 5.0GHz, 16GB 2666MHz DDR4 memory, Radeon Pro 5500 XT with 8GB of GDDR6 memory, 256GB SSD storage, Gigabit Ethernet, Magic Mouse 2, Magic Keyboard - US</textarea>
                    </div> --}}
                </div>
                <div class="flex items-center space-x-4">
                    <button type="submit" class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Update {{ $title }}</button>
                    {{-- <button type="button" class="text-red-600 inline-flex items-center hover:text-white border border-red-600 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                        <svg class="mr-1 -ml-1 w-5 h-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                        Delete
                    </button> --}}
                </div>
            </form>
        </div>
    </div>
</div>