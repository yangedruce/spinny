<div class="bg-white overflow-hidden overflow-x-auto relative shadow-lg shadow-rose-500/20 sm:rounded-lg">
    <div class="py-2 align-middle inline-block min-w-full">
        <div class="flex py-2 items-center justify-between px-6">
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
                    <a href="{{ route('admin.usercode.import.store') }}">
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
                @elseif (Route::is('admin.usercode.index'))
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
                            Validation
                        </th>
                    </tr>
                @elseif (Route::is('admin.prize.index'))
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-bold text-gray-900 uppercase tracking-wider">
                            No.
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-bold text-gray-900 uppercase tracking-wider">
                            Prize Code
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-bold text-gray-900 uppercase tracking-wider">
                            Prize Name
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-bold text-gray-900 uppercase tracking-wider">
                            Total Count
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-bold text-gray-900 uppercase tracking-wider">
                            Remaining
                        </th>
                    </tr>
                @endif
            </thead>
            <tbody class="bg-white divide-y divide-rose-200">
                @if (Route::is('dashboard'))
                    @forelse($grandprizewinners ?? [] as $no => $grandprizewinner)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 uppercase">
                                {{ ++$no }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 uppercase">
                                {{ $grandprizewinner->usercode->user_code }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 uppercase">
                                {{ $grandprizewinner->usercode->name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 uppercase">
                                {{ $grandprizewinner->usercode->phone }}
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
                @elseif (Route::is('admin.usercode.index'))
                    @forelse($usercodes ?? [] as $no => $usercode)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 uppercase">
                                {{ ++$no }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 uppercase">
                                {{ $usercode->user_code }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $usercode->name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $usercode->phone }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $usercode->email }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $usercode->validation ? 'Yes' : 'No' }}
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
                @endif
            </tbody>
        </table>
        <div class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
            @if (Route::is('dashboard'))
                {!! $grandprizewinners->links() !!}
            @elseif (Route::is('admin.usercode.index'))
                {!! $usercodes->links() !!}
            @elseif (Route::is('admin.prize.index'))
                {!! $prizes->links() !!}
            @endif
        </div>
    </div>
</div>