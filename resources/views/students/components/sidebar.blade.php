<div class="h-full min-w-[280px] flex flex-col gap-3">
    <div class="bg-amber-50 rounded-xl shadow p-4 basis-1/2 w-full h-full relative">
        {{-- ther is a reason why this is offcenter because we will add some designs later in this --}}
        <div class="flex flex-col right-4 bottom-4 absolute">
            {{-- use the tile component premade it exist for it's purpose --}}
            @include('components.title')
        </div>
    </div>

    <a href="{{ url('/students/add') }}"
        class="shadow rounded-xl p-3 bg-parchment hover:bg-gray-200 focus:outline-2 basis-auto">
        Add new Student
    </a>

    <div class="basis-full flex flex-col gap-2 overflow-y-auto px-1">
        <h1 class="text-xl font-semibold">Courses</h1>
        @isset($courses)
            @empty($courses)
                <button class="text-gray-800 hover:text-gray-700 basis-auto">No Courses</button>
            @else
                @foreach ($courses as $course)
                    <a href="{{ route('students.filter', $course->course) }}"
                        class="shadow rounded-xl p-3 bg-parchment hover:bg-gray-100 focus:outline-2 basis-auto">
                        {{ $course->course }}</a>
                @endforeach
            @endempty
        @endisset
    </div>

    <a href="{{ url('/') }}"
        class="shadow rounded-xl text-white font-medium p-3 bg-highlight hover:bg-green-800 focus:outline-2 basis-auto">
        <i class="bi bi-arrow-left-circle-fill pr-2"></i>
        Back Home</a>
    <!-- It is not the man who has too little, but the man who craves more, that is poor. - Seneca -->
</div>
