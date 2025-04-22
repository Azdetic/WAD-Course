<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    public function index()
    {
        // Check if the user is logged in
        if (!Session::get('logged_in')) {
            return redirect()->route('login');
        }

        $students = Student::all();
        return view('students.index', compact('students'));
    }
}
