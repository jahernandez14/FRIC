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
                    $associationToTask = @implode(",",$dataArray[8]);
                    $analystAssignment = @implode(",",$dataArray[9]);
                    $collaboratorAssignment = @implode(",",$dataArray[10]);
                    /* editTag contents to add hidden fields, to POST things that aren't edited here */
                    $editTag = <<< HEREDOC
                    <input name="taskID" type="hidden" value="$taskID"/>
                    <input name="attachment" type="hidden" value=" "/>
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

                    $systemTable = systemOverviewTable();
                    for($i=0; $i<sizeof($systemTable); $i++){
                        $systemList[$i] = $systemTable[$i][1];
                    }
                    $analystTable = analystNames();
                    for($i=0; $i<sizeof($analystTable); $i++){
                        $analystList[$i] = $analystTable[$i][2]." ".$analystTable[$i][3];
                    }
                    $taskTable = taskOverviewTable();
                    for($i=0; $i<sizeof($taskTable); $i++){
                        $taskList[$i] = $taskTable[$i][1];
                    }

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
                                        <label>System</label>
                                        <select name="associatedSystem" class="form-control" id="system">
                                        <option></option>
                            HEREDOC;
                                foreach($systemList as $system) {
                                    $selected = "";
                                    if ($system == $associatedSystem) $selected = " selected";
                                    echo <<< OPTIONOVER
                                    <option value="$system"$selected>$system</option>
                                    OPTIONOVER;
                                }
                            echo <<< HEREDOC
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
                                        <label>Related Task(s)</label>
                                        <select name='associationToTask[]' class="form-control" multiple>

                            HEREDOC;
                                foreach($taskList as $task) {
                                    $selected="";
                                    if(in_array($task, explode(",",$associationToTask))) {
                                        $selected=" selected";
                                    }
                                    echo <<< OPTIONOVER
                                        <option value="$task"$selected>$task</option>

                                    OPTIONOVER;
                                }
                            echo <<< HEREDOC
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