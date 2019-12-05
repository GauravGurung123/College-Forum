<?php include "../includes/db.php"; ?>
<?php include "functions.php"; ?>
<?php ob_start(); ?>
<?php session_start(); ?>

<?php
if(isset($_SESSION['user_role'])) {
    if($_SESSION['user_role'] !== 'admin') {
        header("location: ../index.php");
    }

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

    <title>ASEM Admin </title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <?php include "../includes/favicon.php"; ?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- CHART -->
    <script src="js/Chart.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/scripts.js"></script>
    <script src="js/ckeditor.js"></script>




</head>

<body>