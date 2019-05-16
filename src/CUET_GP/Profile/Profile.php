<?php
/**
 * Created by PhpStorm.
 * User: kibria
 * Date: 13-May-17
 * Time: 9:59 PM
 */

namespace App\Profile;

use App\Message\Message;
use App\Utility\Utility;
use PDO;
use PDOException;
use App\Model\Database as DB;


class Profile extends DB
{

    private $id;
    private $name;
    private $blood_group;
    private $contact;
    private $address;
    private $donar;


    public function setData($postData){

        if(array_key_exists("id",$postData)){
            $this->id = $postData["id"];
        }

        if(array_key_exists("name",$postData)){
            $this->name = $postData["name"];
        }

        if(array_key_exists("bloodGroup",$postData)){
            $this->blood_group = $postData["bloodGroup"];
        }
        if(array_key_exists("contact",$postData)){
            $this->contact = $postData["contact"];
        }
        if(array_key_exists("address",$postData)){
            $this->address = $postData["address"];
        }


        if(array_key_exists("donar",$postData)){
            $this->donar = $postData["donar"];
        }
    }


    public function store(){

        $dataArray = array($this->id,$this->name,$this->blood_group,$this->contact,$this->address,$this->donar);


        $sql = "insert into profile(id,name,blood_group,contact,address,donar) VALUES (?,?,?,?,?,?)";

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

        $sql = "select * from profile where donar='Yes'";

        $STH = $this->dbh->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        return $STH->fetchAll();

    }


    public function view(){

        $sql = "select * from profile where id=".$this->id;

        $STH = $this->dbh->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        return $STH->fetch();

    }


    public function trashed(){

        $sql = "select * from profile where donar='No'";

        $STH = $this->dbh->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        return $STH->fetchAll();

    }




    public function update(){

        $dataArray = array($this->id,$this->name,$this->blood_group,$this->contact,$this->address,$this->donar) ;

        $sql = "UPDATE profile SET id=?,name=?,blood_group=?,contact=?,address=?,donar=? where id=".$this->id;

        $STH = $this->dbh->prepare($sql);

        $result =  $STH->execute($dataArray);

        if($result){

            Message::message("Success! :) Data Has Been Updated!<br>")  ;
        }
        else
        {
            Message::message("Failed! :( Data Has Not Been Update!<br>")  ;

        }

        Utility::redirect('Admin/admin.php');


    }


    public function trash(){

        $dataArray = array("No") ;


        $sql = "UPDATE profile SET donar=? where id=".$this->id;

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

        $dataArray = array("Yes") ;


        $sql = "UPDATE profile SET donar=? where id=".$this->id;

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
        $sql = "DELETE from profile where id=".$this->id;
        $result = $this->dbh->exec($sql);

        if($result){

            Message::message("Success! :) Data Has Been Permanently Deleted!<br>")  ;
        }
        else
        {
            Message::message("Failed! :( Data Has Not Been Permanently Delete!<br>")  ;

        }


        Utility::redirect('admin.php');
    }




    public function indexPaginator($page=1,$itemsPerPage=10){
        try{

            $start = (($page-1) * $itemsPerPage);
            if($start<0) $start = 0;
            $sql = "SELECT * from profile  WHERE donar = 'Yes' LIMIT $start,$itemsPerPage";



        }catch (PDOException $error){

            $sql = "SELECT * from profile  WHERE donar = 'No'";

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
            $sql = "SELECT * from profile  WHERE donar = 'No' LIMIT $start,$itemsPerPage";



        }catch (PDOException $error){

            $sql = "SELECT * from profile  WHERE donar = 'No'";

        }

        $STH = $this->dbh->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $arrSomeData  = $STH->fetchAll();
        return $arrSomeData;




    }






    public function trashMultiple($selectedIDsArray){


        foreach($selectedIDsArray as $id){

            $sql = "UPDATE  profile SET donar='Yes' WHERE id=".$id;

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


        foreach($markArray as $id){

            $sql = "UPDATE  profile SET donar='Yes' WHERE id=".$id;

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


        foreach($selectedIDsArray as $id){

            $sql = "Delete from profile  WHERE id=".$id;

            $result = $this->dbh->exec($sql);

            if(!$result) break;

        }



        if($result)
            Message::message("Success! All Seleted Data Has Been  Deleted Successfully :)");
        else
            Message::message("Failed! All Selected Data Has Not Been Deleted  :( ");


        Utility::redirect('index.php?Page=1');


    }



    public function listSelectedData($selectedIDs){



        foreach($selectedIDs as $id){

            $sql = "Select * from profile  WHERE id=".$id;


            $STH = $this->dbh->query($sql);

            $STH->setFetchMode(PDO::FETCH_OBJ);

            $someData[]  = $STH->fetch();


        }


        return $someData;


    }




    public function search($requestArray){
        $sql = "";
        if( isset($requestArray['byID']) && isset($requestArray['byBloodGroup']) )  $sql = "SELECT * FROM `profile` WHERE `donar` ='Yes' AND (`id` LIKE '%".$requestArray['search']."%' OR `blood_group` LIKE '%".$requestArray['search']."%')";
        if(isset($requestArray['byID']) && !isset($requestArray['byBloodGroup']) ) $sql = "SELECT * FROM `profile` WHERE `donar` ='Yes' AND `id` LIKE '%".$requestArray['search']."%'";
        if(!isset($requestArray['byID']) && isset($requestArray['byBloodGroup']) )  $sql = "SELECT * FROM `profile` WHERE `donar` ='Yes' AND `blood_group` LIKE '%".$requestArray['search']."%'";

        $STH  = $this->dbh->query($sql);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $someData = $STH->fetchAll();

        return $someData;

    }// end of search()



    public function getAllKeywords()
    {
        $_allKeywords = array();
        $WordsArr = array();

        $allData = $this->index();

        foreach ($allData as $oneData) {
            $_allKeywords[] = trim($oneData->id);
        }

        // $allData = $this->index();


        foreach ($allData as $oneData) {

            $eachString= strip_tags($oneData->id);
            $eachString=trim( $eachString);
            $eachString= preg_replace( "/\r|\n/", " ", $eachString);
            $eachString= str_replace("&nbsp;","",  $eachString);

            $WordsArr = explode(" ", $eachString);

            foreach ($WordsArr as $eachWord){
                $_allKeywords[] = trim($eachWord);
            }
        }
        // for each search field block end




        // for each search field block start
        $allData = $this->index();

        foreach ($allData as $oneData) {
            $_allKeywords[] = trim($oneData->blood_group);
        }
        $allData = $this->index();

        foreach ($allData as $oneData) {

            $eachString= strip_tags($oneData->blood_group);
            $eachString=trim( $eachString);
            $eachString= preg_replace( "/\r|\n/", " ", $eachString);
            $eachString= str_replace("&nbsp;","",  $eachString);
            $WordsArr = explode(" ", $eachString);

            foreach ($WordsArr as $eachWord){
                $_allKeywords[] = trim($eachWord);
            }
        }
        // for each search field block end


        return array_unique($_allKeywords);


    }// get all keywords




}













