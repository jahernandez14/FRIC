<?php
class Analyst {
    private $firstName;
    private $lastName;
    private $initial;
    private $ipAddress;
    private $title;
    private $role;

    public function __construct($db, $firstName, $lastName, $initial, $ipAddress, $title, $role){
        $id              = $db->checkDatabaseForSameID($initial . $ipAddress,'FRIC_Database.Analyst');
        $this->firstName = $firstName;
        $this->lastName  = $lastName;
        $this->initial   = $initial;
        $this->ipAddress = $ipAddress;
        $this->title     = $title;
        $this->role      = $role;

        $dbEntry = [
            '_id'       => $id,   
            'firstName' => $firstName,
            'lastName'  => $lastName,
            'title'     => $title,
            'role'      => $role
        ];
        $db->insertDocument($dbEntry, 'FRIC_Database.Analyst');
    }
}
?>