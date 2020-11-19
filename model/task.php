<?php
class Task {
    public function __construct($db, $taskTitle, $associatedSystem, $taskDescription, $taskPriority, $taskProgress, $taskDueDate, $attachment, $associationToTask, $analystAssignment, $collaboratorAssignment, $archiveStatus, $numberOfSubtasks, $numberOfFindings){
        $dbEntry = [
            '_id'                    => (string) new MongoDB\BSON\ObjectId(),
            'taskTitle'              => $taskTitle,
            'associatedSystem'       => $associatedSystem,
            'taskDescription'        => $taskDescription,    
            'taskPriority'           => $taskPriority,    
            'taskProgress'           => $taskProgress,    
            'taskDueDate'            => $taskDueDate,
            'attachment'             => $attachment,
            'associationToTask'      => $associationToTask,
            'analystAssignment'      => $analystAssignment,
            'collaboratorAssignment' => $collaboratorAssignment,
            'archiveStatus'          => false,
            'numberOfSubtasks'       => $numberOfSubtasks,
            'numberOfFindings'       => $numberOfFindings
        ];

        if($db->checkDatabaseForSameName('taskTitle', $taskTitle, 'FRIC_Database.Task')){
            echo <<< SCRIPT
                <script>
                    alert("Task with the same title already exist in the database. The task was not created.");
                </script>
            SCRIPT;
        }else{
            $db->insertDocument($dbEntry, 'FRIC_Database.Task');
        }
    }
}
?>