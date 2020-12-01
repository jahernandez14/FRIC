<?php
require_once ("transactionlog.php");
require_once ('database.php');

class TransactionLogDatabase extends Database{
    public function getAllTransactionLogs(){
        try{
            $query  = new MongoDB\Driver\Query([]);
            $cursor = $this->manager->executeQuery('FRIC_Database.TransactionLog', $query);  
            $table  = array();
            foreach($cursor as $document){
                $row = array();
                array_push($row, $document->_id, $document->dateTime, $document->actionPerformed, $document->analyst);
                array_push($table, $row);
            } 
            return $table;
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
            return array(array());
        }
    }

    public function syncAllTransactionLogs($otherAnalystManager){
        $query    = new MongoDB\Driver\Query([]);
        $cursor   = $otherAnalystManager->executeQuery('FRIC_Database.TransactionLog', $query);
        $myCursor = $this->manager->executeQuery('FRIC_Database.TransactionLog', $query);
        foreach($myCursor as $document){
            new TransactionLog($this, $document->dateTime, $document->actionPerformed, $document->analyst);
        }
    }
}
?>