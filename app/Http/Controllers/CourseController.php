<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Enroll;
use App\Models\File;
use Session;

class CourseController extends Controller
{
    private $course;
    private $courses;
    private $message;
    private $files;

    public function add()
    {
        return view('teacher.course.add');
    }

    public function create(Request $request)
    {
        Course::newCourse($request);
        return redirect()->back()->with('msg', 'Course Created');
    }

    public function detail($id){
        $this->course = Course::find($id);
        return view('admin.course.detail', ['course' => $this->course]);
    }

    public function edit($id){
        $this->course = Course::find($id);
        return view('teacher.course.edit', ['course' => $this->course] );
    }

    public function update(Request $request, $id){
        Course::updateCourse($request, $id);
        return redirect()->back()->with('msg', 'Course Updated!');
    }

    public function delete($id){
        $this->course = Course::find($id);
        $this->course->delete();
        Enroll::where('course_id', $id)->delete();
        return redirect()->back()->with('msg', 'Course Deleted!');
    }

    public function teacherCourseManage(){
        $this->courses = Course::where('teacher_id', Session::get('t_id'))->get();
        return view('teacher.course.manage', ['courses' => $this->courses]);
    }

    public function addFile($id)
    {
        $this->files = File::where('course_id', $id)->get();
        return view('teacher.course.addfile', ['files' => $this->files, 'course_id' => $id]);
    }

    public function createFile(Request $request, $id)
    {
        File::newFile($request, $id);
        return redirect()->back()->with('msg', 'File Uploaded');
    }

    public function courseFiles($id)
    {
        $this->files = File::where('course_id', $id)->get();
        return view('user.home.coursefile', ['files' => $this->files]);
    }

    public function adminCourseManage($c){
        if($c==0){
            $this->courses = Course::where('status', '0')->get();
        }
        elseif($c==1){
            $this->courses = Course::where('status', '1')->get();
        }
        
        return view('admin.course.manage', ['courses' => $this->courses]);
    }

    public function updateStatus($id){
        $this->message = Course::editStatus($id);
        return redirect()->back()->with('msg', $this->message);
    }
}
