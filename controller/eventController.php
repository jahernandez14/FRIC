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

    function archiveEvent($id){
        $db = new EventDatabase();
        $attr = $db->getEventAttributes($id);
        $db->editEventDocument($attr[0], $attr[1], $attr[2], $attr[3], $attr[4], $attr[5],$attr[6],$attr[7],$attr[8],
                               $attr[9],$attr[10],$attr[11],$attr[12],$attr[13],$attr[15],$attr[14],$attr[16]);
        logEntry($attr[1] . " has been archived");
    }
?>