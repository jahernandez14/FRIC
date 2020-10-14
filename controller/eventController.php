<?php
    require_once('/xampp/htdocs/FRIC/model/database.php');
    require_once('/xampp/htdocs/FRIC/controller/logController.php');

    function eventOverviewTable(){
        $db = new Database();
        $eventArray = $db->getAllEvents();
        return $eventArray;
    }

    function eventNames(){
        $db = new Database();
        $eventArray = $db->getAllEventNames('FRIC_Database.Event');
        return $eventArray;
    }

    function readEvent($eventName){
        $db = new Database();
        $eventArray = $db->getDocument($eventName,'FRIC_Database.Event');
        return $eventArray;
    }

    function createEvent($eventName, $eventDescription, $eventType, $eventVersion, $assessmentDate, $organizationName, $securityClassifcation, $eventClassification, $declassificationDate, $customerName, $archiveStatus, $eventTeam, $derivedFrom, $numberOfFindings, $numberOfSystems, $progress){
        $db = new Database();
        new Event($db, $eventName, $eventDescription, $eventType, $eventVersion, $assessmentDate, $organizationName, $securityClassifcation, $eventClassification, $declassificationDate, $customerName, $archiveStatus, $eventTeam, $derivedFrom, $numberOfFindings, $numberOfSystems, $progress);
        logEntry($eventName . " event created");
    }

    function editEvent($id, $eventName, $eventDescription, $eventType, $eventVersion, $assessmentDate, $organizationName, $securityClassifcation, $eventClassification, $declassificationDate, $customerName, $archiveStatus, $eventTeam, $derivedFrom, $numberOfFindings, $numberOfSystems, $progress){
        $db = new Database();
        $db->editEventDocument($id, $eventName, $eventDescription, $eventType, $eventVersion, $assessmentDate, $organizationName, $securityClassifcation, $eventClassification, $declassificationDate, $customerName, $archiveStatus, $eventTeam, $derivedFrom, $numberOfFindings, $numberOfSystems, $progress);
        logEntry($eventName . " event edited");
    }

    function archiveEvent($eventName){
        $db = new Database();
        $eventArray = $db->getDocument('$eventName','FRIC_Database.Event');
        logEntry($eventName . " event archived");
    }
?>