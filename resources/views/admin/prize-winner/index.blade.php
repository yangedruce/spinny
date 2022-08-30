<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xs text-gray-600 leading-tight">
            {{ __('Dashboard') }} / {{ __('Prize Winners') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <x-table :title='"Prize Winners"'></x-table>
        </div>
    </div>
</x-app-layout>