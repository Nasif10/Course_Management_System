<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Enroll;
use Session;

class UserController extends Controller
{
    private $user;
    
    public function login()
    {
        return view('user.auth.login');
    }

    public function signin(Request $request)
    {
        $this->user = User::where('email', $request->email)->first();
        if($this->user){
            if(md5($request->password) == $this->user->password)
            {
                Session::put('u_id', $this->user->id);
                Session::put('u_name', $this->user->name);
                return redirect()->route('user-home');
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
        return view('user.auth.register');
    }

    public function create(Request $request)
    {
        User::newUser($request);
        return redirect()->back()->with('msg', 'User Added!');
    }

    public function update(Request $request, $id){
        User::updateUser($request, $id);
        return redirect()->back()->with('msg2', 'Updated!');
    }

    public function logout()
    {
        Session::forget('u_id');
        Session::forget('u_name');
        return redirect()->route('user-login');
    }

    public function home()
    {
        $this->user = User::find(Session::get('u_id'));
        $this->enrolls = Enroll::where('user_id', Session::get('u_id'))->get();
        return view('user.home.home', ['enrolls'=>$this->enrolls, 'user' => $this->user]);
    }
}
