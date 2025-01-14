<?php

use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Teacher\TeacherController;
use App\Http\Controllers\Admin\AdminSubjectController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Route::get('/admindashboard', function () {
//     return view('admin/adminDashboard');
// });



// routes/web.php
Route::get('/create-admin', [AdminUserController::class, 'createDefaultAdmin']);
// routes/web.php
Route::middleware(['web'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.adminDashboard');
    });
    Route::get('/admin/adminAccountManagement', [AdminUserController::class, 'AccountManagement'])->name('admin.account-management');
    Route::get('/admin/adminSubjectManagement', [AdminSubjectController::class, 'index']);
    Route::get('/admin/adminClassManagement', [AdminUserController::class, 'ClassManagement']);

Route::post('/admin/class/store', [AdminUserController::class, 'storeClass'])->name('admin.class.store');
Route::get('/admin/classes', [AdminUserController::class, 'ClassManagement'])->name('admin.classes');
    Route::get('/admin/adminTeacherManagement', [AdminUserController::class, 'teacherManagement'])->name('admin.teacherManagement'); 
    Route::put('/admin/teacher/update', [AdminUserController::class, 'updateTeacher'])->name('admin.teacher.update');
    Route::post('/admin/subjects', [AdminSubjectController::class, 'store'])->name('admin.subjects.store');
    Route::post('/admin/subjects/assign', [AdminSubjectController::class, 'assignSubject'])->name('admin.subjects.assign');
    Route::get('/admin/adminStudentManagement', [AdminUserController::class, 'StudentManagement']);
    Route::put('/admin/student/update', [AdminUserController::class, 'updateStudent'])->name('admin.student.update');
    Route::get('/admin/subjects', [AdminSubjectController::class, 'index'])->name('admin.subjects.index');
    Route::get('/admin/adminAccountManagement', [AdminUserController::class, 'AccountManagement']);
    Route::get('/admin/adminAnnouncement', [AdminUserController::class, 'Announcements']);
    Route::get('/admin/adminInbox', [AdminUserController::class, 'Inbox']);
    Route::post('/admin/logout', [AdminUserController::class, 'logout']);
});


Route::get('/about', function () {
    return view('aboutus');
})->name('aboutus');

Route::get('/announcements', function () {
    return view('announcements');
})->name('announcements');


// Apply 'auth' middleware to protect the following routes
Route::middleware(['auth:student', \App\Http\Middleware\DisableBrowserCache::class])->group(function () {
    // Student Dashboard Route
    Route::get('/student/studentDashboard', [StudentController::class, 'dashboard']);
    Route::get('/student/studentProfile', [StudentController::class, 'Profile'])->name('profile');
    Route::post('/student/update-profile-picture', [StudentController::class, 'updateProfilePicture'])->name('student.updateProfilePicture');
    Route::get('/student/profile', [StudentController::class, 'Profile'])->name('student.profile');
    Route::put('/student/update-profile', [StudentController::class, 'updateProfile'])->name('student.updateProfile');
    Route::get('/student/studentSubjects', [StudentController::class, 'Subjects'])->name('subjects');
    Route::get('/student/studentGrades', [StudentController::class, 'Grades'])->name('grades');
    Route::get('/student/studentInbox', [StudentController::class, 'Inbox'])->name('inbox');
    Route::get('/student/studentPaymentChannels', [StudentController::class, 'PaymentChannels'])->name('payment');
    Route::post('/student/logout', [StudentController::class, 'logout']);

});

// Admin Login Routes
Route::get('/admin/login', [AdminUserController::class, 'showLoginForm']);
Route::post('/admin/signin', [AdminUserController::class, 'login'])->name('admin.signin');


// Student Login Routes
Route::get('/student/login', [StudentController::class, 'showLoginForm']);
Route::post('/learners/signin', [StudentController::class, 'login']);

// Student Registration Routes
Route::get('/student/registration', [StudentController::class, 'create']);
Route::post('/student/registered', [StudentController::class, 'store']);







// Apply 'auth' middleware to protect the following routes
Route::middleware(['auth:teacher', \App\Http\Middleware\DisableBrowserCache::class])->group(function () {
    // Teacher Dashboard Route
    Route::get('/teacher/teacherDashboard', [TeacherController::class, 'dashboard']);
    Route::get('/teacher/teacherStudents', [TeacherController::class, 'students']);
    Route::get('/teacher/teacherClasses', [TeacherController::class, 'classes']);
    Route::get('/teacher/teacherProfile', [TeacherController::class, 'profile'])->name('teacher.profile');


    // Assuming your teacher's update method is in the TeacherController
    Route::put('/teacher/{id}', [TeacherController::class, 'update'])->name('teacher.update');
    
    Route::get('/teacher/teacherSubjects', [TeacherController::class, 'subjects']);
  
    Route::get('/teacher/teacherInbox', [TeacherController::class, 'inbox']);
    Route::get('/conversation/{id}', [TeacherController::class, 'show'])->name('conversation');

    Route::post('/teacher/logout/', [TeacherController::class, 'logout']);
    
    // Add other routes here that require teacher authentication
    // For example, routes for managing classes, updating profile, etc.
});

// Teacher Registration Routes
Route::get('/teacher/registration', [TeacherController::class, 'create']);
Route::post('/teacher/registered', [TeacherController::class, 'store']);

// Teacher Login Routes
Route::get('/teacher/login', [TeacherController::class, 'showLoginForm']);
Route::post('/teachers/signin', [TeacherController::class, 'login']);








