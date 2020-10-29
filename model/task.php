<?php
class Task {
    // Protected Attributes
    protected $taskTitle;
    protected $taskDescription;
    protected $taskProgress;
    protected $taskDueDate;
    protected $attachment;
    protected $analystAssignment;
    protected $collaboratorAssignment;
    protected $archiveStatus;
    protected $numberOfFindings;
    // Private Attributes
    private $associatedSystem;
    private $taskPriority;
    private $associationToTask;
    private $numberOfSubtasks;

    public function __construct($db, $taskTitle, $associatedSystem, $taskDescription, $taskPriority, $taskProgress, $taskDueDate, $attachment, $associationToTask, $analystAssignment, $collaboratorAssignment, $archiveStatus, $numberOfSubtasks, $numberOfFindings){
        //$addObject               = $db->checkDatabaseForSameID($taskTitle,'FRIC_Database.Task');
        $this->taskTitle              = $taskTitle;
        $this->associatedSystem       = $associatedSystem; 
        $this->taskDescription        = $taskDescription;
        $this->taskPriority           = $taskPriority;
        $this->taskProgress           = $taskProgress;
        $this->taskDueDate            = $taskDueDate;
        $this->attachment             = $attachment;
        $this->associationToTask      = $associationToTask;
        $this->analystAssignment      = $analystAssignment;
        $this->collaboratorAssignment = $collaboratorAssignment;
        $this->archiveStatus          = $archiveStatus;
        $this->numberOfSubtasks       = $numberOfSubtasks;
        $this->numberOfFindings       = $numberOfFindings;

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
            'archiveStatus'          => $archiveStatus,
            'numberOfSubtasks'       => $numberOfSubtasks,
            'numberOfFindings'       => $numberOfFindings
        ];

        $db->insertDocument($dbEntry, 'FRIC_Database.Task');
    }
}
?>