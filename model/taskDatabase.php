<?php
include ("task.php");
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

    public function getAllTaskForAssociation(){
        try{
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
            $query  = new MongoDB\Driver\Query(['_id' => $id], []);
            $cursor = $this->manager->executeQuery('FRIC_Database.Task', $query);
            $object = array(); 
            foreach($cursor as $document){
                array_push($object, $document->_id, $document->taskTitle, $document->associatedSystem, $document->taskDescription, $document->taskPriority, $document->taskProgress, 
                           $document->attachment, $document->associationToTask, $document->analystAssignment, $document->collaboratorAssignment, $document->numberOfSubtasks, 
                           $document->numberOfFindings, $document->taskDueDate, $document->archiveStatus);
            }
            return $object;
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
            return array();
        }
    }

    public function editTaskDocument($id, $taskTitle, $associatedSystem, $taskDescription, $taskPriority, $taskProgress, $taskDueDate, $attachment, $associationToTask, $analystAssignment, $collaboratorAssignment, $archiveStatus, $numberOfSubtasks, $numberOfFindings){
        //$getFileName = explode("/", $test);
        $attachment  = ['fileName' => $attachment, 'fileData' => new MongoDB\BSON\Binary(file_get_contents($attachment), 0)];
        
        $dbEntry = ['$set'=>
            ['taskTitle'              => $taskTitle,
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
            $bulk = new MongoDB\Driver\BulkWrite;
            $bulk->update(['_id' => $id], $dbEntry);
            $this->manager->executeBulkWrite('FRIC_Database.Task', $bulk);
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
        }
    }
}
?>