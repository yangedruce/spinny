<div class="bg-white overflow-hidden overflow-x-auto relative shadow-lg shadow-rose-500/20 sm:rounded-lg">
    <div class="py-2 align-middle inline-block min-w-full">
        <div class="flex py-2 items-center justify-between px-6">
            <h6 class="text-base font-semibold tracking-widest uppercase">Prize Winners</h6>
            <div class="flex items-center">
                <form method="POST" action="{{ route('admin.prize.winner.export') }}">
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
                        Spin Code
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-bold text-gray-900 uppercase tracking-wider">
                        Prize Code
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-900 uppercase tracking-wider">
                        Prize Name
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-bold text-gray-900 uppercase tracking-wider">
                        Name
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-bold text-gray-900 uppercase tracking-wider">
                        Email
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-bold text-gray-900 uppercase tracking-wider">
                        Shared
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-rose-200">
                @forelse($prizewinners ?? [] as $no => $prizewinner)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 uppercase">
                        {{ ++$no }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 uppercase">
                        {{ $prizewinner->spinCode->code }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 uppercase">
                        {{ $prizewinner->prize->code }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 uppercase">
                        {{ $prizewinner->prize->name }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $prizewinner->spinCode->name }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $prizewinner->spinCode->email }}
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
            </tbody>
        </table>
        <div class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
            @if (Route::is('admin.prize.winner.index'))
            {!! $prizewinners->links() !!}
            @endif
        </div>
    </div>
</div>