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
    private $archiveStatus;

    public function __construct($db, $systemName, $systemDescription, $systemLocation, $systemRouter, $systemSwitch, $systemRoom, $testPlan, $confidentiality, $integrity, $availability, $archiveStatus, $numberOfTasks, $numberOfFindings, $progress){
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
        $this->archiveStatus     = $archiveStatus;
        $this->numberOfTasks     = $numberOfTasks;
        $this->numberOfFindings  = $numberOfFindings;
        $this->progress          = $progress;

        $dbEntry = [
            '_id'               => new MongoDB\BSON\ObjectId(),
            'systemName'        => $systemName,
            'systemDescription' => $systemDescription,      
            'systemLocation'    => $systemLocation,    
            'systemRouter'      => $systemRouter,     
            'systemSwitch'      => $systemSwitch,
            'systemRoom'        => $systemRoom,
            'testPlan'          => $testPlan,
            'confidentiality'   => $confidentiality,
            'integrity'         => $integrity,
            'availability'      => $availability,
            'archiveStatus'     => $archiveStatus,
            'numberOfTasks'     => $numberOfTasks,
            'numberOfFindings'  => $numberOfFindings,
            'progress'          => $progress
        ];

        $db->insertDocument($dbEntry, 'FRIC_Database.System');
    }
}
?>