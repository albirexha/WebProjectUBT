<?php
include_once 'rekomandimetModel.php';
include_once 'DbConn.php';
class RekomandimetController{
    public function GetRekomandimet(){
        $sql = "SELECT * FROM Propozimet";

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