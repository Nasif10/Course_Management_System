<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    use HasFactory;

    private static $notice;

    public static function newNotice($request){
        self::$notice = new Notice();
        self::$notice->title = $request->title;
        self::$notice->body  = $request->body;
        self::$notice->save();
    }
}
