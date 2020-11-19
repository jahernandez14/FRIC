<?php
    require_once('../../model/finalReport.php');
    require_once('../../model/test.php');
    require_once('../../model/erbReport.php');
    require_once('../../model/riskMatrixReport.php');

    require_once('findingController.php');
    require_once('systemController.php');

    function readFinalReport($list){
        new FinalReport($list);
    }

    function createERBReport($list){
        $findings = ERBFindings($list);
        $systemTitles = readSystemTitles();
        createERB($findings, $systemTitles);
    }

    function readMatrixReport($list){
        //new RiskMatrixReport($list);
        testReport($list);
    }

?>