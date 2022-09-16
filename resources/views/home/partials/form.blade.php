<form action="#" method="POST" id="{{ $id }}">
    @method('POST')
    @csrf

    <div class="font-black text-center text-6xl text-rose-800 drop-shadow-lg shadow-rose-500/50 my-8">Spin The Wheel</div>
    <p class="text-center text-sm font-medium text-gray-600">Win your share of RM10,000 worth of prizes with Yoodo! Which guaranteed prize is yours today? Spin & Win now!</p>
    <p class="mt-8 text-xs text-gray-600">Please fill in your details.</p>

    <div class="flex flex-col md:flex-row md:items-center gap-0 md:gap-4 w-full">
        <div class="mt-4 md:flex-1">
            <x-label for="name" :value="__('Name')" />
            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
        </div>
        
        <div class="mt-4 md:flex-1">
            <x-label for="email" :value="__('Email')" />
            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
        </div>
        
        <div class="mt-4 md:flex-1">
            <x-label for="code" :value="__('Spin Code')" />
            <x-input id="code" class="block mt-1 w-full" type="text" name="spin_code" :value="old('user_code')" required />
        </div>
    </div>

    <label for="agree" class="inline-flex items-center mt-4">
        <input id="agree" type="checkbox" class="border-gray-300 text-rose-600 shadow-sm focus:border-rose-300 focus:ring focus:ring-rose-200 focus:ring-opacity-50" name="agree" required>
        <span class="ml-2 text-xs text-gray-600">{{ __('I agree to Yoodo Terms & Conditions. I also agree to receive marketing e-mails from Yoodo.') }}</span>
    </label>

    <div class="flex flex-col md:flex-row justify-center gap-4 mt-8">
        <x-button id="spinFormButton" class="text-center justify-center">
            {{ __('Spin The Wheel') }}
        </x-button>
        <a href="#leaderboard" class="inline-flex items-center px-4 py-2 text-xs text-center justify-center font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out border border-transparent bg-rose-800 hover:bg-rose-700 active:bg-rose-900 focus:outline-none focus:border-rose-900 focus:ring ring-rose-300 disabled:opacity-25">
            {{ __('View Leaderboard') }}
        </a>
    </div>

    {{-- !!!!! Error message here !!!!! --}}
    <p class="mt-4 text-red-500 text-xs text-center" id="formErrorMessage"></p>

</form>