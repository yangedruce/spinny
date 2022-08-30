<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xs text-gray-600 leading-tight">
            {{ __('Dashboard') }} / {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <h6 class="text-base font-semibold tracking-widest uppercase">Spin The Wheel Lucky Draw</h6>
            <div id="divWheel" data-wheelnav data-wheelnav-marker data-wheelnav-markerpath="DropMarker" data-wheelnav-slicepath="DonutSlice" data-wheelnav-colors="#c4b5fd, #fecdd3, #f9a8d4, #fde68a, #dcfce7, #a5f3fc, #fdba74, #f5d0fe, #67e8f9" class="flex justify-center mb-8">
                <div data-wheelnav-navitemtext="1"></div>
                <div data-wheelnav-navitemtext="2"></div>
                <div data-wheelnav-navitemtext="3"></div>
                <div data-wheelnav-navitemtext="4"></div>
                <div data-wheelnav-navitemtext="5"></div>
                <div data-wheelnav-navitemtext="6"></div>
                <div data-wheelnav-navitemtext="7"></div>
                <div data-wheelnav-navitemtext="8"></div>
                <div data-wheelnav-navitemtext="9"></div>
            </div>
            <x-table :title='"Grand Prize Winner"' :grandprizewinners="$grandprizewinners"></x-table>
        </div>
    </div>
</x-app-layout>