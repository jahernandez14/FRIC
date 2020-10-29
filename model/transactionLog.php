<?php
class TransactionLog {
    public function __construct($db, $dateTime, $actionPerformed, $analyst){
        $dbEntry = [
            '_id'             => $dateTime,   
            'actionPerformed' => $actionPerformed,
            'analyst'         => $analyst
        ];

        $db->insertDocument($dbEntry, 'FRIC_Database.TransactionLog');
    }
}
?>