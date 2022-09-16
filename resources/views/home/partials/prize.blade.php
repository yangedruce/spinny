<div class="z-50 hidden fixed h-screen w-screen justify-center items-center top-0" id="prizeModal">
    <button type="button" onclick="closePrizeModal()" class="inset-0 flex items-center justify-center bg-gray-700 bg-opacity-50 fixed h-full top-0"></button>
    <div class="w-11/12 md:w-2/3 lg:w-3/5 xl:w-1/3 p-6 bg-white rounded-md relative z-10">
        <div class="flex justify-end items-center">
            <button type="button" onclick="closePrizeModal()">
                <svg class="w-3 h-3 cursor-pointer" width="8" height="9" viewBox="0 0 8 9" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M3.92969 3.63281L5.80469 0.546875H7.49219L4.72656 4.72656L7.57812 9H5.90625L3.95312 5.83594L2 9H0.320312L3.17188 4.72656L0.40625 0.546875H2.07812L3.92969 3.63281Z"
                        fill="#4b5563" />
                </svg>
            </button>
        </div>
        <h4 class="font-black text-center text-2xl text-rose-800 drop-shadow-lg shadow-rose-500/50 mb-8">{{
            __('Congratulations!') }}</h4>
        <p class="text-sm font-medium text-center text-gray-600" id="modalWinMessage"></p>
        <div id="prizeShare" class="flex justify-center gap-4 mt-4">
            <a href="#"
                class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out border border-transparent bg-rose-800 hover:bg-rose-700 active:bg-rose-900 focus:outline-none focus:border-rose-900 focus:ring ring-rose-300 disabled:opacity-25"
                onclick="shareFacebook(event)">{{ __('Share to Facebook') }}</a>
        </div>
    </div>
</div>