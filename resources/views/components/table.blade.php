<div class="relative overflow-hidden overflow-x-auto bg-white shadow-lg shadow-rose-500/20 sm:rounded-lg">
    <div class="inline-block min-w-full py-2 align-middle">
        <div class="flex items-center justify-between px-6 py-2">
            <h6 class="text-base font-semibold tracking-widest uppercase">{{ $title ?? "" }}</h6>
            <div class="flex items-center">
                @if (Route::is('admin.usercode.index'))
                <a href="{{ route('admin.usercode.import.show') }}">
                    <x-button class="mr-2">
                        {{ __('Import') }}
                    </x-button>
                </a>
                <form method="POST" action="{{ route('admin.usercode.export') }}">
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
                @elseif (Route::is('home.leaderboard'))
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
                @elseif (Route::is('admin.usercode.index'))
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
                        {{ $grandprizewinner->usercode->user_code }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500 uppercase whitespace-nowrap">
                        {{ $grandprizewinner->usercode->name }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500 uppercase whitespace-nowrap">
                        {{ $grandprizewinner->usercode->phone }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                        {{ $grandprizewinner->usercode->email }}
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
                @elseif (Route::is('home.leaderboard'))
                @forelse($prizeWinners ?? [] as $no => $prizeWinner)
                <tr>
                    <td class="px-6 py-4 text-sm text-gray-500 uppercase whitespace-nowrap">
                        {{ ++$no }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500 uppercase whitespace-nowrap">
                        {{ $prizeWinner->usercode->user_code }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500 uppercase whitespace-nowrap">
                        {{ $prizeWinner->prize->prize_name }}
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">No Record Found</td>
                </tr>
                @endforelse
                @elseif (Route::is('admin.usercode.index'))
                @forelse($usercodes ?? [] as $no => $usercode)
                <tr>
                    <td class="px-6 py-4 text-sm text-gray-500 uppercase whitespace-nowrap">
                        {{ ++$no }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500 uppercase whitespace-nowrap">
                        {{ $usercode->user_code }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                        {{ $usercode->name }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                        {{ $usercode->phone }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                        {{ $usercode->email }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                        {{ $usercode->validation ? 'Redeemed' : 'Not Redeemed' }}
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
                        {{ $prize->prize_code }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                        {{ $prize->prize_name }}
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
            @elseif (Route::is('home.leaderboard'))
            {!! $prizeWinners->links() !!}
            @elseif (Route::is('admin.usercode.index'))
            {!! $usercodes->links() !!}
            @elseif (Route::is('admin.prize.index'))
            {!! $prizes->links() !!}
            @endif
        </div>
    </div>
</div>