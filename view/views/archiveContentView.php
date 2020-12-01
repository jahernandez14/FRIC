<!doctype html>
<html lang="en">

<head>
    <?php include '../templates/header.php';
    require_once('../templates/table.php');
    require_once('../../controller/findingController.php');
    require_once('../../controller/systemController.php')?>
</head>

<body>
    <div class="container-fluid content">
        <div class="row fluid-col">
            <div id="eventTree" class="dm-popout overlay" style="background-color:#202020">
                <?php include '../templates/eventTree.php';?>
            </div>
            <div class="col-10">
                    <?php
                    $archivedTasksTable = table::tableByType("Archived Tasks", archivedTaskOverviewTable());
                    $archivedTasksTable->printTable();
                    $archivedSubtasksTable = table::tableByType("Archived Subtasks", archivedSubTaskOverviewTable());
                    $archivedSubtasksTable->printTable();
                    $archivedFindingsTable = @table::tableByType("Archived Findings", archivedFindingOverviewTable());
                    $archivedFindingsTable->printTable();
                    $archivedSystemsTable = table::tableByType("Archived Systems", archivedSystemOverviewTable());
                    $archivedSystemsTable->printTable();
                    ?>
            </div>
            <div class="col-2" style="background-color:#202020">
                <?php include '../templates/search.php';?>
            </div>
            <div class="container-fluid">
                <?php include '../templates/footer.php';?>
            </div>
        </div>
    </div>
</body>
</html>