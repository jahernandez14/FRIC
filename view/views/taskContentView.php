<!doctype html>
<html lang="en">

<head>
    <?php include '../templates/header.php';
    require_once('../../controller/taskController.php');
    require_once('../../controller/analystController.php');
    require_once('../../controller/systemController.php')?>
</head>

<body>
    <div class="container-fluid content">
        <div class="row fluid-col">
            <div id="eventTree" class="dm-popout" style="background-color:#202020">
                <?php include '../templates/eventTree.php';?>
            </div>
            <div class="col-10">
                <h2 class="text-center">Task Detailed View</h2>
                <?php
                $taskTitle = urldecode($_SERVER['QUERY_STRING']);
                if($taskTitle == "createNew") {
                    $dataArray = array();
                    $postTag = "postnew";
                    $editTag = "";
                    /* tagging for systems */
                } else {
                    $dataArray = readTask($taskName);
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
                    <input name="attachment" type="hidden" value="$attachment"/>
                    <input name="archiveStatus" type="hidden" value="$archiveStatus"/>
                    <input name="numberOfSubtasks" type="hidden" value="$numberOfSubtasks"/>
                    <input name="numberOfFindings" type="hidden" value="$numberOfFindings"/>
                    HEREDOC;

                    // preset selections (priority, progress):

                    $priorityLowSelected = "";
                    $priorityMediumSelected = "";
                    $priorityHighSelected = "";
                    switch ($taskPriority) {
                        case "low":
                            $priorityLowSelected = " selected";
                            break;
                        case "medium":
                            $priorityMediumSelected = " selected";
                            break;
                        case "high":
                            $priorityHighSelected = " selected";
                            break;
                        default:
                            break;
                    }

                    $notStartedSelected = "";
                    $assignedSelected = "";
                    $transferredSelected = "";
                    $inProgressSelected = "";
                    $completeSelected = "";
                    $notApplicableSelected = "";
                    switch ($taskProgress) {
                        case "notStarted":
                            $notStartedSelected = " selected";
                            break;
                        case "assigned":
                            $assignedSelected = " selected";
                            break;
                        case "transferred":
                            $transferredSelected = " selected";
                            break;
                        case "inProgress":
                            $inProgressSelected = " selected";
                            break;
                        case "complete":
                            $completeSelected = " selected";
                            break;
                        case "notApplicable":
                            $notApplicableSelected = " selected";
                            break;
                        default:
                            break;
                    }

                    // prepping programmatic selections (systems, assoc. to task, assigned analysts, collaborators):

                    $systemTable = systemOverviewTable();
                    for($i=0; $i<sizeof($systemTable); $i++){
                        $systemList[$i] = $systemTable[$i][1];
                    }
                    $analystTable = analystNames();
                    for($i=0; $i<sizeof($analystTable); $i++){
                        $analystList[$i] = $analystTable[$i][1].".".$analystTable[$i][4];
                    }

                }
                $taskTitle = $dataArray[1];
                $taskDescription = $dataArray[3];
                $taskDueDate = $dataArray[6];

                echo <<< HEREDOC
                <form>
                    <div class="row">
                        <div class="col">
                            <label>Title</label>
                            <input type="text" class="form-control" placeholder="Task Name" name="taskName" value="$taskName">
                        </div>
                        <div class="col-3">
                            <label>System</label>
                            <select name="system" class="form-control" id="system">
                                <option value="system1">System 1</option>
                                <option value="system2">System 2</option>
                                <option value="system3">System 3</option>
                                <option value="system4">System 4</option>
                            </select>
                        </div>
                        <div class="col-2">
                            <label>Priority</label>
                            <select name="taskPriority" class="form-control" id="taskPriority">
                                <option value="low"$priorityLowSelected>Low</option>
                                <option value="medium"$priorityMediumSelected>Medium</option>
                                <option value="high"$priorityHighSelected>High</option>
                            </select>
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
                            <label>Progress</label>
                            <select name="taskProgress" class="form-control" id="taskProgress">
                                <option value="notStarted"$notStartedSelected>Not Started</option>
                                <option value="assigned"$assignedSelected>Assigned</option>
                                <option value="transferred"$transferredSelected>Transferred</option>
                                <option value="inProgress"$inProgressSelected>In Progress</option>
                                <option value="complete"$completeSelected>Complete</option>
                                <option value="notApplicable"$notApplicableSelected>Not Applicable</option>
                            </select>
                        </div>
                        <div class="col-2">
                            <label>Analyst(s)</label>
                            <select name="analyst" class="form-control" id="analyst" multiple>
                                <option value="analyst1">am.123.1.123.2</option>
                                <option value="analyst2">kl.123.1.127.5</option>
                                <option value="analyst3">jh.123.1.122.5</option>
                                <option value="analyst4">wb.123.1.124.2</option>
                            </select>
                        </div>
                        <div class="col-2">
                            <label>Collaborator(s)</label>
                            <select name="collaborator" class="form-control" id="collaborator" multiple>
                                <option value="analyst1">am.123.1.123.2</option>
                                <option value="analyst2">kl.123.1.127.5</option>
                                <option value="analyst3">jh.123.1.122.5</option>
                                <option value="analyst4">wb.123.1.124.2</option>
                            </select>
                        </div>
                        <div class="col-2">
                            <label>Related Task(s)</label>
                            <select name="relatedTask" class="form-control" id="relatedTask" multiple>
                                <option value="relatedTask1">Task 1</option>
                                <option value="relatedTask2">Task 2</option>
                                <option value="relatedTask3">Task 3</option>
                                <option value="relatedTask4">Task 4</option>
                            </select>
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
                    <button type="button" class="btn btn-light">Archive</button>
                    <button type="button" class="btn btn-light">Demote</button>
                    <button type="button" class="btn btn-light">Save</button>
                    <button type="button" class="btn btn-light">Cancel</button>
                </form>
                HEREDOC;
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