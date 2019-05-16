<?php
/**
 * Created by PhpStorm.
 * User: kibria
 * Date: 17-Jul-17
 * Time: 1:51 PM
 */

namespace App\Member;

use App\Message\Message;
use App\Utility\Utility;
use PDO;
use PDOException;
use App\Model\Database as DB;



class Member extends DB
{
    private $member_id;
    private $student_id;
    private $member_name;
    private $member_address;
    private $member_contact;
    private $member_photo;
    private $publication_status;


    public function setData($postData){

        if(array_key_exists("member_id",$postData)){
            $this->member_id = $postData["member_id"];
        }

        if(array_key_exists("student_id",$postData)){
            $this->student_id = $postData["student_id"];
        }

        if(array_key_exists("member_name",$postData)){
            $this->member_name = $postData["member_name"];
        }

        if(array_key_exists("member_address",$postData)){
            $this->member_address = $postData["member_address"];
        }
        if(array_key_exists("member_contact",$postData)){
            $this->member_contact = $postData["member_contact"];
        }
        if(array_key_exists("member_photo",$postData)){
            $this->member_photo = $postData["member_photo"];
        }


        if(array_key_exists("publication_status",$postData)){
            $this->publication_status = $postData["publication_status"];
        }
    }


    public function store(){

        $dataArray = array($this->student_id,$this->member_name,$this->member_address,$this->member_contact,$this->member_photo,$this->publication_status);


        $sql = "insert into tbl_member(student_id,member_name,member_address,member_contact,member_photo,publication_status) VALUES (?,?,?,?,?,?)";

        $STH = $this->dbh->prepare($sql);

        $result =  $STH->execute($dataArray);


        if($result){

            Message::message("Success! :) Data Has Been Inserted!<br>");
            Utility::redirect('confirm.html');
        }
        else
        {
            Message::message("Failed! :( Data Has Not Been Inserted!<br>");
            Utility::redirect('confirmError.html');

        }

    }



    public function index(){

        $sql = "select * from tbl_member where publication_status='1'";

        $STH = $this->dbh->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        return $STH->fetchAll();

    }


    public function view(){

        $sql = "select * from tbl_member where member_id=".$this->member_id;

        $STH = $this->dbh->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        return $STH->fetch();

    }


    public function trashed(){

        $sql = "select * from tbl_member where publication_status='0'";

        $STH = $this->dbh->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        return $STH->fetchAll();

    }




    public function update(){

        $dataArray = array($this->student_id,$this->member_name,$this->member_address,$this->member_contact,$this->member_photo,$this->publication_status) ;

        $sql = "UPDATE tbl_member SET student_id=?,member_name=?,member_address=?,member_contact=?,member_photo=?,publication_status=? where member_id=".$this->member_id;

        $STH = $this->dbh->prepare($sql);

        $result =  $STH->execute($dataArray);

        if($result){

            Message::message("Success! :) Data Has Been Updated!<br>")  ;
        }
        else
        {
            Message::message("Failed! :( Data Has Not Been Update!<br>")  ;

        }

        Utility::redirect('member_admin.php');


    }


    public function trash(){

        $dataArray = array("No") ;


        $sql = "UPDATE tbl_member SET publication_status=? where member_id=".$this->member_id;

        $STH = $this->dbh->prepare($sql);

        $result =  $STH->execute($dataArray);


        if($result){

            Message::message("Success! :) Data Has Been Soft Deleted!<br>")  ;
        }
        else
        {
            Message::message("Failed! :( Data Has Not Been Soft Delete!<br>")  ;

        }


        Utility::redirect('thrashed.php');


    }


    public function recover(){

        $dataArray = array("1") ;


        $sql = "UPDATE tbl_member SET publication_status='1' where member_id=".$this->member_id;

        $STH = $this->dbh->prepare($sql);

        $result =  $STH->execute($dataArray);


        if($result){

            Message::message("Success! :) Data Has Been Recovered!<br>")  ;
        }
        else
        {
            Message::message("Failed! :( Data Has Not Been Recover!<br>")  ;

        }


        Utility::redirect('thrashed.php');


    }


    public function delete(){
        $sql = "DELETE from tbl_member where member_id=".$this->member_id;
        $result = $this->dbh->exec($sql);

        if($result){

            Message::message("Success! :) Data Has Been Permanently Deleted!<br>")  ;
        }
        else
        {
            Message::message("Failed! :( Data Has Not Been Permanently Delete!<br>")  ;

        }


        Utility::redirect('member_admin.php');
    }



    public function indexPaginator($page=1,$itemsPerPage=10){
        try{

            $start = (($page-1) * $itemsPerPage);
            if($start<0) $start = 0;
            $sql = "SELECT * from tbl_member  WHERE publication_status = '1' LIMIT $start,$itemsPerPage";



        }catch (PDOException $error){

            $sql = "SELECT * from tbl_member  WHERE publication_status = '1'";

        }

        $STH = $this->dbh->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $arrSomeData  = $STH->fetchAll();
        return $arrSomeData;


    }



    public function trashedPaginator($page=1,$itemsPerPage=10){

        try{

            $start = (($page-1) * $itemsPerPage);
            if($start<0) $start = 0;
            $sql = "SELECT * from tbl_member  WHERE publication_status = '0' LIMIT $start,$itemsPerPage";



        }catch (PDOException $error){

            $sql = "SELECT * from tbl_member  WHERE publication_status = '0'";

        }

        $STH = $this->dbh->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $arrSomeData  = $STH->fetchAll();
        return $arrSomeData;




    }






    public function trashMultiple($selectedIDsArray){


        foreach($selectedIDsArray as $member_id){

            $sql = "UPDATE  tbl_member SET publication_status='1' WHERE member_id=".$member_id;

            $result = $this->dbh->exec($sql);

            if(!$result) break;

        }



        if($result)
            Message::message("Success! All Seleted Data Has Been Soft Deleted Successfully :)");
        else
            Message::message("Failed! All Selected Data Has Not Been Soft Deleted  :( ");


        Utility::redirect('trashed.php?Page=1');


    }


    public function recoverMultiple($markArray){


        foreach($markArray as $member_id){

            $sql = "UPDATE  tbl_member SET publication_status='1' WHERE member_id=".$member_id;

            $result = $this->dbh->exec($sql);

            if(!$result) break;

        }



        if($result)
            Message::message("Success! All Seleted Data Has Been Recovered Successfully :)");
        else
            Message::message("Failed! All Selected Data Has Not Been Recovered  :( ");


        Utility::redirect('index.php?Page=1');


    }



    public function deleteMultiple($selectedIDsArray){


        foreach($selectedIDsArray as $member_member_id){

            $sql = "Delete from tbl_member  WHERE member_id=".$member_id;

            $result = $this->dbh->exec($sql);

            if(!$result) break;

        }



        if($result)
            Message::message("Success! All Seleted Data Has Been  Deleted Successfully :)");
        else
            Message::message("Failed! All Selected Data Has Not Been Deleted  :( ");


        Utility::redirect('index.php?Page=1');


    }



    public function listSelectedData($selectedIDs)
    {


        foreach ($selectedIDs as $member_id) {

            $sql = "Select * from tbl_member  WHERE member_id=".$this->$member_id;


            $STH = $this->dbh->query($sql);

            $STH->setFetchMode(PDO::FETCH_OBJ);

            $someData[] = $STH->fetch();


        }


        return $someData;
    }
}