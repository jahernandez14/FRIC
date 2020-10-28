<?php
    require_once('/xampp/htdocs/FRIC/model/database.php');
    require_once('/xampp/htdocs/FRIC/controller/logController.php');

    function subTaskOverviewTable(){
        $db = new Database();
        $subTaskArray = $db->getAllSubTasks();
        return $subTaskArray;
    }

    function readSubTask($subTaskName){
        $db = new Database();
        $subTaskArray = $db->getSubTaskAttributes($subTaskName);
        return $subTaskArray;
    }

    function createSubTask($taskTitle, $associatedTask, $taskDescription, $taskProgress, $taskDueDate, $attachment, $associationToSubtask, $analystAssignment, $collaboratorAssignment, $archiveStatus, $numberOfFindings){
        $db = new Database();
        new subTask($db, $taskTitle, $associatedTask, $taskDescription, $taskProgress, $taskDueDate, $attachment, $associationToSubtask, $analystAssignment, $collaboratorAssignment, $archiveStatus, $numberOfFindings);
        logEntry($taskTitle . " Subtask Created");
    }

    function editSubTask($id, $db, $taskTitle, $associatedTask, $taskDescription, $taskProgress, $taskDueDate, $attachment, $associationToSubtask, $analystAssignment, $collaboratorAssignment, $archiveStatus, $numberOfFindings){
        $db = new Database();
        $db->editSubTaskDocument($id, $db, $taskTitle, $associatedTask, $taskDescription, $taskProgress, $taskDueDate, $attachment, $associationToSubtask, $analystAssignment, $collaboratorAssignment, $archiveStatus, $numberOfFindings);
        logEntry($taskTitle . "Subtask Edited");
    }
?>