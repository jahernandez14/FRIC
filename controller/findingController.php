<?php
    require_once('/xampp/htdocs/FRIC/model/database.php');
    require_once('/xampp/htdocs/FRIC/controller/logController.php');

    function findingOverviewTable(){
        $db = new Database("mongodb://localhost:27017");
        $findingArray = $db->getAllDocuments('FRIC_Database.Findingss');
        return $findingArray;
    }
?>