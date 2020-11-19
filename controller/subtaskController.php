<?php
    require_once('/xampp/htdocs/FRIC/model/subTaskDatabase.php');
    require_once('/xampp/htdocs/FRIC/controller/logController.php');

    function subTaskOverviewTable(){
        $db = new SubTaskDatabase();
        $subTaskArray = $db->getAllSubTasks();
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
?>