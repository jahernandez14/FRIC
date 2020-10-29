<?php
    require_once('/xampp/htdocs/FRIC/model/analystDatabase.php');
    require_once('/xampp/htdocs/FRIC/controller/logController.php');

    function analystNames(){
        $db = new AnalystDatabase();
        $analystArray = $db->getAllAnalystNames();
        return $analystArray;
    }

    function analystTaskSummary($fName, $lName){
        $db = new AnalystDatabase();
        return getAllProgressForTask($fName, $lName);
    }

    function analystSubTaskSummary($fName, $lName){
        $db = new AnalystDatabase();
        return getAllProgressForSubTask($fName, $lName);
    }
    
    function analystFindingSummary($fName, $lName){
        $db = new AnalystDatabase();
        return getAllProgressForFinding($fName, $lName);
    } 

    function analystSystemSummary($fName, $lName){
        $db = new AnalystDatabase();
        return getAllProgressForSystem($fName, $lName);
    } 
?>