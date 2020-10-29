<?php
class Database{
    protected $manager;
    protected $bucket;

    public function __construct(){
        if(extension_loaded("mongodb")){
            try{
                $this->manager  = new MongoDB\Driver\Manager("mongodb://localhost:27017");
                //$this->bucket = (new MongoDB\Client)->test->selectGridFSBucket();
            } catch (MongoConnectionException $failedLoser){
                echo "Error: $failedLoser";
            }
        } else{
            echo "Error: Failed to load mongoDB extension.";
        }
    }

    /*public function checkDatabaseForSameID($id, $collection){
        $query  = new MongoDB\Driver\Query(['_id' => $id], []);
        $cursor = $this->manager->executeQuery($collection, $query);
        if(count($cursor->toArray()) == 0){
            $id = $id . " - Copy";
            return $this->checkDatabaseForSameID($id, $collection);
        }
        echo "Event ID already exist in database ";
        return ;
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

    protected function storeFile($array, $file){
        //array_push($array);
        /*$gridFS = $this->manager->selectDB('test')->getGridFS();

        $id = $gridFS->storeFile($file);
        $gridFSFile = $grid->get($id);*/
    }
}
?>