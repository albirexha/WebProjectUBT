<?php
include_once '../controller/rekomandimiController.php';
session_start();
if (isset($_POST['SendBtn'])) {
    $Message = $_POST['Message'];
    $view = new InsertRekomandimiView();
    $view->insertIntoRekomandimi($_SESSION['userID'], $Message);
    if($view){
    echo    '<script type="text/JavaScript">  
             alert("Faleminderit per rekomandimin e filmit!");
            window.location = "../index.php"
            </script>';

    }else
        echo '<script type="text/JavaScript">  
                alert("Failed!");
            window.location = "../index.php"
        </script>';
        }

class InsertRekomandimiView
{
    public function insertIntoRekomandimi($UserID, $Message)
    {
        // dergojme kerkesen ne controller
        $controller = new rekomandimiController();
        $response = $controller->InsertRekomandimi($UserID, $Message);
        return $response;
    }
}
?>
