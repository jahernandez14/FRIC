<?php
require_once ('task.php');

class Subtask extends Task {
    public function __construct($db, $taskTitle, $associatedTask, $taskDescription, $taskProgress, $taskDueDate, $attachment, $associationToSubtask, $analystAssignment, $collaboratorAssignment, $archiveStatus, $numberOfFindings){
        $dbEntry = [
            '_id'                    => (string) new MongoDB\BSON\ObjectId(),
            'taskTitle'              => $taskTitle,
            'associatedTask'         => $associatedTask,
            'taskDescription'        => $taskDescription,    
            'taskProgress'           => $taskProgress,    
            'taskDueDate'            => $taskDueDate,
            'attachment'             => $attachment,
            'associationToSubtask'   => $associationToSubtask,
            'analystAssignment'      => $analystAssignment,
            'collaboratorAssignment' => $collaboratorAssignment,
            'archiveStatus'          => false,
            'numberOfFindings'       => $numberOfFindings
        ];

        if($db->checkDatabaseForSameName('taskTitle', $taskTitle, 'FRIC_Database.Subtask')){
            echo <<< SCRIPT
                <script>
                    alert("Subtask with the same title already exist in the database. The subtask was not created.");
                </script>
            SCRIPT;
        }else{
            $db->insertDocument($dbEntry, 'FRIC_Database.Subtask');
        }
    }
}
?>