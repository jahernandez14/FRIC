<?php
require_once('task.php');

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

        $db->insertDocument($dbEntry, 'FRIC_Database.Subtask');
    }
}
?>