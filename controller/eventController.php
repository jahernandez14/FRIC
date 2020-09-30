<?php
    require_once('/xampp/htdocs/FRIC/model/database.php');

    function eventOverviewTable(){
        $db = new Database("mongodb://localhost:27017");
        $eventArray = $db->getAllDocuments('FRIC_Database.Events');
        return $eventArray;
    }
?>