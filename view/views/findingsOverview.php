<!doctype html>
<html lang="en">

<head>
    <?php include '../templates/header.php';?>
</head>

<body>
    <div class="container-fluid content">
        <div class="row fluid-col">
            <div id="eventTree" class="dm-popout" style="background-color:#202020">
                <?php include '../templates/eventTree.php';?>
            </div>
            <div class="col-10">
            <?php 
                include '../templates/table.php';
                include '/xampp/htdocs/FRIC/controller/findingController.php';

                if($_SERVER['QUERY_STRING'] == "postnew") {
                    @createfinding($_POST["findingTitle"], $_POST["findingHost"], $_POST["findingIPPort"], $_POST["associatedTask"], $_POST["associatedSystem"], 
                           $_POST["associatedSubtask"], $_POST["findingDescription"], $_POST["findingLongDescription"], $_POST["findingStatus"], 
                           $_POST["findingType"], $_POST["findingClass"], $_POST['associationToFinding'], $_POST["evidence"], 
                           $_POST["archiveStatus"], $_POST['collaboratorAssignment'], $_POST["confidentiality"], $_POST["integrity"], 
                           $_POST["availability"], $_POST['analystAssignment'], $_POST["posture"], $_POST["mitigationBriefDescription"], $_POST["mitigationLongDescription"], 
                           $_POST["relevance"], $_POST["effectivenessRating"], $_POST["impactDescription"], $_POST["impactLevel"], $_POST["severityCatCode"], $_POST["severityCatScore"], 
                           $_POST["vulnerabilitySeverity"], $_POST["quantitativeVulnerabilitySeverity"],$_POST["risk"], $_POST["likelihood"], 
                           $_POST["confidentialityFindingImpact"], $_POST["integrityFindingImpact"], $_POST["availabilityFindingImpact"], 
                           $_POST["impactScore"]);
                }

                if($_SERVER['QUERY_STRING'] == "postedit") {
                    @editfinding($_POST["findingID"], $_POST["findingTitle"], $_POST["findingHost"], $_POST["findingIPPort"], $_POST["associatedTask"], $_POST["associatedSystem"], 
                    $_POST["associatedSubtask"], $_POST["findingDescription"], $_POST["findingLongDescription"], $_POST["findingStatus"], 
                    $_POST["findingType"], $_POST["findingClass"], $_POST['associationToFinding'], $_POST["evidence"], 
                    $_POST["archiveStatus"], $_POST['collaboratorAssignment'], $_POST["confidentiality"], $_POST["integrity"], 
                    $_POST["availability"], $_POST['analystAssignment'], $_POST["posture"], $_POST["mitigationBriefDescription"], $_POST["mitigationLongDescription"], 
                    $_POST["relevance"], $_POST["effectivenessRating"], $_POST["impactDescription"], $_POST["impactLevel"], $_POST["severityCatCode"], $_POST["severityCatScore"], 
                    $_POST["vulnerabilitySeverity"], $_POST["quantitativeVulnerabilitySeverity"],$_POST["risk"], $_POST["likelihood"], 
                    $_POST["confidentialityFindingImpact"], $_POST["integrityFindingImpact"], $_POST["availabilityFindingImpact"], 
                    $_POST["impactScore"]);
                }

                if($_SERVER['QUERY_STRING'] == "archive" && array_key_exists('id', $_POST)) {
                    $archList = $_POST['id'];
                    foreach($archList as $archItem){
                        archiveFunction($archItem);
                    }
                }

                if($_SERVER['QUERY_STRING'] == "restore" && array_key_exists('id', $_POST)) {
                    $archList = $_POST['id'];
                    foreach($archList as $archItem){
                        restoreFunction($archItem);
                    }
                }

                $findingTable = table::tableByType("Findings Overview", findingOverviewTable());
                $findingTable->printTable();
                ?>
            </div>
            <div class="col-2" style="background-color:#202020">
                <?php include '../templates/search.php';?>
            </div>
        </div>
        <?php include '../templates/footer.php';?>
    </div>
</body>
</html>