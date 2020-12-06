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
                    include '/xampp/htdocs/FRIC/controller/eventController.php';

                    if($_SERVER['QUERY_STRING'] == "postnew") {
                        createEvent($_POST["eventName"], $_POST["eventDescription"], $_POST["eventType"], $_POST["eventVersion"], $_POST["assessmentDate"], $_POST["organizationName"], $_POST["securityClassification"], $_POST["eventClassification"], $_POST["declassificationDate"], $_POST["customerName"], FALSE, array($_POST["leadAnalystAssignment"], $_POST["analystAssignment"]), $_POST["derivedFrom"], 0, 0, "In Progress");
                    }

                    if($_SERVER['QUERY_STRING'] == "postedit") {
                        editEvent($_POST["eventID"], $_POST["eventName"], $_POST["eventDescription"], $_POST["eventType"], $_POST["eventVersion"], $_POST["assessmentDate"], $_POST["organizationName"], $_POST["securityClassification"], $_POST["eventClassification"], $_POST["declassificationDate"], $_POST["customerName"], FALSE, array($_POST["leadAnalystAssignment"], $_POST["analystAssignment"]), $_POST["derivedFrom"], $_POST["numberOfFindings"], $_POST["numberOfSystems"], $_POST["progress"]);
                    }

                    if($_SERVER['QUERY_STRING'] == "archive" && array_key_exists('id', $_POST)) {
                        $archList = $_POST['id'];
                        foreach($archList as $archItem){
                            if($archItem != 0) archiveEvent($archItem);
                        }
                    }

                    if($_SERVER['QUERY_STRING'] == "restore" && array_key_exists('id', $_POST)) {
                        $archList = $_POST['id'];
                        foreach($archList as $archItem){
                            restoreEvent($archItem);
                        }
                    }

                    $eventTable = table::tableByType("Event Overview Table", eventOverviewTable());
                    $eventTable->printTable();
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