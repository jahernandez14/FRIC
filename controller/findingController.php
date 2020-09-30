<?php
    require_once('/xampp/htdocs/FRIC/model/database.php');

    function findingOverviewTable(){
        $db = new Database("mongodb://localhost:27017");
        $findingArray = $db->getAllDocuments('FRIC_Database.Findingss');
        return $findingArray;
    }
?>