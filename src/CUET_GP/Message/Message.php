<?php
/**
 * Created by PhpStorm.
 * User: kibria
 * Date: 21-Apr-17
 * Time: 9:04 PM
 */

namespace App\Message;


class Message
{
    public static function message($data=null){
        if(is_null($data)){
             return self::getMessage();
        }
        else{
            self::setMessage($data);
        }
    }

    public static function setMessage($data){
        $_SESSION['message'] = $data;
    }

    public static function getMessage(){

        if (!isset($_SESSION['message'])) $_SESSION['message'] = "";

        $msg = $_SESSION['message'];
        $_SESSION['message'] = "";
        return $msg;
    }
}