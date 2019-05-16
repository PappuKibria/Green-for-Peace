<?php
require_once("../../../vendor/autoload.php");

use App\Message\Message;

if(!isset($_SESSION)){
    session_start();
}
$msg = Message::getMessage();

echo "<div class='container' style='height: 50px'><div id='message'> $msg </div> </div> ";


$objEvent= new \App\Events\Events();

$objEvent->setData($_GET);
$oneData = $objEvent->view();



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Green For Peace</title>
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




</head>
<body>

<!--
==================================================
Header Section Start
================================================== -->
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
                        <a href="../index.php" >Home</a>
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
                                <li><a href="../Member/member.php">Members</a></li>
                                <li><a href="../Member/member_create.php">Join as Member</a></li>
                                <li><a href="../Admin/admin_login.php">Admin LogIn</a> </li>
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
                    <h2>GP Event - Edit</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="../index.php">
                                <i class="ion-ios-index"></i>
                                Home
                            </a>
                        </li>
                        <li class="active">GP Event - Edit</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
</section>

<form></form>

<br>
<br>


<div class="container">

    <div class="navbar">

        <td><a href='events.php' class='btn btn-group-lg btn-info'>Active-List</a> </td>

    </div>

    <form class="form-group f" action="update.php" method="post" enctype="multipart/form-data">

        Event Title:
        <input class="form-control" type="text" name="event_title" value="<?php echo $oneData->event_title?>"><br>
        Event Host:
        <input class="form-control" type="text" name="event_host" value="<?php echo $oneData->event_host?>"><br>
        Event Start Time:
        <input class="form-control" type="datetime-local" name="event_date_start" value="<?php echo $oneData->event_date_start?>"><br>
        Event End Time:
        <input class="form-control" type="datetime-local" name="event_date_end" value="<?php echo $oneData->event_date_end?>"><br>
        Event Location:
        <input class="form-control" type="text" name="event_location" value="<?php echo $oneData->event_location?>"><br>
        Event Photo (Photo size must not be above 500kb):
        <input class="form-control" type="file" name="event_photo" value="<?php echo $oneData->event_photo?>"><br>
        Event Description:
        <textarea rows="10" class="form-control" name="event_description"><?php echo $oneData->event_description?></textarea><br>
        <input type="checkbox" name="publication_status" value="1" required> Confirm to Publish Event<br><br>
        <input type="submit" class="btn btn-warning" value="Update Event">
    </form>

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

<!--
==================================================
    Call To Action Section Start
================================================== -->
<section id="call-to-action">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block">
                    <h2 class="title wow fadeInDown" data-wow-delay=".3s" data-wow-duration="500ms">SO WHAT YOU THINK ?</h2>
                    <p class="wow fadeInDown" data-wow-delay=".5s" data-wow-duration="500ms">If you want to know more about us....</p>
                    <a href="../contact.php" class="btn btn-default btn-contact wow fadeInDown" data-wow-delay=".7s" data-wow-duration="500ms">Contact With Us</a>
                </div>
            </div>

        </div>
    </div>
</section>
<!--
==================================================
Footer Section Start
================================================== -->
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


