<?php
require_once("configurationDatabase.php");
class Configuration{
    public function __construct($db, $id, $array){
        $dbEntry = [
            '_id'            => $id,
            'configuration'  => $array
        ];
        
        if($db->checkDatabaseForSameName('_id', $id, 'FRIC_Database.Configuration')){
            $db->editConfig($id,$array);
        }else{
            $db->insertDocument($dbEntry, 'FRIC_Database.Configuration');
        }
    }
}
?>