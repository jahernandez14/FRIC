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
                <h2 class="text-center"><strong>Analyst Progress Summary</strong></h2>
                <?php
                    include '../templates/table.php';
                    require_once('../../controller/analystController.php');

                    $findingTable = table::tableByType("Findings Overview", analystFindingSummary("Julio", "Hernandez"));
                    $findingTable->printTable();

                    $findingTable = table::tableByType("Task Overview", analystFindingSummary("Julio", "Hernandez"));
                    $findingTable->printTable();

                    $findingTable = table::tableByType("Subtask Overview", analystFindingSummary("Julio", "Hernandez"));
                    $findingTable->printTable();

                    $systemTable = table::tableByType("System Overview Table", analystFindingSummary("Julio", "Hernandez"));
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