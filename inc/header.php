<?php require_once('config/config.php'); ?>

<!DOCTYPE html>
<html>
    <head>
        <title>PHP Blog</title>
        <link rel="stylesheet" type="text/css" href="inc/bootstrap.min (5).css">
    </head>
    
    <body>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    
    <style>
    .button {
    background-color: #444444; /* Green */
    border: none;
    color: white;
    padding: 0px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 1px;
    margin: 1px 1px;
    cursor: pointer;
    }

    .button1 {border-radius: 2px;}
    .button2 {border-radius: 4px;}
    .button3 {border-radius: 7px;}
    .button4 {border-radius: 12px;}
    .button5 {border-radius: 50%;}
    </style>

    <?php if (basename($_SERVER['PHP_SELF']) == 'signup.php' or basename($_SERVER['PHP_SELF']) == 'index.php') {
        include('navbar-login.php');
    } else {
        include('navbar.php');
    } ?>