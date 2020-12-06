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
        if(array_search($item,$configArray)>0 || array_search($item,$configArray) === 0) return;
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

    function defaultConfig() {
        $configArray = array(array("Impact_Level", "VH", "H", "M", "L", "VL", "Information"),
                            array("Finding_Type","Credentials Complexity","Manufacturer Default","Creds","Lack of Authentication","Plain Text Protocols",
                                "Plain Text Web Login","Encryption","Authentication Bypass","Port Security","Access Control","Least Privilege","Privilege Escalation",
                                "Missing Patches","Physical Security","Information Disclosure"),
                            array("Finding_Classification","Vulnerability","Information"),
                            array("Posture","Insider","Insider-Nearsider","Nearsider","Nearsider-Outsider"),
                            array("Severity_Category_Code","I","II","III"),
                            array("Threat_Level","Confirmed","Expected","Anticipated","Predicted Possible"),
                            array("Countermeasure_Effectiveness","10 - Very High","9 - High","8 - High","7 - High","6 - Moderate", "5 - Moderate", "4 - Moderate",
                                "3 - Low", "2 - Low", "1 - Low", "0 - Very Low"),
                            array("Event_Classification","Top Secret","Secret","Confidential","Classified","Unclassified"),
                            array("Event_Type","Cooperative Vulnerability Penetration Assessment (CVPA)", "Cooperative Vulnerability Investigation (CVI)",
                                "Verification of Fixes (VOF)"),
                            array("Finding_Impact_Level", "VH", "H", "M", "L", "VL", "Information"),
                            array("Progress","Not Started","Assigned", "Transferred", "In Progress", "Complete", "Not Applicable"));
        $db = new ConfigurationDatabase();
        foreach($configArray as $configItem) {
        $configName = $configItem[0];
        unset($configItem[0]);
        $configItem = array_values($configItem);
        new Configuration($db, $configName, $configItem);
        }
    }
?>