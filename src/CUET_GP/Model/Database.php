<?php
/**
 * Created by PhpStorm.
 * User: kibria
 * Date: 06-Apr-17
 * Time: 2:22 AM
 */

namespace App\Model;

use PDO, PDOException;

class Database
{
    public $dbh;

    public  function __construct()
    {
        if(!isset($_SESSION)){
            session_start();
        }

        try {
            $this->dbh = new PDO('mysql:host=localhost;dbname=gp', 'root', '');
        } catch (PDOException $error) {
            print "Error!: " . $error->getMessage() . "<br/>";
            die();
        }

    }

}