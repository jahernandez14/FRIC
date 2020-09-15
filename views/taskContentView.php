<!doctype html>
<html lang="en">
<head>
    <?php include '../templates/header.php';?>
</head>
<body>
<div class="container-fluid">
        <div class="row fluid-col">
            <div class="col-2" style = "background-color:#202020">
            <?php include '../templates/eventTree.php';?>
            </div>
            <div class="col-8">
            <h1>Task Overview</h1>
    <?php
    class SampleTask{
        public $title;
        public $system;
        public $analyst;
        public $priority;
        public $progress;
        public $numSubtask;
        public $numFindings;
        public $dueDate;

        function __construct($title, $system, $analyst, $priority, $progress, $numSubtask, $numFindings, $dueDate){
            $this->title        = $title;
            $this->system       = $system;
            $this->analyst      = $analyst;
            $this->priority     = $priority;
            $this->progress     = $progress;
            $this->numSubtask   = $numSubtask;
            $this->numFindings  = $numFindings;
            $this->dueDate      = $dueDate;
        }

    }
    $sampleTaskList = array(new SampleTask('Task 1', 'System 3', 'am.123.1.123.2', 'high', 'InProgress', 0, 3, '9/12/2020'),
    new SampleTask('Task 2', 'System 5', 'kl.123.1.127.5', 'low', 'InProgress', 2, 5, '9/12/2020'),
    new SampleTask('Task 3', 'System 2', 'wb.123.1.124.2', 'low', 'Assigned', 0, 0, '9/12/2020'),
    new SampleTask('Task 4', 'System 4', 'do.123.1.121.1', 'high', 'Complete', 0, 10, '9/12/2020'),
    new SampleTask('Task 5', 'System 1', 'jh.123.1.122.5', 'medium', 'InProgress', 1, 13, '9/12/2020'),
    new SampleTask('Task 6', 'System 2', 'am.123.1.123.2', 'high', 'Complete', 0, 9, '9/12/2020'),
    new SampleTask('Task 7', 'System 6', 'oq.123.1.129.6', 'medium', 'InProgress', 0, 5, '9/12/2020'),
    new SampleTask('Task 8', 'System 7', 'am.123.1.123.2', 'low', 'Assigned', 0, 0, '9/12/2020'),
    );
    ?>

    <table border='1'>
        <tr>
            <th></th>
            <?php
            $arrowBtns = "<div class=\"arrow-group\"><button>&uarr;</button><button>&darr;</button></div>";

            print "<th>Title $arrowBtns</th>";
            print "<th>System $arrowBtns</th>";
            print "<th>Analyst $arrowBtns</th>";
            print "<th>Priority $arrowBtns</th>";
            print "<th>Progress $arrowBtns</th>";
            print "<th>No. of Subtask $arrowBtns</th>";
            print "<th>No. of Findings $arrowBtns</th>";
            print "<th>Due dates $arrowBtns</th>";
            ?>
        <tr>
    <?php
    foreach($sampleTaskList as $task){
        print "<tr><td><input type =\"checkbox\"></td>";
        print "<td>$task->title</td>";
        print "<td>$task->system</td>";
        print "<td>$task->analyst</td>";
        print "<td>$task->priority</td>";
        print "<td>$task->progress</td>";
        print "<td>$task->numSubtask</td>";
        print "<td>$task->numFindings</td>";
        print "<td>$task->dueDate</td><tr>";
    }
    ?>
    </table>
    <button type="button">+</button>

    <h1>Task Detailed View</h1>

    <button type="button">?</button>
    
    <label for="title">Title:</label>
    <input type="text" id="title" name="title">
    
    <label for="description">Description:</label>
    <input type="text" id="title" name="title">

    <label for="system">System:</label>
    <select name="system" id="system">
        <option value="system1">System 1</option>
        <option value="system2">System 2</option>
        <option value="system3">System 3</option>
        <option value="system4">System 4</option>
    </select>

    <label for="priority">Priority:</label>
    <select name="priority" id="priority">
        <option value="low">Low</option>
        <option value="medium">Medium</option>
        <option value="high">High</option>
    </select>

    <label for="progress">Progress:</label>
    <select name="progress" id="progress">
        <option value="notStarted">Not Started</option>
        <option value="assigned">Assigned</option>
        <option value="transferred">Transferred</option>
        <option value="inProgress">In Progress</option>
        <option value="complete">Complete</option>
        <option value="notApplicable">Not Applicable</option>
    </select>

    <label for="system">System:</label>
    <select name="system" id="system" multiple>
        <option value="system1">System 1</option>
        <option value="system2">System 2</option>
        <option value="system3">System 3</option>
        <option value="system4">System 4</option>
    </select>

    <label for="analyst">Analyst(s):</label>
    <select name="analyst" id="analyst" multiple>
        <option value="analyst1">am.123.1.123.2</option>
        <option value="analyst2">kl.123.1.127.5</option>
        <option value="analyst3">jh.123.1.122.5</option>
        <option value="analyst4">wb.123.1.124.2</option>
    </select>

    <label for="collaborator">Collaborator(s):</label>
    <select name="collaborator" id="collaborator" multiple>
        <option value="analyst1">am.123.1.123.2</option>
        <option value="analyst2">kl.123.1.127.5</option>
        <option value="analyst3">jh.123.1.122.5</option>
        <option value="analyst4">wb.123.1.124.2</option>
    </select>

    <label for="relatedTask">Related Task(s):</label>
    <select name="relatedTask" id="relatedTask" multiple>
        <option value="relatedTask1">Task 1</option>
        <option value="relatedTask2">Task 2</option>
        <option value="relatedTask3">Task 3</option>
        <option value="relatedTask4">Task 4</option>
    </select>

    <label type="date">Date:</label>
    <input type="date" id="date", name="date">

    <label type="attachment">Attachments:</label>
    <input type="file" id="attachment", name="attachment">
    <br>

    <button type="button">Archive</button>
    <button type="button">Demote</button>
    <button type="button">Save</button>
    <button type="button">Cancel</button>
            </div>
            <div class="col-2"  style = "background-color:#202020">
            <?php include '../templates/search.php';?>
            </div>
        </div>
    </div>
</body>
<footer class="footer">
    <?php include '../templates/footer.php';?>
</footer>
</html>