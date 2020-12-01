<?php
class TransactionLog {
    public function __construct($db, $dateTime, $actionPerformed, $analyst){
        $dbEntry = [
            '_id'             => (string) new MongoDB\BSON\ObjectId(),
            'dateTime'        => $dateTime,   
            'actionPerformed' => $actionPerformed,
            'analyst'         => $analyst
        ];

        $db->insertDocument($dbEntry, 'FRIC_Database.TransactionLog');
    }
}
?>