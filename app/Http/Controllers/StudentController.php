<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Student;

class StudentController extends Controller
{
    // Display all students
    public function list(): View
    {
        $students = Student::latest()->paginate(100);
        $courses = Student::select('course')->distinct()->get();
        $all_students = Student::count();

        return view('students.list', compact('students', 'courses', 'all_students'));
    }

    // Show the form for creating a new student
    public function create(): View
    {
        return view("students.create");
    }

    // Store a newly created student in the database
    public function store(Request $request)
    {
        $validated = $request->validate([
            // Identifiers
            'id' => 'required|string|max:50|unique:students,id',

            // Personal info
            'first_name' => 'required|string|max:50',
            'middle_name' => 'nullable|string|max:50',
            'last_name' => 'required|string|max:50',
            'gender' => 'required|in:male,female,other',
            'date_of_birth' => 'nullable|date',

            // Academic info
            'course' => 'required|string|max:100',
            'year_level' => 'required|in:Grade 11,Grade 12,1st Year,2nd Year,3rd Year,4th Year',
            'section' => 'required|string|max:50',

            // Contact info
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|unique:students,email',
        ]);

        Student::create($validated);

        return redirect()
            ->back()
            ->with('success', 'Student added successfully!');
    }
    public function edit(string $id)
    {
        $student = Student::findOrFail($id);
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            // Identifiers
            'id' => 'required|string|max:50',

            // Personal info
            'first_name' => 'required|string|max:50',
            'middle_name' => 'nullable|string|max:50',
            'last_name' => 'required|string|max:50',
            'gender' => 'required|in:male,female,other',
            'date_of_birth' => 'nullable|date',

            // Academic info
            'course' => 'required|string|max:100',
            'year_level' => 'required|in:Grade 11,Grade 12,1st Year,2nd Year,3rd Year,4th Year',
            'section' => 'required|string|max:50',

            // Contact info
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|unique:students,email',
        ]);

        $student->update($validated);

        return redirect()->route('students.list')->with('success', 'Student updated successfully!');
    }
}
