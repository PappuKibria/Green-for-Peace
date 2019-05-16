<?php
namespace App\User;
if(!isset($_SESSION) )  session_start();
use App\Model\Database as DB;
use PDO;

class Auth extends DB{

    public $email = "";
    public $password = "";

    public function __construct(){
        parent::__construct();
    }

    public function setData($data = Array()){
        if (array_key_exists('email', $data)) {
            $this->email = $data['email'];
        }
        if (array_key_exists('password', $data)) {
            $this->password = md5($data['password']);
        }
        return $this;
    }

    public function is_exist(){

        $query="SELECT * FROM `users` WHERE `users`.`email` ='$this->email' ";
        $STH=$this->conn->query($query);

        $STH->setFetchMode(PDO::FETCH_OBJ);
        $STH->fetchAll();

        $count = $STH->rowCount();

        if ($count > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function is_registered(){
        $query = "SELECT * FROM `users` WHERE `email_verified`='" . 'Yes' . "' AND `email`='$this->email' AND `password`='$this->password'";
        $STH=$this->conn->query($query);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $STH->fetchAll();

        $count = $STH->rowCount();
        if ($count > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function logged_in(){
        if ((array_key_exists('email', $_SESSION)) && (!empty($_SESSION['email']))) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function log_out(){
        $_SESSION['email']="";
        return TRUE;
    }
}

