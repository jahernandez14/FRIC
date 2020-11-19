<?php
class Systeme {
    public function __construct($db, $systemName, $systemDescription, $systemLocation, $systemRouter, $systemSwitch, $systemRoom, $testPlan, $confidentiality, $integrity, $availability, $archiveStatus, $numberOfTasks, $numberOfFindings, $progress){
        $dbEntry = [
            '_id'               => (string) new MongoDB\BSON\ObjectId(),
            'systemName'        => $systemName,
            'systemDescription' => $systemDescription,      
            'systemLocation'    => $systemLocation,    
            'systemRouter'      => $systemRouter,     
            'systemSwitch'      => $systemSwitch,
            'systemRoom'        => $systemRoom,
            'testPlan'          => $testPlan,
            'confidentiality'   => $confidentiality,
            'integrity'         => $integrity,
            'availability'      => $availability,
            'archiveStatus'     => false,
            'numberOfTasks'     => $numberOfTasks,
            'numberOfFindings'  => $numberOfFindings,
            'progress'          => $progress
        ];

        if($db->checkDatabaseForSameName('systemName', $systemName, 'FRIC_Database.System')){
            echo <<< SCRIPT
                <script>
                    alert("System with the same title already exist in the database. The system was not created.");
                </script>
            SCRIPT;
        }else{
            $db->insertDocument($dbEntry, 'FRIC_Database.System');
        }
    }
}
?>