<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\Student;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{

    public function Students()
{
    // Fetch the students related to the logged-in teacher, for example by advisory year and section
    $teacher = auth()->guard('teacher')->user(); // Get the logged-in teacher
    $students = Student::where('grade', $teacher->advisory_year)
                       ->where('section', $teacher->advisory_section)
                       ->get(); // Fetch students in the teacher's advisory class
    
    // Pass the students to the view
    return view('/teacher/teacherStudents', compact('students'));
}



public function subjects()
{
    // Get the logged-in teacher's subjects
    $teacher = auth()->user();  // Assuming the teacher is logged in
    $subjects = $teacher->subjects;  // This assumes the Teacher model has a 'subjects' relationship

    return view('teacher.teacherSubjects', compact('subjects'));
}

    public function Inbox()
    {
        
        return view('/teacher/teacherInbox');  
       
    }

    public function Classes()
    {
        
        return view('/teacher/teacherClasses');  
       
    }

    public function Profile()
    {
        
        $teacher = Auth::guard('teacher')->user(); // Get the logged-in teacher
        return view('teacher/teacherProfile', compact('teacher')); // Pass the teacher to the view
       
    }

   

    public function logout(Request $request)
    {
        Auth::guard('teacher')->logout();
        $request->session()->invalidate();
        return redirect('/teacher/login');
    }

    public function dashboard()
    {
    
        if (auth()->guard('teacher')->check()) {
          
            $teacher = auth()->guard('teacher')->user();
            return view('/teacher/teacherDashboard', compact('teacher'));
        } else {
        
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
            'subject' => 'required', 
        ]);


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

       
        return view('auth/teacherLogin')->with('success', 'Teacher registration successful!');
    }


    public function update(Request $request, $id)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'middleName' => 'nullable|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'contact_number' => 'required|string|max:15',
            'address' => 'nullable|string|max:255',
            'department' => 'required|string|max:255',
            'program' => 'nullable|string|max:255',
            'subject' => 'nullable|string|max:255',
        ]);

        // Find the teacher by ID and update their details
        $teacher = Teacher::findOrFail($id);
        $teacher->update([
            'name' => $request->name,
            'middleName' => $request->middleName,
            'lastName' => $request->lastName,
            'email' => $request->email,
            'contact_number' => $request->contact_number,
            'address' => $request->address,
            'department' => $request->department,
            'program' => $request->program,
            'subject' => json_encode(explode(',', $request->subject)),
        ]);

        // Redirect back with a success message
        return redirect()->route('teacher.profile', $teacher->id)
                         ->with('success', 'Profile updated successfully.');
    }

    
    public function showLoginForm()
    {
       

        if (auth()->guard('teacher')->check()){
            return redirect('teacher/teacherDashboard');
        }elseif (auth()->guard('student')->check()){
            return redirect('student/studentDashboard');
        }

        return view('auth.teacherLogin');
    }

    public function login(Request $request)
    {
      
        $this->validate($request, [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

    
        if (Auth::guard('teacher')->attempt(['email' => $request->email, 'password' => $request->password])) {
            // Authentication successful, redirect to the teacher's dashboard or another page
            $user = Auth::guard('teacher')->user();
            return redirect('teacher/teacherDashboard')->with('success', 'Login successful!' , [
                'success' => 'Login successful!',
                'user' => $user
            ]);
        }

     
        return back()->withErrors(['email' => 'Invalid login credentials']);
    }

  

}
