<?php
include_once 'rekomandimetController.php';

class RekomandimetView{
    public function FillTableRowsWithRekomandimet(){
        // dergojme kerkesen ne controller
        $controller = new RekomandimetController();
        $data = $controller->GetRekomandimet();
        return $data;
    }
}
?>