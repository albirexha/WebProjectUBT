<?php
class Useri{
    private $user_ID;
    private $username;
    private $email;
    private $password;
    private $roleID;

    public function __construct($Username, $Email, $Password, $RoleID){
        $this->username = $Username;
        $this->email = $Email;
        $this->password = $Password;
        $this->roleID = $RoleID;
    }


    public function getUsername(){
        return $this->username;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getPassword(){
        return $this->password;
    }

    public function getRoleID(){
        return $this->roleID;
    }

    public function setUsername($username){
        $this->username = $username;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function setPassword($password){
        $this->password = $password;
    }
    
    public function setRoleID($roleID){
        $this->roleID = $roleID;
    }
}

?>
