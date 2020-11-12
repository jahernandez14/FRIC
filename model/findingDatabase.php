<?php
require_once ("finding.php");
require_once ('database.php');

class FindingDatabase extends Database{
    public function getAllArchivedFindings(){
        try{
            $query  = new MongoDB\Driver\Query([]);
            $cursor = $this->manager->executeQuery('FRIC_Database.Finding', $query);  
            $table  = array();
            foreach($cursor as $document){
                if($document->archiveStatus == true){
                    $row = array();
                    array_push($row, $document->_id, $document->findingTitle, $document->associatedSystem, $document->associatedTask, $document->associatedSubtask, $document->analystAssignment, $document->findingStatus, $document->findingClassification, $document->findingType, $document->risk);
                    array_push($table, $row);
                }
            } 
            return $table;
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
            return array(array());
        }
    }

    public function getAllFindings(){
        try{
            $query  = new MongoDB\Driver\Query([]);
            $cursor = $this->manager->executeQuery('FRIC_Database.Finding', $query);  
            $table  = array();
            foreach($cursor as $document){
                if($document->archiveStatus != true){
                    $row = array();
                    array_push($row, $document->_id, $document->findingTitle, $document->associatedSystem, $document->associatedTask, $document->associatedSubtask, $document->analystAssignment, $document->findingStatus, $document->findingClassification, $document->findingType, $document->risk);
                    array_push($table, $row);
                }
            } 
            return $table;
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
            return array(array());
        }
    }

    public function getAllFindingsForReports(){
        try{
            $query  = new MongoDB\Driver\Query([]);
            $cursor = $this->manager->executeQuery('FRIC_Database.Finding', $query);  
            $table  = array();
            foreach($cursor as $document){
                if($document->archiveStatus != true){
                    $row = array();
                    array_push($row, $document->_id, $document->findingTitle);
                    array_push($table, $row);
                }
            } 
            return $table;
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
            return array(array());
        }
    }

    public function getFindingsForRiskMatrix($ids){
        //NotDone
    }

    /*I need
    1. ID
    2. Associated System
    3. Finding title
    4. Impact
    5. Risk
    6. Name of all systems in the scope
    */
    public function getFindingsForERBReport($ids){
        //Not Done
    }

    public function getFindingsForFinalReport($ids){
        try{
            $allFindings = array();
            foreach($ids as $id){
                $query  = new MongoDB\Driver\Query(['_id' => $id], []);
                $cursor = $this->manager->executeQuery('FRIC_Database.Finding', $query);
                $object = array(); 
                foreach($cursor as $document){
                    array_push($object, $document->_id, $document->findingDescription, $document->likelihood, $document->impactLevel, $document->risk, $document->findingTitle, $document->hostName, $document->ipPort, $document->impactScore, 
                    $document->severityCatScore, $document->vulnerabilitySeverity, $document->quantitativeVulnerabilitySeverity, $document->findingStatus, $document->posture, $document->confidentialityImpactOnSystem,$document->integrityImpactOnSystem,
                    $document->availabilityImpactOnSystem, $document->impactDescription, $document->findingType, $document->findingClassification, $document->longDescription, $document->effectivenessRating, $document->associatedSystem, $document->severityCatCode);
                } 
                array_push($allFindings, $object);
            }
            return $allFindings;
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
            return array();
        }
    }

    public function getFindingAttributes($id){
        try{
            $query  = new MongoDB\Driver\Query(['_id' => $id], []);
            $cursor = $this->manager->executeQuery('FRIC_Database.Finding', $query);
            $object = array(); 
            foreach($cursor as $document){
                array_push($object, $document->_id, $document->findingTitle, $document->hostName, $document->ipPort, $document->findingDescription, $document->findingLongDescription, $document->findingStatus, $document->findingType, $document->associatedSystem, $document->associatedTask, $document->associatedSubtask, $document->findingClassification, $document->associationToFinding, $document->evidence, $document->archiveStatus, $document->collaboratorAssignment,
                $document->confidentiality, $document->integrity, $document->availability, $document->analystAssignment, $document->posture, $document->briefDescription, $document->longDescription, $document->relevance, $document->effectivenessRating, $document->impactDescription, $document->impactLevel, $document->severityCatCode, $document->severityCatScore, $document->vulnerabilitySeverity, $document->quantitativeVulnerabilitySeverity,
                $document->risk, $document->likelihood, $document->confidentialityImpactOnSystem, $document->integrityImpactOnSystem, $document->availabilityImpactOnSystem, $document->impactScore);
            }
            return $object;
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
            return array();
        }
    }

    public function editFindingDocument($id, $findingTitle, $hostName, $ipPort, $associatedTask, $associatedSystem, $associatedSubtask, $findingDescription, $findingLongDescription, $findingStatus, $findingType, $findingClassification, $associationToFinding, $evidence, $archiveStatus, $collaboratorAssignment,
                                        $confidentiality, $integrity, $availability, $analystAssignment, $posture, $briefDescription, $longDescription, $relevance, $effectivenessRating, $impactDescription, $impactLevel, $severityCatCode, $severityCatScore, $vulnerabilitySeverity, $quantitativeVulnerabilitySeverity,
                                        $risk, $likelihood, $confidentialityImpactOnSystem, $integrityImpactOnSystem, $availabilityImpactOnSystem, $impactScore){
        $dbEntry = ['$set'=>
            ['findingTitle'                     => $findingTitle,
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
            'severityCatCode'                   => $severityCatCode,
            'severityCatScore'                  => $severityCatScore,
            'vulnerabilitySeverity'             => $vulnerabilitySeverity,
            'quantitativeVulnerabilitySeverity' => $quantitativeVulnerabilitySeverity,
            'risk'                              => $risk,
            'likelihood'                        => $likelihood,
            'confidentialityImpactOnSystem'     => $confidentialityImpactOnSystem,
            'integrityImpactOnSystem'           => $integrityImpactOnSystem,
            'availabilityImpactOnSystem'        => $availabilityImpactOnSystem,
            'impactScore'                       => $impactScore]
        ];

        try{
            $bulk = new MongoDB\Driver\BulkWrite;
            $bulk->update(['_id' => $id], $dbEntry);
            $this->manager->executeBulkWrite('FRIC_Database.Finding', $bulk);
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
        }
    }
}
?>