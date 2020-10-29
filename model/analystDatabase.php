<?php
include ("analyst.php");
require_once('database.php');

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
                array_push($table, $document->initial.$document->ip);
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
}
?>