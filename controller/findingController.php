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

    function archiveFunction($id){
        $db = new FindingDatabase();
        $attr = $db->getFindingAttributes($id);
        $db->editFindingDocument($attr[0],$attr[1],$attr[2],$attr[3],$attr[4],$attr[5],$attr[6],$attr[7],$attr[8],
                                 $attr[9],$attr[10],$attr[11],$attr[12],$attr[13],true,$attr[15],$attr[16],
                                 $attr[17],$attr[18],$attr[19], $attr[20],$attr[21],$attr[22],$attr[23],$attr[24],
                                 $attr[25],$attr[26],$attr[27],$attr[28],$attr[29],$attr[30],$attr[31],$attr[32],
                                 $attr[33],$attr[34],$attr[35],$attr[36]);
        logEntry($attr[1] . " has been archvied");

    }

?>