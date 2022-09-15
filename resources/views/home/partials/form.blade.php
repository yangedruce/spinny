<form action="#" method="POST" id="{{ $id }}">
    @method('POST')
    @csrf

    <div class="font-black text-center text-6xl text-rose-800 drop-shadow-lg shadow-rose-500/50 mb-8">Spin The Wheel
    </div>
    <p class="text-sm font-medium text-gray-600">Win your share of RM10,000 worth of prizes with Yoodo! Which guaranteed
        prize is yours today? Spin & Win now!</p>
    <p class="mt-8 text-xs text-gray-600">Please fill in your details.</p>

    <div class="mt-4">
        <x-label for="name" :value="__('Name')" />
        {{-- <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="Magnus Raynor" requiredautofocus /> --}}
        
        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
       
    </div>

    <div class="mt-4">
        <x-label for="email" :value="__('Email')" />
        {{-- <x-input id="email" class="block mt-1 w-full" type="email" name="email" value="vgusikowski@hotmail.com"
            required /> --}}
        
        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
    </div>

    <div class="mt-4">
        <x-label for="phone" :value="__('Phone Number')" />
        {{-- <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" value="+1 (270) 674-7000" required /> --}}
        
        <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required />
    </div>

    <div class="mt-4">
        <x-label for="user_code" :value="__('User Code')" />
        {{-- <x-input id="user_code" class="block mt-1 w-full" type="text" name="user_code" value="981368" required /> --}}
        
        <x-input id="user_code" class="block mt-1 w-full" type="text" name="user_code" :value="old('user_code')"
            required />
    </div>

    <label for="agree" class="inline-flex items-center mt-4">
        {{-- <input id="agree" type="checkbox"
            class="border-gray-300 text-rose-600 shadow-sm focus:border-rose-300 focus:ring focus:ring-rose-200 focus:ring-opacity-50"
            name="agree" checked required> --}}
        <input id="agree" type="checkbox"
            class="border-gray-300 text-rose-600 shadow-sm focus:border-rose-300 focus:ring focus:ring-rose-200 focus:ring-opacity-50"
            name="agree" required>
        <span class="ml-2 text-xs text-gray-600">{{ __('I agree to Yoodo Terms & Conditions. I also agree to receive
            marketing e-mails from Yoodo.') }}</span>
    </label>

    <div class="flex justify-center mt-8">
        <x-button id="spinFormButton">
            {{ __('Spin The Wheel') }}
        </x-button>
    </div>

    {{-- !!!!! Error message here !!!!! --}}
    <p class="mt-4 text-red-500 text-xs text-center" id="formErrorMessage"></p>

</form>