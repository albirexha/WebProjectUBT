<?php
include_once './DbConn.php';
$id = $_GET['id'];
        
        $sql = "DELETE FROM Useri WHERE User_ID=$id";
        
        $obj = new DBConnection();
        $connection = $obj->getConnection();
        $statement = $connection->prepare($sql);
        try{
            $statement->execute();
            if($statement){
            echo '<script type="text/JavaScript">  
             alert("User deleted successfully!");
            window.location = "../users.php"
            </script>';
            }

        }catch(PDOException $e){
            echo '<script type="text/JavaScript">  
            alert("Failed!");
           window.location = "../users.php"
           </script>';
        }
    
?>