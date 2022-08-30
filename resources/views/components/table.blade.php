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
                            No.
                        </th>
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
                            No.
                        </th>
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
                            No.
                        </th>
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
                            No.
                        </th>
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
                    @forelse($grandprizewinners ?? [] as $no => $grandprizewinner)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 uppercase">
                                {{ ++$no }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 uppercase">
                                {{ $grandprizewinner->code->user_code }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $grandprizewinner->email }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $grandprizewinner->month }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">No Record Found</td>
                        </tr>
                    @endforelse
                @elseif (Route::is('admin.code.index'))
                    @forelse($codes ?? [] as $no => $code)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 uppercase">
                                {{ ++$no }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 uppercase">
                                {{ $code->user_code }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $code->email }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $code->validation ? 'Yes' : 'No' }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">No Record Found</td>
                        </tr>
                    @endforelse
                @elseif (Route::is('admin.prize.index'))
                    @forelse($prizes ?? [] as $no => $prize)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 uppercase">
                                {{ ++$no }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 uppercase">
                                {{ $prize->prize_code }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $prize->prize_name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 uppercase">
                                {{ $prize->total_count }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 uppercase">
                                {{ $prize->remaining }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">No Record Found</td>
                        </tr>
                    @endforelse
                @elseif (Route::is('admin.prize.winner.index'))
                    @forelse($prizewinners ?? [] as $no => $prizewinner)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 uppercase">
                                {{ ++$no }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 uppercase">
                                {{ $prizewinner->code->user_code }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 uppercase">
                                {{ $prizewinner->prize->prize_name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $prizewinner->email }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $prizewinner->shared ? 'Yes' : 'No' }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">No Record Found</td>
                        </tr>
                    @endforelse
                @endif
            </tbody>
        </table>
    </div>
</div>