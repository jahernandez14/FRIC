<?php
require_once ("task.php");
require_once ("subtask.php");
require_once ('findingDatabase.php');
require_once ('systemDatabase.php');
require_once ('database.php');

class TaskDatabase extends Database{
    public function getAllArchivedTasks(){
        try{
            $query  = new MongoDB\Driver\Query([]);
            $cursor = $this->manager->executeQuery('FRIC_Database.Task', $query);  
            $table  = array();
            foreach($cursor as $document){
                $row = array();
                if($document->archiveStatus == true){
                    array_push($row, $document->_id, $document->taskTitle, $document->associatedSystem, $document->analystAssignment, $document->taskPriority, 
                               $document->taskProgress, $document->numberOfSubtasks, $document->numberOfFindings, $document->taskDueDate);
                    array_push($table, $row);
                }
            } 
            return $table;
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
            return array(array());
        }
    }

    public function getAllTasks(){
        try{
            $this->updateBefore();
            $query  = new MongoDB\Driver\Query([]);
            $cursor = $this->manager->executeQuery('FRIC_Database.Task', $query);  
            $table  = array();
            foreach($cursor as $document){
                $row = array();
                if($document->archiveStatus != true){
                    array_push($row, $document->_id, $document->taskTitle, $document->associatedSystem, $document->analystAssignment, $document->taskPriority, 
                               $document->taskProgress, $document->numberOfSubtasks, $document->numberOfFindings, $document->taskDueDate);
                    array_push($table, $row);
                }
            } 
            return $table;
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
            return array(array());
        }
    }

    public function getAllUpcomingTask($analystFirstName, $analystLastName){
        try{
            $this->updateBefore();
            $query  = new MongoDB\Driver\Query([]);
            $cursor = $this->manager->executeQuery('FRIC_Database.Task', $query);  
            $table  = array();
            foreach($cursor as $document){
                foreach(@$document->analystAssignment as $assignedAnalyst){
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

    public function getAllTaskForAssociation(){
        try{
            $this->updateBefore();
            $query  = new MongoDB\Driver\Query([]);
            $cursor = $this->manager->executeQuery('FRIC_Database.Task', $query);  
            $table  = array();
            foreach($cursor as $document){
                if($document->archiveStatus != true){
                    array_push($table, $document->taskTitle);
                }
            } 
            return $table;
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
            return array(array());
        }
    }

    public function getTaskAttributes($id){
        try{
            $this->updateBefore();
            $query  = new MongoDB\Driver\Query(['_id' => $id], []);
            $cursor = $this->manager->executeQuery('FRIC_Database.Task', $query);
            $object = array(); 
            foreach($cursor as $document){
                array_push($object, 
                $document->_id, 
                $document->taskTitle, 
                $document->associatedSystem, 
                $document->taskDescription, 
                $document->taskPriority, 
                $document->taskProgress, 
                $document->taskDueDate, 
                $document->attachment, 
                $document->associationToTask, 
                $document->analystAssignment, 
                $document->collaboratorAssignment, 
                $document->archiveStatus, 
                $document->numberOfSubtasks, 
                $document->numberOfFindings);
            }
            return $object;
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
            return array();
        }
    }

    public function checkTaskForSystemAssociation($taskName, $systemName){
        try{
            $query  = new MongoDB\Driver\Query(['taskTitle' => $taskName], []);
            $cursor = $this->manager->executeQuery('FRIC_Database.Task', $query);
            foreach($cursor as $document){
                if($document->associatedSystem == $systemName){
                    return True;
                }
            }
            return False;
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
            return False;
        }
    }

    public function getNumOfTaskAssociatedToASystem($systemName){
        try{
            $query  = new MongoDB\Driver\Query([]);
            $cursor = $this->manager->executeQuery('FRIC_Database.Task', $query);
            $count  = 0;
            foreach($cursor as $document){
                if($document->associatedSystem == $systemName){
                    $count += 1;
                }
            } 
            return $count;
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
            return array(array());
        }
    }

    public function getTaskForSystemProgress($systemName){
        try{
            $query          = new MongoDB\Driver\Query([]);
            $cursor         = $this->manager->executeQuery('FRIC_Database.Task', $query);
            $totalProgress  = 0;
            $totalNumOfTask = 0;
            foreach($cursor as $document){
                if($document->associatedSystem == $systemName){
                    $totalProgress  += $this->convertProgress($document->taskProgress);
                    $totalNumOfTask += 1;
                }
            } 

            if($totalNumOfTask <= 0){
                return 0 . "%";
            }

            return round((100/ (10 * $totalNumOfTask)) * $totalProgress) . "%";
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
            return array(array());
        }
    }

    public function demoteToSubtask($id){
        try{
            $query  = new MongoDB\Driver\Query(['_id' => $id], []);
            $cursor = $this->manager->executeQuery('FRIC_Database.Task', $query);
            foreach($cursor as $document){
                new SubTask($this, $document->taskTitle, "", $document->taskDescription, $document->taskProgress, $document->taskDueDate, $document->attachment, [], $document->analystAssignment, $document->collaboratorAssignment, $document->archiveStatus, $document->numberOfFindings);
            }
            $this->removeFromDB('FRIC_Database.Task', $id);
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
        }
    }

    public function updateBefore(){
        try{
            $query  = new MongoDB\Driver\Query([]);
            $cursor = $this->manager->executeQuery('FRIC_Database.Task', $query);  
            $table  = array();
            foreach($cursor as $document){
                if($document->archiveStatus != true){
                    $this->updateCounts($document->taskTitle);
                }
            } 
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
            return array(array());
        }
    }

    public function updateCounts($taskName){
        try{
            $bulk      = new MongoDB\Driver\BulkWrite;
            $findingDB = new FindingDatabase(); 
            $subtaskDB = new SubtaskDatabase();
            $bulk->update(['taskTitle' => $taskName], ['$set'=> ['numberOfSubtasks'=> $subtaskDB->getNumOfSubtaskAssociatedToATask($taskName), 'numberOfFindings' => $findingDB->getNumOfFindingsAssociatedToATask($taskName)]]);
            $this->manager->executeBulkWrite('FRIC_Database.Task', $bulk);
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
        }
    }

    public function syncAllTasks($otherAnalystManager){
        $query    = new MongoDB\Driver\Query([]);
        $cursor   = $otherAnalystManager->executeQuery('FRIC_Database.Task', $query);
        $myCursor = $this->manager->executeQuery('FRIC_Database.Task', $query);
        foreach($cursor as $document){   
            if($this->checkDatabaseForSameName('taskTitle', $document->taskTitle, 'FRIC_Database.Task')){
                foreach($myCursor as $d){
                    if($d->taskTitle == $document->taskTitle){
                        $this->editTaskDocument($d->_id, $document->taskTitle, $document->associatedSystem, $document->taskDescription, $document->taskPriority, $document->taskProgress, $document->taskDueDate, $document->attachment, $document->associationToTask, $document->analystAssignment, $document->collaboratorAssignment, $document->archiveStatus, $document->numberOfSubtasks, $document->numberOfFindings);
                    }
                }
            } else {
                new Task($this, $document->taskTitle, $document->associatedSystem, $document->taskDescription, $document->taskPriority, $document->taskProgress, $document->taskDueDate, $document->attachment, $document->associationToTask, $document->analystAssignment, $document->collaboratorAssignment, $document->archiveStatus, $document->numberOfSubtasks, $document->numberOfFindings);
            }
        }
    }

    public function editTaskDocument($id, $taskTitle, $associatedSystem, $taskDescription, $taskPriority, $taskProgress, $taskDueDate, $attachment, $associationToTask, $analystAssignment, $collaboratorAssignment, $archiveStatus, $numberOfSubtasks, $numberOfFindings){
        //$getFileName = explode("/", $test);
        //$attachment  = ['fileName' => $attachment, 'fileData' => new MongoDB\BSON\Binary(file_get_contents($attachment), 0)];
        
        $dbEntry = ['$set'=>
            ['taskTitle'             => $taskTitle,
            'associatedSystem'       => $associatedSystem,
            'taskDescription'        => $taskDescription,    
            'taskPriority'           => $taskPriority,    
            'taskProgress'           => $taskProgress,    
            'taskDueDate'            => $taskDueDate,
            'attachment'             => $attachment,
            'associationToTask'      => $associationToTask,
            'analystAssignment'      => $analystAssignment,
            'collaboratorAssignment' => $collaboratorAssignment,
            'archiveStatus'          => $archiveStatus,
            'numberOfSubtasks'       => $numberOfSubtasks,
            'numberOfFindings'       => $numberOfFindings]
        ];

        try{
            $query  = new MongoDB\Driver\Query(['_id' => $id], []);
            $cursor = $this->manager->executeQuery('FRIC_Database.Task', $query);
            $originalName = "";
            foreach($cursor as $document){
                $originalName = $document->taskTitle;
            }

            if($originalName != $taskTitle and $this->checkDatabaseForSameName('taskTitle', $taskTitle, 'FRIC_Database.Task')){
                echo <<< SCRIPT
                    <script>
                        alert("Task with the same title already exist in the database. The task was not edited.");
                    </script>
                SCRIPT;
            }else{
                $changes = $this->checkForChanges('FRIC_Database.Task', $id, $dbEntry['$set']);
                $bulk = new MongoDB\Driver\BulkWrite;
                $bulk->update(['_id' => $id], $dbEntry);
                $this->manager->executeBulkWrite('FRIC_Database.Task', $bulk);
                return $changes;
            }
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
        }
    }

    private function convertProgress($progress){
        $progress = strtolower($progress);
        switch($progress){
            case "not applicable":
            case "not started":
            case "assigned":
            case "transferred":
                return 0;
            case "in progress":
                return 5;
            case "complete":
                return 10;
            default:
                return 0;        
        }
    }
}
?>