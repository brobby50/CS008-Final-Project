<?php
$phpSelf = htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES, "UTF-8");

$path_parts = pathinfo($phpSelf);

 ?>	
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Final Project</title>

        <meta charset="utf-8">
        <meta name="author" content="Robby and Cole">
        <meta name="description" content="Git Hub Final Project">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="custom.css" type="text/css" media="screen">

    </head>
    
<?php
     print '<body id="' . $path_parts['filename'] . '">';

    print('<!-- ///////////////////////////  Body  /////////////////////////// -->');
    include ('header.php');        
    include ('nav.php'); 
?>