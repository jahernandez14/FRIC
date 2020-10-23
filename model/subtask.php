<?php
class Subtask extends Task {
    private $associatedTask;
    private $associationToSubtask;

    public function __construct($db, $taskTitle, $associatedTask, $taskDescription, $taskProgress, $taskDueDate, $attachment, $associationToSubtask, $analystAssignment, $collaboratorAssignment, $archiveStatus, $numberOfFindings){
        $this->taskTitle              = $taskTitle;
        $this->associatedTask         = $associatedTask;
        $this->taskDescription        = $taskDescription;
        $this->taskProgress           = $taskProgress;
        $this->taskDueDate            = $taskDueDate;
        $this->attachment             = $attachment;
        $this->associationToSubtask   = $associationToSubtask;
        $this->analystAssignment      = $analystAssignment;
        $this->collaboratorAssignment = $collaboratorAssignment;
        $this->archiveStatus          = $archiveStatus;
        $this->numberOfFindings       = $numberOfFindings;

        $dbEntry = [
            '_id'                    => new MongoDB\BSON\ObjectId(),
            'taskTitle'              => $taskTitle,
            'associatedTask'         => $associatedTask,
            'taskDescription'        => $taskDescription,    
            'taskProgress'           => $taskProgress,    
            'taskDueDate'            => $taskDueDate,
            'attachment'             => $attachment,
            'associationToSubtask'   => $associationToSubtask,
            'analystAssignment'      => $analystAssignment,
            'collaboratorAssignment' => $collaboratorAssignment,
            'archiveStatus'          => $archiveStatus,
            'numberOfFindings'       => $numberOfFindings
        ];

        $db->insertDocument($dbEntry, 'FRIC_Database.Subtask');
    }
}
?>