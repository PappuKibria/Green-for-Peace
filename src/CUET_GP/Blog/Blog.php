<?php
/**
 * Created by PhpStorm.
 * User: kibria
 * Date: 04-Jul-17
 * Time: 6:37 PM
 */

namespace App\Blog;

use App\Message\Message;
use App\Utility\Utility;
use PDO;
use PDOException;
use App\Model\Database as DB;



class Blog extends DB
{
    private $blog_id;
    private $blog_title;
    private $author_name;
    private $blog_description;
    private $publication_status;

    public function setData($postData){

        if(array_key_exists("blog_id",$postData)){
            $this->blog_id = $postData["blog_id"];
        }

        if(array_key_exists("blog_title",$postData)){
            $this->blog_title = $postData["blog_title"];
        }

        if(array_key_exists("author_name",$postData)){
            $this->author_name = $postData["author_name"];
        }
        if(array_key_exists("blog_description",$postData)){
            $this->blog_description = $postData["blog_description"];
        }
        if(array_key_exists("publication_status",$postData)){
            $this->publication_status = $postData["publication_status"];
        }
    }

    public function store(){

        $dataArray = array($this->blog_title,$this->author_name,$this->blog_description,$this->publication_status);

        $sql = "INSERT INTO tbl_blog(blog_title,author_name,blog_description,publication_status) VALUES (?,?,?,?)";

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

        $sql = "select * from tbl_blog where publication_status='1'";

        $STH = $this->dbh->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        return $STH->fetchAll();

    }


    public function view(){

        $sql = "select * from tbl_blog where blog_id=".$this->blog_id;

        $STH = $this->dbh->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        return $STH->fetch();
    }

    public function trashed(){

        $sql = "select * from tbl_blog where publication_status='0'";

        $STH = $this->dbh->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        return $STH->fetchAll();

    }




    public function update(){

        $dataArray = array($this->blog_title,$this->author_name,$this->blog_description,$this->publication_status) ;

        $sql = "UPDATE tbl_blog SET blog_title=?,author_name=?,blog_description=?,publication_status=? where blog_id=".$this->blog_id;

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


        $sql = "UPDATE tbl_blog SET publication_status=? where blog_id=".$this->blog_id;

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


        $sql = "UPDATE tbl_blog SET publication_status='1' where blog_id=".$this->blog_id;

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
        $sql = "DELETE from tbl_blog where blog_id=".$this->blog_id;
        $result = $this->dbh->exec($sql);

        if($result){

            Message::message("Success! :) Data Has Been Permanently Deleted!<br>")  ;
        }
        else
        {
            Message::message("Failed! :( Data Has Not Been Permanently Delete!<br>")  ;

        }


        Utility::redirect('../Admin/admin_home.php');
    }

    public function indexPaginator($page=1,$itemsPerPage=10){
        try{

            $start = (($page-1) * $itemsPerPage);
            if($start<0) $start = 0;
            $sql = "SELECT * from tbl_blog  WHERE publication_status = '1' LIMIT $start,$itemsPerPage";



        }catch (PDOException $error){

            $sql = "SELECT * from tbl_blog  WHERE publication_status = '0'";

        }

        $STH = $this->dbh->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $arrSomeData  = $STH->fetchAll();
        return $arrSomeData;


    }

    public function search($requestArray){
        $sql = "";
        if( isset($requestArray['byBlogTitle']) && isset($requestArray['byAuthorName']) )  $sql = "SELECT * FROM `blog` WHERE `publication_status` ='1' AND (`blog_title` LIKE '%".$requestArray['search']."%' OR `author_name` LIKE '%".$requestArray['search']."%')";
        if(isset($requestArray['byBlogTitle']) && !isset($requestArray['byAuthorName']) ) $sql = "SELECT * FROM `blog` WHERE `publication_status` ='1' AND `blog_title` LIKE '%".$requestArray['search']."%'";
        if(!isset($requestArray['byBlogTitle']) && isset($requestArray['byAuthorName']) )  $sql = "SELECT * FROM `blog` WHERE `publication_status` ='1' AND `author_name` LIKE '%".$requestArray['search']."%'";

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
            $_allKeywords[] = trim($oneData->blog_id);
        }

        // $allData = $this->index();


        foreach ($allData as $oneData) {

            $eachString = strip_tags($oneData->blog_id);
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
            $_allKeywords[] = trim($oneData->author_name);
        }
        $allData = $this->index();

        foreach ($allData as $oneData) {

            $eachString = strip_tags($oneData->author_name);
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