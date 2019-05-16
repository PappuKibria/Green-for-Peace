<?php
require_once("../../vendor/autoload.php");

$objProfile = new \App\Profile\Profile();
$objProfile->setData($_GET);
$oneData = $objProfile->view();


?>



<!doctype html>
<html lang="en">
<head>
    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="icon" type="image/png" href="../../resource/images/favicon.png">
    <title>Profile - Single Profile Information</title>
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
    <link rel="stylesheet" href="../../resource/css/bootstrap.min.css">
    <!-- Ionicons Fonts Css -->
    <link rel="stylesheet" href="../../resource/css/ionicons.min.css">
    <!-- animate css -->
    <link rel="stylesheet" href="../../resource/css/animate.css">
    <!-- Hero area slider css-->
    <link rel="stylesheet" href="../../resource/css/slider.css">
    <!-- owl craousel css -->
    <link rel="stylesheet" href="../../resource/css/owl.carousel.css">
    <link rel="stylesheet" href="../../resource/css/owl.theme.css">
    <link rel="stylesheet" href="../../resource/css/jquery.fancybox.css">
    <!-- template main css file -->
    <link rel="stylesheet" href="../../resource/css/main.css">
    <!-- responsive css -->
    <link rel="stylesheet" href="../../resource/css/responsive.css">

    <!-- Template Javascript Files
    ================================================== -->
    <!-- modernizr js -->
    <script src="../../resource/js/vendor/modernizr-2.6.2.min.js"></script>
    <!-- jquery -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <!-- owl carouserl js -->
    <script src="../../resource/js/owl.carousel.min.js"></script>
    <!-- bootstrap js -->

    <script src="../../resource/js/bootstrap.min.js"></script>
    <!-- wow js -->
    <script src="../../resource/js/wow.min.js"></script>
    <!-- slider js -->
    <script src="../../resource/js/slider.js"></script>
    <script src="../../resource/js/jquery.fancybox.js"></script>
    <!-- template main js -->
    <script src="../../resource/js/main.js"></script>


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
                <a href="index.php" >
                    <img src="../../resource/images/gplogo.jpg" style="height: 100px;" alt="">
                </a>
            </div>
            <!-- /logo -->
        </div>
        <!-- main menu -->
        <nav class="collapse navbar-collapse navbar-right" role="navigation">
            <div class="main-menu">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="index.php" >Home</a>
                    </li>
                    <li><a href="about.php">About</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Events<span class="caret"></span></a>
                        <div class="dropdown-menu">
                            <ul>
                                <li><a href="Events/events.php">Events</a></li>
                                <li><a href="Events/events_create.php">Create New Event</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Blog<span class="caret"></span></a>
                        <div class="dropdown-menu">
                            <ul>
                                <li><a href="Blog/blog.php">Blogs</a></li>
                                <li><a href="Blog/blog_create.php">Create New Blog</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Blood Bank <span class="caret"></span></a>
                        <div class="dropdown-menu">
                            <ul>
                                <li><a href="blood.php">Blood Bank</a></li>
                                <li><a href="create.php">Join Blood Bank</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Members<span class="caret"></span></a>
                        <div class="dropdown-menu">
                            <ul>
                                <li><a href="Member/member.php">Members</a></li>
                                <li><a href="Member/member_create.php">Join as Member</a></li>
                                <li><a href="Admin/admin_login.php">Admin LogIn</a> </li>
                            </ul>
                        </div>
                    </li>
                    <li><a href="gallery.html">Gallery</a></li>
                    <li><a href="contact.php">Contact</a></li>

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
                    <h2>About Our Organization</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.php">
                                <i class="ion-ios-index"></i>
                                Home
                            </a>
                        </li>
                        <li class="active">Profile Details</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>

<br>
<div style="text-align: center;"><a href='blood.php' class='btn btn-info'>Back to Active List</a></div>
<div class="container">
    <h1 style="text-align: center;">Profile - Single Profile Information</h1>

    <div class="row" style="background-color: maroon;"><br><br><br>

        <div class="col-xs-12 col-md-12">
            <div class="col-xs-4 col-md-4"></div>
            <div class="col-xs-2 col-md-2"><p style="color: white;"><b>ID </b></p></div>
            <div class="col-xs-6 col-md-6"><p style="color: white;"><?php echo $oneData->id."<br>"; ?></p></div>
        </div><br>
        <div class="col-xs-12 col-md-12">
            <div class="col-xs-4 col-md-4"></div>
            <div class="col-xs-2 col-md-2"><p style="color: white;"><b>Name </b></p></div>
            <div class="col-xs-6 col-md-6"><p style="color: white;"><?php echo $oneData->name."<br>"; ?></p></div>
        </div><br>
        <div class="col-xs-12 col-md-12">
            <div class="col-xs-4 col-md-4"></div>
            <div class="col-xs-2 col-md-2"><p style="color: white;"><b>Blood Group</b></p></div>
            <div class="col-xs-6 col-md-6"><p style="color: white;"><?php echo $oneData->blood_group."<br>"; ?></p></div>
        </div><br>
        <div class="col-xs-12 col-md-12">
            <div class="col-xs-4 col-md-4"></div>
            <div class="col-xs-2 col-md-2"><p style="color: white;"><b>Contact</b></p></div>
            <div class="col-xs-6 col-md-6"><p style="color: white;"><?php echo $oneData->contact."<br>"; ?></p></div>
        </div><br>
        <div class="col-xs-12 col-md-12">
            <div class="col-xs-4 col-md-4"></div>
            <div class="col-xs-2 col-md-2"><p style="color: white;"><b>Address</b></p></div>
            <div class="col-xs-6 col-md-6"><p style="color: white;"> <?php echo $oneData->address."<br>"; ?></p></div><br><br>
        </div><br><br><br>

    </div>



    <br>
    <div class="col-xs-12 col-md-12">
        <div class="col-xs-3 col-md-3"></div>
        <div class="col-xs-6 col-md-6">
            <a href="pdf1.php" class="btn btn-primary" role="button">Download as PDF</a>
            <a href="xl.php" class="btn btn-primary" role="button">Download as XL</a>
            <a href="email.php?list=1" class="btn btn-primary" role="button">Email Active List To A friend</a>
        </div>
        <div class="col-xs-3 col-md-3"></div>
    </div>
    <br><br>

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
                    <a href="contact.php" class="btn btn-default btn-contact wow fadeInDown" data-wow-delay=".7s" data-wow-duration="500ms">Contact With Us</a>
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

<script src="../../resource/bootstrap/js/jquery.js"></script>

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