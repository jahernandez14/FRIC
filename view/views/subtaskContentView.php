<!doctype html>
<html lang="en">

<head>
    <?php include '../templates/header.php';
    require_once('../../controller/taskController.php');
    require_once('../../controller/subtaskController.php');
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
                <h2 class="text-center">Subtask Detailed View</h2>
                <?php
                $subtaskTitle = urldecode($_SERVER['QUERY_STRING']);
                if($subtaskTitle == "createNew") {
                    $dataArray = array();
                    $postTag = "postnew";
                    $editTag = "";
                    /* tagging for systems */
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
                    $associationToSubtask = @implode(",",$dataArray[7]);
                    $analystAssignment = @implode(",",$dataArray[8]);
                    $collaboratorAssignment = @implode(",",$dataArray[9]);
                    /* editTag contents to add hidden fields, to POST things that aren't edited here */
                    $editTag = <<< HEREDOC
                    <input name="subtaskID" type="hidden" value="$subtaskID"/>
                    <input name="attachment" type="hidden" value=" "/>
                    <input name="archiveStatus" type="hidden" value="$archiveStatus"/>
                    <input name="numberOfFindings" type="hidden" value="$numberOfFindings"/>
                    HEREDOC;

                    // preset selections (priority, progress):

                    $notStartedSelected = "";
                    $assignedSelected = "";
                    $transferredSelected = "";
                    $inProgressSelected = "";
                    $completeSelected = "";
                    $notApplicableSelected = "";
                    switch ($subtaskProgress) {
                        case "not started":
                            $notStartedSelected = " selected";
                            break;
                        case "assigned":
                            $assignedSelected = " selected";
                            break;
                        case "transferred":
                            $transferredSelected = " selected";
                            break;
                        case "in progress":
                            $inProgressSelected = " selected";
                            break;
                        case "complete":
                            $completeSelected = " selected";
                            break;
                        case "not applicable":
                            $notApplicableSelected = " selected";
                            break;
                        default:
                            break;
                    }

                    // prepping programmatic selections (systems, assoc. to task, assigned analysts, collaborators):

                    $analystTable = analystNames();
                    for($i=0; $i<sizeof($analystTable); $i++){
                        $analystList[$i] = $analystTable[$i][2]." ".$analystTable[$i][3];
                    }
                    $taskTable = taskOverviewTable();
                    for($i=0; $i<sizeof($taskTable); $i++){
                        $taskList[$i] = $taskTable[$i][1];
                    }
                    $subtaskTable = subtaskOverviewTable();
                    for($i=0; $i<sizeof($subtaskTable); $i++){
                        $subtaskList[$i] = $subtaskTable[$i][1];
                    }

                }
                $subtaskTitle = $dataArray[1];
                $subtaskDescription = $dataArray[3];
                $subtaskDueDate = $dataArray[5];

                echo <<< HEREDOC
                            <form method="post" action="subtaskOverview.php?$postTag">
                                $editTag
                                <div class="row">
                                    <div class="col">
                                        <label>Title</label>
                                        <input type="text" class="form-control" placeholder="Subtask Name" name="subtaskTitle" value="$subtaskTitle">
                                    </div>
                                    <div class="col-5">
                                        <label>Task</label>
                                        <select name="associatedTask" class="form-control" id="system">
                                        <option></option>
                            HEREDOC;
                                foreach($taskList as $task) {
                                    $selected = "";
                                    if ($task == $associatedTask) $selected = " selected";
                                    echo <<< OPTIONOVER
                                    <option value="$task"$selected>$task</option>
                                    OPTIONOVER;
                                }
                            echo <<< HEREDOC
                                        </select>
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
                                        <label>Progress</label>
                                        <select name="subtaskProgress" class="form-control" id="subtaskProgress">
                                            <option value="not started"$notStartedSelected>Not Started</option>
                                            <option value="assigned"$assignedSelected>Assigned</option>
                                            <option value="transferred"$transferredSelected>Transferred</option>
                                            <option value="in progress"$inProgressSelected>In Progress</option>
                                            <option value="complete"$completeSelected>Complete</option>
                                            <option value="not applicable"$notApplicableSelected>Not Applicable</option>
                                        </select>
                                    </div>
                                    <div class="col-2">
                                        <label>Analyst(s)</label>
                                        <select name='analystAssignment[]' class="form-control" multiple>

                            HEREDOC;
                                foreach($analystList as $analyst) {
                                    $selected="";
                                    if(in_array($analyst, explode(",",$analystAssignment))) {
                                        $selected=" selected";
                                    }
                                    echo <<< OPTIONOVER
                                        <option value="$analyst"$selected>$analyst</option>
                                        
                                    OPTIONOVER;
                                }
                            echo <<< HEREDOC
                                        </select>
                                    </div>
                                    <div class="col-2">
                                        <label>Collaborator(s)</label>
                                        <select name='collaboratorAssignment[]' class="form-control" multiple>

                            HEREDOC;
                                foreach($analystList as $analyst) {
                                    $selected="";
                                    if(in_array($analyst, explode(",",$collaboratorAssignment))) {
                                        $selected=" selected";
                                    }
                                    echo <<< OPTIONOVER
                                        <option value="$analyst"$selected>$analyst</option>

                                    OPTIONOVER;
                                }
                            echo <<< HEREDOC
                                        </select>
                                    </div>
                                    <div class="col-2">
                                        <label>Related Subtask(s)</label>
                                        <select name='associationToSubtask[]' class="form-control" multiple>

                            HEREDOC;
                                foreach($subtaskList as $subtask) {
                                    $selected="";
                                    if(in_array($subtask, explode(",",$associationToSubtask))) {
                                        $selected=" selected";
                                    }
                                    echo <<< OPTIONOVER
                                        <option value="$subtask"$selected>$subtask</option>

                                    OPTIONOVER;
                                }
                            echo <<< HEREDOC
                            </select>
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
                    <button type="button" class="btn btn-sm btn-light">Demote</button>
                    <button class="btn btn-sm btn-light" name="submit" type="submit">Save</button>
                    <a class="btn btn-sm btn-light" role="button"
                        style=color:black>Archive</a>
                    <a href="../views/taskOverview.php" class="btn btn-sm btn-light" role="button"
                        style=color:black>Cancel</a>
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