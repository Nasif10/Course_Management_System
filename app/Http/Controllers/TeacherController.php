<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Course;
use App\Models\Enroll;
use Session;

class TeacherController extends Controller
{
    private $teacher;
    private $teachers;
    
    public function home()
    {
        $this->totalCourse = Course::where('teacher_id', Session::get('t_id'))->where('status', 1)->get()->count();
        $cid = Course::where('teacher_id', Session::get('t_id'))->pluck('id');
        $this->totalUser = Enroll::whereIn('course_id', $cid)->where('enroll_status', 1)->count();
        return view('teacher.home.home', ['totalCourse' => $this->totalCourse, 'totalUser' => $this->totalUser]);
    }

    public function login()
    {
        return view('teacher.auth.login');
    }

    public function signin(Request $request)
    {
        $this->teacher = Teacher::where('email', $request->email)->where('status', 1)->first();
        if($this->teacher){
            if(md5($request->password) == $this->teacher->password)
            {
                Session::put('t_id', $this->teacher->id);
                Session::put('t_name', $this->teacher->name);
                return redirect()->route('teacher-home');
            }
            else{
                return redirect()->back()->with('msg', 'Password Invalid!');
            }
        }
        else{
            return redirect()->back()->with('msg', 'Account Disabled!');
        }

    }

    public function register()
    {
        return view('teacher.auth.register');
    }

    public function create(Request $request)
    {
        Teacher::newTeacher($request);
        return redirect()->back()->with('msg', 'Teacher Added!');
    }

    public function manage(){
        $this->teachers = Teacher::orderBy('id', 'desc')->get();
        return view('admin.teacher.manage', ['teachers' => $this->teachers] );
    }

    public function edit($id){
        $this->teacher = Teacher::find($id);
        return view('admin.teacher.edit', ['teacher' => $this->teacher] );
    }

    public function update(Request $request, $id){
        Teacher::updateTeacher($request, $id);
        return redirect()->back()->with('msg', 'Teacher Updated!');
    }

    public function delete($id){
        $this->teacher = Teacher::find($id);
        if(file_exists($this->teacher->image)){
            unlink($this->teacher->image);
        }
        $this->teacher->delete();
        return redirect()->back()->with('msg', 'Teacher Deleted!');
    }

    public function logout()
    {
        Session::forget('t_id');
        Session::forget('t_name');
        return redirect()->route('teacher-login');
    }

}
