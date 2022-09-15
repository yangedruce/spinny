<div class="z-50 hidden" id="prizeModal">
    <div class="inset-0 flex items-center justify-center bg-gray-700 bg-opacity-50 fixed h-full top-0">
        <div class="w-11/12 md:w-2/3 lg:w-3/5 xl:w-1/3 p-6 bg-white rounded-md">

            <h4 class="font-black text-center text-2xl text-rose-800 drop-shadow-lg shadow-rose-500/50 mb-8">{{
                __('Congratulations!') }}</h4>
            <p class="text-sm font-medium text-center text-gray-600" id="modalWinMessage"></p>
            <div id="prizeShare" class="flex justify-center gap-4 mt-4">
                <a href="#"
                    class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out border border-transparent bg-rose-800 hover:bg-rose-700 active:bg-rose-900 focus:outline-none focus:border-rose-900 focus:ring ring-rose-300 disabled:opacity-25"
                    onclick="shareFacebook(event)">Share to Facebook</a>
                <a href="{{ route('home.leaderboard') }}"
                    class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out border border-transparent bg-rose-800 hover:bg-rose-700 active:bg-rose-900 focus:outline-none focus:border-rose-900 focus:ring ring-rose-300 disabled:opacity-25">
                    {{ __('View Leaderboard') }}</a>
            </div>
        </div>
    </div>
</div>