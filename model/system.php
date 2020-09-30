<?php
class system {
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
        $newsystemName                = $db->checkDatabaseForSameID($systemName,'FRIC_Database.systems');
        $this->systemName             = $newsystemName;
        $this->systemDescription      = $systemDescription;
        $this->systemLocation         = $systemLocation;
        $this->systemRouter           = $systemRouter;
        $this->systemSwitch           = $systemSwitch;
        $this->systemRoom             = $systemRoom;
        $this->testPlan               = $testPlan;
        $this->confidentiality        = $confidentiality;
        $this->integrity              = $integrity;
        $this->availability           = $availability;


        $dbEntry = [
            '_id' => $newsystemName,
            'systemDescription'      => $systemDescription,
            'systemLocation'         => $systemLocation,
            'systemRouter'           => $systemSwitch,
            'systemSwitch'           => $systemRoom,
            'systemRoom'             => $systemRoom,
            'testPlan'               => $testPlan,
            'confidentiality'        => $confidentiality,
            'integrity'              => $integrity,
            'availability'           => $availability,
        ];
        $db->insertDocument($dbEntry, 'FRIC_Database.systems');
    }

    public function editsystemAttributes($db, $systemName, $systemDescription, $systemLocation, $systemRouter, $systemSwitch, $systemRoom, $testPlan, $confidentiality, $integrity, $availability, $archiveStatus, $systemTeam){
        $newsystemName                = $db->checkDatabaseForSameID($systemName,'FRIC_Database.systems');
        $this->systemDescription      = $systemDescription;
        $this->systemLocation         = $systemLocation;
        $this->systemRouter           = $systemRouter;
        $this->systemSwitch           = $systemSwitch;
        $this->systemRoom             = $systemRoom;
        $this->testPlan               = $testPlan;
        $this->confidentiality        = $confidentiality;
        $this->integrity              = $integrity;
        $this->availability           = $availability;

        $dbEntry = [
            '_id' => $newsystemName,
            'systemDescription'      => $systemDescription,
            'systemLocation'         => $systemLocation,
            'systemRouter'           => $systemSwitch,
            'systemSwitch'           => $systemRoom,
            'systemRoom'             => $systemRoom,
            'testPlan'               => $testPlan,
            'confidentiality'        => $confidentiality,
            'integrity'              => $integrity,
            'availability'           => $availability,
        ];
        $db->editDocument($this->systemName, $dbEntry,'FRIC_Database.systems');
        $this->systemName = $newsystemName;
    }

    /*  Returns an array of all the attributes from the $db */
    public function getsystemAttributes($db){
        return $db->getDocument($this->systemName, 'FRIC_Database.systems');
    }

    /*  Used for testing    */ 
    public function printAllAttributes(){
        echo $this->systemName;
        echo $this->systemDescription;
        echo $this->systemLocation;
        echo $this->systemRouter;
        echo $this->systemSwitch;
        echo $this->systemRoom;
        echo $this->testPlan;
        echo $this->confidentiality;
        echo $this->integrity;
        echo $this->availability;  
    }
}
?>