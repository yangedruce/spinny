<div class="bg-white overflow-hidden overflow-x-auto relative shadow-lg shadow-rose-500/20 sm:rounded-lg">
    <div class="py-2 align-middle inline-block min-w-full">
        <div class="flex py-2 items-center justify-between px-6">
            <h6 class="text-base font-semibold tracking-widest uppercase">{{ $title ?? "" }}</h6>
            <div class="flex items-center">
                @if (Route::is('admin.code.index') || Route::is('admin.prize.index'))
                    <x-button class="mr-2">
                        {{ __('Import') }}
                    </x-button>
                    <x-button>
                        {{ __('Export') }}
                    </x-button>
                @elseif (Route::is('admin.grand.prize.winner.index') || Route::is('admin.prize.winner.index'))
                    <x-button>
                        {{ __('Export') }}
                    </x-button>
                @endif
            </div>
        </div>
        <table class="w-full divide-y divide-rose-200">
            <thead class="bg-rose-50">
                @if (Route::is('dashboard') || Route::is('admin.grand.prize.winner.index'))
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-900 uppercase tracking-wider">
                            User Code
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-900 uppercase tracking-wider">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-900 uppercase tracking-wider">
                            Month
                        </th>
                    </tr>
                @elseif (Route::is('admin.code.index'))
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-900 uppercase tracking-wider">
                            User Code
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-900 uppercase tracking-wider">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-900 uppercase tracking-wider">
                            Validation
                        </th>
                    </tr>
                @elseif (Route::is('admin.prize.index'))
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-900 uppercase tracking-wider">
                            Prize Code
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-900 uppercase tracking-wider">
                            Prize Name
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-900 uppercase tracking-wider">
                            Total Count
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-900 uppercase tracking-wider">
                            Remaining
                        </th>
                    </tr>
                @elseif (Route::is('admin.prize.winner.index'))
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-900 uppercase tracking-wider">
                            User Code
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-900 uppercase tracking-wider">
                            Prize Code
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-900 uppercase tracking-wider">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-900 uppercase tracking-wider">
                            Shared
                        </th>
                    </tr>
                @endif
            </thead>
            <tbody class="bg-white divide-y divide-rose-200">
                @if (Route::is('dashboard') || Route::is('admin.grand.prize.winner.index'))
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 uppercase">
                            C0001
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            jane@gmail.com
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            1
                        </td>
                    </tr>
                @elseif (Route::is('admin.code.index'))
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 uppercase">
                            C0001
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            jane@gmail.com
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            Yes
                        </td>
                    </tr>
                @elseif (Route::is('admin.prize.index'))
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 uppercase">
                            P0001
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            Iphone
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 uppercase">
                            50
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 uppercase">
                            5
                        </td>
                    </tr>
                @elseif (Route::is('admin.prize.winner.index'))
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 uppercase">
                            C0001
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 uppercase">
                            P0001
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            jane@gmail.com
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            Yes
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>