<?php
include_once '../models/userMapper.php';
include_once '../models/userModel.php';
include_once '../models/DbConn.php';

class UserController{
    public function InsertUser($Username, $Email, $Password, $RoleID){
        //therrasim funksionet qe bejne kalkulimin e kerkeses
        //insert studenti ndatabase
        $Useri = new Useri($Username, $Email, $Password, $RoleID);
        $userMapper = new UserMapper($Useri);
        $userMapper->Insert($Username, $Email, $Password, $RoleID);

        //insert kursin studenti


    }

    public function loginUser($Username, $Password){        
        $obj = new DBConnection();
        $this->connection = $obj->getConnection();
        $sql = "SELECT * FROM Useri WHERE Username = :username AND Password = :password";

        $statement = $this->connection->prepare($sql);
        $statement->bindParam(":username", $Username);
        $statement->bindParam(":password", $Password);

        $statement->execute();
        $row = $statement->fetchAll(PDO::FETCH_ASSOC);
        static $roleID;
        foreach($row as $roww){
            $roleID = $roww['RoleID'];
            $_SESSION['userID'] = $roww['User_ID'];
            $_SESSION['username'] = $roww['Username'];
            break;
        }
        if(is_null($roleID))
            return false;
        else
            return $roleID;
    }

    public function GetUsers(){
        //return array;
    }
}