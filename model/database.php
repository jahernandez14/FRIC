<?php
class Database{
    protected $manager;

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

    /*public function checkDatabaseForSameName($name){
        $query  = new MongoDB\Driver\Query(['eventName' => $name], []);
        $cursor = $this->manager->executeQuery($collection, $query);
        if(count($cursor->toArray()) == 0){
            return $name;
        }
        $name = $name . " - Copy";
        return $this->checkDatabaseForSameID($name, $collection);
    }*/

    public function insertDocument($dbEntry, $collection){
        try{
            $bulk = new MongoDB\Driver\BulkWrite;
            $bulk->insert($dbEntry);
            $this->manager->executeBulkWrite($collection, $bulk);
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
        }
    }
}
?>