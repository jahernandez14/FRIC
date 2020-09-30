<?php
include ("event.php");
include ("system.php");

class Database{
    private $manager;

    public function __construct(){
        if(extension_loaded("mongodb")){
            try{
                $this->manager  = new MongoDB\Driver\Manager("mongodb://localhost:27017");
            } catch (MongoConnectionException $failedLoser){
                echo "Error: $failedLoser";
            }
        } else{
            echo "Error: Failed to load mongoDB extension.";
        }
    }

    public function checkDatabaseForSameID($id, $collection){
        $query  = new MongoDB\Driver\Query(['_id' => $id], []);
        $cursor = $this->manager->executeQuery($collection, $query);
        if(count($cursor->toArray()) == 0){
            return $id;
        }
        $id = $id . " - Copy";
        return $this->checkDatabaseForSameID($id, $collection);
    }

    public function insertDocument($dbEntry, $collection){
        try{
            $bulk = new MongoDB\Driver\BulkWrite;
            $bulk->insert($dbEntry);
            $this->manager->executeBulkWrite($collection, $bulk);
            echo "Here";
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
        }
    }

    public function editDocument($id, $collection){
        try{
            $bulk = new MongoDB\Driver\BulkWrite;
            $bulk->delete(['_id' => $id]);
            $this->manager->executeBulkWrite($collection, $bulk);
            #$this->insertDocument($dbEntry, $collection);
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
        }
    }

    public function getDocument($id, $collection){
        try{
            $query  = new MongoDB\Driver\Query(['_id' => $id], []);
            $cursor = $this->manager->executeQuery($collection, $query);
            $object = array(); 
            foreach($cursor as $document){
                foreach($document as $element){
                    array_push($object, $element);
                }
            }
            return $object;
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
            return array();
        }
    }

    /*  Returns a 2d array of all attributes required for an Event table */
    public function getAllEvents(){
        try{
            $query  = new MongoDB\Driver\Query([]);
            $cursor = $this->manager->executeQuery('FRIC_Database.Events', $query);  
            $table  = array();
            foreach($cursor as $document){
                $row = array();
                array_push($row, $document->_id, $document->numberOfSystems, $document->numberOfFindings, $document->progress);
                array_push($table, $row);
            } 
            return $table;
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
            return array(array());
        }
    }

    /*  Returns a 2d array of all attributes required for an Event table */
    public function getAllSystems(){
        try{
            $query  = new MongoDB\Driver\Query([]);
            $cursor = $this->manager->executeQuery('FRIC_Database.systems', $query);  
            $table  = array();
            foreach($cursor as $document){
                $row = array();
                array_push($row, $document->_id, $document->numberOfSystems, $document->numberOfFindings, $document->progress);
                array_push($table, $row);
            } 
            return $table;
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
            return array(array());
        }
    }

}
$db     = new Database();
//$testSystem = new system($db, "test name","Desc","Location","Router","Switch","Room","Test Plan","Low","Low","Low");
$en = "New Name";
$ed = "This event sucks";
$et = "CVPA";  
$ev = "123"; 
$ad = "1/12/2020";
$on = "Top Secret";  
$sc = "Security"; 
$ec = "Confidential";
$dd = "1/18/2020";
$cn = "Kyle";  
$as = "N"; 
$ete= "jm";
//$a = new Event($db, $en, 2, 3,'inProgress', $ed, $et, $ev, $ad, $on, $sc, $ec, $dd, $cn, $as);
$a = new System($db, $en, $ed, $et, $ev, $ad, $on, $sc, $dd, $cn, $as);
//print_r($db->getAllEvents());
//$a->editEventAttributes($db, "LetsGo", $ed, $et, $ev, $ad, $on, $sc, $ec, $dd, $cn, $as, $ete);
//$a->getEventFromDB($db);
//print_r($db->getAllDocuments('FRIC_Database.systems'));//cant add to system not sure why thought ur constructur immidiately did it but it still shows as null
?>