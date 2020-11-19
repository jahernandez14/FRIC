<?php
require_once ("analyst.php");
require_once ("findingDatabase.php");
require_once ("subtaskDatabase.php");
require_once ("systemDatabase.php");
require_once ("taskDatabase.php");
require_once ("eventDatabase.php");
require_once ("transactionLogDatabase.php");
require_once ('database.php');

class AnalystDatabase extends Database{
    public function getAllAnalystNames(){
        try{
            $query  = new MongoDB\Driver\Query([]);
            $cursor = $this->manager->executeQuery('FRIC_Database.Analyst', $query);  
            $table  = array();
            foreach($cursor as $document){
                $row = array();
                array_push($row, $document->_id, $document->initial, $document->firstName, $document->lastName, $document->ip);
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
                array_push($table, $document->firstName." ".$document->lastName);
            } 
            return $table;
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
            return array(array());
        }
    }

    public function getAllNonLeadAnalyst(){
        try{
            $query  = new MongoDB\Driver\Query([]);
            $cursor = $this->manager->executeQuery('FRIC_Database.Analyst', $query);  
            $table  = array();
            foreach($cursor as $document){
                if(strtolower($document->role) != "lead"){
                    array_push($table, $document->firstName." ".$document->lastName);
                }
            } 
            return $table;
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
            return array(array());
        }
    }

    public function getAllLeadAnalyst(){
        try{
            $query  = new MongoDB\Driver\Query([]);
            $cursor = $this->manager->executeQuery('FRIC_Database.Analyst', $query);  
            $table  = array();
            foreach($cursor as $document){
                if(strtolower($document->role) == "lead"){
                    array_push($table, $document->firstName." ".$document->lastName);
                }
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
                $firstLastName .= $document->firstName." ".$document->lastName;
            }
            return $firstLastName;
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
            return "";
        }
    }

    public function editAnalyst($id, $firstName, $lastName, $initial, $ipAddress, $title, $role){
        $dbEntry = ['$set'=>
            ['firstName' => $firstName,
            'lastName'   => $lastName,
            'initial'    => $initial,
            'ip'         => $ipAddress, 
            'title'      => $title,
            'role'       => $role]
        ];

        try{
            $bulk = new MongoDB\Driver\BulkWrite;
            $bulk->update(['_id' => $id], $dbEntry);
            $this->manager->executeBulkWrite('FRIC_Database.Analyst', $bulk);
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
        }
    }

    public function deleteAnalyst($id){
        try{
            $bulk = new MongoDB\Driver\BulkWrite;
            $bulk->delete(['_id' => $id]);
            $this->manager->executeBulkWrite('FRIC_Database.Analyst', $bulk);
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
        }
    }

    public function syncWithAnalyst($ipAddress){
        try{
            $otherAnalystManager  = new MongoDB\Driver\Manager('mongodb://' . $ipAddress . ':27017');

            $myDb     = new FindingDatabase(); 
            $query    = new MongoDB\Driver\Query([]);
            $cursor   = $otherAnalystManager->executeQuery('FRIC_Database.Finding', $query);
            $myCursor = $this->manager->executeQuery('FRIC_Database.Finding', $query);
            foreach($cursor as $document){
                /*$checkIfSameName = false;
                foreach($myCursor as $myDocument){
                    if($myDocument->findingTitle == $document->findingTitle){
                        $checkIfSameName = true;
                    }
                }
                if($checkIfSameName == false){*/
                new Finding($myDb, $document->findingTitle, $document->hostName, $document->ipPort, $document->associatedTask, $document->associatedSystem, $document->associatedSubtask, $document->findingDescription, $document->findingLongDescription, $document->findingStatus, $document->findingType, 
                    $document->findingClassification, $document->associationToFinding, $document->evidence, $document->archiveStatus, $document->collaboratorAssignment, $document->confidentiality, $document->integrity, $document->availability, $document->analystAssignment, $document->posture, $document->briefDescription, 
                    $document->longDescription, $document->relevance, $document->effectivenessRating, $document->impactDescription, $document->impactLevel, $document->severityCatCode, $document->severityCatScore, $document->vulnerabilitySeverity, $document->quantitativeVulnerabilitySeverity, $document->risk, $document->likelihood, 
                    $document->confidentialityImpactOnSystem, $document->integrityImpactOnSystem, $document->availabilityImpactOnSystem, $document->impactScore);
                //}
            }
            
            $myDb     = new TaskDatabase(); 
            $query    = new MongoDB\Driver\Query([]);
            $cursor   = $otherAnalystManager->executeQuery('FRIC_Database.Task', $query);
            $myCursor = $this->manager->executeQuery('FRIC_Database.Task', $query);
            foreach($cursor as $document){   
                /*$checkIfSameName = false;
                foreach($myCursor as $myDocument){
                    if($myDocument->taskTitle == $document->taskTitle){
                        $checkIfSameName = true;
                    }
                }
                if($checkIfSameName == false){*/
                new Task($myDb, $document->taskTitle, $document->associatedSystem, $document->taskDescription, $document->taskPriority, $document->taskProgress, $document->taskDueDate, $document->attachment, $document->associationToTask, $document->analystAssignment, $document->collaboratorAssignment, $document->archiveStatus, $document->numberOfSubtasks, $document->numberOfFindings);
                //}
            }
            
            $myDb     = new SubtaskDatabase(); 
            $query    = new MongoDB\Driver\Query([]);
            $cursor   = $otherAnalystManager->executeQuery('FRIC_Database.Subtask', $query);
            $myCursor = $this->manager->executeQuery('FRIC_Database.Subtask', $query);
            foreach($cursor as $document){
                /*$checkIfSameName = false;
                foreach($myCursor as $myDocument){
                    if($myDocument->taskTitle == $document->taskTitle){
                        $checkIfSameName = true;
                    }
                }
                if($checkIfSameName == false){*/
                new Subtask($myDb, $document->taskTitle, $document->associatedTask, $document->taskDescription, $document->taskProgress, $document->taskDueDate, $document->attachment, $document->associationToSubtask, $document->analystAssignment, $document->collaboratorAssignment, $document->archiveStatus, $document->numberOfFindings);
                //}
            }
            
            $myDb     = new SystemDatabase(); 
            $query    = new MongoDB\Driver\Query([]);
            $cursor   = $otherAnalystManager->executeQuery('FRIC_Database.System', $query);
            $myCursor = $this->manager->executeQuery('FRIC_Database.Subtask', $query);
            foreach($cursor as $document){
                /*$checkIfSameName = false;
                foreach($myCursor as $myDocument){
                    if($myDocument->systemName == $document->systemName){
                        $checkIfSameName = true;
                    }
                }
                if($checkIfSameName == false){*/
                new Systeme($myDb, $document->systemName, $document->systemDescription, $document->systemLocation, $document->systemRouter, $document->systemSwitch, $document->systemRoom, $document->testPlan, $document->confidentiality, $document->integrity, $document->availability, $document->archiveStatus, $document->numberOfTasks, $document->numberOfFindings, $document->progress);
                //}
            }
            
            $myDb     = new EventDatabase(); 
            $query    = new MongoDB\Driver\Query([]);
            $cursor   = $otherAnalystManager->executeQuery('FRIC_Database.Event', $query);
            //$myCursor = $this->manager->executeQuery('FRIC_Database.Event', $query);
            foreach($cursor as $document){
                /*$checkIfSameName = false;
                foreach($myCursor as $myDocument){
                    if($myDocument->eventName == $document->eventName){
                        $checkIfSameName = true;
                    }
                }*/
                //if($checkIfSameName == false){
                new Event($myDb, $document->eventName, $document->eventDescription, $document->eventType, $document->eventVersion, $document->assessmentDate, $document->organizationName, $document->securityClassifcation, $document->eventClassification, $document->declassificationDate, $document->customerName, $document->archiveStatus, $document->eventTeam, $document->derivedFrom, $document->numberOfFindings, $document->numberOfSystems, $document->progress);
                //}
            }

            $myDb     = new TransactionLogDatabase(); 
            $query    = new MongoDB\Driver\Query([]);
            $cursor   = $otherAnalystManager->executeQuery('FRIC_Database.TransactionLog', $query);
            //$myCursor = $this->manager->executeQuery('FRIC_Database.TransactionLog', $query);
            foreach($cursor as $document){
                new TransactionLog($myDb, $document->dateTime, $document->actionPerformed, $document->analyst);
            }

            $myDb     = new AnalystDatabase(); 
            $query    = new MongoDB\Driver\Query([]);
            $cursor   = $otherAnalystManager->executeQuery('FRIC_Database.Analyst', $query);
            //$myCursor = $this->manager->executeQuery('FRIC_Database.Analyst', $query);
            foreach($cursor as $document){
                /*$checkIfSameName = false;
                foreach($myCursor as $myDocument){
                    if($myDocument->firstName == $document->firstName and $myDocument->lastName == $document->lastName){
                        $checkIfSameName = true;
                    }
                }
                if($checkIfSameName == false){*/
                new Analyst($myDb, $document->firstName, $document->lastName, $document->initial, $document->ipAddress, $document->title, $document->role);
                //}
            }

            echo <<< SCRIPT
                <script>
                    alert("Sync Complete");
                </script>
            SCRIPT;                            

        } catch (Exception $failedLoser){
            echo <<< SCRIPT
                <script>
                    alert("Sync Failed");
                </script>
            SCRIPT;
        }
    }

    public function getAllProgressForTask($firstName, $lastName){
        try{
            $taskIDArray = $this->searchForAssignedInCollection('FRIC_Database.Task', $firstName, $lastName);
            $table = array();

            foreach($taskIDArray as $id){
                $query  = new MongoDB\Driver\Query(['_id' => $id], []);
                $cursor = $this->manager->executeQuery('FRIC_Database.Task', $query);
                foreach($cursor as $document){
                    $row = array();
                    array_push($row, $document->_id, $document->taskTitle, $document->associatedSystem, $firstName." ".$lastName, $document->taskPriority, 
                    $document->taskProgress, $document->numberOfSubtasks, $document->numberOfFindings, $document->taskDueDate);
                    array_push($table, $row);
                }
            }

            return $table;
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
            return "";
        }
    }

    public function getAllProgressForSubTask($firstName, $lastName){
        try{
            $taskIDArray = $this->searchForAssignedInCollection('FRIC_Database.Subtask', $firstName, $lastName);
            $table = array();

            foreach($taskIDArray as $id){
                $query  = new MongoDB\Driver\Query(['_id' => $id], []);
                $cursor = $this->manager->executeQuery('FRIC_Database.Subtask', $query);
                foreach($cursor as $document){
                    $row = array();
                    array_push($row, $document->_id, $document->taskTitle, $document->associatedTask, $firstName." ".$lastName, 
                    $document->taskProgress, $document->numberOfFindings, $document->taskDueDate);
                    array_push($table, $row);
                }
            }

            return $table;
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
            return "";
        }
    }

    public function getAllProgressForFinding($firstName, $lastName){
        try{
            $taskIDArray = $this->searchForAssignedInCollection('FRIC_Database.Finding', $firstName, $lastName);
            $table = array();

            foreach($taskIDArray as $id){
                $query  = new MongoDB\Driver\Query(['_id' => $id], []);
                $cursor = $this->manager->executeQuery('FRIC_Database.Finding', $query);
                foreach($cursor as $document){
                    $row = array();
                    array_push($row, $document->_id, $document->_id, $document->findingTitle, $document->associatedSystem, $document->associatedTask, $document->associatedSubtask, $firstName." ".$lastName, $document->findingStatus, $document->findingClassification, $document->findingType, $document->risk);
                    array_push($table, $row);
                }
            }

            return $table;
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
            return "";
        }
    }

    public function getAllProgressForSystem($analystFirstName, $analystLastName){
        try{
            $query    = new MongoDB\Driver\Query([]);
            $cursor   = $this->manager->executeQuery('FRIC_Database.Task', $query);
            $totalTask= array();
            $totalCal = array();
            foreach($cursor as $document){
                foreach($document->analystAssignment as $assignedAnalyst){
                    if($assignedAnalyst == $analystFirstName." ".$analystLastName){
                        if(array_key_exists($document->associatedSystem, $totalTask) == true){
                            $totalCal[$document->associatedSystem] += $this->convertProgress($document->taskProgress);
                            $totalTask[$document->associatedSystem] += 1;
                        } else{
                            $totalCal[$document->associatedSystem] = $this->convertProgress($document->taskProgress);
                            $totalTask[$document->associatedSystem] = 1;
                        }
                    } 
                }
            }
            
            $table = array();

            foreach($totalTask as $key => $value){
                $query  = new MongoDB\Driver\Query(['systemName' => $key], []);
                $cursor = $this->manager->executeQuery('FRIC_Database.System', $query);
                foreach($cursor as $document){
                    $row = array();
                    array_push($row, $document->_id, $document->systemName, $document->numberOfTasks, $document->numberOfFindings, round((100/ (10 * $value)) * $totalCal[$key]) . "%");
                    array_push($table, $row);
                }
            }
            // print_r($table);
            return $table;
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
            return "";
        }
    }

    private function searchForAssignedInCollection($collection, $analystFirstName, $analystLastName){
        try{
            $query  = new MongoDB\Driver\Query([]);
            $cursor = $this->manager->executeQuery($collection, $query);
            $assignedTo = array();
            foreach($cursor as $document){
                foreach($document->analystAssignment as $assignedAnalyst){
                    if($assignedAnalyst == $analystFirstName." ".$analystLastName){
                        array_push($assignedTo, $document->_id);
                    } 
                }
            }
            return $assignedTo;
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
            return "";
        }
    }

    private function convertProgress($progress){
        $progress = strtolower($progress);
        switch($progress){
            case "not applicable":
            case "not started":
            case "assigned":
            case "transferred":
                return 0;
            case "in progress":
                return 5;
            case "complete":
                return 10;
            default:
                return 0;        
        }
    }
}
?>