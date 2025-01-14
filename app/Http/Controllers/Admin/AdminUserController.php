<?php

namespace App\Http\Controllers\Admin;
use App\Models\Subject;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Teacher; //
use App\Models\Student;
use App\Models\ClassModel;

class AdminUserController extends Controller
{
    public function createDefaultAdmin()
    {
        $admin = new User();
        $admin->name = 'Admin';
        $admin->email = 'admin@brightsparks.com';
        $admin->password = bcrypt('password'); 
        $admin->is_admin = true;
        $admin->save();
    
        return 'Admin user created successfully!';
    }

        // Show the admin login form
        public function showLoginForm()
        {
            if (auth()->guard('web')->check()){
                return redirect('admin/studentDashboard');
            }elseif (auth()->guard('teacher')->check()){
                return redirect('teacher/teacherDashboard');
            }elseif (auth()->guard('student')->check()){
                return redirect('student/studentDashboard');
            }
    
            return view('auth.adminLogin');
        }




        public function Announcements()
    {
        
        return view('/admin/adminAnnouncement');  
       
    }


    public function Inbox()
    {
        
        return view('/admin/adminInbox');  
       
    }

    public function AccountManagement()
    {
     
        $teachers = Teacher::all();
        $students = Student::all();

        // Optionally, you can merge them into one collection if you need to display both
        $users = $students->merge($teachers);

        // Pass users data to the view
        return view('admin.adminAccountManagement', compact('users'));
    }


   

    public function TeacherManagement()
    {
        $teachers = \App\Models\Teacher::all(); 
        return view('admin.adminTeacherManagement', compact('teachers'));
        
    }


    
    public function ClassManagement()
    {
        $classes = ClassModel::all(); // Fetch the classes from the database
        return view('admin.adminClassManagement', compact('classes'));
       
    }

  

    public function storeClass(Request $request)
    {
        // Validate incoming data
        $request->validate([
            'className' => 'required|string',
            'teacher' => 'required|string',
            'gradeLevel' => 'required|string',
            'students' => 'required|integer',
        ]);
    
        // Create the new class
        $class = new ClassModel();
        $class->class_name = $request->className;
        $class->teacher = $request->teacher;
        $class->grade_level = $request->gradeLevel;
        $class->students = $request->students;
        $class->save();
    
        // Return response
        return response()->json(['message' => 'Class added successfully!']);
    }
    public function SubjectManagement()
    {
        
        $subjects = Subject::all(); 
        
        // Return the view with the subjects data
        return view('admin.adminSubjectManagement', compact('subjects'));
       
    }

    



    public function StudentManagement()
    {
        $students = Student::all();  // Fetch all students or apply filters if needed
        return view('admin.adminStudentManagement', compact('students'));
    }
    


    public function updateStudent(Request $request)
{
    $student = Student::findOrFail($request->input('id'));

    $student->name = $request->input('name');
    $student->middleName = $request->input('middleName');
    $student->lastName = $request->input('lastName');
    $student->sex = $request->input('sex');
    $student->birthday = $request->input('birthday');
    $student->address = $request->input('address');
    $student->email = $request->input('email');
    $student->contact_number = $request->input('contact_number');
    $student->contactperson = $request->input('contactperson');
    $student->contactperson_number = $request->input('contactperson_number');
    $student->grade = $request->input('grade');
    $student->section = $request->input('section');
    $student->lrn = $request->input('lrn');

    $student->save();

    return redirect()->back()->with('success', 'Student updated successfully!');
}

    

    public function updateTeacher(Request $request)
    {
        $teacher = Teacher::findOrFail($request->input('id'));
    
        // Ensure 'user_type' is not null
        $teacher->user_type = $request->input('user_type', 'teacher');  // Default to 'teacher' if not provided
    
        $teacher->name = $request->input('name');
        $teacher->middleName = $request->input('middleName');
        $teacher->lastName = $request->input('lastName');
        $teacher->sex = $request->input('sex');
        $teacher->birthday = $request->input('birthday');
        $teacher->address = $request->input('address');
        $teacher->email = $request->input('email');
        $teacher->contact_number = $request->input('contact_number');
        $teacher->password = $request->input('password') ? bcrypt($request->input('password')) : $teacher->password;  // Update password if provided
        $teacher->contactperson = $request->input('contactperson');
        $teacher->contactperson_number = $request->input('contactperson_number');
        $teacher->id_number = $request->input('id_number');
        $teacher->subject = $request->input('subject');
        $teacher->department = $request->input('department');
        $teacher->program = $request->input('program');
        $teacher->advisory_year = $request->input('advisory_year');
        $teacher->advisory_section = $request->input('advisory_section');
    
        $teacher->save();
    
        return redirect()->back()->with('success', 'Teacher updated successfully!');
    }
    

  

    
    
    
        // Handle the admin login attempt
        public function login(Request $request)
        {
            $credentials = $request->only('email', 'password');
    
            if (auth('web')->attempt($credentials)) {
                // Authentication successful for admin
                // return redirect()->intended('/admin/adminDashboard'); // Redirect to the admin dashboard
                // $user = Auth::guard('web')->user();
                // session()->flash('user', $user);
                return redirect('/admin/dashboard'); 


            }
    
            // Authentication failed
            return back()->withInput()->withErrors(['email' => 'Invalid credentials']);
        }
    
        // Log out the admin user
        public function logout()
        {
            auth('web')->logout();
            return redirect('/admin/login'); // Redirect to the admin login page
        }
}
