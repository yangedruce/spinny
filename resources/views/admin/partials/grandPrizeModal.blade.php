<div class="z-50 hidden" id="grandPrizeModal">
    <div class="inset-0 flex items-center justify-center bg-gray-700 bg-opacity-50 fixed h-full top-0">
        <div class="w-11/12 md:w-2/3 lg:w-3/5 xl:w-1/3 p-6 bg-white rounded-md">

            <h4 class="font-black text-center text-2xl text-rose-800 drop-shadow-lg shadow-rose-500/50 mb-8">{{
                __('Grand Prize Winner') }}</h4>
            <p class="text-sm font-medium text-center text-gray-600 mb-4" id="modalWinMessage"></p>
            <p class="text-lg font-bold text-center text-gray-600 mb-4" id="modalWinner"></p>
            <div id="viewGrandPrizeWInner" class="justify-center mt-4 hidden">
                <a href="{{ route('admin.grand.prize.winner.index') }}"
                    class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out border border-transparent bg-rose-800 hover:bg-rose-700 active:bg-rose-900 focus:outline-none focus:border-rose-900 focus:ring ring-rose-300 disabled:opacity-25">
                    {{ __('View Grand Prize Winner') }}</a>
            </div>
        </div>
    </div>
</div>