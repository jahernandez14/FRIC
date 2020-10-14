<?php
    require_once('/xampp/htdocs/FRIC/model/database.php');

    function analystNames(){
        $db = new Database();
        $analystArray = $db->getAllAnalystNames();
        return $analystArray;
    }
?>