<?php
    require_once('/xampp/htdocs/FRIC/model/database.php');
    require_once('/xampp/htdocs/FRIC/controller/logController.php');

    function subtaskOverviewTable(){
        $db = new Database("mongodb://localhost:27017");
        $subtaskArray = $db->getAllSubTasks();
        return $subtaskArray;
    }
?>