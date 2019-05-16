<?php
/**
 * Created by PhpStorm.
 * User: kibria
 * Date: 05-Jul-17
 * Time: 10:47 PM
 */

namespace App\Admin;

use App\Message\Message;
use App\Utility\Utility;
use PDO;
use PDOException;
use App\Model\Database as DB;

if(!isset($_SESSION) )session_start();

class Admin extends DB
{
    private $admin_id;
    private $admin_name;
    private $admin_email;
    private $admin_password;
    private $hash = '$2y$07$BCryptRequires22Chrcte/VlQH0piJtjXl.0t1XkA8pw9dMXTpOq';

    public function setData($postData)
    {

        if (array_key_exists("admin_email", $postData)) {
            $this->admin_email = $postData["admin_email"];
        }

        if (array_key_exists("admin_password", $postData)) {
            $this->admin_password = $postData["admin_password"];
        }
    }

    public function login()
    {

        $dataArray = array($this->admin_id, $this->admin_name, $this->admin_email, $this->admin_password);
        $sql = "SELECT * FROM tbl_admin WHERE admin_email='$this->admin_email' AND admin_password='$this->admin_password' LIMIT 1";
        $STH = $this->dbh->prepare($sql);
        $result = $STH->execute($dataArray);

        if ($result) {
            if ($this->admin_password == "12gp13572468") {
                Message::message("Success! :) You have logged in to Admin Panel!<br>");
                Utility::redirect('admin_home.php');
            } else {
                Message::message("Failed! :( You have entered a wrong email address/ password!<br>");
                Utility::redirect('admin_login.php');
            }

        } else {
            Message::message("Failed! :( You have entered a wrong email address/ password!<br>");
            Utility::redirect('admin_login.php');

        }
    }
}