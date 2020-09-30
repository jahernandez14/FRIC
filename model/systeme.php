<?php
/* I figured out the issue, with the system class, might be making a call to the system() function, changed name */
class Systeme {
    public $systemName;
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
        $newSystemName           = $db->checkDatabaseForSameID($systemName,'FRIC_Database.systems');
        $this->systemName        = $newSystemName;
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
            '_id'               => $newSystemName,
            'systemDescription' => $systemDescription,    
            'systemLocation'    => $systemLocation,    
            'systemRouter'      => $systemRouter,    
            'systemSwitch'      => $systemSwitch,
            'systemRoom'        => $systemRoom,
            'testPlan'          => $testPlan,
            'confidentiality'   => $confidentiality,
            'integrity'         => $integrity,
            'availability'      => $availability,
            'numberOfTasks'     => $numberOfTasks,
            'numberOfFindings'  => $numberOfFindings,
            'progress'          => $progress
        ];
        $db->insertDocument($dbEntry, 'FRIC_Database.systems');
    }
}
?>