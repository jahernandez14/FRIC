<!doctype html>
<html lang="en">

<head>
    <?php include '../templates/header.php';
    require_once('../../controller/taskController.php');
    require_once('../../controller/analystController.php');
    require_once('../../controller/systemController.php');
    require_once('../templates/GUIList.php'); ?>
</head>

<body>
    <div class="container-fluid content">
        <div class="row fluid-col">
            <div id="eventTree" class="dm-popout" style="background-color:#202020">
                <?php include '../templates/eventTree.php'; ?>
            </div>
            <div class="col-10">
                <h2 class="text-center">Task Detailed View</h2>
                <?php
                $taskPriorityArray = array("", "Low", "Medium", "High");
                $taskProgressArray = array("", "Not Started", "Assigned", "Transferred", "In Progress", "Complete", "Not Applicable");
                $taskTitle = urldecode($_SERVER['QUERY_STRING']);
                if ($taskTitle == "createNew") {
                    $taskID = 0;
                    $dataArray = array();
                    $postTag = "postnew";
                    // things without forms:
                    $attachment = "";
                    $archiveStatus = "";
                    $numberOfSubtasks = 0;
                    $numberOfFindings = 0;
                    // selection box things:
                    $associatedSystem = "";
                    $taskPriority = "";
                    $taskProgress = "";
                    $associationToTask = "";
                    $analystAssignment = "";
                    $collaboratorAssignment = "";
                    /* editTag contents to add hidden fields, to POST things that aren't edited here */
                    $editTag = <<< HEREDOC
                    <input name="attachment" type="hidden" value=" "/>
                    <input name="archiveStatus" type="hidden" value="$archiveStatus"/>
                    <input name="numberOfSubtasks" type="hidden" value="$numberOfSubtasks"/>
                    <input name="numberOfFindings" type="hidden" value="$numberOfFindings"/>
                    HEREDOC;
                } else {
                    $dataArray = readTask($taskTitle);
                    $postTag = "postedit";
                    // things without forms:
                    $taskID = $dataArray[0];
                    $attachment = $dataArray[7];
                    $archiveStatus = $dataArray[11];
                    $numberOfSubtasks = $dataArray[12];
                    $numberOfFindings = $dataArray[13];
                    // selection box things:
                    $associatedSystem = $dataArray[2];
                    $taskPriority = $dataArray[4];
                    $taskProgress = $dataArray[5];
                    $associationToTask = $dataArray[8];
                    $analystAssignment = $dataArray[9];
                    $collaboratorAssignment = $dataArray[10];
                    /* editTag contents to add hidden fields, to POST things that aren't edited here */
                    $editTag = <<< HEREDOC
                    <input name="taskID" type="hidden" value="$taskID"/>
                    <input name="attachment" type="hidden" value=" "/>
                    <input name="archiveStatus" type="hidden" value="$archiveStatus"/>
                    <input name="numberOfSubtasks" type="hidden" value="$numberOfSubtasks"/>
                    <input name="numberOfFindings" type="hidden" value="$numberOfFindings"/>
                    HEREDOC;
                }
                $systemList[0] = "";
                $systemTable = systemOverviewTable();
                for ($i = 0; $i < sizeof($systemTable); $i++) {
                    $systemList[$i + 1] = $systemTable[$i][1];
                }
                $analystTable = analystNames();
                for ($i = 0; $i < sizeof($analystTable); $i++) {
                    $analystList[$i] = $analystTable[$i][2] . " " . $analystTable[$i][3];
                }
                $taskTable = taskOverviewTable();
                for ($i = 0; $i < sizeof($taskTable); $i++) {
                    $taskList[$i] = $taskTable[$i][1];
                }
                $taskTitle = @$dataArray[1];
                $taskDescription = @$dataArray[3];
                $taskDueDate = @$dataArray[6];

                echo <<< HEREDOC
                            <form method="post" action="taskOverview.php?$postTag">
                                $editTag
                                <div class="row">
                                    <div class="col">
                                        <label>Title</label>
                                        <input type="text" class="form-control" placeholder="Task Name" name="taskTitle" value="$taskTitle">
                                    </div>
                                    <div class="col-3">
                HEREDOC;
                $systemGUIList = new GUIList("Associated System", "associatedSystem", $systemList, $associatedSystem);
                $systemGUIList->printContents();
                echo <<< HEREDOC
                                    </div>
                                    <div class="col-2">
                HEREDOC;
                $priorityList = new GUIList("Priority", "taskPriority", $taskPriorityArray, $taskPriority);
                $priorityList->printContents();
                echo <<< HEREDOC
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label>Description</label>
                                        <textarea class="form-control" id="Desc" rows="5" name="taskDescription">$taskDescription</textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                HEREDOC;
                $progressList = new GUIList("Progress", "taskProgress", $taskProgressArray, $taskProgress);
                $progressList->printContents();
                echo <<< HEREDOC
                                    </div>
                                    <div class="col-2">
                HEREDOC;
                $analystAssignmentList = new GUIList("Analyst(s)", "analystAssignment", $analystList, $analystAssignment, TRUE);
                $analystAssignmentList->printContents();
                echo <<< HEREDOC
                                    </div>
                                    <div class="col-2">
                HEREDOC;
                $collaboratorAssignmentList = new GUIList("Collaborator(s)", "collaboratorAssignment", $analystList, $collaboratorAssignment, TRUE);
                $collaboratorAssignmentList->printContents();
                echo <<< HEREDOC
                                    </div>
                                    <div class="col-2">
                HEREDOC;
                $associationToTaskList = new GUIList("Related Task(s)", "associationToTask", $taskList, $associationToTask, TRUE);
                $associationToTaskList->printContents();
                echo <<< HEREDOC
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <label>Due Date</label>
                            <input type="date" class="form-control" name="taskDueDate" id="date" value="$taskDueDate">
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
                    &nbsp;&nbsp;<button type="button" class="btn btn-md btn-light">Demote</button>&nbsp;&nbsp;
                    <button class="btn btn-md btn-light" type="submit">Save</button>&nbsp;&nbsp;
                    </form>
                    <form method="post" action="taskOverview.php?archive">
                        <?php
                        echo <<< HEREDOC
                            <input type="hidden" name="id[]" id="id" value="$taskID">
                            HEREDOC;
                        ?>
                        <button class="btn btn-md btn-light" type="submit">Archive</button>&nbsp;&nbsp;
                    </form>
                    <a href="../views/taskOverview.php" class="btn btn-md btn-light" role="button" style=color:black>Cancel</a>
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