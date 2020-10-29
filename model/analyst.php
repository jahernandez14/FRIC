<?php
class Analyst {
    public function __construct($db, $firstName, $lastName, $initial, $ipAddress, $title, $role){
        $dbEntry = [
            '_id'       => (string) new MongoDB\BSON\ObjectId(),   
            'firstName' => $firstName,
            'lastName'  => $lastName,
            'initial'   => $initial,
            'ip'        => $ipAddress,
            'title'     => $title,
            'role'      => $role
        ];

        $db->insertDocument($dbEntry, 'FRIC_Database.Analyst');
    }
}
?>