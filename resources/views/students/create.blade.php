@extends('students.layout.student')

@section('page-title')
    Add New Student
@endsection

@section('page-description')
    Register a new student to borrow books
@endsection

@section('page-content')
    <form method="POST" action="{{ url('/students/store') }}" class="h-full basis-full flex flex-row gap-4"
        enctype="multipart/form-data">
        @csrf

        <div class="bg-amber-50 rounded-xl p-6 basis-full space-y-6">
            @include("students.layout.form")

            {{-- SUBMIT --}}
            <div class="pt-4">
                <button type="submit"
                    class="bg-highlight w-full text-md font-semibold text-white hover:bg-green-800 shadow-md border border-gray-200 p-3 rounded-xl">
                    Add Student
                </button>
            </div>
        </div>
    </form>
@endsection
