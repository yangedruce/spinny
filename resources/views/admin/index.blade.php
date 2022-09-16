<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xs text-gray-600 leading-tight">
            {{ __('Dashboard') }} / {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <h6 class="text-base font-semibold tracking-widest uppercase">{{ __('Choose Grand Prize Winner') }}</h6>
            <div class="my-4 max-w-2xl mx-auto">
                <x-label for="month">{{ __('Select Month') }}</x-label>
                <div class="flex gap-4 mt-4">
                    <select name="" id="month"
                        class="w-full border-gray-300 focus:border-rose-300 focus:ring focus:ring-rose-200 focus:ring-opacity-50">
                        <option value="8">August</option> {{-- Testing --}}
                        <option value="9">September</option> {{-- Testing --}}
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                    <button type="button"
                        class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out border border-transparent bg-rose-800 hover:bg-rose-700 active:bg-rose-900 focus:outline-none focus:border-rose-900 focus:ring ring-rose-300 disabled:opacity-25"
                        onclick="checkSelectedMonth()">Choose</button>
                </div>
                <p class="mt-4 text-red-500 text-xs text-center" id="errorMessage"></p>
            </div>
            <div class="w-full overflow-x-hidden mt-16">
                <div id="prizeCarousel" class="flex flex-nowrap relative transition duration-1000">
                    @foreach ($prizes as $prize)
                    <div
                        class="h-64 w-64 shrink-0 border mx-4 relative border-rose-200 rounded-lg flex justify-center items-center">
                        {{ $prize->name }}</div>
                    @endforeach
                </div>
            </div>
            <div class="items-center justify-center my-8">
                @include('admin.partials.grand-prize-modal')
            </div>
        </div>
    </div>

    @include('admin.partials.scripts.admin-script')
</x-app-layout>