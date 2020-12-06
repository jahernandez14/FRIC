<!doctype html>
<html lang="en">

<head>
    <?php include '../templates/header.php';
    require_once('../../controller/taskController.php');
    require_once('../../controller/subtaskController.php');
    require_once('../../controller/analystController.php');
    require_once('../../controller/systemController.php');
    require_once('../../controller/findingController.php');
    require_once('../templates/GUIList.php'); ?>
</head>

<body>
    <div class="container-fluid content">
        <div class="row fluid-col-lg">
            <div id="eventTree" class="dm-popout" style="background-color:#202020">
                <?php include '../templates/eventTree.php'; include '../../controller/configController.php';?>
            </div>
            <?php
            /**
             * hardcoding this psuedo-enumeration until it's implemented by Setup:
             * array numerically indexed from 0, of strings. array("First List Item")
             */
            /*$findingTypeArray = array(
                "", "Credentials Complexity", "Manufacture Default",
                "Creds", "Lack Of Authentication", "Plain Text Protocols",
                "Plain Text Web Login", "Encryption",
                "Authentication Bypass", "Port Security", "Access Control",
                "Least Privilege", "Privilege Escalation", "Missing Patches",
                "Physical Security", "Information Disclosure"
            );*/
            $findingTypeArray = array_merge(array(""),getConfig(implode("_",explode(" ","Finding Type"))));
            $findingStatusArray = array("", "Open", "Closed");
            //$findingClassificationArray = array("", "Vulnerability", "Information");
            $findingClassificationArray = array_merge(array(""),getConfig(implode("_",explode(" ","Finding Classification"))));
            $findingCIAArray = array("", "Low", "Medium", "High", "Information");
            //$findingPostureArray = array("", "Insider", "Insider-Nearsider", "Nearsider", "Outsider", "Nearsider-Outsider");
            $findingPostureArray = array_merge(array(""),getConfig(implode("_",explode(" ","Posture"))));
            //$findingRelevanceArray = array("", "Confirmed", "Expected", "Anticipated", "Predicted", "Possible");
            $findingRelevanceArray = array_merge(array(""),getConfig(implode("_",explode(" ","Threat Level"))));
            //$findingImpactLevelArray = array("", "VH", "H", "M", "L", "VL", "Information");
            $findingImpactLevelArray = array_merge(array(""),getConfig(implode("_",explode(" ","Finding Impact Level"))));
            //$effectivenessArray = array("", "10 - Very High", "9 - High", "8 - High", "7 - High", "6 - Moderate", "5 - Moderate", "4 - Moderate", "3 - Low", "2 - Low", "1 - Low", "0 - Very Low");
            $effectivenessArray = array_merge(array(""),getConfig(implode("_",explode(" ","Countermeasure Effectiveness"))));
            $sevCatCodes = array_merge(array(""),getConfig(implode("_",explode(" ","Severity Category Code"))));

            $findingTitle = urldecode($_SERVER['QUERY_STRING']);
            if ($findingTitle == "createNew") {
                $dataArray = array();
                $postTag = "postnew";
                $editTag = <<< HEREDOC
                    <input name="evidence" type="hidden" value=" "/>
                    <input name="archiveStatus" type="hidden" value="FALSE"/>
                    HEREDOC;
                $findingID = 0;

                $associatedSystem = "";
                $associatedTask = "";
                $associatedSubtask = "";
                $analystAssignment = "";
                $collaboratorAssignment = "";

                $findingTitle = "";
                $findingHost = "";
                $findingIPPort = "";
                $description = "";
                $longDescription = "";
                $findingStatus = "";
                $findingType = "";
                $findingClassification = "";
                $associationToFinding = "";
                $evidence = "";
                $confidentiality = "";
                $integrity = "";
                $availability = "";
                $posture = "";
                $mitigationBriefDescription = "";
                $mitigationLongDescription = "";
                $relevance = "";
                $effectivenessRating = "";
                $impactDescription = "";
                $impactLevel = "";
                $severityCatCode = "";
                $severityCatScore = "";
                $vulnerabilitySeverity = "";
                $quantitativeVulnerabilitySeverity = "";
                $risk = "";
                $likelihood = "";
                $confidentialityImpact = "";
                $integrityImpact = "";
                $availabilityImpact = "";
                $impactScore = "";
                // tagging for systems
            } else {
                $dataArray = readFinding($findingTitle);
                $postTag = "postedit";
                // things without forms:
                $findingID = $dataArray[0];
                $archiveStatus = $dataArray[14];
                // selection box things:
                $associatedSystem = $dataArray[8];
                $associatedTask = $dataArray[9];
                $associatedSubtask = $dataArray[10];
                $analystAssignment = $dataArray[19];
                $collaboratorAssignment = $dataArray[15];
                // editTag contents to add hidden fields, to POST things that aren't edited here
                $editTag = <<< HEREDOC
                    <input name="findingID" type="hidden" value="$findingID"/>
                    <input name="evidence" type="hidden" value=" "/>
                    <input name="archiveStatus" type="hidden" value="$archiveStatus"/>
                    HEREDOC;

                $findingTitle = $dataArray[1];
                $findingHost = $dataArray[2];
                $findingIPPort = $dataArray[3];
                $description = $dataArray[4];
                $longDescription = $dataArray[5];
                $findingStatus = $dataArray[6];
                $findingType = $dataArray[7];
                $findingClassification = $dataArray[11];
                $associationToFinding = $dataArray[12];
                $evidence = $dataArray[13];
                $confidentiality = $dataArray[16];
                $integrity = $dataArray[17];
                $availability = $dataArray[18];
                $posture = $dataArray[20];
                $mitigationBriefDescription = $dataArray[21];
                $mitigationLongDescription = $dataArray[22];
                $relevance = $dataArray[23];
                $effectivenessRating = $dataArray[24];
                $impactDescription = $dataArray[25];
                $impactLevel = $dataArray[26];
                $severityCatCode = $dataArray[27];
                $severityCatScore = $dataArray[28];
                $vulnerabilitySeverity = $dataArray[29];
                $quantitativeVulnerabilitySeverity = $dataArray[30];
                $risk = $dataArray[31];
                $likelihood = $dataArray[32];
                $confidentialityImpact = $dataArray[33];
                $integrityImpact = $dataArray[34];
                $availabilityImpact = $dataArray[35];
                $impactScore = $dataArray[36];
            }
            $analystTable = analystNames();
            for ($i = 0; $i < sizeof($analystTable); $i++) {
                $analystList[$i] = $analystTable[$i][2] . " " . $analystTable[$i][3];
            }
            $taskList[0] = "";
            $taskTable = taskOverviewTable();
            for ($i = 0; $i < sizeof($taskTable); $i++) {
                $taskList[$i + 1] = $taskTable[$i][1];
            }
            $subtaskList[0] = "";
            $subtaskTable = subtaskOverviewTable();
            for ($i = 0; $i < sizeof($subtaskTable); $i++) {
                $subtaskList[$i + 1] = $subtaskTable[$i][1];
            }
            $systemList[0] = "";
            $systemTable = systemOverviewTable();
            for ($i = 0; $i < sizeof($systemTable); $i++) {
                $systemList[$i + 1] = $systemTable[$i][1];
            }
            $findingTable = findingOverviewTable();
            for ($i = 0; $i < sizeof($findingTable); $i++) {
                $findingList[$i] = $findingTable[$i][1];
            }

            echo <<< HEREDOC
                            <div class="col-10">
                            <form method="post" action="findingsOverview.php?$postTag">
                                $editTag
                                <div>
                                    <h2 class="text-center">Finding Detailed View</h2>
                                    <div class="row">
                                        <div class="col">
                                            <label>Title</label>
                                            <input type="text" class="form-control" placeholder="Finding Title" name="findingTitle" value="$findingTitle">
                                        </div>
                                        <div class="col-3">
                                            <label>Host Name</label>
                                            <input type="text" class="form-control" placeholder="Host" name="findingHost" value="$findingHost">
                                        </div>
                                        <div class="col-2">
                                            <label>IP Port</label>
                                            <input type="text" class="form-control" placeholder="Port" name="findingIPPort" value="$findingIPPort">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label>Description</label>
                                            <textarea class="form-control" id="Desc" rows="5" name="findingDescription">$description</textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label>Long Description</label>
                                            <textarea class="form-control" id="Desc" rows="5" name="findingLongDescription">$longDescription</textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-2">
                HEREDOC;
            $statusList = new GUIList("Status", "findingStatus", $findingStatusArray, $findingStatus);
            $statusList->printContents();
            echo <<< HEREDOC
                                        </div>
                                        <div class="col-4">
                HEREDOC;
            $typeList = new GUIList("Type", "findingType", $findingTypeArray, $findingType);
            $typeList->printContents();
            echo <<< HEREDOC
                                        </div>
                                        <div class="col-2">
                HEREDOC;
            $classificationList = new GUIList("Classification", "findingClass", $findingClassificationArray, $findingClassification);
            $classificationList->printContents();
            echo <<< HEREDOC
                                        </div>
                                        <div class="col-2">
                                            <label>Evidence:</label>
                                            <input type="button" class="form-control" id="evidence" value="Choose File">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                HEREDOC;
            $systemGUIList = new GUIList("System", "associatedSystem", $systemList, $associatedSystem);
            $systemGUIList->printContents();
            echo <<< HEREDOC
                                        </div>
                                        <div>
                                            <label>OR</label>
                                        </div>
                                        <div class="col">
                HEREDOC;
            $taskGUIList = new GUIList("Task", "associatedTask", $taskList, $associatedTask);
            $taskGUIList->printContents();
            echo <<< HEREDOC
                                        </div>
                                        <div>
                                            <label>OR</label>
                                        </div>
                                        <div class="col">
                HEREDOC;
            $subtaskGUIList = new GUIList("Subtask", "associatedSubtask", $subtaskList, $associatedSubtask);
            $subtaskGUIList->printContents();
            echo <<< HEREDOC
                                        </div>
                                        <div class="col">
                HEREDOC;
            $findingGUIList = new GUIList("Related Finding(s):", "associationToFinding", $findingList, $associationToFinding, TRUE);
            $findingGUIList->printContents();
            echo <<< HEREDOC
                                        </div>
                                    </div>
                <h3>Finding Impact</h3>
                    <div class="row">
                        <div class="col">
                HEREDOC;
            $confidentialityList = new GUIList("Confidentiality", "confidentiality", $findingCIAArray, $confidentiality);
            $confidentialityList->printContents();
            echo <<< HEREDOC
                        </div>
                        <div class="col">
                HEREDOC;
            $integrityList = new GUIList("Integrity", "integrity", $findingCIAArray, $integrity);
            $integrityList->printContents();
            echo <<< HEREDOC
                        </div>
                        <div class="col">
                HEREDOC;
            $availabilityList = new GUIList("Availability", "availability", $findingCIAArray, $availability);
            $availabilityList->printContents();
            echo <<< HEREDOC
                        </div>
                    </div>
                <h3>Analyst Information</h3>
                    <div class="row">
                        <div class="col-4">
                HEREDOC;
            $analystGUIList = new GUIList("Analyst(s)", "analystAssignment", $analystList, $analystAssignment, TRUE);
            $analystGUIList->printContents();
            echo <<< HEREDOC
                        </div>
                        <div class="col-4">
                HEREDOC;
            $analystGUIList = new GUIList("Collaborator(s)", "collaboratorAssignment", $analystList, $collaboratorAssignment, TRUE);
            $analystGUIList->printContents();
            echo <<< HEREDOC
                        </div>
                        <div class="col-4">
                HEREDOC;
            $postureList = new GUIList("Posture", "posture", $findingPostureArray, $posture);
            $postureList->printContents();
            echo <<< HEREDOC
                        </div>
                    </div>
                <h3>Countermeasure</h3>
                    <div class="row">
                        <div class="col-2">
                HEREDOC;
            $countermeasureList = new GUIList("Countermeasure Effectiveness", "effectivenessRating", $effectivenessArray, $effectivenessRating);
            $countermeasureList->printContents();
            echo <<< HEREDOC
                        </div>
                    </div>
                <h3>Mitigation</h3>
                    <div class="row">
                        <div class="col">
                            <label>Brief Description</label>
                            <textarea class="form-control" id="Desc" rows="3" name="mitigationBriefDescription">$mitigationBriefDescription</textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label>Long Description</label>
                            <textarea class="form-control" id="Desc" rows="5" name="mitigationLongDescription">$mitigationLongDescription</textarea>
                        </div>
                    </div>
                <h3>Threat Relevance</h3>
                    <div class="row">
                        <div class="col">
                HEREDOC;
            $relevanceList = new GUIList("Relevance", "relevance", $findingRelevanceArray, $relevance);
            $relevanceList->printContents();
            echo <<< HEREDOC
                        </div>
                    </div>
                <h3>Counter Measure</h3>
                    <div class="row">
                        <div class="col">
                            <label>Impact Description</label>
                            <textarea class="form-control" id="Desc" rows="3" name="impactDescription">$impactDescription</textarea>
                        </div>
                        <div class="col">
                HEREDOC;
            $impactLevelList = new GUIList("Impact Level", "impactLevel", $findingImpactLevelArray, $impactLevel);
            $impactLevelList->printContents();
            echo <<< HEREDOC
                        </div>
                    </div>
                <h3>Severity</h3>
                    <div class="row">
                        <div class="col">
            HEREDOC;
            $sevCatCodeList = new GUIList("Severity Category Code", "severityCatCode", $sevCatCodes, $severityCatCode);
            $sevCatCodeList->printContents();
            echo <<< HEREDOC
                        </div>
                        <div class="col">
                            <label>Severity Category Score</label>
                            <input type="text" class="form-control" placeholder="Score" name="severityCatScore" value="$severityCatScore">
                        </div>
                        <div class="col">
                            <label>Vulnerability Severity</label>
                            <input type="text" class="form-control" placeholder="Severity" name="vulnerabilitySeverity" value="$vulnerabilitySeverity">
                        </div>
                        <div class="col">
                            <label>Quantative Vulnerability Severity</label>
                            <input type="text" class="form-control" placeholder="QVS" name="quantitativeVulnerabilitySeverity" value="$quantitativeVulnerabilitySeverity">
                        </div>
                    </div>
                <h3>Risk</h3>
                    <div class="row">
                        <div class="col">
                            <label>Risk</label>
                            <input type="text" class="form-control" placeholder="" name="risk" value="$risk">
                        </div>
                        <div class="col">
                            <label>Likelihood</label>
                            <input type="text" class="form-control" placeholder="" name="likelihood" value="$likelihood">
                        </div>
                    </div>
                <h3>Finding System Level Impact</h3>
                    <div class="row">
                        <div class="col">
                            <label>Impact On System Confidentiality</label>
                            <input type="text" class="form-control" placeholder="Impact" name="confidentialityFindingImpact" value="$confidentialityImpact">
                        </div>
                        <div class="col">
                            <label>Impact On System Integrity</label>
                            <input type="text" class="form-control" placeholder="Impact" name="integrityFindingImpact" value="$integrityImpact">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label>Impact On System Availability</label>
                            <input type="text" class="form-control" placeholder="Impact" name="availabilityFindingImpact" value="$availabilityImpact">
                        </div>
                        <div class="col">
                            <label>Impact Score</label>
                            <input type="text" class="form-control" placeholder="Impact" name="impactScore" value="$impactScore">
                        </div>
                    </div>
                <br>
                </br>
                HEREDOC; ?>
            <div class="row">
                &nbsp;&nbsp;<button class="btn btn-md btn-light" type="submit">Save</button>&nbsp;&nbsp;
                </form>
                <form method="post" action="findingsOverview.php?archive">
                    <?php
                    echo <<< HEREDOC
                        <input type="hidden" name="id[]" id="id" value="$findingID">
                        HEREDOC;
                    ?>
                    <button class="btn btn-md btn-light" type="submit">Archive</button>&nbsp;&nbsp;
                </form>
                <a href="../views/findingsOverview.php" class="btn btn-md btn-light" role="button" style=color:black>Cancel</a>
            </div>
            <br>
            <br>
            </br>
            </br>
        </div>
    </div>
    <div class="col-2" style="background-color:#202020">
        <?php include '../templates/search.php'; ?>
    </div>
    </div>
    <?php include '../templates/footer.php'; ?>
    </div>
</body>

</html>