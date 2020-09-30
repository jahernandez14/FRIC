<?php
    require_once('/xampp/htdocs/FRIC/model/database.php');

    function systemOverviewTable(){
        $db = new Database("mongodb://localhost:27017");
        $systemArray = $db->getAllDocuments('FRIC_Database.Systems');
        return $systemArray;
    }
?>