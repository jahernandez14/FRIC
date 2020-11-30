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
    
    public function checkDatabaseForSameName($dbAttribute, $title, $collection){
        $query  = new MongoDB\Driver\Query([$dbAttribute => $title], []);
        $cursor = $this->manager->executeQuery($collection, $query);
        if(count($cursor->toArray()) == 0){
            return False;
        }
        
        return True;
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

    public function removeFromDB($collection, $id){
        try{
            $query  = new MongoDB\Driver\Query(['_id' => $id], []);
            $bulk   = new MongoDB\Driver\BulkWrite;
            $cursor = $this->manager->executeQuery($collection, $query); 
            foreach($cursor as $document){
                $bulk->delete($document);
            }
            $this->manager->executeBulkWrite($collection, $bulk); 
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
        }
    }

    public function deleteOldData($collection){
        try{
            $query  = new MongoDB\Driver\Query([]);
            $bulk   = new MongoDB\Driver\BulkWrite;
            $cursor = $this->manager->executeQuery($collection, $query);  
            foreach($cursor as $document){
                $bulk->delete($document);
            } 
            $this->manager->executeBulkWrite($collection, $bulk);
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
        }
    }

    public function search($keyword){
        try{
            // Type, Titles and ids
            $allRelatedItems = array();
            
            $query  = new MongoDB\Driver\Query([]);
            $cursor = $this->manager->executeQuery('FRIC_Database.Event', $query);  
            foreach($cursor as $document){
                foreach($document as $attribute){
                    if(is_string($attribute) and strpos(strtolower($attribute), strtolower($keyword)) !== false){
                        $row = array();
                        array_push($row, $document->_id, "Event", $document->eventTitle);
                        array_push($allRelatedItems, $row);
                        break;
                    }
                }
            } 

            $query  = new MongoDB\Driver\Query([]);
            $cursor = $this->manager->executeQuery('FRIC_Database.Finding', $query);  
            foreach($cursor as $document){
                foreach($document as $attribute){
                    if(is_string($attribute) and strpos(strtolower($attribute), strtolower($keyword)) !== false){
                        $row = array();
                        array_push($row, $document->_id, "Finding", $document->findingTitle);
                        array_push($allRelatedItems, $row);
                    }
                }
            } 

            $query  = new MongoDB\Driver\Query([]);
            $cursor = $this->manager->executeQuery('FRIC_Database.System', $query);  
            foreach($cursor as $document){
                foreach($document as $attribute){
                    if(is_string($attribute) and strpos(strtolower($attribute), strtolower($keyword)) !== false){
                        $row = array();
                        array_push($row, $document->_id, "System", $document->systemName);
                        array_push($allRelatedItems, $row);
                    }
                }
            } 

            $query  = new MongoDB\Driver\Query([]);
            $cursor = $this->manager->executeQuery('FRIC_Database.Subtask', $query);  
            foreach($cursor as $document){
                foreach($document as $attribute){
                    if(is_string($attribute) and strpos(strtolower($attribute), strtolower($keyword)) !== false){
                        $row = array();
                        array_push($row, $document->_id, "Subtask", $document->taskTitle);
                        array_push($allRelatedItems, $row);
                    }
                }
            } 

            $query  = new MongoDB\Driver\Query([]);
            $cursor = $this->manager->executeQuery('FRIC_Database.Task', $query);  
            foreach($cursor as $document){
                foreach($document as $attribute){
                    if(is_string($attribute) and strpos(strtolower($attribute), strtolower($keyword)) !== false){
                        $row = array();
                        array_push($row, $document->_id, "Task", $document->taskTitle);
                        array_push($allRelatedItems, $row);
                    }
                }
            } 

            return $allRelatedItems;
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
            return array();
        }
    }

    public function checkForChanges($collection, $id, $newChanges){
        $query   = new MongoDB\Driver\Query(['_id' => $id], []);
        $cursor  = $this->manager->executeQuery($collection, $query);
        $changes = "";
        foreach($cursor as $document){
            $keys  = array_keys(json_decode(json_encode($document), true));
            $title = $keys[1];
            $changes .= $document->$title . " was edited. The attributes changed were, ";   
            foreach($keys as $key){
                if($key != '_id' and $document->$key != $newChanges[$key]){
                    $changes .= $key . ", ";
                }
            }
        }

        return substr($changes, 0, -2) . ".";
    }

    /****public function storeFile($file){
        $record = [
            '_id' => (string) new MongoDB\BSON\ObjectId(),
            'test'=> array()
        ];

        if($record['test'] == null){
            $arr = array();
            $record['test'] = array_push($arr, ['fileName' => "cp.PNG", 'fileData' => new MongoDB\BSON\Binary(file_get_contents("cp.PNG"), 0)]);
        } else{
            $record['test'] = array_push($record['test'], ['fileName' => "cp.PNG", 'fileData' => new MongoDB\BSON\Binary(file_get_contents("cp.PNG"), 0)]);
        }

        print_r($record);
        /*if(file_exists("temp/" . $file) != true){
            $file = fopen("temp/" . $record['test'][0]['fileName'], 'w');
            fwrite($file, "temp/" . $record['test'][0]['fileData']->getData());
        }
        
        //$this->insertDocument($record, 'FRIC_Database.Test');
    }**/
}
?>