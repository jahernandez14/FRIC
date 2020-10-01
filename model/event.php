<?php
class Event {
    private $eventName;
    private $eventDescription;
    private $eventType;
    private $eventVersion;
    private $assessmentDate;
    private $organizationName;
    private $securityClassifcation;
    private $eventClassification;
    private $declassificationDate;
    private $customerName;
    private $archiveStatus;
    private $eventTeam;
    private $derivedFrom;
    private $numberOfFindings;
    private $numberOfSystems;
    private $progress;

    public function __construct($db, $eventName, $eventDescription, $eventType, $eventVersion, $assessmentDate, $organizationName, $securityClassifcation, $eventClassification, $declassificationDate, $customerName, $archiveStatus, $eventTeam, $derivedFrom, $numberOfFindings, $numberOfSystems, $progress){
        $addObject                   = $db->checkDatabaseForSameID($eventName,'FRIC_Database.Event');
        $this->eventName             = $eventName;
        $this->eventDescription      = $eventDescription;
        $this->eventType             = $eventType;
        $this->eventVersion          = $eventVersion;
        $this->assessmentDate        = $assessmentDate;
        $this->organizationName      = $organizationName;
        $this->securityClassifcation = $securityClassifcation;
        $this->eventClassification   = $eventClassification;
        $this->declassificationDate  = $declassificationDate;
        $this->customerName          = $customerName;
        $this->archiveStatus         = $archiveStatus;
        $this->eventTeam             = $eventTeam;
        $this->derivedFrom           = $derivedFrom;
        $this->numberOfFindings      = $numberOfFindings;
        $this->numberOfSystems       = $numberOfSystems;
        $this->progress              = $progress;

        $dbEntry = [
            '_id'                   => $eventName,   
            'eventDescription'      => $eventDescription,
            'eventType'             => $eventType,
            'eventVersion'          => $eventVersion,
            'assessmentDate'        => $assessmentDate,
            'organizationName'      => $organizationName,
            'securityClassifcation' => $securityClassifcation,
            'eventClassification'   => $eventClassification,
            'declassificationDate'  => $declassificationDate,
            'customerName'          => $customerName,
            'archiveStatus'         => $archiveStatus,
            'eventTeam'             => $eventTeam,
            'derivedFrom'           => $derivedFrom,
            'numberOfFindings'      => $numberOfFindings,    
            'numberOfSystems'       => $numberOfSystems,    
            'progress'              => $progress
        ];

        if($addObject){
            $db->insertDocument($dbEntry, 'FRIC_Database.Event');
        }
    }
}
?>