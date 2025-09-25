@extends('layout.app')

@section('content')
    <div class="p-4 h-screen w-screen">
        <div class="flex flex-col gap-4 justify-center items-center h-full w-full">
            <form method="POST" action="{{ url('/loginuser') }}"
                class="flex flex-col gap-3 w-[350px] h-auto bg-white p-6 rounded-xl  shadow-md">
                @csrf

                <div class="text-center">
                    @include('components.title')
                </div>
                <h1 class="text-2xl font-bold mb-2 text-center">Login User</h1>

                {{-- fields --}}
                <div class="basis-auto">
                    <label for="name">Username @error('username')
                            <span class="text-red-400">Enter Valid Username</span>
                        @enderror
                    </label>
                    <input type="text" name="name" id="name" placeholder="@Username"
                        class="w-full p-2 bg-white border  border-gray-300 rounded-xl col-span-ful" required
                        value="" />
                </div>
                <div class="basis-auto">
                    <label for="password">Password @error('password')
                            <span class="text-red-400">Enter Valid Password</span>
                        @enderror
                    </label>
                    <input type="password" name="password" id="password" placeholder="Password"
                        class="w-full p-2 bg-white border  border-gray-300 rounded-xl col-span-ful" required
                        value="" />
                </div>

                <button type="submit"
                    class="bg-highlight text-md font-semibold text-white hover:bg-green-800 shadow-md border border-gray-200 p-3 rounded-xl hover:border-gray-30 focus:outline-2 col-span-full">Login</button>

                <a href="{{ url('/') }}"
                    class="text-gray-700 px-4 py-2 text-center rounded-xl hover:text-gray-400 hover:underline focus:outline-2">Go
                    Back
                    Home</a>
            </form>
        </div>
        <!-- Life is available only in the present moment. - Thich Nhat Hanh -->
    </div>
@endsection
