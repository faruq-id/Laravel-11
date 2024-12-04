<x-layout>
   <x-slot:title>{{ $title }}</x-slot>

   <section class="bg-gray-50 h-screen dark:bg-gray-900 rounded-md shadow-md">
      <div class="flex flex-col pt-10 items-center justify-center px-4 py-16 mx-auto {{--md:h-screen--}} lg:py-16">
         <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
            <img class="w-10 h-10 mr-2" src="/img/logo.png" alt="{{ $appName }} ">
            {{ $appName }}    
        </a>

         <div class="w-full sm:max-w-screen-sm mb-2">
            <x-alert type="error" />
            <x-alert type="success" />
            <x-alert type="warning" />
            <x-alert type="info" />
         </div>
         
         <div class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-screen-sm xl:p-0 dark:bg-gray-800">
            
            <div class="p-6 w-full sm:p-8 md:p-16">
               <h1 class="mb-3 text-2xl font-bold text-gray-900 lg:text-3xl dark:text-white">Forgot your password?</h1>
               <p class="text-base font-normal text-gray-500 dark:text-gray-400">Enter your email and we'll send you a reset link.</p>
               <form class="mt-8" action="{{ route('auth.forgot.pasword.verify') }}" method="POST">
                  @csrf
                  {{-- @method('POST') --}}
                  <div class="mb-6">
                     <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white @error('email') !text-red-600 !dark:text-red-500 @enderror">Your email</label>
                     <input id="email" type="email" name="email" placeholder="name@company.com" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block dark:bg-gray-700 dark:border-gray-600 dark:placeholder:text-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 w-full p-2.5 @error('email') border-red-600 focus:ring-red-600 focus:border-red-600  dark:border-red-500 @enderror" value="{{ old('email') }}" required>
                     
                     <x-field-error field="email" type="filed" />
                  </div>
                  <div class="mb-6">
                     <div>
                        <div class="grecaptcha-badge" data-style="none" style="width: 256px; height: 60px; position: fixed; visibility: hidden;">
                           <div class="grecaptcha-logo">
                              <iframe title="reCAPTCHA" width="256" height="60" role="presentation" name="a-vkz8af17h6xc" frameborder="0" scrolling="no" sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox allow-storage-access-by-user-activation" src="https://www.google.com/recaptcha/api2/anchor?ar=1&amp;k=6LcKn58eAAAAAFD-lFXQHCSkdJ9V76lq3KLyNygU&amp;co=aHR0cHM6Ly9mbG93Yml0ZS5jb206NDQz&amp;hl=id&amp;type=image&amp;v=-ZG7BC9TxCVEbzIO2m429usb&amp;theme=light&amp;size=invisible&amp;badge=bottomright&amp;cb=m9yttnrjczar"></iframe>
                           </div>
                           <div class="grecaptcha-error"></div>
                           <textarea id="g-recaptcha-response-1" name="g-recaptcha-response" class="g-recaptcha-response" style="width: 250px; height: 40px; border: 1px solid rgb(193, 193, 193); margin: 10px 25px; padding: 0px; resize: none; display: none;"></textarea>
                        </div>
                        <iframe style="display: none;"></iframe>
                     </div>
                  </div>
                  <div class="mb-6 flex items-center justify-between">
                     <button class="text-white font-medium rounded-lg text-base px-5 py-3 w-full sm:w-auto text-center mb-6 bg-blue-700 lg:mb-0" type="submit">
                         <span class="flex justify-center items-center">Send code</span>
                     </button>
                     <a class="text-blue-700 dark:text-blue-500 hover:underline text-sm font-medium ml-auto" href="{{ route('auth.login') }}">Back to Login</a>
                 </div>
               </form>
            </div>
         </div>
      </div>
   </section>
   
</x-layout>
 