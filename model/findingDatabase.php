<?php
include ("finding.php");
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

    public function getFindingAttributes($id){
        try{
            $query  = new MongoDB\Driver\Query(['_id' => $id], []);
            $cursor = $this->manager->executeQuery('FRIC_Database.Finding', $query);
            $object = array(); 
            foreach($cursor as $document){
                array_push($object, $document->_id, $document->findingTitle, $document->hostName, $document->ipPort, $document->findingDescription, $document->findingLongDescription, $document->findingStatus, $document->findingType, $document->associatedSystem, $document->associatedTask, $document->associatedSubtask, $document->findingClassification, $document->associationToFinding, $document->evidence, $document->archiveStatus, $document->collaboratorAssignment,
                $document->confidentiality, $document->integrity, $document->availability, $document->analystAssignment, $document->posture, $document->briefDescription, $document->longDescription, $document->relevance, $document->effectivenessRating, $document->impactDescription, $document->impactLevel, $document->severityCatScore, $document->vulnerabilitySeverity, $document->quantitativeVulnerabilitySeverity,
                $document->risk, $document->likelihood, $document->confidentialityImpactOnSystem, $document->integrityImpactOnSystem, $document->availabilityImpactOnSystem, $document->impactScore);
            }
            return $object;
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
            return array();
        }
    }

    public function editFindingDocument($id, $findingTitle, $hostName, $ipPort, $associatedTask, $associatedSystem, $associatedSubtask, $findingDescription, $findingLongDescription, $findingStatus, $findingType, $findingClassification, $associationToFinding, $evidence, $archiveStatus, $collaboratorAssignment,
                                        $confidentiality, $integrity, $availability, $analystAssignment, $posture, $briefDescription, $longDescription, $relevance, $effectivenessRating, $impactDescription, $impactLevel, $severityCatScore, $vulnerabilitySeverity, $quantitativeVulnerabilitySeverity,
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