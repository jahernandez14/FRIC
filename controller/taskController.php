<?php
    require_once('/xampp/htdocs/FRIC/model/TaskDatabase.php');
    require_once('/xampp/htdocs/FRIC/controller/logController.php');

    function taskOverviewTable(){
        $db = new TaskDatabase();
        $taskArray = $db->getAllTasks();
        return $taskArray;
    }

    function archivedTaskOverviewTable(){
        $db = new TaskDatabase();
        $taskArray = $db->getAllArchivedTasks();
        return $taskArray;
    }

    function readTask($taskName){
        $db = new TaskDatabase();
        $taskArray = $db->getTaskAttributes($taskName);
        return $taskArray;
    }

    function createTask($taskTitle, $associatedSystem, $taskDescription, $taskPriority, $taskProgress, $taskDueDate, $attachment, $associationToTask, $analystAssignment, $collaboratorAssignment, $archiveStatus, $numberOfSubtasks, $numberOfFindings){
        $db = new TaskDatabase();
        new Task($db, $taskTitle, $associatedSystem, $taskDescription, $taskPriority, $taskProgress, $taskDueDate, $attachment, $associationToTask, $analystAssignment, $collaboratorAssignment, $archiveStatus, $numberOfSubtasks, $numberOfFindings);
        logEntry($taskTitle . " Task Created");
    }

    function editTask($id, $taskTitle, $associatedSystem, $taskDescription, $taskPriority, $taskProgress, $taskDueDate, $attachment, $associationToTask, $analystAssignment, $collaboratorAssignment, $archiveStatus, $numberOfSubtasks, $numberOfFindings){
        $db = new TaskDatabase();
        $db->editTaskDocument($id, $taskTitle, $associatedSystem, $taskDescription, $taskPriority, $taskProgress, $taskDueDate, $attachment, $associationToTask, $analystAssignment, $collaboratorAssignment, $archiveStatus, $numberOfSubtasks, $numberOfFindings);
        logEntry($taskTitle . " Task Edited");
    }

    function readUpcomingTasks($fName, $lName){
        $db = new TaskDatabase();
        $taskList = @$db->getAllUpcomingTask($fName, $lName);
        return $taskList;
    }

    function archiveTask($id){
        $db = new TaskDatabase();
        $attr = $db->getTaskAttributes($id);
        $db->editTaskDocument($attr[0],$attr[1],$attr[2],$attr[3],$attr[4],$attr[5],$attr[6],$attr[7],$attr[8],
                              $attr[9],$attr[10],true,$attr[12],$attr[13]);
        logEntry($attr[1] . " has been archived");
    }

    function restoreTask($id){
        $db = new TaskDatabase();
        $attr = $db->getTaskAttributes($id);
        $db->editTaskDocument($attr[0],$attr[1],$attr[2],$attr[3],$attr[4],$attr[5],$attr[6],$attr[7],$attr[8],
                              $attr[9],$attr[10],false,$attr[12],$attr[13]);
        logEntry($attr[1] . " has been restored");
    }
    }

?>