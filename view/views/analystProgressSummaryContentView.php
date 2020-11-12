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
                <div class = "row">
                    <div class = "col-8">
                    <h2><strong>Analyst Progress Summary</strong></h2>
                <?php
                if (array_key_exists ("analystName", $_POST)){
                    $analystFirstName = explode(" ", $_POST["analystName"])[0];
                    $analystLastName = explode(" ", $_POST["analystName"])[1];
                    echo "<h3>" . $analystFirstName . " " . $analystLastName ."</h3><br>";
                }
                
                ?>
                    </div>
                <div class="container fluid text-right col-2">
                Select Analyst Initials:
                <form method="post" action="analystProgressSummaryContentView.php">
                        <?php 
                            require_once('/xampp/htdocs/FRIC/controller/analystController.php');
                            $placeholder = "No Analyst have been added to FRIC";
                            $analystList = analystNames();
                            echo <<< HEREDOC
                            <select name="analystName" class="form-control" id="analystName">
                            HEREDOC;
                            for($i=0; $i<sizeof($analystList); $i++) {
                                $analystName=$analystList[$i][2]." ".$analystList[$i][3];
                                $analystInitial=$analystList[$i][1];
                                echo <<< HEREDOC
                                <option value="$analystName">$analystInitial</option>
                                HEREDOC;
                            }
                            echo "</select>"
                        ?>
                        <br>
                        <button class="btn btn-sm btn-light" name="submit" type="submit">Update</button>
                    
                </form>

                </div>
                </div>
                <?php
                    include '../templates/table.php';
                    require_once('../../controller/analystController.php');

                    $analystFirstName = "";
                    $analystLastName = "";

                    if (array_key_exists ("analystName", $_POST)){
                        $analystFirstName = explode(" ", $_POST["analystName"])[0];
                        $analystLastName = explode(" ", $_POST["analystName"])[1];
                    }

                    $findingTable = @table::tableByType("Findings Overview", analystFindingSummary($analystFirstName, $analystLastName));
                    $findingTable->printTable();

                    $taskTable = table::tableByType("Task Overview", analystTaskSummary($analystFirstName, $analystLastName));
                    $taskTable->printTable();

                    $subTaskTable = table::tableByType("Subtask Overview", analystSubTaskSummary($analystFirstName, $analystLastName));
                    $subTaskTable->printTable();

                    $systemTable = table::tableByType("System Overview Table", analystSystemSummary($analystFirstName, $analystLastName));
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