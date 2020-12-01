<?php 
require_once ("event.php");
require_once ("database.php");
require_once ('findingDatabase.php');
require_once ('systemDatabase.php');

class EventDatabase extends Database{
    public function getAllEventNames(){
        try{
            $this->updateBefore();
            $query  = new MongoDB\Driver\Query([]);
            $cursor = $this->manager->executeQuery('FRIC_Database.Event', $query);  
            $table  = array();
            foreach($cursor as $document){
                $row = array();
                array_push($row, $document->_id);
                array_push($table, $row);
            } 
            return $table;
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
            return array(array());
        }
    }

    /*  Returns a 2d array of all attributes required for a Event table */
    public function getAllEvents(){
        try{
            $this->updateBefore();
            $query  = new MongoDB\Driver\Query([]);
            $cursor = $this->manager->executeQuery('FRIC_Database.Event', $query);  
            $table  = array();
            foreach($cursor as $document){
                if($document->archiveStatus != true){
                    $row = array();
                    array_push($row, $document->_id, $document->eventName, $document->numberOfSystems, $document->numberOfFindings, $document->progress);
                    array_push($table, $row);
                }
            } 
            return $table;
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
            return array(array());
        }
    }

    /*  Returns a 2d array of all attributes required for a Event table */
    public function getEventForFinalReport(){
        try{
            $this->updateBefore();
            $query  = new MongoDB\Driver\Query([]);
            $cursor = $this->manager->executeQuery('FRIC_Database.Event', $query);  
            $table  = array();
            foreach($cursor as $document){
                if($document->archiveStatus != true){
                    array_push($table, $document->eventType, $document->declassificationDate, $document->securityClassifcation);
                    return $table;
                }
            } 
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
            return array(array());
        }
    }

    public function updateBefore(){
        try{
            $query  = new MongoDB\Driver\Query([]);
            $cursor = $this->manager->executeQuery('FRIC_Database.Event', $query);  
            $table  = array();
            foreach($cursor as $document){
                if($document->archiveStatus != true){
                    $this->updateCounts($document->eventName);
                }
            } 
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
            return array(array());
        }
    }

    public function updateCounts($eventName){
        try{
            $bulk      = new MongoDB\Driver\BulkWrite;
            $findingDB = new FindingDatabase();
            $systemDB  = new SystemDatabase();
            $bulk->update(['eventName' => $eventName], ['$set'=> ['numberOfFindings' => $findingDB->getNumOfFindingsAssociatedToAnEvent(), 'numberOfSystems' => $systemDB->getNumOfSystemsAssociatedToAnEvent(), 'progress' => $systemDB->getAllSystemProgress()]]);
            $this->manager->executeBulkWrite('FRIC_Database.Event', $bulk);
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
        }
    }

    /* Returns an array of all the required attributes of a system for detailed view.*/ 
    public function getEventAttributes($id){
        try{
            $this->updateBefore();
            $query  = new MongoDB\Driver\Query(['_id' => $id], []);
            $cursor = $this->manager->executeQuery('FRIC_Database.Event', $query);
            $object = array(); 
            foreach($cursor as $document){
                array_push($object, $document->_id, $document->eventName, $document->eventDescription, $document->eventType, $document->eventVersion, $document->assessmentDate, 
                           $document->organizationName, $document->securityClassifcation, $document->eventClassification, $document->declassificationDate, $document->customerName,
                           $document->archiveStatus, $document->eventTeam, $document->derivedFrom, $document->numberOfSystems, $document->numberOfFindings, $document->progress);
            }
            return $object;
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
            return array();
        }
    }

    public function syncAllEvents($otherAnalystManager){
        $query    = new MongoDB\Driver\Query([]);
        $cursor   = $otherAnalystManager->executeQuery('FRIC_Database.Event', $query);
        $myCursor = $this->manager->executeQuery('FRIC_Database.Event', $query);
        foreach($cursor as $document){
            if($this->checkDatabaseForSameName('eventName', $document->eventName, 'FRIC_Database.Event')){
                $this->editEventDocument($document->_id, $document->eventName, $document->eventDescription, $document->eventType, $document->eventVersion, $document->assessmentDate, $document->organizationName, $document->securityClassifcation, $document->eventClassification, $document->declassificationDate, $document->customerName, $document->archiveStatus, $document->eventTeam, $document->derivedFrom, $document->numberOfFindings, $document->numberOfSystems, $document->progress);
            } else {
                new Event($this, $document->eventName, $document->eventDescription, $document->eventType, $document->eventVersion, $document->assessmentDate, $document->organizationName, $document->securityClassifcation, $document->eventClassification, $document->declassificationDate, $document->customerName, $document->archiveStatus, $document->eventTeam, $document->derivedFrom, $document->numberOfFindings, $document->numberOfSystems, $document->progress);
            }
        }
    }

    /* Edit system document attributes in db */
    public function editEventDocument($id, $eventName, $eventDescription, $eventType, $eventVersion, $assessmentDate, $organizationName, $securityClassifcation, $eventClassification, $declassificationDate, $customerName, $archiveStatus, $eventTeam, $derivedFrom, $numberOfFindings, $numberOfSystems, $progress){
        $dbEntry = ['$set'=>
            ['eventName'            => $eventName,
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
            'progress'              => $progress]
        ];

        try{
            $query  = new MongoDB\Driver\Query(['_id' => $id], []);
            $cursor = $this->manager->executeQuery('FRIC_Database.Event', $query);
            $originalName = "";
            foreach($cursor as $document){
                $originalName = $document->eventName;
            }

            if($originalName != $eventName and $this->checkDatabaseForSameName('eventName', $eventName, 'FRIC_Database.Event')){
                echo <<< SCRIPT
                    <script>
                        alert("Event with the same title already exist in the database. The event was not edited.");
                    </script>
                SCRIPT;
            }else{
                $changes = $this->checkForChanges('FRIC_Database.Event', $id, $dbEntry['$set']);
                $bulk = new MongoDB\Driver\BulkWrite;
                $bulk->update(['_id' => $id], $dbEntry);
                $this->manager->executeBulkWrite('FRIC_Database.Event', $bulk);
                return $changes;
            }
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
        }
    }
}
?>