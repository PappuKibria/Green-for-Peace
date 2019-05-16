<?php
/**
 * Created by PhpStorm.
 * User: kibria
 * Date: 04-Jul-17
 * Time: 6:37 PM
 */

namespace App\Events;

use App\Message\Message;
use App\Utility\Utility;
use PDO;
use PDOException;
use App\Model\Database as DB;



class Events extends DB
{
    private $event_id;
    private $event_title;
    private $event_host;
    private $event_date_start;
    private $event_date_end;
    private $event_location;
    private $event_photo;
    private $event_description;
    private $publication_status;

    public function setData($postData){

        if(array_key_exists("event_id",$postData)){
            $this->event_id = $postData["event_id"];
        }

        if(array_key_exists("event_title",$postData)){
            $this->event_title = $postData["event_title"];
        }

        if(array_key_exists("event_host",$postData)){
            $this->event_host = $postData["event_host"];
        }

        if(array_key_exists("event_date_start",$postData)){
            $this->event_date_start = $postData["event_date_start"];
        }

        if(array_key_exists("event_date_end",$postData)){
            $this->event_date_end = $postData["event_date_end"];
        }


        if(array_key_exists("event_location",$postData)){
            $this->event_location = $postData["event_location"];
        }

        if(array_key_exists("event_photo",$postData)){
            $this->event_photo = $postData["event_photo"];
        }

        if(array_key_exists("event_description",$postData)){
            $this->event_description = $postData["event_description"];
        }

        if(array_key_exists("publication_status",$postData)){
            $this->publication_status = $postData["publication_status"];
        }

    }

    public function store(){

        $dataArray = array($this->event_title,$this->event_host,$this->event_date_start,$this->event_date_end,$this->event_location,$this->event_photo,$this->event_description,$this->publication_status);

        $sql = "INSERT INTO tbl_event(event_title,event_host,event_date_start,event_date_end,event_location,event_photo,event_description,publication_status) VALUES (?,?,?,?,?,?,?,?)";

        $STH = $this->dbh->prepare($sql);

        $result =  $STH->execute($dataArray);

        if($result){
            Message::message("Success! :) Data Has Been Inserted!<br>")  ;
            Utility::redirect('confirm.html');
        }
        else
        {
            Message::message("Failed! :( Data Has Not Been Inserted!<br>")  ;
            Utility::redirect('confirmError.html');
        }


    }

    public function index(){

        $sql = "select * from tbl_event where publication_status='1'";

        $STH = $this->dbh->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        return $STH->fetchAll();

    }


    public function view(){

        $sql = "select * from tbl_event where event_id=".$this->event_id;

        $STH = $this->dbh->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        return $STH->fetch();
    }

    public function trashed(){

        $sql = "select * from tbl_event where publication_status='0'";

        $STH = $this->dbh->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        return $STH->fetchAll();

    }




    public function update(){

        $dataArray = array($this->event_title,$this->event_host,$this->event_date_start,$this->event_date_end,$this->event_location,$this->event_photo,$this->event_description,$this->publication_status) ;

        $sql = "UPDATE tbl_event SET event_title=?,event_host=?,event_date_start=?,event_date_end=?,event_location=?,event_photo=?,event_description=?,publication_status=? where event_id=".$this->event_id;

        $STH = $this->dbh->prepare($sql);

        $result =  $STH->execute($dataArray);

        if($result){

            Message::message("Success! :) Data Has Been Updated!<br>")  ;
        }
        else
        {
            Message::message("Failed! :( Data Has Not Been Update!<br>")  ;

        }

        Utility::redirect('event_admin.php');


    }


    public function trash(){

        $dataArray = array("0") ;


        $sql = "UPDATE tbl_event SET publication_status=? where event_id=".$this->event_id;

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


        $sql = "UPDATE tbl_event SET publication_status='1' where event_id=".$this->event_id;

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
        $sql = "DELETE from tbl_event where event_id=".$this->event_id;
        $result = $this->dbh->exec($sql);

        if($result){

            Message::message("Success! :) Data Has Been Permanently Deleted!<br>")  ;
        }
        else
        {
            Message::message("Failed! :( Data Has Not Been Permanently Delete!<br>")  ;

        }


        Utility::redirect('event_admin.php');
    }

    public function indexPaginator($page=1,$itemsPerPage=10){
        try{

            $start = (($page-1) * $itemsPerPage);
            if($start<0) $start = 0;
            $sql = "SELECT * from tbl_event  WHERE publication_status = '1' LIMIT $start,$itemsPerPage";



        }catch (PDOException $error){

            $sql = "SELECT * from tbl_event  WHERE publication_status = '0'";

        }

        $STH = $this->dbh->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $arrSomeData  = $STH->fetchAll();
        return $arrSomeData;


    }

    public function search($requestArray){
        $sql = "";
        if( isset($requestArray['byBlogTitle']) && isset($requestArray['byAuthorName']) )  $sql = "SELECT * FROM `tbl_event` WHERE `publication_status` ='1' AND (`event_title` LIKE '%".$requestArray['search']."%' OR `event_date_start` LIKE '%".$requestArray['search']."%')";
        if(isset($requestArray['byBlogTitle']) && !isset($requestArray['byAuthorName']) ) $sql = "SELECT * FROM `tbl_event` WHERE `publication_status` ='1' AND `event_title` LIKE '%".$requestArray['search']."%'";
        if(!isset($requestArray['byBlogTitle']) && isset($requestArray['byAuthorName']) )  $sql = "SELECT * FROM `tbl_event` WHERE `publication_status` ='1' AND `event_date_start` LIKE '%".$requestArray['search']."%'";

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
            $_allKeywords[] = trim($oneData->event_id);
        }

        // $allData = $this->index();


        foreach ($allData as $oneData) {

            $eachString = strip_tags($oneData->event_id);
            $eachString = trim($eachString);
            $eachString = preg_replace("/\r|\n/", " ", $eachString);
            $eachString = str_replace("&nbsp;", "", $eachString);

            $WordsArr = explode(" ", $eachString);

            foreach ($WordsArr as $eachWord) {
                $_allKeywords[] = trim($eachWord);
            }
        }
        // for each search field block end


        // for each search field block start
        $allData = $this->index();

        foreach ($allData as $oneData) {
            $_allKeywords[] = trim($oneData->event_host);
        }
        $allData = $this->index();

        foreach ($allData as $oneData) {

            $eachString = strip_tags($oneData->event_host);
            $eachString = trim($eachString);
            $eachString = preg_replace("/\r|\n/", " ", $eachString);
            $eachString = str_replace("&nbsp;", "", $eachString);
            $WordsArr = explode(" ", $eachString);

            foreach ($WordsArr as $eachWord) {
                $_allKeywords[] = trim($eachWord);
            }
        }
        // for each search field block end


        return array_unique($_allKeywords);
    }
}