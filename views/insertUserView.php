<?php
include_once '../controller/userController.php';
session_start();
if(isset($_POST['loginBtn'])){

    $Username = $_POST['usernameFL'];
    $Password = $_POST['passwordFL'];
    $view = new InsertView();
    $view->loginValidate($Username, $Password);
}

if (isset($_POST['signUPbtn'])) {
    $Username = $_POST['usernameField'];
    $Email = $_POST['emailField'];
    $Password = $_POST['passwordField'];
    $RoleID = 2;

    if($Username == "" || $Email == "" || $Password == ""){
        echo "<script language='javascript'>";
        echo 'alert("Please fill all fields!");';
        echo 'window.location.assign("../login.html");';
        echo "</script>";
    }else if(!(preg_match('/^[a-z0-9_]/', $Username))){
        echo "<script language='javascript'>";
        echo 'alert("Username is not valid! Please try again...");';
        echo 'window.location.assign("../login.html");';
        echo "</script>";
    }else{
        $view = new InsertView();
        $view->insertUser($Username, $Email, $Password, $RoleID);
        if($view){
        echo "<script language='javascript'>";
        echo 'alert("Your account has been created successfully!");';
        echo 'window.location.assign("../login.html");';
        echo "</script>";
        }
    }

    // if($view){
    //     echo '<script type="text/JavaScript">  
    //             alert("Added Successfully!"); 
    //         </script>';
    // }else{
    //     return false;
    // }
}




class InsertView
{
    public function insertUser($Username, $Email, $Password, $RoleID)
    {
        // dergojme kerkesen ne controller
        $controller = new UserController();
        $response = $controller->InsertUser($Username, $Email, $Password, $RoleID);
    }
    
    public function loginValidate($Username, $Password){
        $controller = new UserController();
        $userInfo = $controller->loginUser($Username, $Password);
        if($userInfo===false){
            echo '<script type="text/JavaScript">  
                    alert("Username ose password gabim!");
                    window.location.assign("../login.html");
                    </script>';
        }else if($userInfo == 2){
            header("Location: ../index.php");
        }else{
            header("Location: ../Admin/index.php");
        }
    }
    
}
?>
