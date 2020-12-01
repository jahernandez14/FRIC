<?php
    require_once('/xampp/htdocs/FRIC/model/systemDatabase.php');
    require_once('/xampp/htdocs/FRIC/controller/logController.php');

    function systemOverviewTable(){
        $db = new SystemDatabase();
        $systemArray = $db->getAllsystems('FRIC_Database.System');
        return $systemArray;
    }

    function archivedSystemOverviewTable(){
        $db = new SystemDatabase();
        $systemArray = $db->getAllArchivedSystems();
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

    function archiveSystem($id){
        $db = new SystemDatabase();
        $attr = $db->getSystemAttributes($id);
        $db->editSystemDocument($attr[0],$attr[1],$attr[2],$attr[3],$attr[4],$attr[5],$attr[6],$attr[7],$attr[8],
                                $attr[9],$attr[10],true,$attr[12],$attr[13],$attr[14]);
        logEntry($attr[1] . " has been archived");
    }

    function restoreSystem($id){
        $db = new SystemDatabase();
        $attr = $db->getSystemAttributes($id);
        $db->editSystemDocument($attr[0],$attr[1],$attr[2],$attr[3],$attr[4],$attr[5],$attr[6],$attr[7],$attr[8],
                                $attr[9],$attr[10],false,$attr[12],$attr[13],$attr[14]);
        logEntry($attr[1] . " has been restored");
    }
?>