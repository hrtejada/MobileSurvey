<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Survey | <?php echo $title; ?></title>

    <!--Styles-->
    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">

    <!-- Hector Tejada Custom CSS -->
    <link href="../css/custom.css" rel="stylesheet">
</head>


<?php
/**
 * Created by PhpStorm.
 * User: hrtejada
 * Date: 6/6/2016
 * Time: 9:23 AM
 */

    session_start();
    require '../Config/header.php';

    $login = null;
    if(!isset($_SESSION['user'])){
        $login = "<li><a href='../login.php'>Login</a></li>";
    }
    else{
        $login = "<li><a href='logout.php'>Logout</a></li>";
    }

?>
<body>

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Survey</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="../Survey/index.php">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php echo $login; ?>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>