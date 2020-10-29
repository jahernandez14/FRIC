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
                include '/xampp/htdocs/FRIC/controller/systemController.php';

                if($_SERVER['QUERY_STRING'] == "postnew") {
                    createSystem($_POST["systemName"], $_POST["systemDescription"], $_POST["systemLocation"], $_POST["systemRouter"], $_POST["systemSwitch"], $_POST["systemRoom"], $_POST["testPlan"], $_POST["confidentiality"], $_POST["integrity"], $_POST["availability"], 0, 0, "In Progress");
                }

                if($_SERVER['QUERY_STRING'] == "postedit") {
                    editSystem($_POST["systemID"], $_POST["systemName"], $_POST["systemDescription"], $_POST["systemLocation"], $_POST["systemRouter"], $_POST["systemSwitch"], $_POST["systemRoom"], $_POST["testPlan"], $_POST["confidentiality"], $_POST["integrity"], $_POST["availability"], FALSE, $_POST["numberOfTasks"], $_POST["numberOfFindings"], $_POST["progress"]);
                }

                $systemTable = table::tableByType("System Overview Table", systemOverviewTable());
                $systemTable->printTable();
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