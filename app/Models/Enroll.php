<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enroll extends Model
{
    use HasFactory;

    private static $enroll;

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }

    public static function pay($id){
        self::$enroll = Enroll::find($id);
        if(self::$enroll->payment_status == 0){
            self::$enroll->payment_status = 1;
        }
        self::$enroll->save();
    }

    public static function edit($id){
        self::$enroll = Enroll::find($id);
        if(self::$enroll->enroll_status == 0){
            self::$enroll->enroll_status = 1;
        }
        elseif(self::$enroll->enroll_status == 1){
            self::$enroll->enroll_status = 0;
        }
        self::$enroll->save();
    }
}
