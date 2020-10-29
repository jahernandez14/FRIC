<?php
include ("analyst.php");
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
            $query       = new MongoDB\Driver\Query([]);
            $cursor      = $this->manager->executeQuery('FRIC_Database.Task', $query);
            $totalTask   = array();
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
                    array_push($row, $document->_id, $document->systemName, $document->numberOfTasks, $document->numberOfFindings, round((100/ (3 * $value)) * $totalCal[$key]) . "%");
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
                return 0;
            case "not started":
            case "assigned":
            case "transferred":
                return 1;
            case "in progress":
                return 2;
            case "complete":
                return 3;
            default:
                return 0;        
        }
    }
}
?>