<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notice;

class NoticeController extends Controller
{
    private $notice;
    private $notices;

    public function addNotice()
    {
        return view('admin.notice.add');
    }

    public function createNotice(Request $request)
    {
        Notice::newNotice($request);
        return redirect()->back()->with('msg', 'Notice Added!');
    }

    public function manageNotice(){
        $this->notices = Notice::orderBy('id', 'desc')->get();
        return view('admin.notice.manage', ['notices' => $this->notices] );
    }

    public function deleteNotice($id){
        $this->notice = Notice::find($id);
        $this->notice->delete();
        return redirect()->back()->with('msg', 'Notice Deleted!');
    }
    
}
