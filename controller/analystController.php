<?php
    require_once('/xampp/htdocs/FRIC/model/analystDatabase.php');
    require_once('/xampp/htdocs/FRIC/controller/logController.php');

    function analystNames(){
        $db = new AnalystDatabase();
        $analystArray = $db->getAllAnalystNames();
        return $analystArray;
    }
?>