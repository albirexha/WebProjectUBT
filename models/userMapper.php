<?php
include_once 'DbConn.php';
include_once 'userModel.php';
class UserMapper
{
    private $user;
    private $connection;
    public function __construct(\Useri $user)
    {
        $obj = new DBConnection();
        $this->connection = $obj->getConnection();
        $this->user = $user;
    }

    public function Insert(){
        $sql = "INSERT INTO Useri (Username, Email, Password, RoleID) VALUES (:Username, :Email, :Password, :RoleID)";

        
        $Username = $this->user->getUsername();
        $Email = $this->user->getEmail();
        $Password = $this->user->getPassword();
        $RoleID = $this->user->getRoleID();

        $statement = $this->connection->prepare($sql);
        $statement->bindParam(":Username", $Username);
        $statement->bindParam(":Email", $Email);
        $statement->bindParam(":Password", $Password);
        $statement->bindParam(":RoleID", $RoleID);

        try{
            $statement->execute();
        }catch(PDOException $e){
            echo 'FAILED';
        }
    }
    



    // public function Update()
    // {
    //     // duhet te ndryshohet query dhe atributet qe pranohen
    //     $sql = "INSERT INTO Studenti (Firstname,lastname,phone) VALUES (:firstname,:lastname,:phone)";
    //     $statement = $this->connection->prepare($sql);

    //     $emri = $this->studenti->getFirstName();
    //     $mbiemri = $this->studenti->getLastName();
    //     $phone = $this->studenti->getPhone();

    //     $statement->bindParam(":firstname", $emri);
    //     $statement->bindParam(":lastname", $mbiemri);
    //     $statement->bindParam(":phone", $phone);

    //     $statement->execute();
    // }
}
?>
