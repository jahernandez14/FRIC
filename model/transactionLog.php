<?php
class TransactionLog {
    private $dateTime;
    private $actionPerformed;
    private $analyst;

    public function __construct($db, $dateTime, $actionPerformed, $analyst){
        $addObject             = $db->checkDatabaseForSameID($dateTime,'FRIC_Database.TransactionLog');
        $id                    = $dateTime;
        $this->actionPerformed = $actionPerformed;
        $this->analyst         = $analyst;

        $dbEntry = [
            '_id'             => $id,   
            'actionPerformed' => $actionPerformed,
            'analyst'         => $analyst
        ];

        if($addObject){
            $db->insertDocument($dbEntry, 'FRIC_Database.TransactionLog');
        }
    }
}
?>