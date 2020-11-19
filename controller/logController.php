<?php
    require_once('../../model/transactionLogDatabase.php');
    require_once('../../model/transactionLog.php');

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