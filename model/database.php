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
            return true;
        }
        echo "Event ID already exist in database ";
        return false;
        //$id = $id . " - Copy";
        //return $this->checkDatabaseForSameID($id, $collection);
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

    public function getAllEventNames(){
        try{
            $query  = new MongoDB\Driver\Query([]);
            $cursor = $this->manager->executeQuery('FRIC_Database.Event', $query);  
            $table  = array();
            foreach($cursor as $document){
                $row = array();
                array_push($row, $document->_id);
                array_push($table, $row);
            } 
            return $table;
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
            return array(array());
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

//$a = new Event($db, "Event 2", "This a test event description", "Cooperative Vulnerability Penetration Assessment", "1.2", "9/30/2020", "Army", "Top Secret", "Unclassified", "1/18/2020", "Tim Honks", "N", "JM", "wb192.2.3", 1, 2,'inProgress');
//$b = new Event($db, "Event 3", "This a test event description", "Verification of Fixes", "2.2", "1/12/2020", "Army", "Top Secret", "Confidential", "1/01/2020", "Axel Rose", "N", "JM", "jh192.2.2", 5, 10,'in progress');
//$c = new Event($db, "Event 6", "This a test event description", "Verification of Fixes", "3.2", "1/12/2020", "Army", "Top Secret", "Secret", "9/30/2020", "Kyle Gumby", "N", "JM", "db192.2.1", 6, 7,'in progress');
//$d = new Event($db, "Event 1", "This a test event description", "Cooperative Vulnerability Penetration Assessment", "2.2", "1/12/2020", "Army", "Top Secret", "Confidential", "1/01/2020", "Carl", "N", "JM", "we192.2.3", 3, 3,'in progress');
//$e = new Event($db, "Event 7", "This a test event description", "Cooperative Vulnerability Penetration Assessment", "1.2", "1/12/2020", "Army", "Top Secret", "Confidential", "1/20/2020", "Lemon Guy", "N", "JM", "am192.2.3", 3, 7,'in progress');
//$a = new Event($db, "Event 7", "This a test event description", "Cooperative Vulnerability Penetration Assessment", "1.2", "1/12/2020", "Army", "Top Secret", "Confidential", "1/20/2020", "Lemon Guy", "N", "JM", "am192.2.3", 3, 7,'in progress');
//print_r($db->getAllEventNames());

//$b = new Systeme($db, "System Name", "This a test event description", "El Paso", "1.20.20", "On", "Room 1", "Destroy the world", 1, 2, 3, 2, 3,'inProgress');
//print_r($db->getAllSystems());

// $c = new Analyst($db, "Gimboree", "Gonzalez", "gg", "192.177.1.2", "Tech Guy", "Lead Analyst");
?>