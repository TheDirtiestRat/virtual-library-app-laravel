{{-- STUDENT ID --}}
<div>
    <label for="id" class="font-medium">Student ID (USN or LRN) <span class="text-red-400">*</span></label>
    <input type="text" name="id" id="id" placeholder="USN or LRN"
        class="w-full mt-1 p-2 bg-white border border-gray-300 rounded-xl" required
        value="{{ old('id', $student->id ?? '') }}" />
</div>

{{-- NAME GROUP --}}
<div>
    <h2 class="font-semibold text-lg mb-2">Full Name</h2>
    <div class="grid grid-cols-3 gap-3">
        <div>
            <label for="first_name">First Name <span class="text-red-400">*</span></label>
            <input type="text" name="first_name" id="first_name" placeholder="First Name"
                class="w-full p-2 bg-white border border-gray-300 rounded-xl" required
                value="{{ old('first_name', $student->first_name ?? '') }}" />
        </div>

        <div>
            <label for="middle_name">Middle Name</label>
            <input type="text" name="middle_name" id="middle_name" placeholder="Middle Name"
                class="w-full p-2 bg-white border border-gray-300 rounded-xl"
                value="{{ old('middle_name', $student->middle_name ?? '') }}" />
        </div>

        <div>
            <label for="last_name">Last Name <span class="text-red-400">*</span></label>
            <input type="text" name="last_name" id="last_name" placeholder="Last Name"
                class="w-full p-2 bg-white border border-gray-300 rounded-xl" required
                value="{{ old('last_name', $student->last_name ?? '') }}" />
        </div>
    </div>
</div>

{{-- PERSONAL INFO --}}
<div class="grid grid-cols-2 gap-3">
    <div>
        <label for="gender">Gender <span class="text-red-400">*</span></label>
        <select name="gender" id="gender" class="w-full p-2 bg-white border border-gray-300 rounded-xl" required>
            <option value="" disabled {{ old('gender', $student->gender ?? '') == '' ? 'selected' : '' }}>Select Gender
            </option>
            <option value="male" {{ old('gender', $student->gender ?? '') == 'Male' ? 'selected' : '' }}>Male</option>
            <option value="female" {{ old('gender', $student->gender ?? '') == 'Female' ? 'selected' : '' }}>Female
            </option>
            <option value="other" {{ old('gender', $student->gender ?? '') == 'Other' ? 'selected' : '' }}>Other</option>
        </select>
    </div>

    <div>
        <label for="date_of_birth">Date of Birth</label>
        <input type="date" name="date_of_birth" id="date_of_birth"
            class="w-full p-2 bg-white border border-gray-300 rounded-xl"
            value="{{ old('date_of_birth', $student->date_of_birth ?? '') }}" />
    </div>
</div>

{{-- ACADEMIC INFO --}}
<div>
    <h2 class="font-semibold text-lg mb-2">Academic Information</h2>
    <div class="grid grid-cols-3 gap-3">
        <div>
            <label for="course">Course <span class="text-red-400">*</span></label>
            <input type="text" name="course" id="course" placeholder="e.g. BSCS"
                class="w-full p-2 bg-white border border-gray-300 rounded-xl" required
                value="{{ old('course', $student->course ?? '') }}" />
        </div>

        <div>
            <label for="year_level">Year Level <span class="text-red-400">*</span></label>
            <select name="year_level" id="year_level" class="w-full p-2 bg-white border border-gray-300 rounded-xl"
                required>
                <option value="" disabled {{ old('year_level', $student->year_level ?? '') == '' ? 'selected' : '' }}>Select Year</option>
                @foreach (['Grade 11', 'Grade 12', '1st Year', '2nd Year', '3rd Year', '4th Year'] as $year)
                    <option value="{{ $year }}" {{ old('year_level', $student->year_level ?? '') == $year ? 'selected' : '' }}>
                        {{ $year }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="section">Section <span class="text-red-400">*</span></label>
            <input type="text" name="section" id="section" placeholder="Section"
                class="w-full p-2 bg-white border border-gray-300 rounded-xl" required
                value="{{ old('section', $student->section ?? '') }}" />
        </div>
    </div>
</div>

{{-- CONTACT INFO --}}
<div>
    <h2 class="font-semibold text-lg mb-2">Contact Information</h2>
    <div class="space-y-3">
        <div>
            <label for="address">Address</label>
            <textarea name="address" id="address" rows="3" placeholder="Address"
                class="w-full p-2 bg-white border border-gray-300 rounded-xl">{{ old('address', $student->address ?? '') }}</textarea>
        </div>

        <div class="grid grid-cols-2 gap-3">
            <div>
                <label for="phone">Phone Number</label>
                <input type="text" name="phone" id="phone" placeholder="Phone Number"
                    class="w-full p-2 bg-white border border-gray-300 rounded-xl"
                    value="{{ old('phone', $student->phone ?? '') }}" />
            </div>

            <div>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Email Address"
                    class="w-full p-2 bg-white border border-gray-300 rounded-xl"
                    value="{{ old('email', $student->email ?? '') }}" />
            </div>
        </div>
    </div>
</div>
