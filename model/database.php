<?php
include ("event.php");
include ("system.php");

class Database{
    private $manager;

    public function __construct($url){
        if(extension_loaded("mongodb")){
            try{
                $this->manager  = new MongoDB\Driver\Manager($url);
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
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
        }
    }

    public function editDocument($id, $dbEntry, $collection){
        try{
            $bulk = new MongoDB\Driver\BulkWrite;
            $bulk->delete(['_id' => $id]);
            $this->manager->executeBulkWrite($collection, $bulk);
            $this->insertDocument($dbEntry, $collection);
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

    /*  Returns a 2d array of all the document attributes in the collection */
    public function getAllDocuments($collection){
        try{
            $query  = new MongoDB\Driver\Query([]);
            $cursor = $this->manager->executeQuery($collection, $query);  
            $table  = array();
            foreach($cursor as $document){
                $row = array();
                foreach($document as $element){
                    array_push($row, $element);
                }
                array_push($table, $row);
            } 
            return $table;
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
            return array(array());
        }
    }

}

$db = new Database("mongodb://localhost:27017");
$testSystem =new system($db, "test name","Desc","Location","Router","Switch","Room","Test Plan","Low","Low","Low");
// $en = "New Name";
// $ed = "This event sucks";
// $et = "CVPA";  
// $ev = "123"; 
// $ad = "1/12/2020";
// $on = "Top Secret";  
// $sc = "Security"; 
// $ec = "Confidential";
// $dd = "1/18/2020";
// $cn = "Kyle";  
// $as = "N"; 
// $ete= "jm";
//$a = new Event($db, $en, $ed, $et, $ev, $ad, $on, $sc, $ec, $dd, $cn, $as, $ete);
//$a->editEventAttributes($db, "LetsGo", $ed, $et, $ev, $ad, $on, $sc, $ec, $dd, $cn, $as, $ete);
//$a->getEventFromDB($db);
print_r($db->getAllDocuments('FRIC_Database.Systems'));//cant add to system not sure why thought ur constructur immidiately did it but it still shows as null
?>