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
                    createSubTask($_POST["subtaskTitle"], $_POST["associatedTask"], $_POST["subtaskDescription"], $_POST["subtaskProgress"], $_POST["subtaskDueDate"], $_POST["attachment"], $_POST['associationToSubtask'], $_POST['analystAssignment'], $_POST['collaboratorAssignment'], $_POST["archiveStatus"], $_POST["numberOfFindings"]);
                }

                if($_SERVER['QUERY_STRING'] == "postedit") {
                    @editSubTask($_POST["subtaskID"], $_POST["subtaskTitle"], $_POST["associatedTask"], $_POST["subtaskDescription"], $_POST["subtaskProgress"], $_POST["subtaskDueDate"], $_POST["attachment"], $_POST['associationToSubtask'], $_POST['analystAssignment'], $_POST['collaboratorAssignment'], $_POST["archiveStatus"], $_POST["numberOfFindings"]);
                }

                $subTaskTable = table::tableByType("Subtask Overview", subTaskOverviewTable());
                $subTaskTable->printTable();
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