<!doctype html>
<html lang="en">

<body>
    <!-- <meta http-equiv="refresh" content="0; URL=./view/views/eventOverview.php"/> -->

<?php
    include_once("./view/views/config.php");
    if($_SESSION["loggedIn"] == 0){
        echo '<meta http-equiv="refresh" content="0; URL=./view/views/setupContentView.php"/>'; 
    }
    else{
        echo '<meta http-equiv="refresh" content="0; URL=./view/views/eventOverview.php"/>';
    }
?>
<body>
<!--Used to redirect to another page do to directory structure-->