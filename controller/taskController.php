<?php
    require_once('/xampp/htdocs/FRIC/model/TaskDatabase.php');
    require_once('/xampp/htdocs/FRIC/controller/logController.php');

    function taskOverviewTable(){
        $db = new TaskDatabase();
        $taskArray = $db->getAllTasks();
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
?>