<?php
include ("event.php");
include ("systeme.php");
include ("task.php");
include ("subtask.php");
include ("analyst.php");
include ("finding.php");

class Database{
    private $manager;

    public function __construct(){
        if(extension_loaded("mongodb")){
            try{
                $this->manager  = new MongoDB\Driver\Manager("mongodb://localhost:27017");
            } catch (MongoConnectionException $failedLoser){
                echo "Error: $failedLoser";
            }
        } else{
            echo "Error: Failed to load mongoDB extension.";
        }
    }
    
    /*  checkDatabaseForSameID: params<id, collection>
        Summary: Query the database, and gets the count of 
        the number of times an id appears. If greater than
        0 return false, otherwise return true. 
    */
    public function checkDatabaseForSameID($id, $collection){
        $query  = new MongoDB\Driver\Query(['_id' => $id], []);
        $cursor = $this->manager->executeQuery($collection, $query);
        if(count($cursor->toArray()) == 0){
            return true;
        }
        echo "Event ID already exist in database ";
        return false;
        //$id = $id . " - Copy";
        //return $this->checkDatabaseForSameID($id, $collection);
    }

    /*  insertDocument: params<dbEntry, collection>
        Summary: Generates a bulk write, and inserts the
        new db entry into the bulk write.  
    */
    public function insertDocument($dbEntry, $collection){
        try{
            $bulk = new MongoDB\Driver\BulkWrite;
            $bulk->insert($dbEntry);
            $this->manager->executeBulkWrite($collection, $bulk);
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
        }
    }

    public function getAllAnalystNames(){
        try{
            $query  = new MongoDB\Driver\Query([]);
            $cursor = $this->manager->executeQuery('FRIC_Database.Analyst', $query);  
            $table  = array();
            foreach($cursor as $document){
                $row = array();
                array_push($row, $document->_id);
                array_push($row, $document->firstName);
                array_push($row, $document->lastName);
                array_push($row, $document->ip);
                array_push($table, $row);
            } 
            return $table;
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
            return array(array());
        }
    }

    public function getAllAnalystForAssociation(){
        try{
            $query  = new MongoDB\Driver\Query([]);
            $cursor = $this->manager->executeQuery('FRIC_Database.Analyst', $query);  
            $table  = array();
            foreach($cursor as $document){
                array_push($table, $document->initial.$document->ipAddress);
            } 
            return $table;
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
            return array(array());
        }
    }

    public function getAnalystName($id){
        try{
            $query  = new MongoDB\Driver\Query(['_id' => $id], []);
            $cursor = $this->manager->executeQuery('FRIC_Database.Analyst', $query);
            $firstLastName = "";
            foreach($cursor as $document){
                $firstLastName .= $document->firstName;
                $firstLastName .= " ";
                $firstLastName .= $document->lastName;
            }
            return $firstLastName;
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
            return "";
        }
    }

    public function getAllEventNames(){
        try{
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
            $query  = new MongoDB\Driver\Query([]);
            $cursor = $this->manager->executeQuery('FRIC_Database.Event', $query);  
            $table  = array();
            foreach($cursor as $document){
                if($document->archiveStatus != "Y"){
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

    /* Returns an array of all the required attributes of a system for detailed view.*/ 
    public function getEventAttributes($id){
        try{
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
            $bulk = new MongoDB\Driver\BulkWrite;
            $bulk->update(['_id' => $id], $dbEntry);
            $this->manager->executeBulkWrite('FRIC_Database.Event', $bulk);
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
        }
    }

    /*  Returns a 2d array of all attributes required for a System table */
    public function getAllSystems(){
        try{
            $query  = new MongoDB\Driver\Query([]);
            $cursor = $this->manager->executeQuery('FRIC_Database.System', $query);  
            $table  = array();
            foreach($cursor as $document){
                //if($document->archiveStatus != "Y"){
                $row = array();
                array_push($row, $document->_id, $document->systemName, $document->numberOfTasks, $document->numberOfFindings, $document->progress);
                array_push($table, $row);
                //}
            } 
            return $table;
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
            return array(array());
        }
    }

    /* Returns an array of all the required attributes of a system for detailed view.*/ 
    public function getSystemAttributes($id){
        try{
            $query  = new MongoDB\Driver\Query(['_id' => $id], []);
            $cursor = $this->manager->executeQuery('FRIC_Database.System', $query);
            $object = array(); 
            foreach($cursor as $document){
                array_push($object, $document->_id, $document->systemName, $document->systemDescription, $document->systemLocation, $document->systemRouter, $document->systemSwitch, 
                           $document->systemRoom, $document->testPlan, $document->confidentiality, $document->integrity, $document->availability);
            }
            return $object;
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
            return array();
        }
    }

    /* Edit system document attributes in db */
    public function editSystemDocument($id, $systemName, $systemDescription, $systemLocation, $systemRouter, $systemSwitch, $systemRoom, $testPlan, $confidentiality, $integrity, $availability, $numberOfTasks, $numberOfFindings, $progress){
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

    /*  Returns a 2d array of all attributes required for a Task table */
    public function getAllTasks(){
        try{
            $query  = new MongoDB\Driver\Query([]);
            $cursor = $this->manager->executeQuery('FRIC_Database.Task', $query);  
            $table  = array();
            foreach($cursor as $document){
                $row = array();
                if($document->archiveStatus != "Y"){
                    array_push($row, $document->_id, $document->taskTitle, $document->associatedSystem, $document->analystAssignment, $document->taskPriority, 
                               $document->taskProgress, $document->numberOfSubtasks, $document->numberOfFindings, $document->taskDueDate);
                    array_push($table, $row);
                }
            } 
            return $table;
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
            return array(array());
        }
    }

    public function getAllTaskForAssociation(){
        try{
            $query  = new MongoDB\Driver\Query([]);
            $cursor = $this->manager->executeQuery('FRIC_Database.Task', $query);  
            $table  = array();
            foreach($cursor as $document){
                if($document->archiveStatus != "Y"){
                    array_push($table, $document->taskTitle);
                }
            } 
            return $table;
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
            return array(array());
        }
    }

    /* Returns an array of all the required attributes of a system for detailed view.*/ 
    public function getTaskAttributes($id){
        try{
            $query  = new MongoDB\Driver\Query(['_id' => $id], []);
            $cursor = $this->manager->executeQuery('FRIC_Database.Task', $query);
            $object = array(); 
            foreach($cursor as $document){
                array_push($object, $document->_id, $document->taskTitle, $document->associatedSystem, $document->taskDescription, $document->taskPriority, $document->taskProgress, 
                           $document->attachment, $document->associationToTask, $document->analystAssignment, $document->collaboratorAssignment, $document->archiveStatus);
            }
            return $object;
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
            return array();
        }
    }

    /* Edit system document attributes in db */
    public function editTaskDocument($id, $taskTitle, $associatedSystem, $taskDescription, $taskPriority, $taskProgress, $taskDueDate, $attachment, $associationToTask, $analystAssignment, $collaboratorAssignment, $archiveStatus){
        $dbEntry = ['$set'=>
            ['taskTitle'             => $taskTitle,
            'associatedSystem'       => $associatedSystem,
            'taskDescription'        => $taskDescription,    
            'taskPriority'           => $taskPriority,    
            'taskProgress'           => $taskProgress,    
            'taskDueDate'            => $taskDueDate,
            'attachment'             => $attachment,
            'associationToTask'      => $associationToTask,
            'analystAssignment'      => $analystAssignment,
            'collaboratorAssignment' => $collaboratorAssignment,
            'archiveStatus'          => $archiveStatus]
        ];

        try{
            $bulk = new MongoDB\Driver\BulkWrite;
            $bulk->update(['_id' => $id], $dbEntry);
            $this->manager->executeBulkWrite('FRIC_Database.Task', $bulk);
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
        }
    }

    /*  Returns a 2d array of all attributes required for a Task table */
    public function getAllSubTasks(){
        try{
            $query  = new MongoDB\Driver\Query([]);
            $cursor = $this->manager->executeQuery('FRIC_Database.Subtask', $query);  
            $table  = array();
            foreach($cursor as $document){
                if($document->archiveStatus != true){
                    $row = array();
                    array_push($row, $document->_id, $document->taskTitle, $document->associatedTask, $document->analystAssignment, 
                               $document->taskProgress, $document->numberOfFindings, $document->taskDueDate);
                    array_push($table, $row);
                }
            } 
            return $table;
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
            return array(array());
        }
    }

    /* Returns an array of all the required attributes of a system for detailed view.*/ 
    public function getSubtaskAttributes($id){
        try{
            $query  = new MongoDB\Driver\Query(['_id' => $id], []);
            $cursor = $this->manager->executeQuery('FRIC_Database.Subtask', $query);
            $object = array(); 
            foreach($cursor as $document){
                array_push($object, $document->_id, $document->taskTitle, $document->associatedTask, $document->taskDescription, $document->taskProgress, 
                           $document->attachment, $document->associationToSubtask, $document->analystAssignment, $document->collaboratorAssignment, $document->archiveStatus);
            }
            return $object;
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
            return array();
        }
    }

    /* Edit system document attributes in db */
    public function editSubtaskDocument($id, $taskTitle, $associatedTask, $taskDescription, $taskProgress, $taskDueDate, $attachment, $associationToSubtask, $analystAssignment, $collaboratorAssignment, $archiveStatus){
        $dbEntry = ['$set'=>
            ['taskTitle'             => $taskTitle,
            'associatedTask'         => $associatedTask,
            'taskDescription'        => $taskDescription,    
            'taskProgress'           => $taskProgress,    
            'taskDueDate'            => $taskDueDate,
            'attachment'             => $attachment,
            'associationToSubtask'   => $associationToSubtask,
            'analystAssignment'      => $analystAssignment,
            'collaboratorAssignment' => $collaboratorAssignment,
            'archiveStatus'          => $archiveStatus]
        ];

        try{
            $bulk = new MongoDB\Driver\BulkWrite;
            $bulk->update(['_id' => $id], $dbEntry);
            $this->manager->executeBulkWrite('FRIC_Database.Subtask', $bulk);
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
        }
    }

    /* Returns a 2d array of all the changes in the transaction log */ 
    public function getAllTransactionLogs(){
        try{
            $query  = new MongoDB\Driver\Query([]);
            $cursor = $this->manager->executeQuery('FRIC_Database.TransactionLog', $query);  
            $table  = array();
            foreach($cursor as $document){
                $row = array();
                array_push($row, $document->_id, $document->actionPerformed, $document->analyst);
                array_push($table, $row);
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
                $row = array();
                array_push($row, $document->_id, $document->findingTitle, $document->associatedSystem, $document->associatedTask, $document->associatedSubtask, $document->analystAssignment, $document->findingStatus, $document->findingClassification, $document->findingType, $document->risk);
                array_push($table, $row);
            } 
            return $table;
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
            return array(array());
        }
    }

    /* Returns an array of all the required attributes of a system for detailed view.*/ 
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

    /* Edit system document attributes in db */
    public function editFindingDocument($id, $findingTitle, $hostName, $ipPort, $findingDescription, $findingLongDescription, $findingStatus, $findingType, $findingClassification, $associationToFinding, $evidence, $archiveStatus, $collaboratorAssignment,
                                        $confidentiality, $integrity, $availability, $analystAssignment, $posture, $briefDescription, $longDescription, $relevance, $effectivenessRating, $impactDescription, $impactLevel, $severityCatScore, $vulnerabilitySeverity, $quantitativeVulnerabilitySeverity,
                                        $risk, $likelihood, $confidentialityImpactOnSystem, $integrityImpactOnSystem, $availabilityImpactOnSystem, $impactScore){
        $dbEntry = ['$set'=>
            ['findingTitle'                      => $findingTitle,
            'hostName'                          => $hostName,
            'ipPort'                            => $ipPort,    
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

/*  Used for testing purposes   */
//$db = new Database();

//$a = new Event($db, "Event 2", "This a test event description", "Cooperative Vulnerability Penetration Assessment", "1.2", "9/30/2020", "Army", "Top Secret", "Unclassified", "1/18/2020", "Tim Honks", "Y", "JM", "wb192.2.3", 1, 2,'inProgress');
//$b = new Event($db, "Event 3", "This a test event description", "Verification of Fixes", "2.2", "1/12/2020", "Army", "Top Secret", "Confidential", "1/01/2020", "Axel Rose", "N", "JM", "jh192.2.2", 5, 10,'in progress');
//$c = new Event($db, "Event 6", "This a test event description", "Verification of Fixes", "3.2", "1/12/2020", "Army", "Top Secret", "Secret", "9/30/2020", "Kyle Gumby", "N", "JM", "db192.2.1", 6, 7,'in progress');
//$d = new Event($db, "Event 1", "This a test event description", "Cooperative Vulnerability Penetration Assessment", "2.2", "1/12/2020", "Army", "Top Secret", "Confidential", "1/01/2020", "Carl", "Y", "JM", "we192.2.3", 3, 3,'in progress');
//$e = new Event($db, "Event 7", "This a test event description", "Cooperative Vulnerability Penetration Assessment", "1.2", "1/12/2020", "Army", "Top Secret", "Confidential", "1/20/2020", "Lemon Guy", "Y", "JM", "am192.2.3", 3, 7,'in progress');
//$a = new Event($db, "Event 7", "This a test event description", "Cooperative Vulnerability Penetration Assessment", "1.2", "1/12/2020", "Army", "Top Secret", "Confidential", "1/20/2020", "Lemon Guy", "N", "JM", "am192.2.3", 3, 7,'in progress');
//print_r($db->getAllEvents());

//$f = new Finding($db,"Test Finding","test", "192.168.1.1", "finding Desc", "Finding Long Desc", "status", "type", "class", "Association to Someone", "evidence", False);

//$b = new Systeme($db, "system Name", "This a test event description", "El Paso", "1.20.20", "On", "Room 1", "Destroy the world", 1, 2, 3, 2, 3,'inProgress');
//$db->editSystemDocument("system Name", "system Gym", "This a test event description", "El Paso", "1.20.20", "On", "Room 1", "Destroy the world", 1, 2, 3, 2, 3,'inProgress');
//print_r($db->getAllSystems());
//print_r($db->getSystemAttributes("system Name"));

//$c = new Analyst($db, "Daniel", "O'Brien", "DO", "192.177.1.66", "Hipster Guy", "Lead Proggy");
//echo $db->getAnalystName("DO");
//print_r($db->getAllAnalystNames());
?>