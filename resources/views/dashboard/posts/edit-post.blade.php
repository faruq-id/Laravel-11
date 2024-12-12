<x-dashboard-layout>
    <x-slot:title>{{ $title }}</x-slot>
    {{-- <div class="bg-white text-xl p-4 shadow dark:bg-gray-800 sm:p-6 xl:p-8"></div> --}}
    
    <div class="grid grid-cols-1 gap-y-6 dark:bg-gray-900 xl:grid-cols-3 xl:gap-4">
        <div class="col-span-full dark:bg-gray-800 p-4">
            <div class="flex items-center justify-between">
               <!-- Title -->
               <h1 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl max-w-[18rem] truncate">
                     {{ $title }}
               </h1>
            
               <!-- Navigation -->
               <nav aria-label="Breadcrumb" class="text-right">
                     <ol class="flex items-center">
                        <li class="group flex items-center">
                           <svg stroke="currentColor" fill="none" stroke-width="0" viewBox="0 0 24 24" aria-hidden="true" class="mx-1 h-6 w-6 text-gray-400 group-first:hidden md:mx-2" data-testid="flowbite-breadcrumb-separator" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                           </svg>
                           <a class="flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white" data-testid="flowbite-breadcrumb-item" href="/dashboard">
                                 <div class="flex items-center gap-x-3">
                                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" class="text-xl" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                       <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                                    </svg>
                                    <span class="dark:text-white">Post</span>
                                 </div>
                           </a>
                        </li>
                        <li class="group flex items-center">
                           <svg stroke="currentColor" fill="none" stroke-width="0" viewBox="0 0 24 24" aria-hidden="true" class="mx-1 h-6 w-6 text-gray-400 group-first:hidden md:mx-2" data-testid="flowbite-breadcrumb-separator" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                           </svg>
                           <a class="flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white max-w-[12rem] truncate" data-testid="flowbite-breadcrumb-item" href="{{ route('admin.users.index') }}">{{ $post->title }}</a>
                        </li>
                        <li class="group flex items-center">
                           <svg stroke="currentColor" fill="none" stroke-width="0" viewBox="0 0 24 24" aria-hidden="true" class="mx-1 h-6 w-6 text-gray-400 group-first:hidden md:mx-2" data-testid="flowbite-breadcrumb-separator" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                           </svg>
                           <span class="flex items-center text-sm font-medium text-gray-500 dark:text-gray-400" data-testid="flowbite-breadcrumb-item">Edit</span>
                        </li>
                     </ol>
               </nav>
            </div>
        </div>


        <x-alert type="error" />
        <x-alert type="success" />
        <x-alert type="warning" />
        <x-alert type="info" />


        <div class="col-span-full">
            {{-- Update modal --}}
            <div class="relative px-4 w-full max-h-full">
                <div
                    x-data="{ 
                        files: null, 
                        profileValid: true, 
                        profileError: '',
                        previewUrl: '{{ $post->image ? asset("storage/" . $post->image) : "" }}',  
                        validatePostsPicture(event) {
                            const maxFileSize = 1 * 1024 * 1024; // 1MB
                            {{-- const allowedFormats = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif']; --}}
                            const allowedFormats = ['image/jpeg', 'image/png', 'image/jpg'];

                            const file = event.target.files[0];
                            if (!file) {
                                this.profileValid = false;
                                this.profileError = 'Profile picture is required.';
                                this.files = null;
                                this.previewUrl = null; // Reset preview
                                return;
                            }

                            if (!allowedFormats.includes(file.type)) {
                                this.profileValid = false;
                                {{-- this.profileError = 'Only JPG, JPEG, PNG, or GIF formats are allowed.'; --}}
                                this.profileError = 'Only JPG, JPEG, or PNG formats are allowed.';
                                this.files = null;
                                this.previewUrl = null; // Reset preview
                                return;
                            }

                            if (file.size > maxFileSize) {
                                this.profileValid = false;
                                this.profileError = 'File size must not exceed 1MB.';
                                this.files = null;
                                this.previewUrl = null; // Reset preview
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
                    }"
                    class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                    {{-- Modal header --}}
                    <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $title }}</h3>
                        <a href="{{ route('admin.posts.index') }}" class="text-gray-400 pr-3 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 19-7-7 7-7"/>
                              </svg> Back
                            <span class="sr-only">Back</span>
                        </a>
                    </div>
                    <form action="{{ route('admin.posts.update', Crypt::encrypt($post->id)) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-[74%,26%] gap-4">
                            <div class="gap-4 mb-4 max-w-6xl sm:grid-cols-2">
                                <div class="sm:col-span-2 mb-4">
                                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                                    <input type="text" name="title" id="title" value="{{ $post->title }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Title">
                                </div>

                                {{-- TEXTAREA / TEXT EDITOR --}}
                                <textarea id="editor" name="body" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">{{ $post->body }}</textarea>
                            </div>

                            <div class="xs:grid mb-4 h-auto max-w-4xl xl:mr-4 sm:grid-cols-2">
                                <div class="sm:col-span-2 mb-3">
                                    <label for="slug" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Slug</label>
                                    <input type="text" name="slug" id="slug" value="{{ $post->slug }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:read-only:bg-gray-800 read-only:bg-gray-200 read-only:cursor-not-allowed" placeholder="Slug" readonly>
                                    <input type="hidden" name="author_id" id="author_id" value="{{ Crypt::encrypt($post->author_id) }}" readonly>
                                </div>

                                <div class="sm:col-span-2 mb-3">
                                    <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                                    <select id="category" name="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        <option value="">-- Select Category --</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" 
                                                {{ $post->category_id == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="sm:col-span-2 mb-3">
                                    <label for="keywords" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keywords</label>
                                    <input type="text" name="keywords" id="keywords" value="{{ $post->keywords }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Title">
                                </div>

                                <div class="sm:col-span-2 mb-3">
                                    <label for="metadesc" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Metadesc</label>
                                    <textarea id="metadesc" name="metadesc" rows="5" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Description">{{ $post->metadesc }}</textarea>
                                </div>

                                <div x-show="true"
                                    class="relative flex items-center justify-center w-full my-4 h-64 border-2 bg-cover bg-center border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600"
                                    x-bind:style="'background-image: url(' + (previewUrl ? previewUrl : '') + '); ' + (!previewUrl ? '' : '');">
                                    <template x-if="previewUrl">
                                        <button 
                                            type="button" 
                                            x-on:click="clearImage" 
                                            class="absolute top-2 right-2 z-10 bg-white text-red-500 text-xs px-2 py-1 rounded-full shadow-md hover:bg-red-500 hover:text-white">
                                            ✕
                                        </button>
                                    </template>

                                    <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 text-center">
                                        <template x-if="!previewUrl">
                                            <div class="flex flex-col items-center justify-center">
                                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                                </svg>
                                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                                <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG or JPEG (MAX. 800x400px)</p>
                                                <span class="text-xs text-gray-500 dark:text-gray-400">(Max Size 1MB)</span>  
                                            </div>
                                        </template>

                                        {{-- Error Message --}}
                                        <template x-if="!profileValid">
                                            <p class="text-red-500 text-sm mt-4" x-text="profileError"></p>
                                        </template>

                                        <input id="dropzone-file" type="file" name="image" x-on:change="validatePostsPicture($event)" class="hidden" />
                                    </label>
                                </div>

                                <div class="sm:col-span-2 mb-3">
                                    <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Publication</label>
                                    <input datepicker id="default-datepicker" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
                                </div>

                                <div class="sm:col-span-2 mb-3">
                                    <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                                    <select id="status" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        <option>-- Select Status --</option>
                                        <option value="{{ 1 }}" {{ 1 == $post->status ? 'selected' : '' }}>Active</option>
                                        <option value="{{ 0 }}" {{ 0 == $post->status ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>

                                <div class="flex items-center space-x-4 mt-4">
                                    <button type="submit" class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">{{ $title }}</button>
                                    <button type="submit" class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Draft</button>
                                    <button type="button" class="text-red-600 inline-flex items-center hover:text-white border border-red-600 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                                        <svg class="mr-1 -ml-1 w-5 h-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                        </svg>
                                        Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
 