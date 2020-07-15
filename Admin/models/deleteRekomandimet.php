<?php
include_once './DbConn.php';
$id = $_GET['id'];
        
        $sql = "DELETE FROM Propozimet WHERE Propozimet_ID=$id";
        
        $obj = new DBConnection();
        $connection = $obj->getConnection();
        $statement = $connection->prepare($sql);
        try{
            $statement->execute();
            if($statement){
            echo '<script type="text/JavaScript">  
             alert("Deleted successfully!");
            window.location = "../rekomandimet.php"
            </script>';
            }

        }catch(PDOException $e){
            echo '<script type="text/JavaScript">  
            alert("Failed!");
           window.location = "../rekomandimet.php"
           </script>';
        }
?>