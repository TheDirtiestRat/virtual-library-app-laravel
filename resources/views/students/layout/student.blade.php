@extends('layout.app')

@section('content')
    <div class="p-4 h-full w-full">
        <div class="basis-full flex flex-col gap-4 h-full w-full">
            {{-- Header --}}
            <div class="bg-amber-50 rounded-xl shadow p-4 basis-auto flex flex-row justify-between items-center">
                <div>
                    <h1 class="text-2xl font-semibold">
                        @yield('title-Page')
                    </h1>
                    <p class="text-gray-600">
                        @yield('page-Description')
                    </p>
                </div>

                <a href="{{ url('/students') }}"
                    class="px-4 py-2 rounded-lg border border-gray-200 shadow-sm bg-highlight hover:bg-green-800 transition text-white text-sm font-medium">
                    ← Back
                </a>
            </div>

            {{-- Page content --}}
            <div class="h-full basis-full flex flex-row gap-4">
                @yield('page-content')
            </div>
        </div>

        {{-- Alerts --}}
        @include('components.alert')
    </div>
@endsection
