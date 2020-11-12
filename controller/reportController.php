<?php
    require_once('../../model/finalReport.php');
    require_once('../../model/erbReport.php');
    require_once('../../model/riskMatrixReport.php');

    function readFinalReport($list){
        new FinalReport($list);
    }

    function readERBReport($list){
        createERB($list);
    }

    function readMatrixReport($list){
        new RiskMatrixReport($list);
    }

?>