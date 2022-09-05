<x-guest-layout>
    <div class="h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden">
                <div class="grid grid-cols-1 lg:grid-cols-2 items-center justify-center">
                    <div class="p-6">
                        <x-auth-session-status class="mb-4" :status="session('status')" />
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        @include('home.partials.form')
                    </div>
                    <div class="p-6">
                        @include('home.partials.wheel')
                    </div>
                </div>

                <div class="my-8 flex justify-center items-center">
                    <x-modal></x-modal>
                </div>

                <div class="mb-8">
                    <x-table :title='"Leaderboard User"' :prizewinners="$prizewinners"></x-table>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>