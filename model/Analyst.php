<?php
class Analyst {
    private $firstName;
    private $lastName;
    private $initial;
    private $title;
    private $role;

    public function __construct($firstName, $lastName, $initial, $title, $role){
        $this->firstName = $firstName;
        $this->lastName  = $lastName;
        $this->initial   = $initial;
        $this->title     = $title;
        $this->role      = $role;
    }

    public function setAllAttributes($firstName, $lastName, $initial, $title, $role){
        $this->firstName = $firstName;
        $this->lastName  = $lastName;
        $this->initial   = $initial;
        $this->title     = $title;
        $this->role      = $role;
    }

    /*  Getters  */ 
    public function getFirstName(){ return $this->firstName;}

    public function getLastName(){ return $this->lastName;}

    public function getInitial(){ return $this->initial;}

    public function getTitle(){ return $this->title;}

    public function getRole(){ return $this->role;}
}
?>