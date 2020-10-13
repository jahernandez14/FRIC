<?php
class Analyst {
    private $firstName;
    private $lastName;
    private $initial;
    private $ipAddress;
    private $title;
    private $role;
    private $loggedIn;

    public function __construct($db, $firstName, $lastName, $initial, $ipAddress, $title, $role, $loggedIn){
        $addObject       = $db->checkDatabaseForSameID($initial . "," . $ipAddress,'FRIC_Database.Analyst');
        $id              = $initial . "," . $ipAddress;
        $this->firstName = $firstName;
        $this->lastName  = $lastName;
        $this->initial   = $initial;
        $this->ipAddress = $ipAddress;
        $this->title     = $title;
        $this->role      = $role;
        $this->loggedIn  = $loggedIn;

        $dbEntry = [
            '_id'       => $id,   
            'firstName' => $firstName,
            'lastName'  => $lastName,
            'title'     => $title,
            'role'      => $role,
            'loggedIn'  => $loggedIn
        ];

        if($addObject){
            $db->insertDocument($dbEntry, 'FRIC_Database.Analyst');
        }
    }
}
?>