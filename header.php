<?php
    session_start();
    include_once 'include/class.user.php';
    $user = new User();

    $user_data = $_SESSION['user'];
	$user_data = $_SESSION['password'];

    if (!$user->get_session()){
       header("location:login_page.php");
    }

    if (isset($_GET['q'])){
        $user->user_logout();
        header("location:index.php");
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - Senopati Kencana Abimantrana Corporation</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="favicon.png"/>
	<link href="css/crud-bootstrap.min.css" rel="stylesheet" media="screen">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" href="favicon.png"/>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" >SKA Admin</a>
                
            </div>
             <ul class="nav navbar-right top-nav">
                <li>
                            <a href="admin.php?q=logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                </ul>
            
            
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="alam.php"><i class="fa fa-fw fa-file"></i>Wisata Alam</a>
                    </li>
                    <li>
                        <a href="bermain.php"><i class="fa fa-fw fa-file"></i>Wisata Bermain</a>
                    </li>
					<li>
                        <a href="sejarah.php"><i class="fa fa-fw fa-file"></i>Wisata Sejarah</a>
                    </li>
					<li>
                        <a href="belanja.php"><i class="fa fa-fw fa-file"></i>Wisata Belanja</a>
                    </li>

                  
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">