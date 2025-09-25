@extends('layout.app')

@section('content')
    <div class="p-4 h-screen w-screen">
        <div class="flex flex-row gap-4 justify-center items-center h-full w-full">
            <div class="text-center">
                <h1 class="text-2xl font-bold mb-4">Login Success</h1>
                <p class="text-xl mb-4">User Login has been successfull?.</p>

                <form action="{{ url('logoutuser') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-gray-700 px-4 py-2 rounded-xl hover:text-gray-400 hover:underline focus:outline-2">Log Out</button>
                </form>

                {{-- <a href="{{ url('/') }}"
                    class="text-gray-700 px-4 py-2 rounded-xl hover:text-gray-400 hover:underline focus:outline-2">Go Back
                    Home</a> --}}
                <!-- The journey of a thousand miles begins with one step. - Lao Tzu -->
            </div>
        </div>
        <!-- Happiness is not something readymade. It comes from your own actions. - Dalai Lama -->
    </div>
@endsection

<div>
</div>
