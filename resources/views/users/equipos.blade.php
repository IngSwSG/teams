<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Equipos') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 bg-white">
            <div class="py-4 border-b">
                <a href="{{ route('create') }}">
                    <x-primary-button>{{ __('Create User') }}</x-primary-button>
                </a>
            </div>
            <ul role="list" class="divide-y divide-gray-100">
                @foreach ($clasificacion as $item)
                    <li class="flex justify-between gap-x-6 py-5">
                        <div class="flex gap-x-4">
                            <div class="min-w-0 flex-auto">
                                <p class="text-sm font-semibold leading-6 text-gray-900 hover:text-blue-400">
                                    {{ $item['job'] }}</p>
                            </div>
                        </div>
                        <div class="hidden sm:flex sm:flex-col sm:items-end">
                            <p class="text-sm leading-6 text-gray-900">{{ $item['total'] }}</p>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</x-app-layout>
