<?php

namespace App\Helpers;

use App\Model\Setting;
use Illuminate\Http\Request;

class Settings
{
   
	public static function sistema()
    {
        $setting = Setting::find(1);
        $data['title'] = (!empty($setting->title)) ? $setting->title : "Dashboard - test";
        $data['favicon'] = (!empty($setting->favicon)) ? '/'.$setting->favicon : "/favicon.ico";
        return $data;
    }

}
 
