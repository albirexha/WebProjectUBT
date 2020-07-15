<?php
include_once './DbConn.php';
$id = $_GET['id'];
        
        $sql = "DELETE FROM Contact WHERE Contact_ID=$id";
        
        $obj = new DBConnection();
        $connection = $obj->getConnection();
        $statement = $connection->prepare($sql);
        try{
            $statement->execute();
            if($statement){
            echo '<script type="text/JavaScript">  
             alert("Deleted successfully!");
            window.location = "../contact.php"
            </script>';
            }

        }catch(PDOException $e){
            echo '<script type="text/JavaScript">  
            alert("Failed!");
           window.location = "../contact.php"
           </script>';
        }
?>