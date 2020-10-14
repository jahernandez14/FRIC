<?php
    require_once('/xampp/htdocs/FRIC/model/database.php');
    require_once('/xampp/htdocs/FRIC/controller/logController.php');

    function analystNames(){
        $db = new Database();
        $analystArray = $db->getAllAnalystNames();
        return $analystArray;
    }
?>