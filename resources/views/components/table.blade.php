<div class="relative overflow-hidden overflow-x-auto bg-white shadow-lg shadow-rose-500/20 sm:rounded-lg">
    <div class="inline-block min-w-full py-2 align-middle">
        <div class="flex items-center justify-between px-6 py-2">
            <h6 class="text-base font-semibold tracking-widest uppercase">{{ $title ?? "" }}</h6>
            <div class="flex items-center">
                @if (Route::is('admin.spin.code.index'))
                <a href="{{ route('admin.spin.code.import.show') }}">
                    <x-button class="mr-2">
                        {{ __('Import') }}
                    </x-button>
                </a>
                <form method="POST" action="{{ route('admin.spin.code.export') }}">
                    @method('POST')
                    @csrf
                    <x-button>
                        {{ __('Export') }}
                    </x-button>
                </form>
                @elseif (Route::is('admin.prize.index'))
                <a href="{{ route('admin.prize.import.show') }}">
                    <x-button class="mr-2">
                        {{ __('Import') }}
                    </x-button>
                </a>
                <form method="POST" action="{{ route('admin.prize.export') }}">
                    @method('POST')
                    @csrf
                    <x-button>
                        {{ __('Export') }}
                    </x-button>
                </form>
                @endif
            </div>
        </div>
        <table class="w-full divide-y divide-rose-200">
            <thead class="bg-rose-50">
                @if (Route::is('dashboard'))
                <tr>
                    <th scope="col"
                        class="px-6 py-3 text-xs font-bold tracking-wider text-left text-gray-900 uppercase">
                        No.
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-xs font-bold tracking-wider text-left text-gray-900 uppercase">
                        User Code
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-xs font-bold tracking-wider text-left text-gray-900 uppercase">
                        Name
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-xs font-bold tracking-wider text-left text-gray-900 uppercase">
                        Phone
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-xs font-bold tracking-wider text-left text-gray-900 uppercase">
                        Email
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-xs font-bold tracking-wider text-left text-gray-900 uppercase">
                        Month
                    </th>
                </tr>
                @elseif (Route::is('home.index'))
                <tr>
                    <th scope="col"
                        class="px-6 py-3 text-xs font-bold tracking-wider text-left text-gray-900 uppercase">
                        No.
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-xs font-bold tracking-wider text-left text-gray-900 uppercase">
                        User Code
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-xs font-bold tracking-wider text-left text-gray-900 uppercase">
                        Prize
                    </th>
                </tr>
                @elseif (Route::is('admin.spin.code.index'))
                <tr>
                    <th scope="col"
                        class="px-6 py-3 text-xs font-bold tracking-wider text-left text-gray-900 uppercase">
                        No.
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-xs font-bold tracking-wider text-left text-gray-900 uppercase">
                        Code
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-xs font-bold tracking-wider text-left text-gray-900 uppercase">
                        Redemption Status
                    </th>
                </tr>
                @elseif (Route::is('admin.prize.index'))
                <tr>
                    <th scope="col"
                        class="px-6 py-3 text-xs font-bold tracking-wider text-left text-gray-900 uppercase">
                        No.
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-xs font-bold tracking-wider text-left text-gray-900 uppercase">
                        Prize Code
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-xs font-bold tracking-wider text-left text-gray-900 uppercase">
                        Prize Name
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-xs font-bold tracking-wider text-left text-gray-900 uppercase">
                        Total Count
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-xs font-bold tracking-wider text-left text-gray-900 uppercase">
                        Remaining
                    </th>
                </tr>
                @endif
            </thead>
            <tbody class="bg-white divide-y divide-rose-200">
                @if (Route::is('dashboard'))
                @forelse($grandprizewinners ?? [] as $no => $grandprizewinner)
                <tr>
                    <td class="px-6 py-4 text-sm text-gray-500 uppercase whitespace-nowrap">
                        {{ ++$no }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500 uppercase whitespace-nowrap">
                        {{ $grandprizewinner->spinCode->code }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500 uppercase whitespace-nowrap">
                        {{ $grandprizewinner->spinCode->name }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500 uppercase whitespace-nowrap">
                        {{ $grandprizewinner->spinCode->phone }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                        {{ $grandprizewinner->spinCode->email }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                        {{ date('F', strtotime(date('Y').'/'.$grandprizewinner->month.'/'.date('d'))) }}
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">No Record Found</td>
                </tr>
                @endforelse
                @elseif (Route::is('home.index'))
                @forelse($prizeWinners ?? [] as $no => $prizeWinner)
                <tr>
                    <td class="px-6 py-4 text-sm text-gray-500 uppercase whitespace-nowrap">
                        {{ ++$no }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500 uppercase whitespace-nowrap">
                        {{ $prizeWinner->spinCode->code }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500 uppercase whitespace-nowrap">
                        {{ $prizeWinner->prize->name }}
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">No Record Found</td>
                </tr>
                @endforelse
                @elseif (Route::is('admin.spin.code.index'))
                @forelse($spinCodes ?? [] as $no => $spinCode)
                <tr>
                    <td class="px-6 py-4 text-sm text-gray-500 uppercase whitespace-nowrap">
                        {{ ++$no }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500 uppercase whitespace-nowrap">
                        {{ $spinCode->code }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                        {{ $spinCode->validation ? 'Redeemed' : 'Not Redeemed' }}
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">No Record Found</td>
                </tr>
                @endforelse
                @elseif (Route::is('admin.prize.index'))
                @forelse($prizes ?? [] as $no => $prize)
                <tr>
                    <td class="px-6 py-4 text-sm text-gray-500 uppercase whitespace-nowrap">
                        {{ ++$no }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500 uppercase whitespace-nowrap">
                        {{ $prize->code }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                        {{ $prize->name }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500 uppercase whitespace-nowrap">
                        {{ $prize->total_count }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500 uppercase whitespace-nowrap">
                        {{ $prize->remaining }}
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">No Record Found</td>
                </tr>
                @endforelse
                @endif
            </tbody>
        </table>
        <div class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
            @if (Route::is('dashboard'))
            {!! $grandprizewinners->links() !!}
            @elseif (Route::is('home.index'))
            {!! $prizeWinners->links() !!}
            @elseif (Route::is('admin.spin.code.index'))
            {!! $spinCodes->links() !!}
            @elseif (Route::is('admin.prize.index'))
            {!! $prizes->links() !!}
            @endif
        </div>
    </div>
</div>