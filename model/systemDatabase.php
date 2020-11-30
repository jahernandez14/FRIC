<?php
require_once ('systeme.php');
require_once ('database.php');
require_once ('findingDatabase.php');
require_once ('taskDatabase.php');

class SystemDatabase extends Database{
    public function getAllArchivedSystems(){
        try{
            $query  = new MongoDB\Driver\Query([]);
            $cursor = $this->manager->executeQuery('FRIC_Database.System', $query);  
            $table  = array();
            foreach($cursor as $document){
                if($document->archiveStatus == true){
                    $row = array();
                    array_push($row, $document->_id, $document->systemName, $document->numberOfTasks, $document->numberOfFindings, $document->progress);
                    array_push($table, $row);
                }
            } 
            return $table;
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
            return array(array());
        }
    }

    public function getAllSystemForAssociations(){
        try{
            $this->updateBefore();
            $query  = new MongoDB\Driver\Query([]);
            $cursor = $this->manager->executeQuery('FRIC_Database.System', $query);  
            $table  = array();
            foreach($cursor as $document){
                if($document->archiveStatus != true){
                    array_push($table, $document->systemName);
                }
            } 
            return $table;
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
            return array(array());
        }
    }

    public function getAllSystems(){
        try{
            $this->updateBefore();
            $query  = new MongoDB\Driver\Query([]);
            $cursor = $this->manager->executeQuery('FRIC_Database.System', $query);  
            $table  = array();
            foreach($cursor as $document){
                if($document->archiveStatus != true){
                    $row = array();
                    array_push($row, $document->_id, $document->systemName, $document->numberOfTasks, $document->numberOfFindings, $document->progress);
                    array_push($table, $row);
                }
            } 
            return $table;
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
            return array(array());
        }
    }

    private function updateBefore(){
        try{
            $query  = new MongoDB\Driver\Query([]);
            $cursor = $this->manager->executeQuery('FRIC_Database.System', $query);  
            $table  = array();
            foreach($cursor as $document){
                if($document->archiveStatus != true){
                    $this->updateCounts($document->systemName);
                }
            } 
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
            return array(array());
        }
    }

    private function updateCounts($systemName){
        try{
            $bulk      = new MongoDB\Driver\BulkWrite;
            $findingDB = new FindingDatabase(); 
            $taskDB    = new TaskDatabase();
            $bulk->update(['systemName' => $systemName], ['$set'=> ['numberOfFindings' => $findingDB->getNumOfFindingsAssociatedToASystem($systemName), 'numberOfTasks' => $taskDB->getNumOfTaskAssociatedToASystem($systemName), 'progress' => $taskDB->getTaskForSystemProgress($systemName)]], ['multi' => false, 'upsert' => false]);//$findingDB->getNumOfFindingsAssociatedToASystem($systemName)]]);
            $this->manager->executeBulkWrite('FRIC_Database.System', $bulk);
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
        }
    }

    public function getAllSystemProgress(){
        try{
            $this->updateBefore();
            $query  = new MongoDB\Driver\Query([]);
            $cursor = $this->manager->executeQuery('FRIC_Database.System', $query);  
            $totalProgress     = 0;
            $totalNumOfSystems = 0;
            foreach($cursor as $document){
                if($document->archiveStatus != true){
                    $totalProgress     += str_replace('%', '', $document->progress);
                    $totalNumOfSystems += 1;
                }
            } 

            if($totalNumOfSystems <= 0){
                return 0 . "%";
            }

            return round((100/ (100 * $totalNumOfSystems)) * $totalProgress) . "%";
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
        }
    }

    public function getSystemAttributes($id){
        try{
            $this->updateBefore();
            $query  = new MongoDB\Driver\Query(['_id' => $id], []);
            $cursor = $this->manager->executeQuery('FRIC_Database.System', $query);
            $object = array(); 
            foreach($cursor as $document){
                array_push($object, $document->_id, $document->systemName, $document->systemDescription, $document->systemLocation, $document->systemRouter, $document->systemSwitch, 
                           $document->systemRoom, $document->testPlan, $document->confidentiality, $document->integrity, $document->availability, $document->archiveStatus, $document->numberOfTasks,
                           $document->numberOfFindings, $document->progress);
            }
            return $object;
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
            return array();
        }
    }

    public function getNumOfSystemsAssociatedToAnEvent(){
        try{
            $query  = new MongoDB\Driver\Query([]);
            $cursor = $this->manager->executeQuery('FRIC_Database.System', $query);
            $count  = 0;
            foreach($cursor as $document){
                if($document->archiveStatus != true){
                    $count += 1;
                }
            } 
            return $count;
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
            return array(array());
        }
    }

    public function getAllSystemTitles(){
        try{
            $this->updateBefore();
            $query  = new MongoDB\Driver\Query([]);
            $cursor = $this->manager->executeQuery('FRIC_Database.System', $query);
            $systems = array(); 
            foreach($cursor as $document){
                array_push($systems, $document->systemName);
            }

            return $systems;
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
            return array();
        }
    }

    public function syncAllSystems($otherAnalystManager){
        $query    = new MongoDB\Driver\Query([]);
        $cursor   = $otherAnalystManager->executeQuery('FRIC_Database.System', $query);
        $myCursor = $this->manager->executeQuery('FRIC_Database.Subtask', $query);
        foreach($cursor as $document){
            if($this->checkDatabaseForSameName('systemName', $document->systemName, 'FRIC_Database.System')){
                $this->editSystemDocument($document->systemName, $document->systemDescription, $document->systemLocation, $document->systemRouter, $document->systemSwitch, $document->systemRoom, $document->testPlan, $document->confidentiality, $document->integrity, $document->availability, $document->archiveStatus, $document->numberOfTasks, $document->numberOfFindings, $document->progress);
            } else {
                new Systeme($myDb, $document->systemName, $document->systemDescription, $document->systemLocation, $document->systemRouter, $document->systemSwitch, $document->systemRoom, $document->testPlan, $document->confidentiality, $document->integrity, $document->availability, $document->archiveStatus, $document->numberOfTasks, $document->numberOfFindings, $document->progress);
            }
        }
    }

    public function editSystemDocument($id, $systemName, $systemDescription, $systemLocation, $systemRouter, $systemSwitch, $systemRoom, $testPlan, $confidentiality, $integrity, $availability, $archiveStatus, $numberOfTasks, $numberOfFindings, $progress){
        $dbEntry = ['$set'=>
            ['systemName'       => $systemName,
            'systemDescription' => $systemDescription,    
            'systemLocation'    => $systemLocation,    
            'systemRouter'      => $systemRouter,    
            'systemSwitch'      => $systemSwitch,
            'systemRoom'        => $systemRoom,
            'testPlan'          => $testPlan,
            'confidentiality'   => $confidentiality,
            'integrity'         => $integrity,
            'availability'      => $availability,
            'archiveStatus'     => $archiveStatus,
            'numberOfTasks'     => $numberOfTasks,
            'numberOfFindings'  => $numberOfFindings,
            'progress'          => $progress]
        ];

        try{
            $query  = new MongoDB\Driver\Query(['_id' => $id], []);
            $cursor = $this->manager->executeQuery('FRIC_Database.System', $query);
            $originalName = "";
            foreach($cursor as $document){
                $originalName = $document->systemName;
            }

            if($originalName != $systemName and $this->checkDatabaseForSameName('systemName', $systemName, 'FRIC_Database.System')){
                echo <<< SCRIPT
                    <script>
                        alert("System with the same title already exist in the database. The system was not edited.");
                    </script>
                SCRIPT;
            }else{
                $changes = $this->checkForChanges('FRIC_Database.System', $id, $dbEntry['$set']);
                $bulk = new MongoDB\Driver\BulkWrite;
                $bulk->update(['_id' => $id], $dbEntry);
                $this->manager->executeBulkWrite('FRIC_Database.System', $bulk);
                return $changes;
            }
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
        }
    }
}
?>