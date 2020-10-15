<?php
    $currentTimeout= ini_get('session.gc_maxlifetime');
    ini_set('session.gc_maxlifetime', 2678400);

    session_start();
    date_default_timezone_set('America/Denver');

    if(!isset($_SESSION["loggedIn"])){
    $status = 0;
    $initials = "";
    $ip = "";
    $_SESSION["loggedIn"] = $status;
    $_SESSION["initials"] = $initials;
    $_SESSION["ip"] = $ip;
    }

    function update($status, $initials, $ip){
        $_SESSION["loggedIn"] = $status;
        $_SESSION["initials"] = $initials;
        $_SESSION["ip"] = $ip;
    }
?>