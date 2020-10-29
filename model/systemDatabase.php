<?php
include ("systeme.php");
require_once ('database.php');

class SystemDatabase extends Database{
    public function getAllArchivedSystems(){
        try{
            $query  = new MongoDB\Driver\Query([]);
            $cursor = $this->manager->executeQuery('FRIC_Database.System', $query);  
            $table  = array();
            foreach($cursor as $document){
                if($document->archiveStatus == true){
                    $row = array();
                    array_push($row, $document->_id, $document->systemName, $document->numberOfTasks, $document->numberOfFindings, $document->progress);
                    array_push($table, $row);
                }
            } 
            return $table;
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
            return array(array());
        }
    }

    public function getAllSystemForAssociations(){
        try{
            $query  = new MongoDB\Driver\Query([]);
            $cursor = $this->manager->executeQuery('FRIC_Database.System', $query);  
            $table  = array();
            foreach($cursor as $document){
                if($document->archiveStatus != true){
                    array_push($table, $document->systemName);
                }
            } 
            return $table;
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
            return array(array());
        }
    }

    public function getAllSystems(){
        try{
            $query  = new MongoDB\Driver\Query([]);
            $cursor = $this->manager->executeQuery('FRIC_Database.System', $query);  
            $table  = array();
            foreach($cursor as $document){
                if($document->archiveStatus != true){
                    $row = array();
                    array_push($row, $document->_id, $document->systemName, $document->numberOfTasks, $document->numberOfFindings, $document->progress);
                    array_push($table, $row);
                }
            } 
            return $table;
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
            return array(array());
        }
    }

    public function getSystemAttributes($id){
        try{
            $query  = new MongoDB\Driver\Query(['_id' => $id], []);
            $cursor = $this->manager->executeQuery('FRIC_Database.System', $query);
            $object = array(); 
            foreach($cursor as $document){
                array_push($object, $document->_id, $document->systemName, $document->systemDescription, $document->systemLocation, $document->systemRouter, $document->systemSwitch, 
                           $document->systemRoom, $document->testPlan, $document->confidentiality, $document->integrity, $document->availability, $document->archiveStatus, $document->numberOfTasks,
                           $document->numberOfFindings, $document->progress);
            }
            return $object;
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
            return array();
        }
    }

    public function editSystemDocument($id, $systemName, $systemDescription, $systemLocation, $systemRouter, $systemSwitch, $systemRoom, $testPlan, $confidentiality, $integrity, $availability, $archiveStatus, $numberOfTasks, $numberOfFindings, $progress){
        $dbEntry = ['$set'=>
            ['systemName'       => $systemName,
            'systemDescription' => $systemDescription,    
            'systemLocation'    => $systemLocation,    
            'systemRouter'      => $systemRouter,    
            'systemSwitch'      => $systemSwitch,
            'systemRoom'        => $systemRoom,
            'testPlan'          => $testPlan,
            'confidentiality'   => $confidentiality,
            'integrity'         => $integrity,
            'availability'      => $availability,
            'archiveStatus'     => $archiveStatus,
            'numberOfTasks'     => $numberOfTasks,
            'numberOfFindings'  => $numberOfFindings,
            'progress'          => $progress]
        ];

        try{
            $bulk = new MongoDB\Driver\BulkWrite;
            $bulk->update(['_id' => $id], $dbEntry);
            $this->manager->executeBulkWrite('FRIC_Database.System', $bulk);
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
        }
    }
}
?>