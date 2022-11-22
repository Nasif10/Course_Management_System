<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    private static $teacher;
    private static $image;
    private static $imageName;
    private static $imageUrl;
    private static $directory;

    public static function getImageUrl($request){
        self::$image = $request->file('image');
        self::$imageName = self::$image->getClientOriginalName();
        self::$directory = 'teacherImages/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl = self::$directory.self::$imageName;
        return self::$imageUrl;
    }

    public static function newTeacher($request){
        self::$teacher = new Teacher();
        self::$teacher->name = $request->name;
        self::$teacher->email = $request->email;
        self::$teacher->phone = $request->phone;
        self::$teacher->address = $request->address;
        if($request->file('image')){
            self::$teacher->image = self::getImageUrl($request);
        }
        self::$teacher->password = md5('teacher');
        self::$teacher->save();
    }

    public static function updateTeacher($request, $id){
        self::$teacher = Teacher::find($id);

        if($request->file('image')){
            if(file_exists(self::$teacher->image)){
                unlink(self::$teacher->image);
            }
            self::$imageUrl = self::getImageUrl($request);
        }
        else{
            self::$imageUrl = self::$teacher->image;
        }

        self::$teacher->name    = $request->name;
        self::$teacher->email   = $request->email;
        self::$teacher->phone   = $request->phone;
        self::$teacher->address = $request->address;
        self::$teacher->image   = self::$imageUrl;
        self::$teacher->status  = $request->status;
        self::$teacher->save();

        if($request->status==0){
            Course::where('teacher_id', $id)->update(['status'=>'0']);
            $cid = Course::where('teacher_id', $id)->pluck('id');
            Enroll::whereIn('course_id', $cid)->delete();
        }
    }
}
