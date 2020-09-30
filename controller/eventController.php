<?php
    require_once('/xampp/htdocs/FRIC/model/database.php');

    function eventOverviewTable(){
        $db = new Database("mongodb://localhost:27017");
        $eventArray = $db->getAllDocuments('FRIC_Database.Events');
        return $eventArray;
    }

    function readEvent($eventName){
        $db = new Database("mongodb://localhost:27017");
        $eventArray = $db->getDocument('$eventName','FRIC_Database.Events');
        return $eventArray;
    }

    function createEvent($eventName){
        $db = new Database("mongodb://localhost:27017");
        $db->insertDocument('$eventName','FRIC_Database.Events');
    }

    function editEvent($evenName){
        $db = new Database("mongodb://localhost:27017");
        $db->getDocument('$eventName','FRIC_Database.Events');
    }

    function archiveEvent($eventName){
        $db = new Database("mongodb://localhost:27017");
        $eventArray = $db->getDocument('$eventName','FRIC_Database.Events');
    }
?>