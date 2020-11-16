<?php
    require_once('/xampp/htdocs/FRIC/model/systemDatabase.php');
    require_once('/xampp/htdocs/FRIC/controller/logController.php');

    function systemOverviewTable(){
        $db = new SystemDatabase();
        $systemArray = $db->getAllsystems('FRIC_Database.System');
        return $systemArray;
    }

    function readSystem($systemName){
        $db = new SystemDatabase();
        $systemArray = $db->getSystemAttributes($systemName);
        return $systemArray;
    }

    function createSystem($systemName, $systemDescription, $systemLocation, $systemRouter, $systemSwitch, $systemRoom, $testPlan, $confidentiality, $integrity, $availability, $numberOfTasks, $numberOfFindings, $progress){
        $db = new SystemDatabase();
        new Systeme($db, $systemName, $systemDescription, $systemLocation, $systemRouter, $systemSwitch, $systemRoom, $testPlan, $confidentiality, $integrity, $availability, FALSE, $numberOfTasks, $numberOfFindings, $progress);
        logEntry($systemName . " system created");
    }

    function editSystem($id, $systemName, $systemDescription, $systemLocation, $systemRouter, $systemSwitch, $systemRoom, $testPlan, $confidentiality, $integrity, $availability, $archiveStatus, $numberOfTasks, $numberOfFindings, $progress){
        $db = new SystemDatabase();
        $db->editSystemDocument($id, $systemName, $systemDescription, $systemLocation, $systemRouter, $systemSwitch, $systemRoom, $testPlan, $confidentiality, $integrity, $availability, $archiveStatus, $numberOfTasks, $numberOfFindings, $progress);
        logEntry($systemName . " system edited");
    }

    function readSystemTitles(){
        $db = new SystemDatabase();
        $sysTitles = $db->getAllSystemTitles();
        return $sysTitles;
    }
?>