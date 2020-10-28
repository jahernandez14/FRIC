<?php
    require_once('/xampp/htdocs/FRIC/model/database.php');
    require_once('/xampp/htdocs/FRIC/controller/logController.php');

    function systemOverviewTable(){
        $db = new Database();
        $systemArray = $db->getAllsystems('FRIC_Database.System');
        return $systemArray;
    }

    function readSystem($systemName){
        $db = new Database();
        $systemArray = $db->getSystemAttributes($systemName);
        return $systemArray;
    }

    function createSystem($systemName, $systemDescription, $systemLocation, $systemRouter, $systemSwitch, $systemRoom, $testPlan, $confidentiality, $integrity, $availability, $archiveStatus, $numberOfTasks, $numberOfFindings, $progress){
        $db = new Database();
        new Systeme($db, $systemName, $systemDescription, $systemLocation, $systemRouter, $systemSwitch, $systemRoom, $testPlan, $confidentiality, $integrity, $availability, $archiveStatus, $numberOfTasks, $numberOfFindings, $progress);
        logEntry($systemName . " system created");
    }

    function editSystem($id, $db, $systemName, $systemDescription, $systemLocation, $systemRouter, $systemSwitch, $systemRoom, $testPlan, $confidentiality, $integrity, $availability, $archiveStatus, $numberOfTasks, $numberOfFindings, $progress){
        $db = new Database();
        $db->editSystemDocument($db, $systemName, $systemDescription, $systemLocation, $systemRouter, $systemSwitch, $systemRoom, $testPlan, $confidentiality, $integrity, $availability, $archiveStatus, $numberOfTasks, $numberOfFindings, $progress);
        logEntry($systemName . " system edited");
    }

    // function archiveSystem($systemName){
    //     $db = new Database();
    //     $systemArray = $db->getDocument($systemName,'FRIC_Database.System');
    //     logEntry($systemName . " system archived");
    // }
?>