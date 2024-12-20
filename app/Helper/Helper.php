<?php

namespace App\Helper;
use App\Models\User;
use Exception;

class Helper
{
    public static function user()
    {
        if(session()->has('LIVE_SESSION'))
        {
            return User::find(base64_decode(session('LIVE_SESSION')));
        }
    }

    public static function encrypt($string, $key=5) {
        $result = '';
        for($i=0, $k= strlen($string); $i<$k; $i++)
        {
            $char = substr($string, $i, 1);
            $keychar = substr($key, ($i % strlen($key))-1, 1);
            $char = chr(ord($char)+ord($keychar));
            $result .= $char;
        }
        return base64_encode($result);
    }

    public static function decrypt($string, $key=5) {
        $result = '';
        $string = base64_decode($string);
        for($i=0,$k=strlen($string); $i< $k ; $i++)
        {
            $char = substr($string, $i, 1);
            $keychar = substr($key, ($i % strlen($key))-1, 1);
            $char = chr(ord($char)-ord($keychar));
            $result.=$char;
        }
        return $result;
    }
}
