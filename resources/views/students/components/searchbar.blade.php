<form action="{{ url('student_search') }}" class="flex flex-row gap-2" method="GET">
    {{-- @csrf --}}
    <input type="text" name="search" id="search" placeholder="Search Book..."
        class="w-full p-2 border border-gray-300 rounded-xl col-span-full" value="" />
    <button type="submit"
        class="bg-highlight rounded-xl shadow-md p-3 px-4 hover:bg-green-800 whitespace-nowrap text-white">Search</button>
    <!-- It always seems impossible until it is done. - Nelson Mandela -->
</form>
