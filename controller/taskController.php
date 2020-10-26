<?php
    require_once('/xampp/htdocs/FRIC/model/database.php');
    require_once('/xampp/htdocs/FRIC/controller/logController.php');

    function taskOverviewTable(){
        $db = new Database("mongodb://localhost:27017");
        $taskArray = $db->getAllTasks();
        return $taskArray;
    }
?>