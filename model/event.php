<?php

class Event {
    public function __construct($db, $eventName, $eventDescription, $eventType, $eventVersion, $assessmentDate, $organizationName, $securityClassifcation, $eventClassification, $declassificationDate, $customerName, $archiveStatus, $eventTeam, $derivedFrom, $numberOfFindings, $numberOfSystems, $progress){
        $dbEntry = [
            '_id'                   => (string) new MongoDB\BSON\ObjectId(),
            'eventName'             => $eventName,
            'eventDescription'      => $eventDescription,
            'eventType'             => $eventType,
            'eventVersion'          => $eventVersion,
            'assessmentDate'        => $assessmentDate,
            'organizationName'      => $organizationName,
            'securityClassifcation' => $securityClassifcation,
            'eventClassification'   => $eventClassification,
            'declassificationDate'  => $declassificationDate,
            'customerName'          => $customerName,
            'archiveStatus'         => false,
            'eventTeam'             => $eventTeam,
            'derivedFrom'           => $derivedFrom,
            'numberOfFindings'      => $numberOfFindings,    
            'numberOfSystems'       => $numberOfSystems,    
            'progress'              => $progress
        ];

        if($db->checkDatabaseForSameName('eventName', $eventName, 'FRIC_Database.Event')){
            echo <<< SCRIPT
                <script>
                    alert("Event with the same title already exist in the database. The event was not created.");
                </script>
            SCRIPT;
        }else{
            $db->insertDocument($dbEntry, 'FRIC_Database.Event');
        }
    }
}
?>