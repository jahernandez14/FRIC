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
                <div class="container" style="font-size:20px; background-color: #202020;">
                    <form action="reportContentView.php" method="POST">
                        <br>
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
                        <button class="btn btn-sm btn-light" type="submit" name="submit">Submit</button>
                        <br></br>              
                    </form>
                </div>
                <?php
                    include('../../controller/reportController.php');
                    if (isset($_POST['submit'])){
                        if  (isset($_POST['final'])){
                            readFinalReport();
                            echo '<h5 class="text-center">Final Report Has Been Generated<h5>';
                        }
                        if  (isset($_POST['erb'])){
                            readERBReport();
                            echo '<h5 class="text-center">ERB Report Has Been Generated<h5>';
                        }
                        if  (isset($_POST['matrix'])){
                            readMatrixReport();
                            echo '<h5 class="text-center">Risk Matrix Report Has Been Generated<h5>';
                        }
                    }
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