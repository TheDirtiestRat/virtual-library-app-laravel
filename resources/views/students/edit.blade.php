@extends('students.layout.student')

@section('page-title')
    Edit Student
@endsection

@section('page-description')
    Edit a students details
@endsection

@section('page-content')
    <form method="POST" action="{{ route('students.update', $student->id) }}" class="h-full basis-full flex flex-row gap-4"
        enctype="multipart/form-data">
        @csrf
        @method("PUT")

        <div class="bg-amber-50 rounded-xl p-6 basis-full space-y-6">
            @include("students.layout.form")

            {{-- SUBMIT --}}
            <div class="pt-4">
                <button type="submit"
                    class="bg-highlight w-full text-md font-semibold text-white hover:bg-green-800 shadow-md border border-gray-200 p-3 rounded-xl">
                    Edit Student
                </button>
            </div>
        </div>
    </form>
@endsection
