<?php

namespace App\Helpers;

use Illuminate\Http\Request;

class Helper
{
    public static function human_file_size($bytes, $decimals = 2)
    {
        $sz = 'BKMGTPE';
        $factor = (int)floor((strlen($bytes) - 1) / 3);
        return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . $sz[$factor];
    }

    public static function remove_special_char($text) {
        $t = $text;
        $specChars = array(
            ' ' => '-',    '!' => '',    '"' => '',
            '#' => '',    '$' => '',    '%' => '',
            '&amp;' => '',    '\'' => '',   '(' => '',
            ')' => '',    '*' => '',    '+' => '',
            ',' => '',    '₹' => '',    '.' => '',
            '/-' => '',    ':' => '',    ';' => '',
            '<' => '',    '=' => '',    '>' => '',
            '?' => '',    '@' => '',    '[' => '',
            '\\' => '',   ']' => '',    '^' => '',
            '_' => '',    '`' => '',    '{' => '',
            '|' => '',    '}' => '',    '~' => '',
            '-----' => '-',    '----' => '-',    '---' => '-',
            '/' => '',    '--' => '-',   '/_' => '-',    
        );
        foreach ($specChars as $k => $v) {
            $t = str_replace($k, $v, $t);
        }
        return $t;
    }

    public static function checkRoute($route)
    {
        $route_dashboard =$route;
        if($route[0] === "/"){
            $route = substr($route, 1);
        }
        $routes = \Route::getRoutes()->getRoutes();
        foreach ($routes as $r) {
            if ($r->uri == $route_dashboard) {
                return \Route($route);
            }
        }

        return '#';
    }

    public static function activeMenu($uri = '') {
        $active = '';
        $request = request();
        if ($request->is($request->segment(1) . '/' . $uri . '/*') || $request->is($request->segment(1) . '/' . $uri) || $request->is($uri)) {
            $active = 'active';
        }
        return $active;
    }

    public static function get_youtube_video_id($url)
    {
        if (preg_match('/youtu\.be/i', $url) || preg_match('/youtube\.com\/watch/i', $url)) {
            $pattern = '/^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/';
            preg_match($pattern, $url, $matches);
            if (count($matches) && strlen($matches[7]) == 11) {
                return $matches[7];
            }
        }
        return '';
    }

    public static function get_vimeo_video_id($url)
    {
        if (preg_match('/vimeo\.com/i', $url)) {
            $pattern = '/\/\/(www\.)?vimeo.com\/(\d+)($|\/)/';
            preg_match($pattern, $url, $matches);
            if (count($matches)) {
                return $matches[2];
            }
        }
        return '';
    }

    public static function get_status(int $value)
    {
        $text = '';
        if($value == 1){
            $text .= '<span class="badge badge-soft-success py-1">Activo</span>';
        } else if($value == 0) {
            $text .= '<span class="badge badge-soft-danger py-1">Inactivo</span>';
        }
        return $text;
    }

}
 
