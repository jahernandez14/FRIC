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

    public function __construct($eventName, $eventDescription, $eventType, $eventVersion, $assessmentDate, $organizationName, $securityClassifcation, $eventClassification, $declassificationDate, $customerName, $archiveStatus, $eventTeam){
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

    /*  Getters */ 
    public function getEventName(){ return $this->eventName;}

    public function getEventDescription(){ return $this->eventDescription;}
    
    public function getEventType(){ return $this->eventType;}
    
    public function getEventVersion(){ return $this->eventVersion;}
    
    public function getAssessmentDate(){ return $this->asssessmentDate;}
    
    public function getOrganizationName(){ return $this->organizationName;}
    
    public function getSecurityClassification(){ return $this->securityClassification;}
    
    public function getEventClassification(){ return $this->eventClassification;}
    
    public function getDeclassificationDate(){ return $this->declassificationDate;}
    
    public function getCustomerName(){ return $this->customerName;}
    
    public function getArchiveStatus(){ return $this->archiveStatus;}
    
    public function getEventTeam(){ return $this->eventTeam;}

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
$en = "Event Lemon";
$ed = "This event sucks";
$et = "CVPA";  
$ev = "123"; 
$ad = "1/12/2020";
$on = "Top Secret";  
$sc = "Secruity"; 
$ec = "Confidential";
$dd = "1/18/2020";
$cn = "Kyle";  
$as = "N"; 
$ete= "jm";
$a = new Event($en, $ed, $et, $ev, $ad, $on, $sc, $ec, $dd, $cn, $as, $ete);
$a->printAllAttributes();
?>