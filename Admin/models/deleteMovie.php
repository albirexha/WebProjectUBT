<?php
include_once './DbConn.php';
$id = $_GET['id'];
        
        $sql = "DELETE FROM Film WHERE Film_ID=$id";
        
        $obj = new DBConnection();
        $connection = $obj->getConnection();
        $statement = $connection->prepare($sql);
        try{
            $statement->execute();
            if($statement){
            echo '<script type="text/JavaScript">  
             alert("Movie deleted successfully!");
            window.location = "../movies.php"
            </script>';
            }

        }catch(PDOException $e){
            echo '<script type="text/JavaScript">  
            alert("Failed!");
           window.location = "../movies.php"
           </script>';
        }
?>