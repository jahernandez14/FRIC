<?php
class Systeme {
    private $systemName;
    private $systemDescription;
    private $systemLocation;
    private $systemRouter;
    private $systemSwitch;
    private $systemRoom;
    private $testPlan;
    private $confidentiality;
    private $integrity;
    private $availability;
    private $numberOfTasks;
    private $numberOfFindings;
    private $progress;

    public function __construct($db, $systemName, $systemDescription, $systemLocation, $systemRouter, $systemSwitch, $systemRoom, $testPlan, $confidentiality, $integrity, $availability, $numberOfTasks, $numberOfFindings, $progress){
        //$addObject               = $db->checkDatabaseForSameID($systemName,'FRIC_Database.System');
        $this->systemName        = $systemName;
        $this->systemDescription = $systemDescription;
        $this->systemLocation    = $systemLocation;
        $this->systemRouter      = $systemRouter;
        $this->systemSwitch      = $systemSwitch;
        $this->systemRoom        = $systemRoom;
        $this->testPlan          = $testPlan;
        $this->confidentiality   = $confidentiality;
        $this->integrity         = $integrity;
        $this->availability      = $availability;
        $this->numberOfTasks     = $numberOfTasks;
        $this->numberOfFindings  = $numberOfFindings;
        $this->progress          = $progress;

        $dbEntry = [
            '_id'               => new MongoDB\BSON\ObjectId(),
            'systemName'        => $taskTitle,
            'systemDescription' => $taskDescription,    
            'systemLocation'    => $systemLocation,    
            'systemRouter'      => $taskProgress,    
            'systemSwitch'      => $systemSwitch,
            'systemRoom'        => $systemRoom,
            'testPlan'          => $analystAssignment,
            'confidentiality'   => $collaboratorAssignment,
            'integrity'         => $archiveStatus,
            'availability'      => $availability,
            'numberOfTasks'     => $numberOfSubtasks,
            'numberOfFindings'  => $numberOfFindings,
            'progress'          => $progress
        ];

        $db->insertDocument($dbEntry, 'FRIC_Database.System');
    }
}
?>