<?php

class Trainer {
    public $trainerid;
    public $username;
    public $password;


    public function _construct($trainerid=null,$username=null,$password=null){

        $this->trainerid=$trainerid;
        $this->username=$username;
        $this->password=$password;

    }

    public static function logInTrainer($t, mysqli $conn){
        $query="SELECT * FROM trainer where username='$t->username' and password='$t->password'";
        return $conn->query($query);
    }








}






?>