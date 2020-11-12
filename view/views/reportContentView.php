<!doctype html>
<html lang="en">

<head>
    <?php include '../templates/header.php';
    require_once('../../controller/logController.php');
    ?>
</head>
<body>
    <div class="container-fluid content">
        <div class="row fluid-col">
            <div id="eventTree" class="dm-popout" style="background-color:#202020">
                <?php include '../templates/eventTree.php';?>
            </div>
            <div class="col-10">
                <div class="container" style="font-size:20px">
                    <form action="reportContentView.php" method="POST">
                        <h2 class = "text-center">Reports</h2>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="final" name="final">
                            <label class="form-check-label" for="final">Final Report</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="matrix" name="matrix">
                            <label class="form-check-label" for="matrix">Risk Matrix Report</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="erb" name="erb">
                            <label class="form-check-label" for="erb">ERB Report</label>
                        </div>
                        <br>
                        <div class ="container col-5">
                            <?php
                                include("../../controller/findingController.php");
                                $fArray = findingsList();
                                $allIDs = array();
                                $i=0;
                                while($i < count($fArray)){
                                    array_push($allIDs,$fArray[$i][0]);
                                    $i++;
                                }
                                echo '<h5 class="text-center">Findings List<h5>';
                                echo '<select class="form-control" size="10" name = "finding[]" multiple>';
                                echo '<option value = "all" >' . "All Findings</option>";
                                $i=0;
                                while($i < count($fArray)){
                                    echo '<option value = "'. $fArray[$i][0] .'">' . $fArray[$i][1] ."</option>";
                                    $i++;
                                }
                                echo '</select>';
                            echo <<< BODY
                            <br></br>
                                <button class="btn btn-sm btn-light" type="submit" name="submit">Submit</button>
                            <br></br>
                        </div>
                    </form>
                    BODY;

                    include('../../controller/reportController.php');
                    if (isset($_POST['submit']) && isset($_POST['finding'])){
                        $fList = array();
                        if($_POST['finding'][0] == "all"){
                            $fList = $allIDs;
                        }
                        else{
                            $fList = $_POST['finding'];
                        }
        
                        if  (isset($_POST['final'])){
                            readFinalReport($fList);
                            echo '<h5 class="text-center">Final Report Has Been Generated<h5>';
                        }
                        if  (isset($_POST['erb'])){
                            readERBReport($fList);
                            echo '<h5 class="text-center">ERB Report Has Been Generated<h5>';
                        }
                        if  (isset($_POST['matrix'])){
                            readMatrixReport($fList);
                            echo '<h5 class="text-center">Risk Matrix Report Has Been Generated<h5>';
                        }
                    }
                ?>
                </div>
            </div>
            <div class="col-2" style="background-color:#202020">
                <?php include '../templates/search.php';?>
            </div>
        </div>
        <?php include '../templates/footer.php';?>
    </div>
</body>
</html>