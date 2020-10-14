<?php
    require_once('/xampp/htdocs/FRIC/model/database.php');
    require_once('/xampp/htdocs/FRIC/model/transactionLog.php');

    function logTable(){
        $db = new Database();
        $logArray = $db->getAllTransactionLogs();
        return $logArray;
    }

    function logEntry($action){
        $db = new Database();
        $log = new TransactionLog($db,date("Ymd H:i:s"), $action, $_SESSION["initials"]);
    }

?>