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

        $db->insertDocument($dbEntry, 'FRIC_Database.Task');
    }
}
?>