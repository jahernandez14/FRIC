<?php
    require_once('/xampp/htdocs/FRIC/model/database.php');

    function systemOverviewTable(){
        $db = new Database();
        $systemArray = $db->getAllsystems('FRIC_Database.System');
        return $systemArray;
    }

    function readsystem($systemName){
        $db = new Database();
        $systemArray = $db->getDocument('$systemName','FRIC_Database.System');
        return $systemArray;
    }

    function createsystem($systemName, $systemDescription, $systemLocation, $systemRouter, $systemSwitch, $systemRoom, $testPlan, $confidentiality, $integrity, $availability, $numberOfTasks, $numberOfFindings, $progress){
        $db = new Database();
        new Systeme($db, $systemName, $systemDescription, $systemLocation, $systemRouter, $systemSwitch, $systemRoom, $testPlan, $confidentiality, $integrity, $availability, $numberOfTasks, $numberOfFindings, $progress);
    }

    function editsystem($systemName, $systemDescription, $systemLocation, $systemRouter, $systemSwitch, $systemRoom, $testPlan, $confidentiality, $integrity, $availability, $numberOfTasks, $numberOfFindings, $progress){
        $db = new Database();
        $db->editDocument('$systemName','FRIC_Database.System');
        new Systeme($db, $systemName, $systemDescription, $systemLocation, $systemRouter, $systemSwitch, $systemRoom, $testPlan, $confidentiality, $integrity, $availability, $numberOfTasks, $numberOfFindings, $progress);
    }

    function archivesystem($systemName){
        $db = new Database();
        $systemArray = $db->getDocument('$systemName','FRIC_Database.System');
    }
?>