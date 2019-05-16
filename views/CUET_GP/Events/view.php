<?php
require_once("../../../vendor/autoload.php");

$objEvent = new \App\Events\Events();
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
                                <li><a href="events.php">Events</a></li>
                                <li><a href="events_create.php">Create New Event</a></li>
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
                    <h2>GP Event</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="../index.php">
                                <i class="ion-ios-index"></i>
                                Home
                            </a>
                        </li>
                        <li class="active">GP Events</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
</section>

<form></form>

<br>


<div class="container" style="width: 100%;margin: 0px;padding: 0px;">
        <h1 style="text-align: center">Event - Details Information</h1>
    <br>

    <div class="col-xs-12 col-md-12" style="background-color: maroon;">
        <div class="col-xs-12 col-md-6" style="text-align: center;">
            <img src='Upload/<?php echo $oneData->event_photo;?>' alt="Event Photo" style="250px; height: 250px; margin-top: 50px; margin-bottom: 20px;"><br><br>
        </div>
        <div class="col-xs-12 col-md-6" style="color: white"><br><br><br><br>
            <div class="col-xs-12 col-md-12">
                <div class="col-xs-4 col-md-4"> <p><b>Event Title</b></p></div>
                <div class="col-xs-8 col-md-8"><?php echo $oneData->event_title; ?></div>
            </div><br>
            <div class="col-xs-12 col-md-12">
                <div class="col-xs-4 col-md-4"><p><b>Event Host</b></p></div>
                <div class="col-xs-8 col-md-8"><?php echo $oneData->event_host; ?></div>
            </div><br>
            <div class="col-xs-12 col-md-12">
                <div class="col-xs-4 col-md-4"><p><b>Event Starting Time</b></p></div>
                <div class="col-xs-8 col-md-8"><?php echo $oneData->event_date_start; ?></div>
            </div><br>
            <div class="col-xs-12 col-md-12">
                <div class="col-xs-4 col-md-4"><p><b>Event Ending Time</b></p></div>
                <div class="col-xs-8 col-md-8"><?php echo $oneData->event_date_end; ?></div>
            </div><br>
            <div class="col-xs-12 col-md-12">
                <div class="col-xs-4 col-md-4"><p><b>Event Location</b></p></div>
                <div class="col-xs-8 col-md-8"><?php echo $oneData->event_location; ?></div>
            </div>

        </div>
    </div>

    <div class="col-xs-12 col-md-12" style="text-align: justify; background-color:darkgreen;">
        <br><h3 style="text-align: center; margin-top: 30px; color: white;"><b>Event Description</b></h3>
        <p style="margin: 20px; color: white; font-size: large;"><?php echo $oneData->event_description."<br>"; ?></p><br>
    </div>

    <!--<table class="table table-striped table-bordered" cellspacing="0px">




        <tr>
            <th style='width: 10%; text-align: center'>ID</th>
            <th style='width: 10%; text-align: center'>Name</th>
            <th>Blood Group</th>
            <th>Contact</th>
            <th>Address</th>
            <th>Action Button</th>
        </tr>


    </table> -->

</div>

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

</body>
</html>