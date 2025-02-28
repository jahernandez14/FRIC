<!doctype html>
<html lang="en">

<head>
    <?php include '../templates/header.php';
    require_once('../templates/GUIList.php');
    require_once('../../controller/eventController.php');
    require_once('../../controller/configController.php');
    ?>
</head>

<body>
    <div class="container-fluid content">
        <div class="row fluid-col">
            <div id="eventTree" class="dm-popout" style="background-color:#202020">
                <?php include '../templates/eventTree.php'; ?>
            </div>
            <div class="col-10">
                <h2 class="text-center">Event Detailed View</h2>
                <h4>Event Basic Information <a href="../views/helpContentView.php" class="btn-sm btn-light" style=color:black>?</a></h4>
                <?php
                $eventName = urldecode($_SERVER['QUERY_STRING']);
                if ($eventName == "createNew") {
                    $dataArray = array("", "", "", "", "", date("Ymd H:i:s"), "", "", "", "", "", "", array(""), "", "", "", "");
                    $postTag = "postnew";
                    $eventID = 0;
                    $editTag = <<< HEREDOC
                    <input name="numberOfFindings" type="hidden" value="0"/>
                    <input name="numberOfSystems" type="hidden" value="0"/>
                    <input name="progress" type="hidden" value="0"/>
                    HEREDOC;
                } else {
                    $dataArray = readEvent($eventName);
                    $postTag = "postedit";
                    $eventID = $dataArray[0];
                    $numberOfFindings = $dataArray[14];
                    $numberOfSystems = $dataArray[15];
                    $progress = $dataArray[16];
                    $editTag = <<< HEREDOC
                    <input name="eventID" type="hidden" value="$eventID"/>
                    <input name="numberOfFindings" type="hidden" value="$numberOfFindings"/>
                    <input name="numberOfSystems" type="hidden" value="$numberOfSystems"/>
                    <input name="progress" type="hidden" value="$progress"/>
                    HEREDOC;
                }
                $leadAnalystAssignment = @$dataArray[12][0];
                $analystAssignment = @$dataArray[12][1];
                $eventName = $dataArray[1];
                $eventDescription = $dataArray[2];
                $eventType = $dataArray[3];
                $eventVersion = $dataArray[4];
                $assessmentDate = $dataArray[5];
                $organizationName = $dataArray[6];
                $securityClassifcation = $dataArray[7];
                $eventClassification = $dataArray[8];
                $declassificationDate = $dataArray[9];
                $customerName = $dataArray[10];
                $archiveStatus = $dataArray[11];
                $derivedFrom = $dataArray[13];
                echo <<< HEREDOC
                <form method="post" action="eventOverview.php?$postTag">
                $editTag
                    <div class="row">
                        <div class="col">
                            <label>Event Name</label>
                            <input type="text" class="form-control" placeholder="Event Name" value="$eventName" name="eventName">
                        </div>
                        <div class="col-3">
                HEREDOC;
                $typeList = array_merge(array(""),getConfig(implode("_",explode(" ","Event Type"))));
                $eventTypeList = new GUIList("Event Type", "eventType", $typeList, $eventType);
                $eventTypeList->printContents();
            echo <<< HEREDOC
                        </div>
                        <div class="col-2">
                            <label>Event Version</label>
                            <input type="text" class="form-control" placeholder="Event Version" value="$eventVersion" name="eventVersion">
                        </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label>Event Description</label>
                                <textarea class="form-control" id="Desc" rows="5" name="eventDescription">$eventDescription</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label>Organization Name</label>
                                <input type="text" class="form-control" placeholder="Org Name" value="$organizationName" name="organizationName">
                            </div>
                            <div class="col-2">
                                <label>Assessment Date</label>
                                <input type="text" class="form-control" placeholder="Date" value="$assessmentDate" name="assessmentDate">
                            </div>
                            <div class="col-4">
                                <label>Security Classification Title Guide</label>
                                <input type="text" class="form-control" placeholder="" value="$securityClassifcation" name="securityClassification">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label>Client Name</label>
                                <input type="text" class="form-control" placeholder="Client Name" value="$customerName" name="customerName">
                            </div>
                            <div class="col-3">
                        HEREDOC;
                        $classList = array_merge(array(""),getConfig(implode("_",explode(" ","Event Classification"))));
                        $eventClassificationList = new GUIList("Event Classification", "eventClassification", $classList, $eventClassification);
                        $eventClassificationList->printContents();
                        echo <<< HEREDOC
                        </div>
                        <div class="col-3">
                            <label>Declassification Date</label>
                            <input type="text" class="form-control" placeholder="" value="$declassificationDate" name="declassificationDate">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <label>Derived From</label>
                HEREDOC;


                require_once('/xampp/htdocs/FRIC/controller/analystController.php');
                $placeholder = "Analyst (none detected)";
                $analystList = analystNames();
                if (count($analystList) > 0) {
                    $placeholder = "Analyst";
                }
                echo <<< LIST
                                <input id = "derivedFrom" type="text" list="analystNames" placeholder= "$placeholder" value="$derivedFrom"
                                class="form-control" name= "derivedFrom">
                                <datalist id="analystNames">
                            LIST;

                $i = 0;
                while ($i < count($analystList)) {
                    echo '<option value = "' . $analystList[$i][1] . '">' . $analystList[$i][2] . " " . $analystList[$i][3],  "</option>";
                    $i++;
                }
                echo "</datalist></div></div>";

                /*
                            echo <<< EVENTTEAMINFO
                                <h4><br></br>Event Team Information</h4>
                                <script>
                                    var leadAnalystCount = 0;
                                    function addLeadAnalyst() {
                                        var numbering = updateLeadAnalystCount("add");
                                        var newRow = document.createElement("div");
                                        var rowClass = document.createAttribute("class");
                                        var rowID = document.createAttribute("id");
                                        rowClass.value = "row";
                                        rowID.value = "leadAnalystRow" + numbering;
                                        newRow.attributes.setNamedItem(rowClass);
                                        newRow.attributes.setNamedItem(rowID);
                                        var firstColumn = document.createElement("div");
                                        var firstColClass = document.createAttribute("class");
                                        firstColClass.value = "col-3";
                                        firstColumn.attributes.setNamedItem(firstColClass);
                                        var newSelect = document.createElement("select");
                                        var selectName = document.createAttribute("name");
                                        var selectClass = document.createAttribute("class);
                                        selectName.value = "leadAnalyst" + numbering;
                                        selectClass.value = "form-control";

                                    }
                                    function updateLeadAnalystCount(leadAnalystAction) {
                                        if(leadAnalystAction == "add") {
                                            leadAnalystCount++;
                                        }
                                        if(leadAnalystAction == "remove") {
                                            leadAnalystCount--;
                                        }
                                        return leadAnalystCount.toString();
                                    }
                                </script>
                                <div class="col-10">
                                    <div id="leadAnalystRows">
                                        <div class="row">
                                            <h5>Lead Analyst &nbsp;</h5>
                                            <button class="btn btn-sm btn-light" type="button" onclick="addLeadAnalyst()">+</button>
                                        </div>
                                        <p></p>
                                        <div class="row">
                                            <div class="col-3">
                                                <select name="leadAnalystActions" class="form-control" id="leadAnalystActions">
                                                    <option value="Remove">Edit</option>
                                                    <option value="Edit">Remove</option>
                                                    <option value="Sync">Sync</option>
                                                </select>
                                            </div>
                                            <div class="col-3">
                                                <select name="leadAnalysts" class="form-control"
                                                    id="leadAnalysts">
                                                    <option value="am.123.1.123.2">am.123.1.123.2</option>
                                                    <option value="mm.123.1.123.3">mm.123.1.123.3</option>
                                                    <option value="sr.123.1.123.4">sr.123.1.123.4</option>
                                                </select>
                                            </div>
                                            <button class="btn btn-sm btn-light" type="button" onclick="removeLeadAnalyst()">Remove</button>
                                        </div>
                                    </div>
                                    <br></br>
                                </div>
                                <div class="col-10">
                                    <div class="row">
                                        <h5>Analyst &nbsp;</h5>
                                        <button class="btn btn-sm btn-light" type="button">+</button>
                                    </div>
                                    <p></p>
                                    <div class="row">
                                        <div class="col-3">
                                            <select name="Confidentiality" class="form-control" id="confidentiality">
                                                <option value="Remove">Edit</option>
                                                <option value="Edit">Remove</option>
                                                <option value="Sync">Sync</option>
                                            </select>
                                        </div>
                                        <div class="col-3">
                                            <select name="Confidentiality" onchange="javascript:handleSelect()" class="form-control"
                                                id="confidentiality">
                                                <option value="am.123.1.123.2">am.123.1.123.2</option>
                                                <option value="mm.123.1.123.3">mm.123.1.123.3</option>
                                                <option value="sr.123.1.123.4">sr.123.1.123.4</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col"><br />
                                            <button class="btn btn-sm btn-light" type="submit">Save</button>
                                            <a class="btn btn-sm btn-light" role="button"
                                                style=color:black>Archive</a>
                                            <a href="../views/eventOverview.php" class="btn btn-sm btn-light" role="button"
                                                style=color:black>Cancel</a>
                                        </div>
                                    </div>
                                </div>
                            EVENTTEAMINFO;
                            */

                ?>
                <h4><br></br>Event Team Information</h4>

                <div class=col-10>
                    <div class="row">
                    <?php
                    require_once("../../controller/analystController.php");

                    $leadAnalystList = leadNames();//array();
                    $analystList = nonLeadNames();
                    //$analystTable = analystNames();
                    //for ($i = 0; $i < sizeof($analystTable); $i++) {
                    //    $analystList[$i] = $analystTable[$i][2] . " " . $analystTable[$i][3];
                    //}

                echo <<< HEREDOC
                    <br></br>
                    <div class="row">
                    
                    <div class="col-1"></div>
                        <div class="col-12">
                HEREDOC;
                $leadAnalystGUIList = new GUIList("Lead Analyst(s)", "leadAnalystAssignment", $leadAnalystList, $leadAnalystAssignment, TRUE);
                $leadAnalystGUIList->printContents();
                echo <<< HEREDOC
                        </div>
                        <div class="col-1"></div>
                        <div class="col-12">
                HEREDOC;
                $analystGUIList = new GUIList("Analyst(s)", "analystAssignment", $analystList, $analystAssignment, TRUE);
                $analystGUIList->printContents();
                echo <<< HEREDOC
                        </div>
                    </div>
                    <br></br>
                HEREDOC;
            ?>
            </div>
                    </div>
                    <p></p>
                    
                    <br></br>
                    <div class="row">
                        <button class="btn btn-md btn-light" type="submit">Save</button>
                        </form>
                        <form method="post" action="eventOverview.php?archive">
                            <?php
                            echo <<< HEREDOC
                            <input type="hidden" name="id[]" id="id" value="$eventID">&nbsp;&nbsp;
                            HEREDOC;
                            ?>
                            <button class="btn btn-md btn-light" type="submit">Archive</button>&nbsp;&nbsp;&nbsp;
                        </form>
                        <a href="../views/eventOverview.php" class="btn btn-md btn-light" role="button" style=color:black>Cancel</a>
                    </div>
            </div>
            <div class="col-2" style="background-color:#202020">
                <?php include '../templates/search.php'; ?>
            </div>
        </div>
        <?php include '../templates/footer.php'; ?>
    </div>
</body>

</html>