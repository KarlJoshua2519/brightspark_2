<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{

    public function Students()
    {
        
        return view('/teacher/teacherStudents');  
       
    }

    // public function __construct()
    // {
    //     $this->middleware('guest:teacher')->except('logout');
    // }

    // public function showRegistrationForm()
    // {
    //     return view('teacher.auth.register');
    // }

    // public function showLoginForm()
    // {
    //     return view('teacher.auth.login');
    // }

    // protected function guard()
    // {
    //     return Auth::guard('teacher'); // Define the guard for teachers
    // }

    // protected function create(array $data)
    // {
    //     return Teacher::create([
    //         'name' => $data['name'],
    //         'middleName' => $data['middleName'],
    //         'lastName' => $data['lastName'],
    //         'sex' => $data['sex'],
    //         'birthday' => $data['birthday'],
    //         'address' => $data['address'],
    //         'email' => $data['email'],
    //         'password' => Hash::make($data['password']),
    //         'contact_number' => $data['contact_number'],
    //         'contactperson' => $data['contactperson'],
    //         'contactperson_number' => $data['contactperson_number'],
    //         'id_number' => $data['id_number'],
    //         'subject' => $data['subject'],
    //         'department' => $data['department'],
    //         'program' => $data['program'],
    //         'advisory_year' => $data['advisory_year'],
    //         'advisory_section' => $data['advisory_section'],
    //         'accountStatus' => 'active', // Default value for accountStatus
    //     ]);
    // }

    // public function login(Request $request)
    // {
    //     $this->validate($request, [
    //         'email' => 'required|string|email',
    //         'password' => 'required|string',
    //     ]);

    //     if (Auth::guard('teacher')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
    //         return redirect()->intended(route('teacher.dashboard'));
    //     }

    //     return redirect()->route('teacher.login')->withErrors(['email' => 'Invalid credentials']);
    // }

    public function logout(Request $request)
    {
        Auth::guard('teacher')->logout();
        $request->session()->invalidate();
        return redirect('/teacher/login');
    }

    public function dashboard()
    {
        // Check if a teacher is authenticated
        if (auth()->guard('teacher')->check()) {
            // Teacher is authenticated, you can access teacher-specific data or perform actions
            $teacher = auth()->guard('teacher')->user();
            return view('/teacher/teacherDashboard', compact('teacher'));
        } else {
            // Teacher is not authenticated, redirect to the login page
            return redirect('/teacher/login');
        }
    }


    public function create()
    {
        if (auth()->guard('teacher')->check()){
            return redirect('teacher/teacherDashboard');
        }elseif (auth()->guard('student')->check()){
            return redirect('student/studentDashboard');
        }
        
        return view('auth/teacherRegister');
    }

    public function store(Request $request)
    {
        // Validate the registration data, including teacher-specific fields
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'middleName' => 'nullable|string|max:255',
            'lastName' => 'required|string|max:255',
            'sex' => 'required|in:male,female',
            'birthday' => 'required|date',
            'address' => 'required|string',
            'email' => 'required|string|email|max:255|unique:users',
            'contact_number' => 'required|numeric',
            'password' => 'required|string|min:8|confirmed',
            'id_number' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'program' => 'required|in:kinder,elementary,high_school',
            'advisory_year' => 'required|integer',
            'advisory_section' => 'required|string|max:255',
            'subject' => 'required', // Ensure it's an array with a maximum of 5 element // Validation for each subject in the array
        ]);

        // Create a new user record
        $user = Teacher::create([
            'name' => $request->name,
            'middleName' => $request->middleName,
            'lastName' => $request->lastName,
            'sex' => $request->sex,
            'birthday' => $request->birthday,
            'address' => $request->address,
            'email' => $request->email,
            'contact_number' => $request->contact_number,
            'user_type' => 'teacher',
            'password' => Hash::make($request->password),
            'contactperson' => $request->name,
            'contactperson_number' => $request->contact_number,
            'id_number' => $request->id_number,
            'department' => $request->department,
            'subject' => json_encode($request->input('subject')),
            'program' => $request->program,
            'advisory_year' => $request->advisory_year,
            'advisory_section' => $request->advisory_section,
        ]);

        auth()->login($user);

        // Attach subjects to the teacher
        // $teacher->subjects()->attach($request->input('subjects'));

            // Redirect to a success page or do any additional tasks
        return view('auth/teacherLogin')->with('success', 'Teacher registration successful!');
    }


    //LOGIN
    public function showLoginForm()
    {
        // return view('auth/teacherLogin');

        if (auth()->guard('teacher')->check()){
            return redirect('teacher/teacherDashboard');
        }elseif (auth()->guard('student')->check()){
            return redirect('student/studentDashboard');
        }

        return view('auth.teacherLogin');
    }

    public function login(Request $request)
    {
        // Validate the login data
        $this->validate($request, [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Attempt to authenticate the teacher
        if (Auth::guard('teacher')->attempt(['email' => $request->email, 'password' => $request->password])) {
            // Authentication successful, redirect to the teacher's dashboard or another page
            $user = Auth::guard('teacher')->user();
            return redirect('teacher/teacherDashboard')->with('success', 'Login successful!' , [
                'success' => 'Login successful!',
                'user' => $user
            ]);
        }

        // Authentication failed, redirect back with errors
        return back()->withErrors(['email' => 'Invalid login credentials']);
    }

    // public function dashboard(){
    //     return view('teacher/teacherDashboard');
    // }

    // public function logout()
    // {
    //     auth()->logout();
    // }


}
