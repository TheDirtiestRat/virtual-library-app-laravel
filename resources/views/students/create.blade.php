@extends('students.layout.student')


@section('title-Page')
    Add New Student
@endsection

@section('page-Description')
    Register a new student to borrow books
@endsection

@section('page-content')
    <form method="POST" action="{{ url('/students/store') }}" class="h-full basis-full flex flex-row gap-4"
        enctype="multipart/form-data">
        @csrf
        <div class="bg-amber-50 rounded-xl p-4 basis-full">
            <div class="basis-full grid grid-cols-3 gap-2 h-full">

                {{-- Student Name --}}
                <div class="col-span-1">
                    <label for="first_name">First Name <span class="text-red-400">*</span></label>
                    <input type="text" name="first_name" id="first_name" placeholder="First Name"
                        class="w-full p-2 bg-white border border-gray-300 rounded-xl" required />
                </div>

                <div class="col-span-1">
                    <label for="middle_name">Middle Name</label>
                    <input type="text" name="middle_name" id="middle_name" placeholder="Middle Name"
                        class="w-full p-2 bg-white border border-gray-300 rounded-xl" />
                </div>

                <div class="col-span-1">
                    <label for="last_name">Last Name <span class="text-red-400">*</span></label>
                    <input type="text" name="last_name" id="last_name" placeholder="Last Name"
                        class="w-full p-2 bg-white border border-gray-300 rounded-xl" required />
                </div>

                {{-- Course, Year, Section --}}
                <div class="col-span-1">
                    <label for="course">Course <span class="text-red-400">*</span></label>
                    <input type="text" name="course" id="course" placeholder="Course"
                        class="w-full p-2 bg-white border border-gray-300 rounded-xl" required />
                </div>

                <div class="col-span-1">
                    <label for="year_level">Year Level <span class="text-red-400">*</span></label>
                    <select name="year_level" id="year_level" class="w-full p-2 bg-white border border-gray-300 rounded-xl"
                        required>
                        <option value="" disabled selected>Select Year</option>
                        <option value="1">Grade 11</option>
                        <option value="1">Grade 12</option>
                        <option value="1">1st Year</option>
                        <option value="2">2nd Year</option>
                        <option value="3">3rd Year</option>
                        <option value="4">4th Year</option>
                    </select>
                </div>

                <div class="col-span-1">
                    <label for="section">Section <span class="text-red-400">*</span></label>
                    <input type="text" name="section" id="section" placeholder="Section"
                        class="w-full p-2 bg-white border border-gray-300 rounded-xl" required />
                </div>

                {{-- Gender and DOB --}}
                <div class="col-span-1">
                    <label for="gender">Gender <span class="text-red-400">*</span></label>
                    <select name="gender" id="gender" class="w-full p-2 bg-white border border-gray-300 rounded-xl"
                        required>
                        <option value="" disabled selected>Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>

                <div class="col-span-1">
                    <label for="date_of_birth">Date of Birth <span class="text-red-400">*</span></label>
                    <input type="date" name="date_of_birth" id="date_of_birth"
                        class="w-full p-2 bg-white border border-gray-300 rounded-xl" required />
                </div>

                {{-- Contact Info --}}
                <div class="col-span-full">
                    <label for="address">Address <span class="text-red-400">*</span></label>
                    <textarea name="address" id="address" rows="3" placeholder="Address"
                        class="w-full p-2 bg-white border border-gray-300 rounded-xl" required></textarea>
                </div>

                <div class="col-span-1">
                    <label for="phone">Phone Number</label>
                    <input type="text" name="phone" id="phone" placeholder="Phone Number"
                        class="w-full p-2 bg-white border border-gray-300 rounded-xl" />
                </div>

                <div class="col-span-2">
                    <label for="email">Email <span class="text-red-400">*</span></label>
                    <input type="email" name="email" id="email" placeholder="Email Address"
                        class="w-full p-2 bg-white border border-gray-300 rounded-xl" required />
                </div>

                {{-- Submit --}}
                <button type="submit"
                    class="bg-highlight text-md font-semibold text-white hover:bg-green-800 shadow-md border border-gray-200 p-3 rounded-xl col-span-full">
                    Add Student
                </button>
            </div>
        </div>
    </form>
@endsection
