<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required|string',
            'nim' => 'required|string',
        ]);

        $student = Student::where('name', $credentials['name'])->first();

        if ($student && $student->nim === $credentials['nim']) {
            // Set session variables to maintain login state
            Session::put('student_id', $student->no);
            Session::put('student_name', $student->name);
            Session::put('logged_in', true);

            return redirect()->route('students.index')
                ->with('success', 'Login successful!');
        }

        return back()->withErrors([
            'name' => 'The provided credentials do not match our records.',
        ]);
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nim' => 'required|string|max:255|unique:students,nim',
        ]);

        $student = Student::create([
            'name' => $request->name,
            'nim' => $request->nim,
        ]);

        // Set session variables after registration
        Session::put('student_id', $student->no);
        Session::put('student_name', $student->name);
        Session::put('logged_in', true);

        return redirect()->route('students.index')
            ->with('success', 'Registration successful!');
    }

    public function logout()
    {
        Session::forget(['student_id', 'student_name', 'logged_in']);

        return redirect()->route('login')
            ->with('success', 'You have been logged out.');
    }
}
