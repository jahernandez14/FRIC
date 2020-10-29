<?php
require_once('database.php');

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

    public function getSubtaskAttributes($id){
        try{
            $query  = new MongoDB\Driver\Query(['_id' => $id], []);
            $cursor = $this->manager->executeQuery('FRIC_Database.Subtask', $query);
            $object = array(); 
            foreach($cursor as $document){
                array_push($object, $document->_id, $document->taskTitle, $document->associatedTask, $document->taskDescription, $document->taskProgress, 
                           $document->attachment, $document->associationToSubtask, $document->analystAssignment, $document->collaboratorAssignment, $document->archiveStatus);
            }
            return $object;
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
            return array();
        }
    }

    public function editSubtaskDocument($id, $taskTitle, $associatedTask, $taskDescription, $taskProgress, $taskDueDate, $attachment, $associationToSubtask, $analystAssignment, $collaboratorAssignment, $archiveStatus){
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
            'archiveStatus'          => $archiveStatus]
        ];

        try{
            $bulk = new MongoDB\Driver\BulkWrite;
            $bulk->update(['_id' => $id], $dbEntry);
            $this->manager->executeBulkWrite('FRIC_Database.Subtask', $bulk);
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
        }
    }
}
?>
