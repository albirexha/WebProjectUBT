<?php
include_once 'userMapper.php';
include_once 'userModel.php';
include_once 'DbConn.php';
class UserController{

    public function InsertUser($Username, $Email, $Password, $RoleID){
        //therrasim funksionet qe bejne kalkulimin e kerkeses
        //insert studenti ndatabase
        $Useri = new Useri($Username, $Email, $Password, $RoleID);
        $userMapper = new UserMapper($Useri);
        $userMapper->Insert($Username, $Email, $Password, $RoleID);
        return $userMapper;
        //insert kursin studenti


    }

    public function GetUsers(){
        $sql = "SELECT * FROM Useri";

        $obj = new DBConnection();
        $connection = $obj->getConnection();
        
        $statement = $connection->prepare($sql);

        try{
            $statement->execute();
            $row = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $row;
        }catch(PDOException $e){
            echo 'FAILED';
        }

    }

    public function deleteUser($userID){
        $sql = 'DELETE FROM Useri WHERE User_ID=$userID';
        
        $obj = new DBConnection();
        $connection = $obj->getConnection();
        
        $statement = $connection->prepare($sql);

        try{
            $statement->execute();
            $row = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $row;
        }catch(PDOException $e){
            echo 'FAILED';
        }
    }

}
?>