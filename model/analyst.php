<?php
class Analyst {
    private $firstName;
    private $lastName;
    private $initial;
    private $ipAddress;
    private $title;
    private $role;
    private $progress;

    public function __construct($db, $firstName, $lastName, $initial, $ipAddress, $title, $role){
        $addObject       = $db->checkDatabaseForSameID($initial,'FRIC_Database.Analyst');
        $id              = $initial;
        $this->firstName = $firstName;
        $this->lastName  = $lastName;
        $this->initial   = $initial;
        $this->ipAddress = $ipAddress;
        $this->title     = $title;
        $this->role      = $role;
        $this->progress  = 0;


        $dbEntry = [
            '_id'       => $id,   
            'firstName' => $firstName,
            'lastName'  => $lastName,
            'ip'        => $ipAddress,
            'title'     => $title,
            'role'      => $role,
            'progress'  => $progress
        ];

        if($addObject){
            $db->insertDocument($dbEntry, 'FRIC_Database.Analyst');
        }
    }
}
?>