<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xs text-gray-600 leading-tight">
            {{ __('Dashboard') }} / {{ __('Users Code Import') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form action="{{ route('admin.spin.code.import.store') }}" method="POST" enctype="multipart/form-data">
                @method('POST')
                @csrf

                <div class="flex justify-between items-center border border-rose-200 rounded-lg p-4 w-full">
                    <x-input id="import_file" type="file"
                        class="text-gray-600 border-none shadow-none outline-none focus:outline-none"
                        name="import_file"></x-input>
                    <x-button>
                        {{ __('Import') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>