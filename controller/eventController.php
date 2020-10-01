<?php
    require_once('/xampp/htdocs/FRIC/model/database.php');

    function eventOverviewTable(){
        $db = new Database();
        $eventArray = $db->getAllEvents('FRIC_Database.Event');
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

    function createEvent($eventName, $eventDescription, $eventType, $eventVersion, $assessmentDate, $organizationName, $securityClassifcation, $eventClassification, $declassificationDate, $customerName, $archiveStatus, $eventTeam, $numberOfFindings, $numberOfSystems, $progress){
        $db = new Database();
        new Event($db, $eventName, $eventDescription, $eventType, $eventVersion, $assessmentDate, $organizationName, $securityClassifcation, $eventClassification, $declassificationDate, $customerName, $archiveStatus, $eventTeam, '', $numberOfFindings, $numberOfSystems, $progress);
    }

    function editEvent($eventName, $eventDescription, $eventType, $eventVersion, $assessmentDate, $organizationName, $securityClassifcation, $eventClassification, $declassificationDate, $customerName, $archiveStatus, $eventTeam, $numberOfFindings, $numberOfSystems, $progress){
        $db = new Database();
        $db->editDocument($eventName,'FRIC_Database.Event');
        new Event($db, $eventName, $eventDescription, $eventType, $eventVersion, $assessmentDate, $organizationName, $securityClassifcation, $eventClassification, $declassificationDate, $customerName, $archiveStatus, $eventTeam, '', $numberOfFindings, $numberOfSystems, $progress);
    }

    function archiveEvent($eventName){
        $db = new Database();
        $eventArray = $db->getDocument('$eventName','FRIC_Database.Event');
    }
?>