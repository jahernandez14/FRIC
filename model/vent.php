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

    public function __construct($db, $eventName, $eventDescription, $eventType, $eventVersion, $assessmentDate, $organizationName, $securityClassifcation, $eventClassification, $declassificationDate, $customerName, $archiveStatus, $eventTeam){
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

        $dbEntry = [
            '_id' =>$eventName,
            'eventDescription'      => $eventDescription,
            'eventType'             => $eventType,
            'eventVersion'          => $assessmentDate,
            'assessmentDate'        => $organizationName,
            'organizationName'      => $organizationName,
            'securityClassifcation' => $securityClassifcation,
            'eventClassification'   => $eventClassification,
            'declassificationDate'  => $declassificationDate,
            'customerName'          => $customerName,
            'archiveStatus'         => $archiveStatus,
            'eventTeam'             => $eventTeam
        ];

        $db->insertDocument($dbEntry, 'FRIC_Database.Events');
    }

    public function setAllAttributes($eventName, $eventDescription, $eventType, $eventVersion, $assessmentDate, $organizationName, 
                                  $securityClassifcation, $eventClassification, $declassificationDate, $customerName, $archiveStatus, $eventTeam){
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
    }

    public function setAllRequiredAttributes($eventName, $eventType, $eventVersion, $assessmentDate, $organizationName, 
                                          $securityClassifcation, $eventClassification, $declassificationDate, $customerName, $archiveStatus, $eventTeam){
        $this->eventName             = $eventName;
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
    }

    public function getEventFromDB($db){
        $db->getDocument($this->eventName, 'FRIC_Database.Events');
    }

    /*  Used for testing    */ 
    public function printAllAttributes(){
        echo $this->eventName;
        echo $this->eventDescription;
        echo $this->eventType;
        echo $this->eventVersion;
        echo $this->assessmentDate;
        echo $this->organizationName;
        echo $this->securityClassifcation;
        echo $this->eventClassification;
        echo $this->declassificationDate;
        echo $this->customerName;  
        echo $this->archiveStatus;
        echo $this->eventTeam;
    }
}
?>