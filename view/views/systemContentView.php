<!doctype html>
<html lang="en">

<head>
    <?php include '../templates/header.php';
    require_once('../../controller/systemController.php');
    ?>
</head>

<body>
    <div class="container-fluid content">
        <div class="row fluid-col">
            <div id="eventTree" class="dm-popout" style="background-color:#202020">
                <?php include '../templates/eventTree.php'; ?>
            </div>
            <div class="col-10">
                <h2 class="text-center">System Detailed View</h2>
                <h4>System Information</h4>
                <?php
                $systemName = urldecode($_SERVER['QUERY_STRING']);
                if ($systemName == "createNew") {
                    $dataArray = array("", "", "", "", "", "", "", "", "", "", "", "", "", "");
                    $postTag = "postnew";
                    $systemID=0;
                    $editTag = "";
                    $confidentiality1Selected = "";
                    $confidentiality2Selected = "";
                    $confidentiality3Selected = "";
                    $confidentialityINFOSelected = "";
                    $integrity1Selected = "";
                    $integrity2Selected = "";
                    $integrity3Selected = "";
                    $integrityINFOSelected = "";
                    $availability1Selected = "";
                    $availability2Selected = "";
                    $availability3Selected = "";
                    $availabilityINFOSelected = "";
                } else {
                    $dataArray = readSystem($systemName);
                    $postTag = "postedit";
                    $systemID = $dataArray[0];
                    $confidentiality = $dataArray[8];
                    $integrity = $dataArray[9];
                    $availability = $dataArray[10];
                    $numberOfTasks = $dataArray[11];
                    $numberOfFindings = $dataArray[12];
                    $progress = $dataArray[13];
                    $editTag = <<< HEREDOC
                        <input name="systemID" type="hidden" value="$systemID"/>
                        <input name="numberOfTasks" type="hidden" value="$numberOfTasks"/>
                        <input name="numberOfFindings" type="hidden" value="$numberOfFindings"/>
                        <input name="progress" type="hidden" value="$progress"/>
                        HEREDOC;
                    $confidentiality1Selected = "";
                    $confidentiality2Selected = "";
                    $confidentiality3Selected = "";
                    $confidentialityINFOSelected = "";
                    switch ($confidentiality) {
                        case "1":
                            $confidentiality1Selected = " selected";
                            break;
                        case "2":
                            $confidentiality2Selected = " selected";
                            break;
                        case "3":
                            $confidentiality3Selected = " selected";
                            break;
                        case "INFO":
                            $confidentialityINFOSelected = " selected";
                            break;
                        default:
                            break;
                    }
                    $integrity1Selected = "";
                    $integrity2Selected = "";
                    $integrity3Selected = "";
                    $integrityINFOSelected = "";
                    switch ($integrity) {
                        case "1":
                            $integrity1Selected = " selected";
                            break;
                        case "2":
                            $integrity2Selected = " selected";
                            break;
                        case "3":
                            $integrity3Selected = " selected";
                            break;
                        case "INFO":
                            $integrityINFOSelected = " selected";
                            break;
                        default:
                            break;
                    }
                    $availability1Selected = "";
                    $availability2Selected = "";
                    $availability3Selected = "";
                    $availabilityINFOSelected = "";
                    switch ($availability) {
                        case "1":
                            $availability1Selected = " selected";
                            break;
                        case "2":
                            $availability2Selected = " selected";
                            break;
                        case "3":
                            $availability3Selected = " selected";
                            break;
                        case "INFO":
                            $availabilityINFOSelected = " selected";
                            break;
                        default:
                            break;
                    }
                }
                $systemName = $dataArray[1];
                $systemDescription = $dataArray[2];
                $systemLocation = $dataArray[3];
                $systemRouter = $dataArray[4];
                $systemSwitch = $dataArray[5];
                $systemRoom = $dataArray[6];
                $testPlan = $dataArray[7];
                echo <<< HEREDOC
                    <form method="post" action="systemOverview.php?$postTag">
                    $editTag
                        <div class="row">
                            <div class="col">
                                <label>System Name</label>
                                <input type="text" class="form-control" placeholder="System Name" value="$systemName" name="systemName">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label>System Description</label>
                                <textarea class="form-control" id="Desc" rows="5" name="systemDescription">$systemDescription</textarea>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label>System Location</label>
                                <input type="text" class="form-control" placeholder="Location" value="$systemLocation" name="systemLocation">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-3">
                                <label>System Router</label>
                                <input type="text" class="form-control" placeholder="0.0.0.0" value="$systemRouter" name="systemRouter">
                            </div>
                            <div class="col-2">
                                <label>System Switch</label>
                                <input type="text" class="form-control" placeholder="#" value="$systemSwitch" name="systemSwitch">
                            </div>
                            <div class="col-2">
                                <label>System Room</label>
                                <input type="text" class="form-control" placeholder="Room #" value="$systemRoom" name="systemRoom">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label>Test Plan</label>
                                <textarea class="form-control" id="Desc" rows="5" name="testPlan">$testPlan</textarea>
                            </div>
                        </div>
                        <br>
                        <!--System categorization; 3 dropdown menu-->
                        <h3>System Categorization</h3></br>
                        <div class="row">
                            <div class="col">
                                <label>Confidentiality</label>
                                <select name="confidentiality" class="form-control" id="confidentiality">
                                    <option value="1"$confidentiality1Selected>Low</option>
                                    <option value="2"$confidentiality2Selected>Medium</option>
                                    <option value="3"$confidentiality3Selected>High</option>
                                    <option value="INFO"$confidentialityINFOSelected>Information</option>
                                </select>
                            </div>
                            <div class="col">
                                <label>Integrity</label>
                                <select name="integrity" class="form-control" id="integrity">
                                    <option value="1"$integrity1Selected>Low</option>
                                    <option value="2"$integrity2Selected>Medium</option>
                                    <option value="3"$integrity3Selected>High</option>
                                    <option value="INFO"$integrityINFOSelected>Information</option>
                                </select>
                            </div>
                            <div class="col">
                                <label>Availability</label>
                                <select name="availability" class="form-control" id="availability">
                                    <option value="1"$availability1Selected>Low</option>
                                    <option value="2"$availability2Selected>Medium</option>
                                    <option value="3"$availability3Selected>High</option>
                                    <option value="INFO"$availabilityINFOSelected>Information</option>
                                </select>
                            </div>
                        </div>
                HEREDOC;
                ?>
                <br></br>
                <div class="row">
                    &nbsp;&nbsp;<button class="btn btn-md btn-light" type="submit">Save</button>&nbsp;&nbsp;
                    </form>
                    <form method="post" action="systemOverview.php?archive">
                        <?php
                        echo <<< HEREDOC
                        <input type="hidden" name="id[]" id="id" value="$systemID">
                        HEREDOC;
                        ?>
                        <button class="btn btn-md btn-light" type="submit">Archive</button>&nbsp;&nbsp;
                    </form>
                    <a href="../views/systemOverview.php" class="btn btn-md btn-light" role="button" style=color:black>Cancel</a>
                </div>
                <br>
            </div>
            <div class="col-2" style="background-color:#202020">
                <?php include '../templates/search.php'; ?>
            </div>
        </div>
        <?php include '../templates/footer.php'; ?>
    </div>
</body>

</html>