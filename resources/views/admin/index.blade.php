<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xs text-gray-600 leading-tight">
            {{ __('Dashboard') }} / {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div id="PieSlice" class="wheelNav flex justify-center"></div>
            <x-table :title='"Grand Prize Winner"'></x-table>
        </div>
    </div>
</x-app-layout>