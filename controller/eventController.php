<?php
    require_once('/xampp/htdocs/FRIC/model/eventDatabase.php');
    require_once('/xampp/htdocs/FRIC/controller/logController.php');

    function eventOverviewTable(){
        $db = new EventDatabase();
        $eventArray = $db->getAllEvents();
        return $eventArray;
    }

    function eventNames(){
        $db = new EventDatabase();
        $eventArray = $db->getAllEventNames();
        return $eventArray;
    }

    function readEvent($eventName){
        $db = new EventDatabase();
        $eventArray = $db->getEventAttributes($eventName);
        return $eventArray;
    }

    function createEvent($eventName, $eventDescription, $eventType, $eventVersion, $assessmentDate, $organizationName, $securityClassifcation, $eventClassification, $declassificationDate, $customerName, $archiveStatus, $eventTeam, $derivedFrom, $numberOfFindings, $numberOfSystems, $progress){
        $db = new EventDatabase();
        new Event($db, $eventName, $eventDescription, $eventType, $eventVersion, $assessmentDate, $organizationName, $securityClassifcation, $eventClassification, $declassificationDate, $customerName, $archiveStatus, $eventTeam, $derivedFrom, $numberOfFindings, $numberOfSystems, $progress);
        logEntry($eventName . " event created");
    }

    function editEvent($id, $eventName, $eventDescription, $eventType, $eventVersion, $assessmentDate, $organizationName, $securityClassifcation, $eventClassification, $declassificationDate, $customerName, $archiveStatus, $eventTeam, $derivedFrom, $numberOfFindings, $numberOfSystems, $progress){
        $db = new EventDatabase();
        $db->editEventDocument($id, $eventName, $eventDescription, $eventType, $eventVersion, $assessmentDate, $organizationName, $securityClassifcation, $eventClassification, $declassificationDate, $customerName, $archiveStatus, $eventTeam, $derivedFrom, $numberOfFindings, $numberOfSystems, $progress);
        logEntry($eventName . " event edited");
    }
?>