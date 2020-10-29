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
                <div class="input-group">
                    <form method="post" class="input-group">
                </div>
                Select Analyst Initials:
                <div class="input-group" method = "post">
                        <?php 
                            require_once('/xampp/htdocs/FRIC/controller/analystController.php');
                            $placeholder = "No Analyst have been added to FRIC";
                            $analystList = analystNames();
                            if(count($analystList) > 0){
                                $placeholder = "Analysts have been created, Select current user";
                            }
                            echo <<< LIST
                                <input id = 'initials' type="text" list="analystNames" placeholder= "$placeholder"
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
                <div class="input-group">
                    <form method="post" class="input-group">
                    <input id="userIP" type="text" class="form-control" name= 'userIP' placeholder="IP">
                </div>
                <div class="form-group">
                    <label for="setupAction">Please select an option:</label>
                    <select class="form-control" id="setupAction">
                        <option>Create a new event (any existing event will be archived)</option>
                        <option>Edit IP address</option>
                    </select>
                </div>
                First time sync with lead analyst. Please enter the lead analyst's IP:
                <div class="input-group">
                    <input type="text" list="leadAnalystIP" placeholder="IP Address" class="form-control" />
                    <datalist id="leadAnalystIP">
                        <option>192.168.1.1</option>
                        <option>10.0.0.1</option>
                        <option>10.0.0.2</option>
                    </datalist>
                </div>
                <br>
                <input class="btn btn-sm btn-light" name='Submit' type="submit" value="Submit">
                <a href="../views/eventOverview.php" class="btn btn-sm btn-light" style="color:black">Cancel</a>
                <!-- <input name="submit" type="button" onclick="location.href= 'google.com'"/>Test -->
                    </form>

                <?php
                    if (isset($_POST['Submit'])){
                        update(1, $_POST['initials'], $_POST['userIP']);
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