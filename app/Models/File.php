<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    private static $file;
    private static $files;
    private static $fileName;
    private static $directory;
    private static $fileUrl;


    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }

    public static function newFile($request, $id){
        self::$file = new File();
        self::$file->course_id  = $id;

        self::$files = $request->file('file');
        self::$fileName = self::$files->getClientOriginalName();
        self::$directory = 'courseFiles/'.'App\Models\Course'::find($id)->teacher_id.'/'.'App\Models\Course'::find($id)->code.'/';
        self::$files->move(self::$directory, self::$fileName);
        self::$fileUrl = self::$directory.self::$fileName;

        self::$file->file_name  = self::$fileUrl;
        self::$file->save();
    }
}
