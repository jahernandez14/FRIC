<!doctype html>
<html lang="en">

<head>
    <?php include '../templates/header.php';
    require_once('../../controller/taskController.php');
    require_once('../../controller/subtaskController.php');
    require_once('../../controller/analystController.php');
    require_once('../../controller/systemController.php');
    require_once('../templates/GUIList.php'); ?>
</head>

<body>
    <div class="container-fluid content">
        <div class="row fluid-col">
            <div id="eventTree" class="dm-popout" style="background-color:#202020">
                <?php include '../templates/eventTree.php';
                require_once('../../controller/configController.php');
                require_once('../templates/GUIList.php');
                 ?>
            </div>
            <div class="col-10">
                <h2 class="text-center">Subtask Detailed View</h2>
                <?php
                //$subtaskProgressArray = array("", "Not Started", "Assigned", "Transferred", "In Progress", "Complete", "Not Applicable");
                $subtaskProgressArray = array_merge(array(""),getConfig(implode("_",explode(" ","Progress"))));
                $subtaskTitle = urldecode($_SERVER['QUERY_STRING']);
                if ($subtaskTitle == "createNew") {
                    $subtaskID = 0;
                    $dataArray = array();
                    $postTag = "postnew";
                    $editTag = "";
                    // things without forms:
                    $attachment = "";
                    $archiveStatus = "";
                    $numberOfFindings = "";
                    // selection box things:
                    $associatedTask = "";
                    $subtaskProgress = "";
                    $associationToSubtask = "";
                    $analystAssignment = "";
                    $collaboratorAssignment = "";
                    $archiveStatus = FALSE;
                    $numberOfFindings = 0;
                    $editTag = <<< HEREDOC
                    <input name="attachment" type="hidden" value=" "/>
                    <input name="archiveStatus" type="hidden" value="$archiveStatus"/>
                    <input name="numberOfFindings" type="hidden" value="$numberOfFindings"/>
                    HEREDOC;
                } else {
                    $dataArray = readsubTask($subtaskTitle);
                    $postTag = "postedit";
                    // things without forms:
                    $subtaskID = $dataArray[0];
                    $attachment = $dataArray[6];
                    $archiveStatus = $dataArray[10];
                    $numberOfFindings = $dataArray[11];
                    // selection box things:
                    $associatedTask = $dataArray[2];
                    $subtaskProgress = $dataArray[4];
                    $associationToSubtask = $dataArray[7];
                    $analystAssignment = $dataArray[8];
                    $collaboratorAssignment = $dataArray[9];
                    /* editTag contents to add hidden fields, to POST things that aren't edited here */
                    $editTag = <<< HEREDOC
                    <input name="subtaskID" type="hidden" value="$subtaskID"/>
                    <input name="attachment" type="hidden" value=" "/>
                    <input name="archiveStatus" type="hidden" value="$archiveStatus"/>
                    <input name="numberOfFindings" type="hidden" value="$numberOfFindings"/>
                    HEREDOC;
                }
                $analystTable = analystNames();
                for ($i = 0; $i < sizeof($analystTable); $i++) {
                    $analystList[$i] = $analystTable[$i][2] . " " . $analystTable[$i][3];
                }
                $taskList[0] = "";
                $taskTable = taskOverviewTable();
                for ($i = 0; $i < sizeof($taskTable); $i++) {
                    $taskList[$i + 1] = $taskTable[$i][1];
                }
                $subtaskTable = subtaskOverviewTable();
                for ($i = 0; $i < sizeof($subtaskTable); $i++) {
                    $subtaskList[$i] = $subtaskTable[$i][1];
                }
                $subtaskTitle = @$dataArray[1];
                $subtaskDescription = @$dataArray[3];
                $subtaskDueDate = @$dataArray[5];
                echo <<< HEREDOC
                            <form method="post" action="subtaskOverview.php?$postTag">
                                $editTag
                                <div class="row">
                                    <div class="col">
                                        <label>Title</label>
                                        <input type="text" class="form-control" placeholder="Subtask Name" name="subtaskTitle" value="$subtaskTitle">
                                    </div>
                                    <div class="col-5">
                            HEREDOC;
                $taskGUIList = new GUIList("Associated Task", "associatedTask", $taskList, $associatedTask);
                $taskGUIList->printContents();
                echo <<< HEREDOC
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label>Description</label>
                                        <textarea class="form-control" id="Desc" rows="5" name="subtaskDescription">$subtaskDescription</textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                            HEREDOC;
                $subtaskProgressList = new GUIList("Progress", "subtaskProgress", $subtaskProgressArray, $subtaskProgress);
                $subtaskProgressList->printContents();
                echo <<< HEREDOC
                                    </div>
                                    <div class="col-2">
                            HEREDOC;
                $analystAssignmentList = new GUIList("Analyst Assignment", "analystAssignment", $analystList, $analystAssignment, TRUE);
                $analystAssignmentList->printContents();
                echo <<< HEREDOC
                                        </select>
                                    </div>
                                    <div class="col-2">

                            HEREDOC;
                $collaboratorAssignmentList = new GUIList("Collaborator Assignment", "collaboratorAssignment", $analystList, $collaboratorAssignment, TRUE);
                $collaboratorAssignmentList->printContents();
                echo <<< HEREDOC
                                    </div>
                                    <div class="col-2">
                            HEREDOC;
                $associatedSubtaskList = new GUIList("Related Subtasks", "associationToSubtask", $subtaskList, $associationToSubtask, TRUE);
                $associatedSubtaskList->printContents();
                echo <<< HEREDOC
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <label>Due Date</label>
                            <input type="date" class="form-control" name="subtaskDueDate" id="date" value="$subtaskDueDate">
                        </div>
                        <div class="col-2">
                            <label>Attachments</label>
                            <input type="button" class="form-control" id="evidence" value="Choose File">
                        </div>
                    </div>
                    <br>
                    </br>
                HEREDOC; ?>
                <div class="row">
                    &nbsp;&nbsp;<button type="button" class="btn btn-md btn-light">Promote</button>&nbsp;&nbsp;
                    <button class="btn btn-md btn-light" type="submit">Save</button>&nbsp;&nbsp;
                    </form>
                    <form method="post" action="subtaskOverview.php?archive">
                        <?php
                        echo <<< HEREDOC
                            <input type="hidden" name="id[]" id="id" value="$subtaskID">
                            HEREDOC;
                        ?>
                        <button class="btn btn-md btn-light" type="submit">Archive</button>&nbsp;&nbsp;
                    </form>
                    <a href="../views/subtaskOverview.php" class="btn btn-md btn-light" role="button" style=color:black>Cancel</a>
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