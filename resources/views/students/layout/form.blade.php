    {{-- STUDENT ID --}}
    <div>
        <label for="id" class="font-medium">Student ID (USN or LRN) <span class="text-red-400">*</span></label>
        <input type="text" name="id" id="studentid" placeholder="USN or LRN"
            class="w-full mt-1 p-2 bg-white border border-gray-300 rounded-xl" required />
    </div>

    {{-- NAME GROUP --}}
    <div>
        <h2 class="font-semibold text-lg mb-2">Full Name</h2>
        <div class="grid grid-cols-3 gap-3">
            <div>
                <label for="first_name">First Name <span class="text-red-400">*</span></label>
                <input type="text" name="first_name" id="first_name" placeholder="First Name"
                    class="w-full p-2 bg-white border border-gray-300 rounded-xl" required />
            </div>

            <div>
                <label for="middle_name">Middle Name</label>
                <input type="text" name="middle_name" id="middle_name" placeholder="Middle Name"
                    class="w-full p-2 bg-white border border-gray-300 rounded-xl" />
            </div>

            <div>
                <label for="last_name">Last Name <span class="text-red-400">*</span></label>
                <input type="text" name="last_name" id="last_name" placeholder="Last Name"
                    class="w-full p-2 bg-white border border-gray-300 rounded-xl" required />
            </div>
        </div>
    </div>

    {{-- PERSONAL INFO --}}
    <div class="grid grid-cols-2 gap-3">
        <div>
            <label for="gender">Gender <span class="text-red-400">*</span></label>
            <select name="gender" id="gender" class="w-full p-2 bg-white border border-gray-300 rounded-xl" required>
                <option value="" disabled selected>Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
        </div>

        <div>
            <label for="date_of_birth">Date of Birth</label>
            <input type="date" name="date_of_birth" id="date_of_birth"
                class="w-full p-2 bg-white border border-gray-300 rounded-xl" />
        </div>
    </div>

    {{-- ACADEMIC INFO --}}
    <div>
        <h2 class="font-semibold text-lg mb-2">Academic Information</h2>
        <div class="grid grid-cols-3 gap-3">
            <div>
                <label for="course">Course <span class="text-red-400">*</span></label>
                <input type="text" name="course" id="course" placeholder="e.g. BSCS"
                    class="w-full p-2 bg-white border border-gray-300 rounded-xl" required />
            </div>

            <div>
                <label for="year_level">Year Level <span class="text-red-400">*</span></label>
                <select name="year_level" id="year_level" class="w-full p-2 bg-white border border-gray-300 rounded-xl"
                    required>
                    <option value="" disabled selected>Select Year</option>
                    <option value="Grade 11">Grade 11</option>
                    <option value="Grade 12">Grade 12</option>
                    <option value="1st Year">1st Year</option>
                    <option value="2nd Year">2nd Year</option>
                    <option value="3rd Year">3rd Year</option>
                    <option value="4th Year">4th Year</option>
                </select>
            </div>

            <div>
                <label for="section">Section <span class="text-red-400">*</span></label>
                <input type="text" name="section" id="section" placeholder="Section"
                    class="w-full p-2 bg-white border border-gray-300 rounded-xl" required />
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
                    class="w-full p-2 bg-white border border-gray-300 rounded-xl"></textarea>
            </div>

            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label for="phone">Phone Number</label>
                    <input type="text" name="phone" id="phone" placeholder="Phone Number"
                        class="w-full p-2 bg-white border border-gray-300 rounded-xl" />
                </div>

                <div>
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Email Address"
                        class="w-full p-2 bg-white border border-gray-300 rounded-xl" />
                </div>
            </div>
        </div>
    </div>
