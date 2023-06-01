<?php

class Trainer
{
    public $trainerid;
    public $username;
    public $password;


    public function _construct($trainerid = null, $username = null, $password = null)
    {

        $this->trainerid = $trainerid;
        $this->username = $username;
        $this->password = $password;
    }

    public static function logInTrainer(mysqli $conn, $uname, $upass)
    {
        $query = "SELECT * FROM trainer where username='$uname' and password='$upass'";
        return $conn->query($query);
    }
}
