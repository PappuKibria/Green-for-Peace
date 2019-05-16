<?php
/**
 * Created by PhpStorm.
 * User: kibria
 * Date: 21-Apr-17
 * Time: 8:55 PM
 */

namespace App\Utility;


class Utility
{
    public  static function redirect($url){
        header("Location: $url");
    }

    public static function d($var){
        echo "<pre>";
        var_dump($var);
        echo "</pre>";
    }
}