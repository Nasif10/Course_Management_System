<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Enroll;
use App\Models\User;
use App\Mail\EnrollConfirmationMail;
use Session;

class EnrollController extends Controller
{
    private $user;
    private $enroll;
    private $enrolls;
    private $message;
    private $data = [];
    
    public function enroll($id)
    {
        if(Session::get('u_id'))
        {
            $this->enroll  = Enroll::where('user_id', Session::get('u_id'))->where('course_id', $id)->first();
            if($this->enroll)
            {
                return redirect()->back()->with('msg', 'Already Enrolled!');
            }
            else{
                $this->enroll = new Enroll();
                $this->enroll->user_id = Session::get('u_id');
                $this->enroll->course_id = $id;
                $this->enroll->save();

                return redirect()->route('user-home')->with('msg', 'Applied!');
            }
        }
        else
        {
            return redirect()->back()->with('msg', 'Error!');
        }

    }

    public function payment($id)
    {
        Enroll::pay($id);
        //Mail
        $this->user = User::find(Session::get('u_id'));
        $this->data = ['name' => $this->user->name, 
                       'course_code'=> Enroll::find($id)->course->code, 
                       'course_name'=> Enroll::find($id)->course->name,
                       'enroll_status' => 0];
        //Mail::to($this->user->email)->send(new EnrollConfirmationMail($this->data));

        return redirect()->back()->with('msg', 'Payment Complete');
    }

    public function pendingEnroll()
    {
        $this->enrolls  = Enroll::where('payment_status', '1')->where('enroll_status', '0')->get();
        return view('admin.course.enroll', [ 'enrolls' => $this->enrolls ]);
    }

    public function updateEnroll($id)
    {
        Enroll::edit($id);
        //Mail
        $this->data = ['name' => Enroll::find($id)->user->name, 
                       'course_code'=> Enroll::find($id)->course->code, 
                       'course_name'=> Enroll::find($id)->course->name,
                       'enroll_status' => 1];
        //Mail::to(Enroll::find($id)->user->email)->send(new EnrollConfirmationMail($this->data));
        return redirect()->back()->with('msg', 'Enroll Updated!');
    }

    public function manageEnroll()
    {
        $this->enrolls  = Enroll::where('payment_status', '1')->where('enroll_status', 1)->get();
        return view('admin.course.enroll', [ 'enrolls' => $this->enrolls ]);
    }

    public function deleteEnroll($id)
    {
        $this->enroll = Enroll::find($id);
        $this->enroll->delete();
        return redirect()->back()->with('msg', 'Enroll Deleted!');
    }

    public function enrolledUsers($id)
    {
        $this->enrolls  = Enroll::where('course_id', $id)->where('enroll_status', 1)->get();
        return view('teacher.course.enrolled', [ 'enrolls' => $this->enrolls ]);
    }

    public function enrolledUser($id)
    {
        $this->enrolls  = Enroll::where('course_id', $id)->where('enroll_status', 1)->where('user_id', '!=', Session::get('u_id'))->get();
        return view('user.home.enrolled', [ 'enrolls' => $this->enrolls ]);
    }
}
