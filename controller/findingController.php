<?php
    require_once('/xampp/htdocs/FRIC/model/findingDatabase.php');
    require_once('/xampp/htdocs/FRIC/controller/logController.php');

    function findingOverviewTable(){
        $db = new FindingDatabase();
        $findingsArray = $db->getAllFindings();
        return $findingsArray;
    }

    function readFinding($findingName){
        $db = new FindingDatabase();
        $finding = $db->getfindingAttributes($findingName);
        return $finding;
    }

    function createfinding($findingTitle, $hostName, $ipPort, $associatedTask, $associatedSystem, 
                           $associatedSubtask, $findingDescription, $findingLongDescription, $findingStatus, 
                           $findingType, $findingClassification, $associationToFinding, $evidence, 
                           $archiveStatus, $collaboratorAssignment, $confidentiality, $integrity, 
                           $availability, $analystAssignment, $posture, $briefDescription, $longDescription, 
                           $relevance, $effectivenessRating, $impactDescription, $impactLevel, $severityCatcode, $severityCatScore, 
                           $vulnerabilitySeverity, $quantitativeVulnerabilitySeverity,$risk, $likelihood, 
                           $confidentialityImpactOnSystem, $integrityImpactOnSystem, $availabilityImpactOnSystem, 
                           $impactScore){
        $db = new FindingDatabase();
        new Finding($db, $findingTitle, $hostName, $ipPort, $associatedTask, $associatedSystem, 
                    $associatedSubtask, $findingDescription, $findingLongDescription, $findingStatus, 
                    $findingType, $findingClassification, $associationToFinding, $evidence, $archiveStatus, 
                    $collaboratorAssignment, $confidentiality, $integrity, $availability, $analystAssignment, 
                    $posture, $briefDescription, $longDescription, $relevance, $effectivenessRating, 
                    $impactDescription, $impactLevel, $severityCatcode, $severityCatScore, $vulnerabilitySeverity, 
                    $quantitativeVulnerabilitySeverity, $risk, $likelihood, $confidentialityImpactOnSystem, 
                    $integrityImpactOnSystem, $availabilityImpactOnSystem, $impactScore);
        logEntry($findingTitle . " Finding Created");
    }

    function editfinding($id, $findingTitle, $hostName, $ipPort, $associatedTask, $associatedSystem, 
                           $associatedSubtask, $findingDescription, $findingLongDescription, $findingStatus, 
                           $findingType, $findingClassification, $associationToFinding, $evidence, 
                           $archiveStatus, $collaboratorAssignment, $confidentiality, $integrity, 
                           $availability, $analystAssignment, $posture, $briefDescription, $longDescription, 
                           $relevance, $effectivenessRating, $impactDescription, $impactLevel, $severityCatcode, $severityCatScore, 
                           $vulnerabilitySeverity, $quantitativeVulnerabilitySeverity,$risk, $likelihood, 
                           $confidentialityImpactOnSystem, $integrityImpactOnSystem, $availabilityImpactOnSystem, 
                           $impactScore){
        $db = new FindingDatabase();
        $db->editFindingDocument($id, $findingTitle, $hostName, $ipPort, $associatedTask, $associatedSystem, 
                    $associatedSubtask, $findingDescription, $findingLongDescription, $findingStatus, 
                    $findingType, $findingClassification, $associationToFinding, $evidence, $archiveStatus, 
                    $collaboratorAssignment, $confidentiality, $integrity, $availability, $analystAssignment, 
                    $posture, $briefDescription, $longDescription, $relevance, $effectivenessRating, 
                    $impactDescription, $impactLevel, $severityCatcode, $severityCatScore, $vulnerabilitySeverity, 
                    $quantitativeVulnerabilitySeverity, $risk, $likelihood, $confidentialityImpactOnSystem, 
                    $integrityImpactOnSystem, $availabilityImpactOnSystem, $impactScore);
        logEntry($findingTitle . " Finding Edited");
    }

    function findingsList(){
        $db = new FindingDatabase();
        $list = $db->getAllFindingsForReports(); 
        return $list; 
    }

    function ERBFindings($id_list){
        $db = new FindingDatabase();
        $list = $db->getFindingsForERBReport($id_list);
        return $list;
    }

?>