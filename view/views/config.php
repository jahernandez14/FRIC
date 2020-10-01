<?php
    $currentTimeout= ini_get('session.gc_maxlifetime');
    ini_set('session.gc_maxlifetime', 2678400);
    $status = false;
    $initials = "J.H.192.168.1.46";
    session_start();

    
    
    $_SESSION["loggedIn"] = $status;
    $_SESSION["initials"] = $initials;

?>