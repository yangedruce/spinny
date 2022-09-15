<x-guest-layout>
    <div class="h-screen">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white">
                <div class="grid items-center justify-center grid-cols-1 lg:grid-cols-2">

                    <div class="p-6">
                        @include('home.partials.form', ['id' => 'spinForm'])
                    </div>

                    @if(count($prizes) > 0)
                    <div class="flex justify-center p-16 relative">
                        @include('home.partials.wheel', ['id' => 'wheel'])
                    </div>
                    @endif
                </div>

                <div class="items-center justify-center my-8">
                    @include('home.partials.prize')
                </div>
            </div>
        </div>
    </div>

    @include('home.partials.scripts.home-script')
</x-guest-layout>