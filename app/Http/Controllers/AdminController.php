<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Teacher;
use App\Models\Course;
use App\Models\User;
use Session;

class AdminController extends Controller
{
    private $admin;
    
    public function home()
    {
        $this->totalTeacher = Teacher::where('status', 1)->get()->count();
        $this->totalCourse  = Course::where('status', 1)->get()->count();
        $this->totalUser    = User::all()->count();
        return view('admin.home.home', ['totalTeacher' => $this->totalTeacher, 'totalCourse' => $this->totalCourse, 'totalUser' => $this->totalUser]);
    }

    public function login()
    {
        return view('admin.auth.login');
    }

    public function signin(Request $request)
    {
        $this->admin = Admin::where('email', $request->email)->first();
        if($this->admin){
            if(md5($request->password) == $this->admin->password)
            {
                Session::put('a_id', $this->admin->id);
                Session::put('a_name', $this->admin->name);
                return redirect()->route('admin-home');
            }
            else{
                return redirect()->back()->with('msg', 'Password Invalid!');
            }
        }
        else{
            return redirect()->back()->with('msg', 'Error!');
        }
    }

    public function register()
    {
        return view('admin.auth.register');
    }

    public function create(Request $request)
    {
        Admin::newAdmin($request);
        return redirect()->back()->with('msg', 'Admin Created!');
    }

    public function logout()
    {
        Session::forget('a_id');
        Session::forget('a_name');
        return redirect()->route('admin-login');
    }
    
}
