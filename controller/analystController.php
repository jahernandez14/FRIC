<?php
    require_once('/xampp/htdocs/FRIC/model/analystDatabase.php');
    require_once('/xampp/htdocs/FRIC/controller/logController.php');

    function newAnalyst($firstName, $lastName, $initials, $ip, $title, $role) {
        $db = new AnalystDatabase();
        new Analyst($db, $firstName, $lastName, $initials, $ip, $title, $role);
    }

    function analystNames(){
        $db = new AnalystDatabase();
        $analystArray = $db->getAllAnalystNames();
        return $analystArray;
    }

    function nonLeadNames(){
        $db = new AnalystDatabase();
        $analystArray = $db->getAllNonLeadAnalyst();
        return $analystArray;
    }

    function leadNames(){
        $db = new AnalystDatabase();
        $analystArray = $db->getAllLeadAnalyst();
        return $analystArray;
    }

    function analystTaskSummary($fName, $lName){
        $db = new AnalystDatabase();
        return @$db->getAllProgressForTask($fName, $lName);
    }

    function analystSubTaskSummary($fName, $lName){
        $db = new AnalystDatabase();
        return @$db->getAllProgressForSubTask($fName, $lName);
    }
    
    function analystFindingSummary($fName, $lName){
        $db = new AnalystDatabase();
        return @$db->getAllProgressForFinding($fName, $lName);
    } 

    function analystSystemSummary($fName, $lName){
        $db = new AnalystDatabase();
        return @$db->getAllProgressForSystem($fName, $lName);
    }
    
    function syncIP($ip){
        $db = new AnalystDatabase();
        $db->syncWithAnalyst($ip);
        echo "<h3>Sync Complete</h3>";
    }
?>