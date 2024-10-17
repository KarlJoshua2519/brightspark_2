<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminUserController extends Controller
{
    public function createDefaultAdmin()
    {
        $admin = new User();
        $admin->name = 'Admin';
        $admin->email = 'admin@brightsparks.com';
        $admin->password = bcrypt('password'); // Hash the password securely
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
