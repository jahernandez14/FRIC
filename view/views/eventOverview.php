<!doctype html>
<html lang="en">

<head>
    <?php include '../templates/header.php';?>
</head>

<body>
    <div class="container-fluid">
        <div class="row fluid-col">
            <div id="eventTree" class="dm-popout" style="background-color:#202020">
                <?php include '../templates/eventTree.php';?>
            </div>
            <div class="col-10">
                <?php 
                    include '../templates/table.php';
                    include '/xampp/htdocs/FRIC/controller/eventController.php';

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