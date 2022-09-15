<div class="bg-white overflow-hidden overflow-x-auto relative shadow-lg shadow-rose-500/20 sm:rounded-lg">
    <div class="py-2 align-middle inline-block min-w-full">
        <div class="flex py-2 items-center justify-between px-6">
            <h6 class="text-base font-semibold tracking-widest uppercase">Grand Prize Winners</h6>
            <div class="flex items-center">
                <form method="POST" action="{{ route('admin.grand.prize.winner.export') }}">
                    @method('POST')
                    @csrf
                    <x-button>
                        {{ __('Export') }}
                    </x-button>
                </form>
            </div>
        </div>
        <table class="w-full divide-y divide-rose-200">
            <thead class="bg-rose-50">
                <tr>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-bold text-gray-900 uppercase tracking-wider">
                        No.
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-bold text-gray-900 uppercase tracking-wider">
                        User Code
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-bold text-gray-900 uppercase tracking-wider">
                        Name
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-bold text-gray-900 uppercase tracking-wider">
                        Phone
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-bold text-gray-900 uppercase tracking-wider">
                        Email
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-bold text-gray-900 uppercase tracking-wider">
                        Month
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-rose-200">
                @forelse($grandprizewinners ?? [] as $no => $grandprizewinner)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 uppercase">
                        {{ ++$no }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 uppercase">
                        {{ $grandprizewinner->usercode->user_code }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $grandprizewinner->usercode->name }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $grandprizewinner->usercode->phone }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $grandprizewinner->usercode->email }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ date('F', strtotime(date('Y').'/'.$grandprizewinner->month.'/'.date('d'))) }}
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">No Record Found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
            @if (Route::is('admin.grand.prize.winner.index'))
            {!! $grandprizewinners->links() !!}
            @endif
        </div>
    </div>
</div>