<div class="relative overflow-hidden overflow-x-auto bg-white shadow-lg shadow-rose-500/20 sm:rounded-lg">
    <div class="inline-block min-w-full py-2 align-middle">
        <div class="flex items-center justify-between px-6 py-2">
            <h6 class="text-base font-semibold tracking-widest uppercase">{{ __('Leaderboard User') }}</h6>
        </div>
        <table class="w-full divide-y divide-rose-200" id="leaderboard">
            <thead class="bg-rose-50">
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
            </thead>
            <tbody class="bg-white divide-y divide-rose-200">
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
                    <td colspan="5" class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{ __('No Record Found')
                        }}</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div class="p-4">
            {!! $prizeWinners->links() !!}
        </div>
    </div>
</div>