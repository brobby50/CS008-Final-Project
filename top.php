<?php
$phpSelf = htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES, "UTF-8");

$path_parts = pathinfo($phpSelf);

 ?>	
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>GitHub Tutorial</title>

        <meta charset="utf-8">
        <meta name="author" content="Robby and Cole">
        <meta name="description" content="Git Hub Final Project">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="custom.css" type="text/css" media="screen">
        
        <link rel="shortcut icon" href="images/logo_XcL_icon.ico" type="image/x-icon" />

    </head>
    
<?php
    $domain = '//';
    $server = htmlentities($_SERVER['SERVER_NAME'], ENT_QUOTES, 'UTF-8');
    $domain .= $server;
    
    require_once 'lib/security.php';
    include_once 'lib/validation-functions.php';
    include_once 'lib/mail-message.php';
    
    print '<body id="' . $path_parts['filename'] . '">';
    print('<!-- ///////////////////////////  Body  /////////////////////////// -->');
    include ('header.php');        
?>