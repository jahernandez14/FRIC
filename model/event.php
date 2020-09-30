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
    private $numberOfFindings;
    private $numberOfSystems;
    private $progress;

    public function __construct($db, $eventName, $eventDescription, $eventType, $eventVersion, $assessmentDate, $organizationName, $securityClassifcation, $eventClassification, $declassificationDate, $customerName, $archiveStatus, $eventTeam, $numberOfFindings, $numberOfSystems, $progress){
        $newEventName                = $db->checkDatabaseForSameID($eventName,'FRIC_Database.Events');
        $this->eventName             = $newEventName;
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
        $this->numberOfFindings      = $numberOfFindings;
        $this->numberOfSystems       = $numberOfSystems;
        $this->progress              = $progress;

        $dbEntry = [
            '_id'                   => $newEventName,   
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
            'numberOfFindings'      => $numberOfFindings,    
            'numberOfSystems'       => $numberOfSystems,    
            'progress'              => $progress
        ];
        $db->insertDocument($dbEntry, 'FRIC_Database.Events');
    }
}
?>