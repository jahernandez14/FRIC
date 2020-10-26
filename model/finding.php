<?php
class Finding {
    // Protected Attributes
    private $findingTitle;
    private $hostName;
    private $ipPort;
    private $findingDescription;
    private $findingLongDescription;
    private $findingStatus;
    private $findingType;
    private $findingClassification;
    private $associationToFinding;
    private $evidence;
    private $archiveStatus;
    private $associatedTo;

    public function __construct($db, $findingTitle, $hostName, $ipPort, $findingDescription, $findingLongDescription, $findingStatus, $findingType, $findingClassification, $associationToFinding, $evidence, $archiveStatus){
        $addObject                  = $db->checkDatabaseForSameID($findingTitle,'FRIC_Database.Finding');
        $this->findingTitle           = $findingTitle;
        $this->hostName               = $hostName; 
        $this->ipPort                 = $ipPort;
        $this->findingDescription     = $findingDescription;
        $this->findingLongDescription = $findingLongDescription;
        $this->findingStatus          = $findingStatus;
        $this->findingType            = $findingType;
        $this->findingClassification  = $findingClassification;
        $this->associationToFinding   = $associationToFinding;
        $this->evidence               = $evidence;
        $this->archiveStatus          = $archiveStatus;
        $this->associatedTo           = "";//double check

        $dbEntry = [
            '_id'                    => new MongoDB\BSON\ObjectId(),
            'findingTitle'           => $findingTitle,
            'hostName'               => $hostName,
            'ipPort'                 => $ipPort,    
            'findingDescription'     => $findingDescription,    
            'findingLongDescription' => $findingLongDescription,    
            'findingStatus'          => $findingStatus,
            'findingType'            => $findingType,
            'findingClassification'  => $findingClassification,
            'evidence'               => $evidence,
            'collaboratorAssignment' => "", //double check
            'archiveStatus'          => $archiveStatus
        ];

        $db->insertDocument($dbEntry, 'FRIC_Database.Finding');
    }
}
?>