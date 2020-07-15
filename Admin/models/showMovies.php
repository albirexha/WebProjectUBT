<?php
include_once 'movieController.php';

class movieView{
    public function FillTableRowsWithMovies(){
        // dergojme kerkesen ne controller
        $controller = new movieController();
        $data = $controller->GetMovies();
        return $data;
    }
}
?>