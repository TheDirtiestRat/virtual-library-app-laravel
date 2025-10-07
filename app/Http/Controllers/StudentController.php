<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Student;

class StudentController extends Controller
{
    // manage functions
    public function list(): View
    {
        $students = Student::latest()->paginate(100);
        $courses = Student::select('course')->distinct()->get();
        $all_students = Student::count();

        return view('students.list', compact('students', 'courses', 'all_students'));
    }

    public function create(): View
    {
        return view("students.create");
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'course' => 'required|string|max:50',
            'year_level' => 'required|integer',
            'section' => 'required|string|max:50',
            'gender' => 'required|string',
            'date_of_birth' => 'required|date',
            'address' => 'required|string',
            'email' => 'required|email|unique:students,email',
        ]);

        Student::create($validated);
        return redirect()->back()->with('success', 'Student added successfully!');
    }
}
