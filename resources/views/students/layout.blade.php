@extends('layout.app')

@section('content')
    <div class="p-4 h-screen w-screen">
        <div class="flex flex-row gap-4 h-full w-full">
            {{-- sidebar --}}
            <div class="basis-auto">
                @include('students.components.sidebar')
            </div>
            {{-- content --}}
            <div class="basis-full">
                @yield('page-content')
            </div>
        </div>
    </div>
    <!-- Breathing in, I calm body and mind. Breathing out, I smile. - Thich Nhat Hanh -->
@endsection
