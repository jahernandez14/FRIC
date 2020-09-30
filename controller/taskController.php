<?php
    require_once('/xampp/htdocs/FRIC/model/database.php');

    function taskOverviewTable(){
        $db = new Database("mongodb://localhost:27017");
        $taskArray = $db->getAllDocuments('FRIC_Database.Tasks');
        return $taskArray;
    }
?>