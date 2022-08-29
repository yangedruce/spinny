<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-base text-rose-600 leading-tight tracking-widest uppercase">
            {{ __('Prize') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <x-table :title='"Prizes Code"'></x-table>
        </div>
    </div>
</x-app-layout>