<?php
include ("event.php");
class Database{
    private $manager;
    private $bulk;

    public function __construct($url){
        if(extension_loaded("mongodb")){
            echo "MongoDB extension successfully loaded";
            try{
                $this->manager  = new MongoDB\Driver\Manager($url);
                $this->bulk     = new MongoDB\Driver\BulkWrite;
            } catch (MongoConnectionException $failedLoser){
                echo "Error: $failedLoser";
            }
        } else{
            echo "Error: Failed to load mongoDB extension.";
        }
    } 

    public function insertDocument($dbEntry, $collection){
        try{
            $this->bulk->insert($dbEntry);
            $this->manager->executeBulkWrite($collection, $this->bulk);
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
        }
    }

    public function getDocument($objectName, $collection){
        $query  = new MongoDB\Driver\Query(['_id' => $objectName], []);
        $cursor = $this->manager->executeQuery($collection, $query);
        $object = array(); 
        foreach($cursor as $document){
            foreach($document as $element){
                array_push($object, $element);
            }
        }
        return $object;
    }

    public function getAllDocuments($collection){
        $query  = new MongoDB\Driver\Query([]);
        $cursor = $this->manager->executeQuery($collection, $query);  
        $table  = array();
        foreach($cursor as $document){
            $object = array();
            foreach($document as $element){
                array_push($object, $element);
            }
            array_push($table, $object);
        } 
        return $table;
    }

}
$db = new Database("mongodb://localhost:27017");
$en = "Event Nom";
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
$a = new Event($db, $en, $ed, $et, $ev, $ad, $on, $sc, $ec, $dd, $cn, $as, $ete);
$db->getDocument("Event No", 'FRIC_Database.Events');
$db->getAllDocuments('FRIC_Database.Events');
?>