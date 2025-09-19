@extends('layout.app')

@section('content')
    <div class="min-h-screen w-full flex items-center justify-center p-6 bg-cover bg-center bg-blend-multiply bg-gray-500"
        style="background-image: url('{{ asset('storage/images/bg-library.jpeg') }}')">
        <div class="w-full max-w-3xl flex flex-col gap-4">
            <!-- Welcome Card -->
            <div
                class="bg-orange-200 rounded-2xl shadow-lg p-8 flex flex-col justify-center items-center text-center">
                <h1 class="text-3xl font-bold text-gray-800">Welcome to</h1>
                <div class="mt-2">
                    @include('components.title')
                </div>
                <p class="mt-4 text-gray-600 text-sm">
                    Manage and explore your collection with ease.
                </p>
            </div>

            <!-- Actions -->
            <div class="flex flex-col md:flex-row gap-4">
                <a href="{{ url('/books') }}"
                    class="bg-orange-200 flex-1 bg-paper rounded-2xl shadow-lg p-6 flex items-center justify-center gap-2 text-center
                       transition hover:-translate-y-1 hover:shadow-xl">
                    <i class="bi bi-book text-2xl text-gray-700"></i>
                    <span class="text-xl font-semibold text-gray-800">Browse Books</span>
                </a>

                <a href="{{ url('/books/manage') }}"
                    class="bg-orange-200 flex-1 bg-paper rounded-2xl shadow-lg p-6 flex items-center justify-center gap-2 text-center
                       transition hover:-translate-y-1 hover:shadow-xl">
                    <i class="bi bi-gear text-2xl text-gray-700"></i>
                    <span class="text-xl font-semibold text-gray-800">Manage Books</span>
                </a>

            </div>

            <div
                class="text-shadow flex flex-col justify-center items-center text-center">
                <p class="text-gray-200 text-sm">
                    @ Develop by Programmers Guild
                </p>
            </div>
        </div>
    </div>
@endsection


{{-- @extends('layout.app')

@section('content')
    <div class="p-4 h-screen w-screen bg-center bg-contain"
        style="background-image: url('{{ asset('storage/images/bg-library.jpeg') }}');">
        <div class="flex flex-row gap-4 h-full w-full text-center">
            <div class="basis-full flex flex-col gap-4 justify-center items-center bg-center rounded-xl">
                <div class="text-center bg-white rounded-xl p-4">
                    <h1 class="text-2xl font-semibold">Welcome to the</h1>
                    @include('components.title')
                </div>
                <div class="flex flex-row gap-4">
                    <a href="{{ url('/books') }}"
                        class="shadow rounded-xl p-3 bg-white hover:bg-gray-100 focus:outline-2 basis-full flex justify-center items-center">
                        <span class="text-2xl font-semibold">Browse Books</span>
                    </a>
                    <a href="{{ url('/books/manage') }}"
                        class="shadow rounded-xl p-3 bg-white hover:bg-gray-100 focus:outline-2 basis-full flex justify-center items-center">
                        <span class="text-2xl font-semibold">Manage Books</span>
                    </a>
                </div>
            </div>
            <div class="h-full basis-full flex flex-col gap-4">
                <a href="{{ url('/books') }}"
                    class="shadow rounded-xl p-3 bg-white hover:bg-gray-100 focus:outline-2 basis-full flex justify-center items-center">
                    <span class="text-2xl font-semibold">Browse Books</span>
                </a>
                <a href="{{ url('/books/manage') }}"
                    class="shadow rounded-xl p-3 bg-white hover:bg-gray-100 focus:outline-2 basis-full flex justify-center items-center">
                    <span class="text-2xl font-semibold">Manage Books</span>
                </a>
            </div>
        </div>
        <!-- It is never too late to be what you might have been. - George Eliot -->
    </div>
@endsection --}}
