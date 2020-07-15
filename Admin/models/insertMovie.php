<?php
include_once 'movieController.php';
if (isset($_POST['AddButton'])) {
    $Title = $_POST['Title'];
    $Director = $_POST['Director'];
    $Subject = $_POST['Subject'];
    $Category = $_POST['Kategoria'];
    $Image = $_FILES['image'];
    $view = new InsertView();
    $view->insertMovie($Title, $Director, $Subject, $Category, $Image);
}

class InsertView
{
    public function insertMovie($Title, $Director, $Subject, $Category, $Image)
    {
        // dergojme kerkesen ne controller
        $controller = new movieController();
        $response = $controller->InsertMovie($Title, $Director, $Subject, $Category, $Image);
        if($response){

        echo '<script type="text/JavaScript">  
                alert("Movie added successfully!");
                window.location = "../movies.php"
              </script>';

        }else
        echo '<script type="text/JavaScript">  
                alert("Failed!");
                window.location = "../movies.php"
              </script>';

    }
}
?>
