<!doctype html>
<html lang="en">

<head>
    <?php include '../templates/header.php';?>
</head>

<body>
    <div class="container-fluid content">
        <div class="row fluid-col">
            <div id="eventTree" class="dm-popout" style="background-color:#202020">
                <?php include '../templates/eventTree.php';?>
            </div>
            <div class="col-10">
                <?php 
                include '../templates/table.php';
                include '/xampp/htdocs/FRIC/controller/taskController.php';

                if($_SERVER['QUERY_STRING'] == "postnew") {
                    createSystem($_POST["systemName"], $_POST["systemDescription"], $_POST["systemLocation"], $_POST["systemRouter"], $_POST["systemSwitch"], $_POST["systemRoom"], $_POST["testPlan"], $_POST["confidentiality"], $_POST["integrity"], $_POST["availability"], 0, 0, "In Progress");
                    createTask($_POST["taskTitle"], $_POST["associatedSystem"], $_POST["taskDescription"], $_POST["taskPriority"], $_POST["taskProgress"], $_POST["taskDueDate"], $_POST["attachment"], $_POST["associationToTask"], $_POST["analystAssignment"], $_POST["collaboratorAssignment"], $_POST["archiveStatus"], $_POST["numberOfSubtasks"], $_POST["numberOfFindings"]);
                }

                if($_SERVER['QUERY_STRING'] == "postedit") {
                    editSystem($_POST["systemID"], $_POST["systemName"], $_POST["systemDescription"], $_POST["systemLocation"], $_POST["systemRouter"], $_POST["systemSwitch"], $_POST["systemRoom"], $_POST["testPlan"], $_POST["confidentiality"], $_POST["integrity"], $_POST["availability"], FALSE, $_POST["numberOfTasks"], $_POST["numberOfFindings"], $_POST["progress"]);
                }

                $taskTable = table::tableByType("Task Overview", taskOverviewTable());
                $taskTable->printTable();
                ?>










                <h2 class="text-center">Task Overview</h2>
                <a href="../views/helpContentView.php" class="btn-sm btn-light" style=color:black>+</a>
                <br></br>
                <table class="table table-light table-striped">
                    <thead>
                        <tr>
                            <th scope="col"><input type="checkbox"></th>
                            <th scope="col">Title&nbsp;
                                <div class="btn-group-vertical">
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&uarr;</button>
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&darr;</button>
                                </div>
                            </th>
                            <th scope="col">System&nbsp;
                                <div class="btn-group-vertical">
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&uarr;</button>
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&darr;</button>
                                </div>
                            </th>
                            <th scope="col">Analyst&nbsp;
                                <div class="btn-group-vertical">
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&uarr;</button>
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&darr;</button>
                                </div>
                            </th>
                            <th scope="col">Priority&nbsp;
                                <div class="btn-group-vertical">
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&uarr;</button>
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&darr;</button>
                                </div>
                            </th>
                            <th scope="col">Progress&nbsp;
                                <div class="btn-group-vertical">
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&uarr;</button>
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&darr;</button>
                                </div>
                            </th>
                            <th scope="col">No. of Subtask&nbsp;
                                <div class="btn-group-vertical">
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&uarr;</button>
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&darr;</button>
                                </div>
                            </th>
                            <th scope="col">No. of Findings&nbsp;
                                <div class="btn-group-vertical">
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&uarr;</button>
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&darr;</button>
                                </div>
                            </th>
                            <th scope="col">Due Date&nbsp;
                                <div class="btn-group-vertical">
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&uarr;</button>
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&darr;</button>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="col"><input type="checkbox"></th>
                            <td>Task 1</td>
                            <td>System 3</td>
                            <td>am.123.1.123.2</td>
                            <td>High</td>
                            <td>In Progress</td>
                            <td>0</td>
                            <td>3</td>
                            <td>9/12/2020</td>
                        </tr>
                        <tr>
                            <th scope="col"><input type="checkbox"></th>
                            <td>Task 1</td>
                            <td>System 3</td>
                            <td>am.123.1.123.2</td>
                            <td>High</td>
                            <td>In Progress</td>
                            <td>0</td>
                            <td>3</td>
                            <td>9/12/2020</td>
                        </tr>
                        <tr>
                            <th scope="col"><input type="checkbox"></th>
                            <td>Task 1</td>
                            <td>System 3</td>
                            <td>am.123.1.123.2</td>
                            <td>High</td>
                            <td>In Progress</td>
                            <td>0</td>
                            <td>3</td>
                            <td>9/12/2020</td>
                        </tr>
                        <tr>
                            <th scope="col"><input type="checkbox"></th>
                            <td>Task 1</td>
                            <td>System 3</td>
                            <td>am.123.1.123.2</td>
                            <td>High</td>
                            <td>In Progress</td>
                            <td>0</td>
                            <td>3</td>
                            <td>9/12/2020</td>
                        </tr>
                        <tr>
                            <th scope="col"><input type="checkbox"></th>
                            <td>Task 1</td>
                            <td>System 3</td>
                            <td>am.123.1.123.2</td>
                            <td>High</td>
                            <td>In Progress</td>
                            <td>0</td>
                            <td>3</td>
                            <td>9/12/2020</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-2" style="background-color:#202020">
                <?php include '../templates/search.php';?>
            </div>
        </div>
        <?php include '../templates/footer.php';?>
    </div>
</body>
</html>