<?php
include ("event.php");
include ("systeme.php");
include ("analyst.php");

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

    /*  Returns a 2d array of all attributes required for a Event table */
    public function getAllEvents(){
        try{
            $query  = new MongoDB\Driver\Query([]);
            $cursor = $this->manager->executeQuery('FRIC_Database.Event', $query);  
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

    /*  Returns a 2d array of all attributes required for a System table */
    public function getAllSystems(){
        try{
            $query  = new MongoDB\Driver\Query([]);
            $cursor = $this->manager->executeQuery('FRIC_Database.System', $query);  
            $table  = array();
            foreach($cursor as $document){
                $row = array();
                array_push($row, $document->_id, $document->numberOfTasks, $document->numberOfFindings, $document->progress);
                array_push($table, $row);
            } 
            return $table;
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
            return array(array());
        }
    }
}

/*  Used for testing purposes   */
$db = new Database();

//$a = new Event($db, "Lemon", "This event sucks", "CVPA", "1.2", "1/12/2020", "Army", "Top Secret", "Confidential", "1/18/2020", "Kyle Gumby", "N", "JM", 2, 3,'inProgress');
//print_r($db->getAllEvents());

//$b = new Systeme($db, "System Name", "This system sucks", "El Paso", "1.20.20", "On", "Room 1", "Destroy the world", 1, 2, 3, 2, 3,'inProgress');
//print_r($db->getAllSystems());

//$c = new Analyst($db, "Gimboree", "Gonzalez", "gg", "192.177.1.2", "Tech Guy", "Lead Analyst");
?>