<?php

include_once 'DBConn.php';
include_once 'rekomandimiModel.php';

class RekomandimiMapper{
    private $rekomandimi;
    private $connection;
    public function __construct(\Rekomandimi $rekomandimi){
        $obj = new DBConnection();
        $this->connection = $obj->getConnection();
        $this->rekomandimi = $rekomandimi;
    }

    public function InsertIntoRekomandimi(){
        $sql = "INSERT INTO Propozimet (UserID, Mesazhi) VALUES (:UserID, :Mesazhi)";

        $userID = $this->rekomandimi->getUserID();
        $message = $this->rekomandimi->getMessage();
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(":UserID", $userID);
        $statement->bindParam(":Mesazhi", $message);

        try{
            $statement->execute();
        }catch(PDOException $e){
            echo 'FAILED';
        }
    }
}
?>