<x-guest-layout>
    <div class="h-screen">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

            <div class="my-8">
                @if ($prizeWinners != null)
                    <x-table :title='"Leaderboard User"' :prizeWinners="$prizeWinners"></x-table>
                @endif
            </div>
        </div>
    </div>
</x-guest-layout>