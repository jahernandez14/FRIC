<?php

class Configuration{
    public function __construct($db, $id, $array){
        $dbEntry = [
            '_id'            => $id,
            'configuration'  => $array
        ];
        
        if($db->checkDatabaseForSameName('_id', $id, 'FRIC_Database.Configuration')){
            echo <<< SCRIPT
                <script>
                    alert("Event with the same title already exist in the database. The event was not created.");
                </script>
            SCRIPT;
        }else{
            $db->insertDocument($dbEntry, 'FRIC_Database.Configuration');
        }
    }
}
?>