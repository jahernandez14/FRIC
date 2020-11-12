<?php
    $currentTimeout= ini_get('session.gc_maxlifetime');
    ini_set('session.gc_maxlifetime', 2678400);

    session_start();
    date_default_timezone_set('America/Denver');

    function update($status, $initials, $ip, $fName, $lName){
        $_SESSION["loggedIn"] = $status;
        $_SESSION["initials"] = $initials;
        $_SESSION["ip"] = $ip;
        $_SESSION["fName"] = $fName;
        $_SESSION["lName"] = $lName;
    }
?>