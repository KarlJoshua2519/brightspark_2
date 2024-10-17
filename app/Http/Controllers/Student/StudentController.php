<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{


    public function Profile()
    {
       
        return view('/student/studentProfile');  
       
    }


    public function Subjects()
    {
        
        return view('/student/studentSubjects');  
       
    }


    public function Grades()
    {
        
        return view('/student/studentGrades');  
       
    }


    public function Inbox()
    {
        
        return view('/student/studentInbox');  
       
    }

    public function PaymentChannels()
    {
        
        return view('/student/studentPaymentChannels');  
       
    }
    // public function __construct()
    // {
    //     $this->middleware('guest:student')->except('logout');
    // }

    // public function showRegistrationForm()
    // {
    //     return view('student.auth.register');
    // }

    // public function showLoginForm()
    // {
    //     return view('student.auth.login');
    // }

    // protected function guard()
    // {
    //     return Auth::guard('student'); // Define the guard for students
    // }

    // protected function create(array $data)
    // {
    //     return Student::create([
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
    //         'grade' => $data['grade'],
    //         'section' => $data['section'],
    //         'lrn' => $data['lrn'],
    //     ]);
    // }

    // public function login(Request $request)
    // {
    //     $this->validate($request, [
    //         'email' => 'required|string|email',
    //         'password' => 'required|string',
    //     ]);

    //     if (Auth::guard('student')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
    //         return redirect()->intended(route('student.dashboard'));
    //     }

    //     return redirect()->route('student.login')->withErrors(['email' => 'Invalid credentials']);
    // }

    public function logout(Request $request)
    {
        Auth::guard('student')->logout();
        $request->session()->invalidate();
        return redirect('/student/login');
    }
    
    public function dashboard()
    {
        // Check if a student is authenticated
        if (auth()->guard('student')->check()) {
            // Student is authenticated, you can access student-specific data or perform actions
            $student = auth()->guard('student')->user();
            return view('/student/studentDashboard', compact('student'));
        } else {
            // Student is not authenticated, redirect to the login page
            return redirect('/student/login');
        }
    }

    public function create()
    {
        if (auth()->guard('student')->check()){
            return redirect('student/studentDashboard');
        }elseif (auth()->guard('teacher')->check()){
            return redirect('teacher/teacherDashboard');
        }
        return view('auth.learnersRegistration');
    }

    public function store(Request $request)
    {
        // Validate the registration data, including student-specific fields
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
            'contactperson' => 'required|string|max:255',
            'contactperson_number' => 'required|numeric',
            'grade' => 'required|string|max:255', // Add validation for grade
            'section' => 'required|string|max:255', // Add validation for section
            'lrn' => 'required|string|max:255', // Add validation for LRN
        ]);


         // Create a new user record
         $user = Student::create([
            'name' => $request->name,
            'middleName' => $request->middleName,
            'lastName' => $request->lastName,
            'sex' => $request->sex,
            'birthday' => $request->birthday,
            'address' => $request->address,
            'email' => $request->email,
            'contact_number' => $request->contact_number,
            'user_type' => 'student', // Set the user_type to 'student'
            'password' => Hash::make($request->password),
            'contactperson' => $request->contactperson,
            'contactperson_number' => $request->contactperson_number,
            'grade' => $request->grade,
            'section' => $request->section,
            'lrn' => $request->lrn,
        ]);



        auth()->login($user);

        // Redirect to a success page or do any additional tasks
        return view('auth/studentLogin')->with('success', 'Student registration successful!');
    }


    //STUDENT LOGIN

    public function showLoginForm()
    {
        // return view('auth/studentLogin');

        if (auth()->guard('student')->check()){
            return redirect('student/studentDashboard');
        }elseif (auth()->guard('teacher')->check()){
            return redirect('teacher/teacherDashboard');
        }

        return view('auth.studentLogin');
    }

    public function login(Request $request)
    {
        // Validate the login data
        $this->validate($request, [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Attempt to authenticate the student
        if (Auth::guard('student')->attempt(['email' => $request->email, 'password' => $request->password])) {
            // Authentication successful, redirect to the student's dashboard or another page

            $user = Auth::guard('student')->user();
            return redirect('student/studentDashboard')->with('success', 'Login successful!' , [
                'success' => 'Login successful!',
                'user' => $user
            ]);
        }

        // Authentication failed, redirect back with errors
        return back()->withErrors(['email' => 'Invalid login credentials']);
    }

    // public function dashboard(){
    //     $user = Auth::guard('student')->user();
    //     return view('/student/studentDashboard', ['user' => $user]);
    // }

    // public function logout(Request $request)
    // {
    //     auth()->logout();
    
    //     $request->session()->invalidate();
    //     $request->session()->regenerateToken();
    
    //     return redirect('/student/login')->with('success', 'Logout successful');
    // }
    
}
