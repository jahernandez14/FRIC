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

        $db->insertDocument($dbEntry, 'FRIC_Database.System');
    }
}
?>