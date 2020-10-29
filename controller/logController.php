<?php
    require_once('/xampp/htdocs/FRIC/model/transactionLogDatabase.php');
    require_once('/xampp/htdocs/FRIC/model/transactionLog.php');

    function logTable(){
        $db = new TransactionLogDatabase();
        $logArray = $db->getAllTransactionLogs();
        return $logArray;
    }

    function logEntry($action){
        $db = new TransactionLogDatabase();
        $log = new TransactionLog($db,date("Ymd H:i:s"), $action, $_SESSION["initials"]);
    }

?>