@extends('students.layout')

@section('page-content')
    <div class="h-full flex flex-col gap-4">
        <div class="bg-amber-50 rounded-xl p-4">
            @include('students.components.searchbar')
        </div>
        <div class="bg-amber-50 rounded-xl p-4 basis-full overflow-auto">
            {{-- list of students by table --}}
            <table class="min-w-full table-auto">
                <thead>
                    <tr>
                        <th class="px-4 py-2 bg-highlight text-white rounded-s-xl">ID</th>
                        <th class="px-4 py-2 bg-highlight text-white">Fullname</th>
                        <th class="px-4 py-2 bg-highlight text-white">Course</th>
                        <th class="px-4 py-2 bg-highlight text-white">Year</th>
                        <th class="px-4 py-2 bg-highlight text-white">Gender</th>
                        <th class="px-4 py-2 bg-highlight text-white rounded-e-xl">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr class="hover:bg-amber-100 border-b border-gray-200">
                            <td class="px-4 py-2 truncate">{{ $student->student_id }}</td>
                            <td class="px-4 py-2 ">{{ $student->first_name }}, {{ $student->middle_name }}
                                {{ $student->last_name }}</td>
                            <td class="px-4 py-2 ">{{ $student->course }}</td>
                            <td class="px-4 py-2 text-center">{{ $student->year_level }}</td>
                            <td class="px-4 py-2 text-center">{{ $student->gender }}</td>
                            <td class="px-4 py-2 w-1/6 text-center">
                                <a href="{{ url('/books/manage/editBookInfo/' . $student->id) }}"
                                    class="text-gray-500 hover:underline">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="bg-amber-50 rounded-xl p-4 flex justify-between items-center">
            <p class="text-gray-600">All Students: {{ $all_students }}</p>
            {{ $students->links('vendor.pagination.my-custom-pagination') }}
        </div>
        <!-- The biggest battle is the war against ignorance. - Mustafa Kemal Atatürk -->
    </div>
@endsection
