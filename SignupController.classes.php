<?php
class Signupcontr extends Signup
{



    private $uid;
    private $password;
    private $passwordRepeat;
    private $email;
    // private $usertype;


    public function __construct($email, $password, $passwordRepeat)
    {


        $this->password = $password;
        $this->passwordRepeat = $passwordRepeat;
        $this->email = $email;
        // $this->usertype = $usertype;
    }

    public function signupUser()
    {
        if ($this->emptyInput() == false) {
            echo "<script>alert('Input cannot be empty.');</script>";
            exit();
        }
        if ($this->invalidEmail() == false) {
            echo "<script>alert('Invalid email.'); ;</script>";
            exit();
        }
        if ($this->pwdMatch() == false) {
            echo "<script>alert('Passwords do not match.');</script>";
            exit();
        }
        if ($this->uidTakenCheck() == false) {
            echo "<script>alert('Username already taken. Please choose a different username.'); </script>";
            exit();
        }
        // $this->setUser($this->email, $this->uid, $this->pwd,  $this->usertype);
        $this->setUser($this->email, $this->password);
    }


    private function emptyInput()
    {

        if (empty($this->email) | empty($this->password) || empty($this->passwordRepeat)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function invalidEmail()
    {

        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function pwdMatch()
    {


        if ($this->password == $this->passwordRepeat) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }




    private function uidTakenCheck()
    {


        if (!$this->checkUser( $this->email)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
}