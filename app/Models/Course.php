<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;

class Course extends Model
{
    use HasFactory;

    private static $course;
    private static $directory;
    private static $image;
    private static $imageName;
    private static $imageUrl;
    private static $message;

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public static function getImageUrl($request){
        self::$image = $request->file('image');
        self::$imageName = self::$image->getClientOriginalName();
        self::$directory = 'courseImages/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl = self::$directory.self::$imageName;
        return self::$imageUrl;
    }

    public static function newCourse($request){
        self::$course = new Course();
        self::$course->name              = $request->name;
        self::$course->code              = $request->code;
        self::$course->teacher_id        = Session::get('t_id');
        self::$course->duration          = $request->duration;
        if($request->file('image')){
            self::$course->image  = self::getImageUrl($request);
        }
        self::$course->shortDescription  = $request->shortDescription;
        self::$course->longDescription   = $request->longDescription;
        self::$course->save();
    }

    public static function editStatus($id){
        self::$course = course::find($id);

        if(self::$course->status == 0){
            self::$course->status = 1;
            self::$message ='Course Published!';
        }
        else{
            self::$course->status = 0;
            self::$message ='Course Inactivated!';
        }
        self::$course->save();
        return self::$message;
    }

    public static function updateCourse($request, $id){
        self::$course = Course::find($id);

        if($request->file('image')){
            if(file_exists(self::$course->image)){
                unlink(self::$course->image);
            }
            self::$imageUrl = self::getImageUrl($request);
        }
        else{
            self::$imageUrl = self::$course->image;
        }

        self::$course->name        = $request->name;
        self::$course->code        = $request->code;
        self::$course->teacher_id  = Session::get('t_id');
        self::$course->image       = self::$imageUrl;
        self::$course->shortDescription  = $request->shortDescription;
        self::$course->longDescription   = $request->longDescription;
        self::$course->save();
    }
}
