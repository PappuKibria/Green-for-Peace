<?php
require_once("../../../vendor/autoload.php");

$objProfile = new \App\Profile\Profile();
$objAdmin = new \App\Admin\Admin();

$allData = $objProfile->index();



use App\Message\Message;

if(!isset($_SESSION)){
    session_start();
}
$msg = Message::getMessage();


echo "<div style='height: 30px'> <div  id='message'> $msg </div> </div>";


######################## pagination code block#1 of 2 start ######################################
$recordCount= count($allData);


if(isset($_REQUEST['Page']))   $page = $_REQUEST['Page'];
else if(isset($_SESSION['Page']))   $page = $_SESSION['Page'];
else   $page = 1;

$_SESSION['Page']= $page;


if(isset($_REQUEST['ItemsPerPage']))   $itemsPerPage = $_REQUEST['ItemsPerPage'];
else if(isset($_SESSION['ItemsPerPage']))   $itemsPerPage = $_SESSION['ItemsPerPage'];
else   $itemsPerPage = 10;

$_SESSION['ItemsPerPage']= $itemsPerPage;

$pages = ceil($recordCount/$itemsPerPage);
$someData = $objProfile->indexPaginator($page,$itemsPerPage);

$serial = (($page-1) * $itemsPerPage) +1;

####################### pagination code block#1 of 2 end #########################################

################## search  block 1 of 5 start ##################
if(isset($_REQUEST['search']) )$someData =  $objProfile->search($_REQUEST);


$availableKeywords=$objProfile->getAllKeywords();
$comma_separated_keywords= '"'.implode('","',$availableKeywords).'"';
################## search  block 1 of 5 end ##################

################## search  block 2 of 5 start ##################

if(isset($_REQUEST['search']) ) {
    $someData = $objProfile->search($_REQUEST);
    $serial = 1;
}
################## search  block 2 of 5 end ##################


?>



<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Green For Peace</title>
    <link rel="stylesheet" href="../../../resource/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../resource/bootstrap/css/bootstrap-theme.min.css">
    <script src="../../../resource/bootstrap/js/bootstrap.min.js"></script>


    <style>

        td{
            border: 0px;
        }

        table{
            border: 1px;
        }

        tr{
            height: 30px;
        }
    </style>


    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <!-- Mobile Specific Metas
    ================================================== -->
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Template CSS Files
    ================================================== -->
    <!-- Twitter Bootstrs CSS -->
    <link rel="stylesheet" href="../../../resource/css/bootstrap.min.css">
    <!-- Ionicons Fonts Css -->
    <link rel="stylesheet" href="../../../resource/css/ionicons.min.css">
    <!-- animate css -->
    <link rel="stylesheet" href="../../../resource/css/animate.css">
    <!-- Hero area slider css-->
    <link rel="stylesheet" href="../../../resource/css/slider.css">
    <!-- owl craousel css -->
    <link rel="stylesheet" href="../../../resource/css/owl.carousel.css">
    <link rel="stylesheet" href="../../../resource/css/owl.theme.css">
    <link rel="stylesheet" href="../../../resource/css/jquery.fancybox.css">
    <!-- template main css file -->
    <link rel="stylesheet" href="../../../resource/css/main.css">
    <!-- responsive css -->
    <link rel="stylesheet" href="../../../resource/css/responsive.css">

    <!-- Template Javascript Files
    ================================================== -->
    <!-- modernizr js -->
    <script src="../../../resource/js/vendor/modernizr-2.6.2.min.js"></script>
    <!-- jquery -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <!-- owl carouserl js -->
    <script src="../../../resource/js/owl.carousel.min.js"></script>
    <!-- bootstrap js -->

    <script src="../../../resource/js/bootstrap.min.js"></script>
    <!-- wow js -->
    <script src="../../../resource/js/wow.min.js"></script>
    <!-- slider js -->
    <script src="../../../resource/js/slider.js"></script>
    <script src="../../../resource/js/jquery.fancybox.js"></script>
    <!-- template main js -->
    <script src="../../../resource/js/main.js"></script>


    <!-- required for search, block3 of 5 start -->

    <link rel="stylesheet" href="../../../resource/bootstrap/css/jquery-ui.css">
    <script src="../../../resource/bootstrap/js/jquery.js"></script>
    <script src="../../../resource/bootstrap/js/jquery-ui.js"></script>

    <!-- required for search, block3 of 5 end -->



</head>
<body>

<header id="top-bar" class="navbar-fixed-top animated-header">
    <div class="container">
        <div class="navbar-header">
            <!-- responsive nav button -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- /responsive nav button -->

            <!-- logo -->
            <div class="navbar-brand">
                <a href="../index.php" >
                    <img src="../../../resource/images/gplogo.jpg" style="height: 100px;" alt="">
                </a>
            </div>
            <!-- /logo -->
        </div>
        <!-- main menu -->
        <nav class="collapse navbar-collapse navbar-right" role="navigation">
            <div class="main-menu">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="admin_home.php" >Admin Home</a>
                    </li>
                    <li><a href="../about.php">About</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Events<span class="caret"></span></a>
                        <div class="dropdown-menu">
                            <ul>
                                <li><a href="../Events/events.php">Events</a></li>
                                <li><a href="../Events/events_create.php">Create New Event</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Blog<span class="caret"></span></a>
                        <div class="dropdown-menu">
                            <ul>
                                <li><a href="../Blog/blog.php">Blogs</a></li>
                                <li><a href="../Blog/blog_create.php">Create New Blog</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Blood Bank <span class="caret"></span></a>
                        <div class="dropdown-menu">
                            <ul>
                                <li><a href="../blood.php">Blood Bank</a></li>
                                <li><a href="../create.php">Join Blood Bank</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Members<span class="caret"></span></a>
                        <div class="dropdown-menu">
                            <ul>
                                <li><a href="../Member/member_admin.php">Members</a></li>
                                <li><a href="../Member/member_create.php">Join as Member</a></li>
                                <li><a href="admin_login.php">Admin LogIn</a> </li>
                            </ul>
                        </div>
                    </li>
                    <li><a href="../gallery.html">Gallery</a></li>
                    <li><a href="../contact.php">Contact</a></li>

                </ul>
            </div>
        </nav>
        <!-- /main nav -->
    </div>
</header>
<!--
==================================================
    Global Page Section Start
================================================== -->
<section class="global-page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block">
                    <h2>Blood Bank</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="../index.php">
                                <i class="ion-ios-index"></i>
                                Home
                            </a>
                        </li>
                        <li class="active">Blood Bank</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
</section>
<br>
<div class="col-xs-12 col-md-12">
    <div class="col-xs-4 col-md-4">

    </div>
    <div class="col-xs-4 col-md-4">
        <a href='../thrashed.php?id=$oneData->id' class='btn btn-warning' style="height: 35px; width: 200px;">Requests</a>
        <a href='../create.php?id=$oneData->id' class='btn btn-info' style="height: 35px; width: 200px;">Create Profile</a>
    </div>
    <div class="col-xs-4 col-md-4"></div>
</div><br><br><br>
<div class="col-md-12">
    <div class="col-md-4">

    </div>
    <div class="col-md-8">
        <form id="searchForm" action="../blood.php" method="get" style="margin-bottom: 20px; width:600px;">
            <input type="text" value="" id="searchID" name="search" placeholder="Search" width="70" class="form-control form"><br>
            <input type="checkbox"  name="byID"   checked  >By ID<br>
            <input type="checkbox"  name="byBloodGroup"  checked >By Blood Group<br><br>
            <input type="submit" class="btn btn-primary" value="search">
        </form>
    </div>
</div>

<div class="container">
    <h1 style="text-align: center">Profile - Active List</h1>

    <table class="table table-striped table-bordered" cellspacing="0px">


        <tr>
            <th style='width: 5%; text-align: center'>Serial</th>
            <th style='width: 8%; text-align: center'>ID</th>
            <th style='width: 15%; text-align: center'>Name</th>
            <th style='width: 5%; text-align: center'>Blood Group</th>
            <th style='width: 8%; text-align: center'>Contact</th>
            <th>Address</th>

            <th>Action Buttons</th>
        </tr>

        <?php
        $serial= 1;
        foreach($someData as $oneData){

            if($serial%2) $bgColor = "#cccccc";
            else $bgColor = "#ffffff";

            echo "

                  <tr  style='background-color: $bgColor'>
                     <td style='width: 8%; text-align: center'>$serial</td>
                     <td style='width: 8%; text-align: center'>$oneData->id</td>
                     <td>$oneData->name</td>
                     <td>$oneData->blood_group</td>
                     <td>$oneData->contact</td>
                     <td>$oneData->address</td>
                    

                     <td>
                     <a href='../view.php?id=$oneData->id' class='btn btn-info'  style='height: 35px; width:120px;'>VIEW PROFILE</a> 
                     <a href='../edit.php?id=$oneData->id' class='btn btn-primary' style='height: 35px; width:100px;'>EDIT</a> 
                     <a href='../trash.php?id=$oneData->id' class='btn btn-warning' style='height: 35px; width:120px;'>SOFT DELETE</a> 
                     <a href='../delete.php?id=$oneData->id' class='btn btn-danger' style='height: 35px; width:100px;'>DELETE</a> 
                     </td>
                     
                  </tr>
              ";
            $serial++;
        }
        ?>

    </table>

    <!--  ######################## pagination code block#2 of 2 start ###################################### -->
    <div align="left" class="container">

        <ul class="pagination">

            <?php

            $pageMinusOne  = $page-1;
            $pagePlusOne  = $page+1;

            if($page>$pages){ Utility::redirect("admin.php?Page=$pages");}

            if($page>1)  echo "<li><a href='admin.php?Page=$pageMinusOne'>" . "Previous" . "</a></li>";



            for($i=1;$i<=$pages;$i++)
            {
                if($i==$page) echo '<li class="active"><a href="">'. $i . '</a></li>';
                else  echo "<li><a href='?Page=$i'>". $i . '</a></li>';

            }
            if($page<$pages) echo "<li><a href='admin.php?Page=$pagePlusOne'>" . "Next" . "</a></li>";
            ?>
            <select  class="form-control"  name="ItemsPerPage" id="ItemsPerPage" onchange="javascript:location.href = this.value;" >
                <?php
                if($itemsPerPage==10 ) echo '<option value="?ItemsPerPage=10" selected >Show 10 Items Per Page</option>';
                else echo '<option  value="?ItemsPerPage=10">Show 10 Items Per Page</option>';

                if($itemsPerPage==5 )  echo '<option  value="?ItemsPerPage=5" selected >Show 5 Items Per Page</option>';
                else echo '<option  value="?ItemsPerPage=5">Show 5 Items Per Page</option>';

                if($itemsPerPage==15 )  echo '<option  value="?ItemsPerPage=15" selected >Show 15 Items Per Page</option>';
                else  echo '<option  value="?ItemsPerPage=15">Show 15 Items Per Page</option>';

                if($itemsPerPage==20 )   echo '<option  value="?ItemsPerPage=20"selected >Show 20 Items Per Page</option>';
                else echo '<option  value="?ItemsPerPage=20">Show 20 Items Per Page</option>';

                if($itemsPerPage==30 )  echo '<option  value="?ItemsPerPage=30"selected >Show 30 Items Per Page</option>';
                else echo '<option  value="?ItemsPerPage=30">Show 30 Items Per Page</option>';

                if($itemsPerPage==50 )  echo '<option  value="?ItemsPerPage=50"selected >Show 50 Items Per Page</option>';
                else    echo '<option  value="?ItemsPerPage=50">Show 50 Items Per Page</option>';
                ?>
            </select>
        </ul>
    </div>
    <!--  ######################## pagination code block#2 of 2 end ###################################### -->

</div>



<script src="../../../resource/bootstrap/js/jquery.js"></script>

<script>
    jQuery(function($) {
        $('#message').fadeOut (550);
        $('#message').fadeIn (550);
        $('#message').fadeOut (550);
        $('#message').fadeIn (550);
        $('#message').fadeOut (550);
        $('#message').fadeIn (550);
        $('#message').fadeOut (550);
    })
</script>

<!-- required for search, block 5 of 5 start -->
<script>

    $(function() {
        var availableTags = [

            <?php
            echo $comma_separated_keywords;
            ?>
        ];
        // Filter function to search only from the beginning of the string
        $( "#searchID" ).autocomplete({
            source: function(request, response) {

                var results = $.ui.autocomplete.filter(availableTags, request.term);

                results = $.map(availableTags, function (tag) {
                    if (tag.toUpperCase().bloodOf(request.term.toUpperCase()) === 0) {
                        return tag;
                    }
                });

                response(results.slice(0, 20));

            }
        });


        $( "#searchID" ).autocomplete({
            select: function(event, ui) {
                $("#searchID").val(ui.item.label);
                $("#searchForm").submit();
            }
        });


    });

</script>
<!-- required for search, block5 of 5 end -->


<footer id="footer">
    <div class="container">
        <div class="col-md-8">
            <p class="copyright">Copyright: <span>2017</span> . Design and Developed by GP DEVs</p>
        </div>
        <div class="col-md-4">

        </div>
    </div>
</footer> <!-- /#footer -->

</body>
</html>



