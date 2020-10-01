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
                        createEvent($_POST["eventName"], $_POST["eventDescription"], $_POST["eventType"], $_POST["eventVersion"], $_POST["assessmentDate"], $_POST["organizationName"], $_POST["securityClassification"], $_POST["eventClassification"], $_POST["declassificationDate"], $_POST["customerName"], "n", array(""), 0, 0, "In Progress");
                    }

                    if($_SERVER['QUERY_STRING'] == "postedit") {
                        editEvent($_POST["eventName"], $_POST["eventDescription"], $_POST["eventType"], $_POST["eventVersion"], $_POST["assessmentDate"], $_POST["organizationName"], $_POST["securityClassification"], $_POST["eventClassification"], $_POST["declassificationDate"], $_POST["customerName"], "n", array(""), 0, 0, "In Progress");
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