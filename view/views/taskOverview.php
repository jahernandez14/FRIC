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

                if($_SERVER['QUERY_STRING'] == "postnew") {
                    @createTask($_POST["taskTitle"], $_POST["associatedSystem"], $_POST["taskDescription"], $_POST["taskPriority"], $_POST["taskProgress"], $_POST["taskDueDate"], $_POST["attachment"], $_POST['associationToTask'], $_POST['analystAssignment'], $_POST['collaboratorAssignment'], $_POST["archiveStatus"], $_POST["numberOfSubtasks"], $_POST["numberOfFindings"]);
                }

                if($_SERVER['QUERY_STRING'] == "postedit") {
                    @editTask($_POST["taskID"], $_POST["taskTitle"], $_POST["associatedSystem"], $_POST["taskDescription"], $_POST["taskPriority"], $_POST["taskProgress"], $_POST["taskDueDate"], $_POST["attachment"], $_POST['associationToTask'], $_POST['analystAssignment'], $_POST['collaboratorAssignment'], $_POST["archiveStatus"], $_POST["numberOfSubtasks"], $_POST["numberOfFindings"]);
                }

                if($_SERVER['QUERY_STRING'] == "archive" && array_key_exists('id', $_POST)) {
                    $archList = $_POST['id'];
                    foreach($archList as $archItem){
                        if($archItem != 0) archiveTask($archItem);
                    }
                }

                if($_SERVER['QUERY_STRING'] == "restore" && array_key_exists('id', $_POST)) {
                    $archList = $_POST['id'];
                    foreach($archList as $archItem){
                        restoreTask($archItem);
                    }
                }

                $taskTable = table::tableByType("Task Overview", taskOverviewTable());
                $taskTable->printTable();
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