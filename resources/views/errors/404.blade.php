@extends('layout.app')

@section('content')
    <div class="p-4 h-screen w-screen">
        <div class="flex flex-row gap-4 justify-center items-center h-full w-full">
            <div class="text-center">
                <h1 class="text-2xl font-bold mb-4">404</h1>
                <p class="text-xl mb-4">Oops! The page you're looking for doesn't exist.</p>
                <a href="{{ url('/') }}"
                    class="text-gray-700 px-4 py-2 rounded-xl hover:text-gray-400 hover:underline focus:outline-2">Go Back Home</a>
                <!-- The journey of a thousand miles begins with one step. - Lao Tzu -->
            </div>
        </div>
        <!-- Do what you can, with what you have, where you are. - Theodore Roosevelt -->
    </div>
@endsection
