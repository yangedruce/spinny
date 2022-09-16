<button @click="show=true" class="inline-flex items-center px-4 py-2 bg-rose-800 border border-transparent font-semibold text-xs text-white uppercase tracking-widest hover:bg-rose-700 active:bg-rose-900 focus:outline-none focus:border-rose-900 focus:ring ring-rose-300 disabled:opacity-25 transition ease-in-out duration-150" type="button">
        Modal
    </button>
<div x-data="{show:false}" class="z-50">
    

    <div x-show="show" class="inset-0 flex items-center justify-center bg-gray-700 bg-opacity-50 fixed h-full top-0">
        <div @click.away="show = false" class="w-11/12 md:w-2/3 lg:w-3/5 xl:w-1/3 p-6 bg-white rounded-md">
            <div class="flex justify-end items-center">
                <svg @click="show=false" class="w-3 h-3 cursor-pointer" width="8" height="9" viewBox="0 0 8 9"
                    fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3.92969 3.63281L5.80469 0.546875H7.49219L4.72656 4.72656L7.57812 9H5.90625L3.95312 5.83594L2 9H0.320312L3.17188 4.72656L0.40625 0.546875H2.07812L3.92969 3.63281Z" fill="#4b5563" />
                </svg>
            </div>

            <h4 class="font-black text-center text-2xl text-rose-800 drop-shadow-lg shadow-rose-500/50 mb-8">Congratulations You Win!</h4>
            <p class="text-sm font-medium text-center text-gray-600">You win an Ipad Air 5</p>
            <p class="mt-4 text-xs text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
            aliqua.</p>

            <div class="flex justify-center mt-8">
                <button @click="show=false" class="inline-flex items-center px-4 py-2 bg-rose-800 border border-transparent font-semibold text-xs text-white uppercase tracking-widest hover:bg-rose-700 active:bg-rose-900 focus:outline-none focus:border-rose-900 focus:ring ring-rose-300 disabled:opacity-25 transition ease-in-out duration-150" type="button">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>