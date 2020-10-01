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
                <!-- Start setup content-->
                <h2>Finding and Reporting Information Console (FRIC)</h2>
                <div class="input-group">
                        <?php 
                            require_once('/xampp/htdocs/FRIC/controller/eventController.php');
                            $placeholder = "There is no existing event in your local system";
                            $eventList = eventNames();
                            if(count($eventList) > 0){
                                $placeholder = "Events have been created, check list or visit the event section.";
                            }
                            echo <<< LIST
                                <input type="text" list="eventNames" placeholder= "$placeholder"
                                class="form-control" />
                                <datalist id="eventNames">
                            LIST;

                            $i=0;
                            while($i < count($eventList)){
                                echo "<option>" . $eventList[$i][0] ."</option>";
                                $i++;
                            }
                        ?>
                    </datalist>
                </div>
                Please enter your initials:
                <div class="input-group">
                    <form method="post" class="input-group">
                    <input id="userInitials" type="text" class="form-control" name= 'userInitials'
                        placeholder="Initials" required>

                </div>
                <div class="form-group">
                    <label for="setupAction">Please select an option:</label>
                    <select class="form-control" id="setupAction">
                        <option>Create a new event (any existing event will be archived)</option>
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
                    
                    </form>

                <?php
                    if (isset($_POST['Submit'])) {
                        $_SESSION["initials"] = $_POST['userInitials'];
                        $_SESSION["loggedIn"] = true;
                    }
                ?>
                    <p></p>
                    <a href="../views/eventOverview.php" class="btn btn-sm btn-light" style="color:black">Submit</a>
                    &nbsp;
                    <a href="../views/eventOverview.php" class="btn btn-sm btn-light" style="color:black">Cancel</a>

            </div>
            <div class="col-2" style="background-color:#202020">
                <?php include '../templates/search.php';?>
            </div>
        </div>
        <?php include '../templates/footer.php';?>
    </div>
</body>
</html>