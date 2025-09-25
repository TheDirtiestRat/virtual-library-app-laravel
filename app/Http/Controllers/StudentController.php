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

        return view('students.list',compact('students', 'courses', 'all_students'));
    }
}
