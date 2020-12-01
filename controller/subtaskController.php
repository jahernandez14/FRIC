<?php
    require_once('/xampp/htdocs/FRIC/model/subTaskDatabase.php');
    require_once('/xampp/htdocs/FRIC/controller/logController.php');

    function subTaskOverviewTable(){
        $db = new SubTaskDatabase();
        $subTaskArray = $db->getAllSubTasks();
        return $subTaskArray;
    }

    function archivedSubTaskOverviewTable(){
        $db = new SubTaskDatabase();
        $subTaskArray = $db->getAllArchivedSubTasks();
        return $subTaskArray;
    }

    function readSubTask($subTaskName){
        $db = new SubTaskDatabase();
        $subTaskArray = $db->getSubTaskAttributes($subTaskName);
        return $subTaskArray;
    }

    function createSubTask($taskTitle, $associatedTask, $taskDescription, $taskProgress, $taskDueDate, $attachment, $associationToSubtask, $analystAssignment, $collaboratorAssignment, $archiveStatus, $numberOfFindings){
        $db = new SubTaskDatabase();
        new subTask($db, $taskTitle, $associatedTask, $taskDescription, $taskProgress, $taskDueDate, $attachment, $associationToSubtask, $analystAssignment, $collaboratorAssignment, $archiveStatus, $numberOfFindings);
        logEntry($taskTitle . " Subtask Created");
    }

    function editSubTask($id, $taskTitle, $associatedTask, $taskDescription, $taskProgress, $taskDueDate, $attachment, $associationToSubtask, $analystAssignment, $collaboratorAssignment, $archiveStatus, $numberOfFindings){
        $db = new SubTaskDatabase();
        $db->editSubTaskDocument($id, $taskTitle, $associatedTask, $taskDescription, $taskProgress, $taskDueDate, $attachment, $associationToSubtask, $analystAssignment, $collaboratorAssignment, $archiveStatus, $numberOfFindings);
        logEntry($taskTitle . "Subtask Edited");
    }

    function readUpcomingSubTasks($fName, $lName){
        $db = new SubTaskDatabase();
        $list = @$db->getAllUpcomingSubtask($fName, $lName);
        return $list;
    }

    function archiveSubTask($id){
        $db = new subTaskDatabase();
        $attr = $db->getSubTaskAttributes($id);
        $db->editSubTaskDocument($attr[0],$attr[1],$attr[2],$attr[3],$attr[4],$attr[5],$attr[6],$attr[7],$attr[8],
                              $attr[9],$attr[10],true,$attr[12],$attr[13]);
        logEntry($attr[1] . " has been archived");
    }

    function restoreSubTask($id){
        $db = new subTaskDatabase();
        $attr = $db->getSubTaskAttributes($id);
        $db->editSubTaskDocument($attr[0],$attr[1],$attr[2],$attr[3],$attr[4],$attr[5],$attr[6],$attr[7],$attr[8],
                              $attr[9],$attr[10],false,$attr[12],$attr[13]);
        logEntry($attr[1] . " has been restored");
    }
?>