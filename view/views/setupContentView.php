<!doctype html>
<html lang="en">

<head>
    <?php include '../templates/header.php';?>
</head>

<body>

    <div class="container-fluid content">
        <div class="row fluid-col-sm">
            <div id="eventTree" class="dm-popout" style="background-color:#202020">
                <?php include '../templates/eventTree.php';?>
            </div>
            <div class="col-10">
                <h2>Finding and Reporting Information Console (FRIC)</h2>
                <form method="POST">
                    Select Analyst Initials:
                    <div class="input-group">
                        <?php 
                            require_once('/xampp/htdocs/FRIC/controller/analystController.php');
                            $placeholder = "No Analyst have been added to FRIC";
                            $analystList = analystNames();
                            if(count($analystList) > 0){
                                $placeholder = "Analysts have been created, Select current user";
                            }
                            echo <<< LIST
                                <input id = 'initials' type="text" list="analystNames" placeholder= "$placeholder required"
                                class="form-control" name= 'initials'>
                                <datalist id="analystNames">
                            LIST;

                            $i=0;
                            while($i < count($analystList)){
                                echo '<option value = "'. $analystList[$i][1] .'">' . $analystList[$i][2] . " " . $analystList[$i][3],  "</option>";
                                $i++;
                            }
                            echo '</datalist>';
                        ?>
                    </div>
                    Please enter your IP:
                    <div class="form-group">
                        <input id="userIP" type="text" class="form-control" name= 'userIP' placeholder="IP" required>
                    </div>
                    <div class="form-group">
                        <label for="leadIP">First time sync with lead analyst. Please enter the lead analyst's IP:</label>
                        <input type="text" id="leadIP" class="form-control"  name="leadIP" placeholder="IP Address">
                    </div>

                    <br>
                    <input class="btn btn-sm btn-light" name='Submit' type="submit" value="Submit">
                    <a href="../views/eventOverview.php" class="btn btn-sm btn-light" style="color:black">Cancel</a>
                 </form>

                            <?php
                                require_once('/xampp/htdocs/FRIC/controller/analystController.php');
                                $analystList = analystNames();
                                if (isset($_POST['Submit'])){
                                    $i =0;
                                    while($i < count($analystList)){
                                        if(array_search($_POST['initials'], $analystList[$i])){
                                            $key = array_search($_POST['initials'], $analystList[$i]);
                                        }
                                        $i++;
                                    }
                                    update(1, $_POST['initials'], $_POST['userIP'],$analystList[$key][2],$analystList[$key][3]);
                                    //echo '<meta http-equiv="refresh" content="0; URL= eventOverview.php"/>';
                                    echo $_SESSION['fName'] . " " . $_SESSION['lName'];
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