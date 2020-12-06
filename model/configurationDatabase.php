<?php
require_once ('configuration.php');
require_once ('database.php');

class ConfigurationDatabase extends Database{
    public function getConfig($key){
        try{
            $query  = new MongoDB\Driver\Query(['_id' => $key], []);
            $cursor = $this->manager->executeQuery('FRIC_Database.Configuration', $query);
            foreach($cursor as $document){
                return $document->configuration;
            }
            return array();
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
            return array();
        }
    }

    public function editConfig($id, $array){
        $dbEntry = ['$set'=>
            ['configuration' => $array]
        ];

        try{
            $bulk = new MongoDB\Driver\BulkWrite;
            $bulk->update(['_id' => $id], $dbEntry);
            $this->manager->executeBulkWrite('FRIC_Database.Configuration', $bulk);
        } catch(MongoDB\Driver\Exception\Exception $failedLoser) {
            echo "Error: $failedLoser";
        }
    }
}
?>
