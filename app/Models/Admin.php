<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    private static $admin;

    public static function newAdmin($request){
        self::$admin = new Admin();
        self::$admin->name       = $request->name;
        self::$admin->email      = $request->email;
        self::$admin->password   = md5($request->password);
        self::$admin->save();
    }
}
