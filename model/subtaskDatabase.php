<?php
require_once ("subtask.php");
require_once ('database.php');

class SubtaskDatabase extends Database{    
    public function getAllArchivedSubTasks(){
        try{
            $query  = new MongoDB\Driver\Query([]);
            $cursor = $this->manager->executeQuery('FRIC_Database.Subtask', $query);  
            $table  = array();
            foreach($cursor as $document){
                if($document->archiveStatus == true){
                    $row = array();
                    array_push($row, $document->_id, $document->taskTitle, $document->associatedTask, $document->analystAssignment, 
                               $document->taskProgress, $document->numberOfFindings, $document->taskDueDate);
                    array_push($table, $row);
                }
            } 
            return $table;
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
            return array(array());
        }
    }

    public function getAllSubTasks(){
        try{
            $this->updateBefore();
            $query  = new MongoDB\Driver\Query([]);
            $cursor = $this->manager->executeQuery('FRIC_Database.Subtask', $query);  
            $table  = array();
            foreach($cursor as $document){
                if($document->archiveStatus != true){
                    $row = array();
                    array_push($row, $document->_id, $document->taskTitle, $document->associatedTask, $document->analystAssignment, 
                               $document->taskProgress, $document->numberOfFindings, $document->taskDueDate);
                    array_push($table, $row);
                }
            } 
            return $table;
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
            return array(array());
        }
    }

    public function getAllUpcomingSubtask($analystFirstName, $analystLastName){
        try{
            $this->updateBefore();
            $query  = new MongoDB\Driver\Query([]);
            $cursor = $this->manager->executeQuery('FRIC_Database.Subtask', $query);  
            $table  = array();
            foreach($cursor as $document){
                foreach($document->analystAssignment as $assignedAnalyst){
                    if($assignedAnalyst == $analystFirstName." ".$analystLastName and date($document->taskDueDate) <= date("Y-M-D") and strtolower($document->taskProgress) != "complete" and strtolower($document->taskProgress) != "not applicable"){
                        $row = array();
                        array_push($row, $document->_id, $document->taskTitle, $document->taskDueDate);
                        array_push($table, $row);
                    } 
                }
            } 
            return $table;
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
            return array(array());
        }
    }

    public function checkSubtaskForSystemAssociation($subtaskName, $systemName){
        try{
            $query  = new MongoDB\Driver\Query(['taskTitle' => $subtaskName], []);
            $cursor = $this->manager->executeQuery('FRIC_Database.Subtask', $query);
            $taskDatabase = new TaskDatabase();
            foreach($cursor as $document){
                if($taskDatabase->checkTaskForSystemAssociation($document->associatedTask, $systemName)){
                    return True;
                }
            }
            return False;
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
            return False;
        }
    }

    public function getNumOfSubtaskAssociatedToATask($taskName){
        try{
            $query  = new MongoDB\Driver\Query([]);
            $cursor = $this->manager->executeQuery('FRIC_Database.Subtask', $query);
            $count  = 0;
            foreach($cursor as $document){
                if($document->associatedTask == $taskName){
                    $count += 1;
                }
            } 
            return $count;
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
            return 0;
        }
    }

    public function promoteToTask($id){
        try{
            $query  = new MongoDB\Driver\Query(['_id' => $id], []);
            $cursor = $this->manager->executeQuery('FRIC_Database.Subtask', $query);
            foreach($cursor as $document){
                new Task($this, $document->taskTitle, "", $document->taskDescription, "Low", $document->taskProgress, $document->taskDueDate, $document->attachment, [$document->associatedTask], $document->analystAssignment, $document->collaboratorAssignment, $document->archiveStatus, 0, $document->numberOfFindings);
            }
            $this->removeFromDB('FRIC_Database.Subtask', $id);
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
        }
    }

    public function getSubtaskAttributes($id){
        try{
            $this->updateBefore();
            $query  = new MongoDB\Driver\Query(['_id' => $id], []);
            $cursor = $this->manager->executeQuery('FRIC_Database.Subtask', $query);
            $object = array(); 
            foreach($cursor as $document){
                array_push($object, $document->_id, 
                                    $document->taskTitle, 
                                    $document->associatedTask, 
                                    $document->taskDescription, 
                                    $document->taskProgress, 
                                    $document->taskDueDate,
                                    $document->attachment, 
                                    $document->associationToSubtask, 
                                    $document->analystAssignment, 
                                    $document->collaboratorAssignment,
                                    $document->archiveStatus,
                                    $document->numberOfFindings);
            }
            return $object;
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
            return Null;
        }
    }

    private function updateBefore(){
        try{
            $query  = new MongoDB\Driver\Query([]);
            $cursor = $this->manager->executeQuery('FRIC_Database.Subtask', $query);  
            $table  = array();
            foreach($cursor as $document){
                if($document->archiveStatus != true){
                    $this->updateCounts($document->taskTitle);
                }
            } 
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
        }
    }

    private function updateCounts($taskName){
        try{
            $bulk      = new MongoDB\Driver\BulkWrite;
            $findingDB = new FindingDatabase();
            $bulk->update(['taskTitle' => $taskName], ['$set'=> ['numberOfFindings' => $findingDB->getNumOfFindingsAssociatedToASubtask($taskName)]]);
            $this->manager->executeBulkWrite('FRIC_Database.Subtask', $bulk);
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
        }
    }

    public function syncAllSubtasks($otherAnalystManager){
        $query    = new MongoDB\Driver\Query([]);
        $cursor   = $otherAnalystManager->executeQuery('FRIC_Database.Subtask', $query);
        $myCursor = $this->manager->executeQuery('FRIC_Database.Subtask', $query);
        foreach($cursor as $document){
            if($this->checkDatabaseForSameName('taskTitle', $document->taskTitle, 'FRIC_Database.Subtask')){
                foreach($myCursor as $d){
                    if($d->taskTitle == $document->taskTitle){
                        $this->editSubtaskDocument($document->_id, $document->taskTitle, $document->associatedTask, $document->taskDescription, $document->taskProgress, $document->taskDueDate, $document->attachment, $document->associationToSubtask, $document->analystAssignment, $document->collaboratorAssignment, $document->archiveStatus, $document->numberOfFindings);
                    }
                }
            } else {
                new Subtask($this, $document->taskTitle, $document->associatedTask, $document->taskDescription, $document->taskProgress, $document->taskDueDate, $document->attachment, $document->associationToSubtask, $document->analystAssignment, $document->collaboratorAssignment, $document->archiveStatus, $document->numberOfFindings);
            }
        }
    }

    public function editSubtaskDocument($id, $taskTitle, $associatedTask, $taskDescription, $taskProgress, $taskDueDate, $attachment, $associationToSubtask, $analystAssignment, $collaboratorAssignment, $archiveStatus, $numberOfFindings){
        $dbEntry = ['$set'=>
            ['taskTitle'             => $taskTitle,
            'associatedTask'         => $associatedTask,
            'taskDescription'        => $taskDescription,    
            'taskProgress'           => $taskProgress,    
            'taskDueDate'            => $taskDueDate,
            'attachment'             => $attachment,
            'associationToSubtask'   => $associationToSubtask,
            'analystAssignment'      => $analystAssignment,
            'collaboratorAssignment' => $collaboratorAssignment,
            'archiveStatus'          => $archiveStatus,
            'numberOfFindings'       => $numberOfFindings]
        ];

        try{
            $query  = new MongoDB\Driver\Query(['_id' => $id], []);
            $cursor = $this->manager->executeQuery('FRIC_Database.Subtask', $query);
            $originalName = "";
            foreach($cursor as $document){
                $originalName = $document->taskTitle;
            }

            if($originalName != $taskTitle and $this->checkDatabaseForSameName('taskTitle', $taskTitle, 'FRIC_Database.Subtask')){
                echo <<< SCRIPT
                    <script>
                        alert("Subtask with the same title already exist in the database. The subtask was not edited.");
                    </script>
                SCRIPT;
            }else{
                $changes = $this->checkForChanges('FRIC_Database.Subtask', $id, $dbEntry['$set']);
                $bulk = new MongoDB\Driver\BulkWrite;
                $bulk->update(['_id' => $id], $dbEntry);
                $this->manager->executeBulkWrite('FRIC_Database.Subtask', $bulk);
                return $changes;
            }
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
        }
    }
}
?>
