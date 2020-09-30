<?php
class System {
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

    public function __construct($db, $systemName, $systemDescription, $systemLocation, $systemRouter, $systemSwitch, $systemRoom, $testPlan, $confidentiality, $integrity, $availability){
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
            'availability'      => $availability
        ];
        $db->insertDocument($dbEntry, 'FRIC_Database.systems');
    }
}
?>