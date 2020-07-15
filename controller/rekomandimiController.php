<?php
include_once '../models/rekomandimiMapper.php';
include_once '../models/rekomandimiModel.php';
class RekomandimiController{
    public function InsertRekomandimi($UserID, $Message){
        //therrasim funksionet qe bejne kalkulimin e kerkeses
        //insert studenti ndatabase
        $Rekomandimi = new Rekomandimi($UserID, $Message);
        $rekomandimiMapper = new rekomandimiMapper($Rekomandimi);
        $rekomandimiMapper->InsertIntoRekomandimi($UserID, $Message);
        
        //insert kursin studenti


    }

    public function GetUsers(){
        //return array;
    }
}
?>