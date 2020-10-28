<?php
class Analyst {
    private $firstName;
    private $lastName;
    private $initial;
    private $ipAddress;
    private $title;
    private $role;

    public function __construct($db, $firstName, $lastName, $initial, $ipAddress, $title, $role){
        $this->firstName = $firstName;
        $this->lastName  = $lastName;
        $this->initial   = $initial;
        $this->ipAddress = $ipAddress;
        $this->title     = $title;
        $this->role      = $role;

        $dbEntry = [
            '_id'       => new MongoDB\BSON\ObjectId(),   
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