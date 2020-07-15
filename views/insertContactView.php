<?php
include_once '../controller/contactController.php';
session_start();
if (isset($_POST['SendBtn'])) {
    $Message = $_POST['Message'];
    $Name = $_POST['ConName'];
    $Email = $_POST['ConEmail'];
    if($Message == "" || $Name =="" || $Email ==""){
        echo "<script language='javascript'>";
        echo 'alert("Mbush te gjith fields.");';
        echo 'window.location.assign("../contact.html");';
        echo "</script>";
    }else if(strlen($Message) >= 1000){
        echo "<script language='javascript'>";
        echo 'alert("Mesazhi duhet te jete me i shkurter se 1000 karaktere");';
        echo 'window.location.assign("../contact.html");';
        echo "</script>";
    }else{
        $view = new InsertContactView();
        $view->insertIntoContact($_SESSION['userID'], $Message);
        if($view){
            echo    '<script type="text/JavaScript">  
                     alert("Faleminderit qe na kontaktuat!");
                    window.location = "../contact.html"
                    </script>';
        
            }else
                echo '<script type="text/JavaScript">  
                        alert("Failed!");
                    window.location = "../contact.html"
                </script>';
                }
    }


class InsertContactView
{
    public function insertIntoContact($UserID, $Message)
    {
        // dergojme kerkesen ne controller
        $controller = new ContactController();
        $response = $controller->InsertContact($UserID, $Message);
        return $response;
    }
}
?>
