<?php
include_once 'controller.php';
if (isset($_POST['AddButton'])) {
    $Username = $_POST['Username'];
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];
    $RoleID = $_POST['RoleID'];
    $view = new InsertView();
    $view->insertUser($Username, $Email, $Password, $RoleID);
}

class InsertView
{
    public function insertUser($Username, $Email, $Password, $RoleID)
    {
        // dergojme kerkesen ne controller
        $controller = new UserController();
        $response = $controller->InsertUser($Username, $Email, $Password, $RoleID);
        if($response){
        echo '<script type="text/JavaScript">  
        alert("User added successfully!");
       window.location = "../users.php"
       </script>';
        }else{
            echo '<script type="text/JavaScript">  
            alert("FAILED!");
           window.location = "../users.php"
           </script>';
        }
    }
}
?>
