<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Course;
use App\Models\Enroll;
use App\Models\Notice;
use Session;

class SiteController extends Controller
{
    private $course;
    private $courses;
    private $enrolls;
    private $notices;
    private $notice;
    private $user;
    private $check = false;
    
    public function index()
    {
        $this->courses = Course::leftJoin('teachers', 'teachers.id', '=', 'courses.teacher_id')->where('courses.status', '1')->where('teachers.status', '1')->orderBy('courses.updated_at', 'desc')->take(4)->get(['courses.*']);
        $this->notices = Notice::orderBy('id', 'desc')->get();
        foreach ($this->notices as $n) {
            $this->notice .= "**<b class='text-primary'>".$n->title."</b>** ".$n->body."&emsp; &emsp;";
        }
        return view('site.home.home', [ 'courses' => $this->courses, 'notice' => Str::of($this->notice)->toHtmlString()]);
    }

    public function courses()
    {
        $this->courses = Course::leftJoin('teachers', 'teachers.id', '=', 'courses.teacher_id')->where('courses.status', '1')->where('teachers.status', '1')->get(['courses.*']);
        return view('site.course.courses', [ 'courses' => $this->courses]);
    }

    public function searchCourse(Request $request)
    {
        $this->courses = Course::leftJoin('teachers', 'teachers.id', '=', 'courses.teacher_id')->where('courses.status', '1')->where('teachers.status', '1')->where('courses.name', 'like', "%{$request->search}%")->get(['courses.*']);
        return view('site.course.courses', [ 'courses' => $this->courses]);
    }

    public function detail($id)
    {
        if (Session::get('u_id'))
        {
            $this->enroll  = Enroll::where('user_id', Session::get('u_id'))->where('course_id', $id)->first();
            if ($this->enroll)
            {
                $this->check = true;
            }
        }
        $this->course = Course::find($id);
        return view('site.course.detail', ['course' => $this->course, 'check' => $this->check]);
    }

}
