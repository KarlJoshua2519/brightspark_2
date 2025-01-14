<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Support\Facades\Log;
class AdminSubjectController extends Controller
{

    public function index()
    {
        // Fetch all subjects
        $subjects = Subject::all(); 
        
        // Return the view with the subjects data
        return view('admin.adminSubjectManagement', compact('subjects'));
    }
    

    public function store(Request $request)
{
    try {
        // Validate the incoming request
        $validated = $request->validate([
            'subjectName' => 'required|string|max:255',
            'subjectTeacherEmail' => 'required|email|exists:teachers,email', // Validate teacher email
            'subjectCode' => 'required|string|max:255',
            'subjectGrade' => 'required|string|max:255',
        ]);

        // Fetch the teacher's details by email
        $teacher = Teacher::where('email', $request->subjectTeacherEmail)->first();

        if (!$teacher) {
            return response()->json(['message' => 'Teacher not found'], 404);
        }

        // Create a new subject
        $subject = Subject::create([
            'name' => $request->subjectName,
            'teacher' => $teacher->name, // Store teacher's name
            'teacher_email' => $teacher->email, // Store teacher's email
            'code' => $request->subjectCode,
            'grade' => $request->subjectGrade,
        ]);

        return response()->json(['success' => 'Subject created successfully']);

    } catch (\Exception $e) {
        // Handle unexpected errors
        return response()->json(['error' => 'Failed to add subject: ' . $e->getMessage()], 500);
    }
}




public function assignSubject(Request $request)
{
    // Validate the incoming request
    $request->validate([
        'teacher_email' => 'required|email|exists:teachers,email',
        'name' => 'required|string',
        'code' => 'required|string',
        'grade' => 'required|string',
    ]);

    // Find the teacher by email
    $teacher = Teacher::where('email', $request->teacher_email)->first();
    
    if ($teacher) {
        // Create a new subject and assign the teacher's email to the teacher_email column
        Subject::create([
            'name' => $request->name,
            'teacher' => $teacher->name,
            'teacher_email' => $teacher->email,  // Store the teacher's email in the teacher_email column
            'code' => $request->code,
            'grade' => $request->grade
        ]);

        return response()->json(['success' => 'Subject assigned to teacher successfully!']);
    }

    return response()->json(['message' => 'Teacher not found.'], 404);
}


    
}
