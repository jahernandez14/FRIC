<?php
    require_once('/xampp/htdocs/FRIC/model/configurationDatabase.php');
    require_once('/xampp/htdocs/FRIC/controller/logController.php');
    require_once('/xampp/htdocs/FRIC/model/configuration.php');

    function addItem($configType, $item){
        if($item == "") return;
        $db = new ConfigurationDatabase();
        $configArray = $db->getConfig($configType);
        if($configArray == NULL) {
            new Configuration($db, $configType, array($item));
            return;
        }
        if(!is_array($configArray)) $configArray = array($configArray);
        array_push($configArray,$item);
        $db->editConfig($configType, $configArray);
        //$db->editConfig($configType,$configArray);
    }

    function removeItem($configType, $item){
        $db = new ConfigurationDatabase();
        $configArray = $db->getConfig($configType);
        $writeArray = array();
        if(!is_array($configArray)) $configArray = array($configArray);
        foreach($configArray as $arrItem) {
            if($arrItem != $item) array_push($writeArray, $arrItem);
        }
        $db->editConfig($configType,$writeArray);
    }

    function getConfig($configType) {
        $db = new ConfigurationDatabase();
        $configArray = $db->getConfig($configType);
        return $configArray;
    }
?>