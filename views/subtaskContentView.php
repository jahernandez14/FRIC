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
            <h1>Subtask Overview</h1>
    <?php
    class SampleSubtask{
        public $title;
        public $task;
        public $analyst;
        public $progress;
        public $numSubtask;
        public $numFindings;
        public $dueDate;

        function __construct($title, $task, $analyst, $progress, $numSubtask, $numFindings, $dueDate){
            $this->title        = $title;
            $this->task         = $task;
            $this->analyst      = $analyst;
            $this->progress     = $progress;
            $this->numSubtask   = $numSubtask;
            $this->numFindings  = $numFindings;
            $this->dueDate      = $dueDate;
        }

    }
    $sampleSubtaskList = array(new SampleSubtask('Subtask 1', 'Task 3', 'am.123.1.123.2', 'InProgress', 0, 3, '9/12/2020'),
    new SampleSubtask('Subtask 2', 'Task 5', 'kl.123.1.127.5', 'InProgress', 2, 5, '9/12/2020'),
    new SampleSubtask('Subtask 3', 'Task 2', 'wb.123.1.124.2', 'Assigned', 0, 0, '9/12/2020'),
    new SampleSubtask('Subtask 4', 'Task 4', 'do.123.1.121.1', 'Complete', 0, 10, '9/12/2020'),
    new SampleSubtask('Subtask 5', 'Task 1', 'jh.123.1.122.5', 'InProgress', 1, 13, '9/12/2020'),
    new SampleSubtask('Subtask 6', 'Task 2', 'am.123.1.123.2', 'Complete', 0, 9, '9/12/2020'),
    new SampleSubtask('Subtask 7', 'Task 6', 'oq.123.1.129.6', 'InProgress', 0, 5, '9/12/2020'),
    new SampleSubtask('Subtask 8', 'Task 7', 'am.123.1.123.2', 'Assigned', 0, 0, '9/12/2020'),
    );
    ?>

    <table border='1'>
        <tr>
            <th></th>
            <?php
            $arrowBtns = "<div class=\"arrow-group\"><button>&uarr;</button><button>&darr;</button></div>";

            print "<th>Title $arrowBtns</th>";
            print "<th>Task $arrowBtns</th>";
            print "<th>Analyst $arrowBtns</th>";
            print "<th>Progress $arrowBtns</th>";
            print "<th>No. of Subtask $arrowBtns</th>";
            print "<th>No. of Findings $arrowBtns</th>";
            print "<th>Due dates $arrowBtns</th>";
            ?>
        <tr>
    <?php
    foreach($sampleSubtaskList as $subtask){
        print "<tr><td><input type =\"checkbox\"></td>";
        print "<td>$subtask->title</td>";
        print "<td>$subtask->task</td>";
        print "<td>$subtask->analyst</td>";
        print "<td>$subtask->progress</td>";
        print "<td>$subtask->numSubtask</td>";
        print "<td>$subtask->numFindings</td>";
        print "<td>$subtask->dueDate</td><tr>";
    }
    ?>
    </table>
    <button type="button">+</button>

    <h1>Subtask Detailed View</h1>

    <button type="button">?</button>
    
    <label for="title">Title:</label>
    <input type="text" id="title" name="title">
    
    <label for="description">Description:</label>
    <input type="text" id="description" name="description">

    <label for="progress">Progress:</label>
    <select name="progress" id="progress">
        <option value="notStarted">Not Started</option>
        <option value="assigned">Assigned</option>
        <option value="transferred">Transferred</option>
        <option value="inProgress">In Progress</option>
        <option value="complete">Complete</option>
        <option value="notApplicable">Not Applicable</option>
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

    <label for="task">Task(s):</label>
    <select name="task" id="task" multiple>
        <option value="task1">System 1</option>
        <option value="task2">System 2</option>
        <option value="task3">System 3</option>
        <option value="task4">System 4</option>
    </select>

    <label for="subtask">Subtask(s):</label>
    <select name="subtask" id="subtask" multiple>
        <option value="subtask1">Task 1</option>
        <option value="subtask2">Task 2</option>
        <option value="subtask3">Task 3</option>
        <option value="subtask4">Task 4</option>
    </select>

    <label type="date">Date:</label>
    <input type="date" id="date", name="date">

    <label type="attachment">Attachments:</label>
    <input type="file" id="attachment", name="attachment">
    <br>

    <button type="button">Archive</button>
    <button type="button">Promote</button>
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