<?php
class Finding {
    // Protected Attributes
    private $findingTitle;
    private $hostName;
    private $ipPort;
    private $associatedTask;
    private $associatedSystem;
    private $associatedSubtask;
    private $findingDescription;
    private $findingLongDescription;
    private $findingStatus;
    private $findingType;
    private $findingClassification;
    private $associationToFinding;
    private $evidence;
    private $archiveStatus;
    private $collaboratorAssignment;
    private $confidentiality;
    private $integrity;
    private $availability;
    private $analystAssignment;
    private $posture;
    private $briefDescription;
    private $longDescription;
    private $relevance;
    private $effectivenessRating;
    private $impactDescription;
    private $impactLevel;
    private $severityCatScore;
    private $vulnerabilitySeverity;
    private $quantitativeVulnerabilitySeverity;
    private $risk;
    private $likelihood;
    private $confidentialityImpactOnSystem;
    private $integrityImpactOnSystem;
    private $availabilityImpactOnSystem;
    private $impactScore;

    public function __construct($db, $findingTitle, $hostName, $ipPort, $associatedTask, $associatedSystem, $associatedSubtask, $findingDescription, $findingLongDescription, $findingStatus, $findingType, $findingClassification, $associationToFinding, $evidence, $archiveStatus, $collaboratorAssignment,
    $confidentiality, $integrity, $availability, $analystAssignment, $posture, $briefDescription, $longDescription, $relevance, $effectivenessRating, $impactDescription, $impactLevel, $severityCatScore, $vulnerabilitySeverity, $quantitativeVulnerabilitySeverity,
    $risk, $likelihood, $confidentialityImpactOnSystem, $integrityImpactOnSystem, $availabilityImpactOnSystem, $impactScore){
        //$addObject                              = $db->checkDatabaseForSameID($findingTitle,'FRIC_Database.Finding');
        $this->findingTitle                      = $findingTitle;
        $this->hostName                          = $hostName; 
        $this->ipPort                            = $ipPort;
        $this->associatedTask                    = $associatedTask;
        $this->associatedSystem                  = $associatedSystem;
        $this->associatedSubtask                 = $associatedSubtask;
        $this->findingDescription                = $findingDescription;
        $this->findingLongDescription            = $findingLongDescription;
        $this->findingStatus                     = $findingStatus;
        $this->findingType                       = $findingType;
        $this->findingClassification             = $findingClassification;
        $this->associationToFinding              = $associationToFinding;
        $this->evidence                          = $evidence;
        $this->archiveStatus                     = $archiveStatus;
        $this->collaboratorAssignment            = $collaboratorAssignment;
        $this->confidentiality                   = $confidentiality;
        $this->integrity                         = $integrity;
        $this->availability                      = $availability;
        $this->analystAssignment                 = $analystAssignment;
        $this->posture                           = $posture;
        $this->briefDescription                  = $briefDescription;
        $this->longDescription                   = $longDescription;
        $this->relevance                         = $relevance;
        $this->effectivenessRating               = $effectivenessRating;
        $this->impactDescription                 = $impactDescription;
        $this->impactLevel                       = $impactLevel;
        $this->severityCatScore                  = $severityCatScore;
        $this->vulnerabilitySeverity             = $vulnerabilitySeverity;
        $this->quantitativeVulnerabilitySeverity = $quantitativeVulnerabilitySeverity;
        $this->risk                              = $risk;
        $this->likelihood                        = $likelihood;
        $this->confidentialityImpactOnSystem     = $confidentialityImpactOnSystem;
        $this->integrityImpactOnSystem           = $integrityImpactOnSystem;
        $this->availabilityImpactOnSystem        = $availabilityImpactOnSystem;
        $this->impactScore                       = $impactScore;

        $dbEntry = [
            '_id'                               => new MongoDB\BSON\ObjectId(),
            'findingTitle'                      => $findingTitle,
            'hostName'                          => $hostName,
            'ipPort'                            => $ipPort,    
            'associatedTask'                    => $associatedTask,
            'associatedSystem'                  => $associatedSystem,
            'associatedSubtask'                 => $associatedSubtask,
            'findingDescription'                => $findingDescription,    
            'findingLongDescription'            => $findingLongDescription,    
            'findingStatus'                     => $findingStatus,
            'findingType'                       => $findingType,
            'findingClassification'             => $findingClassification,
            'evidence'                          => $evidence,
            'archiveStatus'                     => $archiveStatus,
            'collaboratorAssignment'            => $collaboratorAssignment,
            'confidentiality'                   => $confidentiality,
            'integrity'                         => $integrity,
            'availability'                      => $availability,
            'analystAssignment'                 => $analystAssignment,
            'posture'                           => $posture,
            'briefDescription'                  => $briefDescription,
            'longDescription'                   => $longDescription,
            'relevance'                         => $relevance,
            'effectivenessRating'               => $effectivenessRating,
            'impactDescription'                 => $impactDescription,
            'impactLevel'                       => $impactLevel,
            'severityCatScore'                  => $severityCatScore,
            'vulnerabilitySeverity'             => $vulnerabilitySeverity,
            'quantitativeVulnerabilitySeverity' => $quantitativeVulnerabilitySeverity,
            'risk'                              => $risk,
            'likelihood'                        => $likelihood,
            'confidentialityImpactOnSystem'     => $confidentialityImpactOnSystem,
            'integrityImpactOnSystem'           => $integrityImpactOnSystem,
            'availabilityImpactOnSystem'        => $availabilityImpactOnSystem,
            'impactScore'                       => $impactScore
        ];

        $db->insertDocument($dbEntry, 'FRIC_Database.Finding');
    }
}
?>