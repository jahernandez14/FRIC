<!doctype html>
<html lang="en">

<head>
    <?php include '../templates/header.php';?>
</head>

<body>
    <div class="container-fluid content">
        <div class="row fluid-col">
            <div id="eventTree" class="dm-popout overlay" style="background-color:#202020">
                <?php include '../templates/eventTree.php';?>
            </div>
            <div class="col-10">
                <!--Code Goes Here-->
                <form class="col-12">
                    <h2 class="text-center">Archived Tasks</h2>
                    <div class="row">
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
                                    <td>InProgress</td>
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
                                    <td>InProgress</td>
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
                                    <td>InProgress</td>
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
                                    <td>InProgress</td>
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
                                    <td>InProgress</td>
                                    <td>0</td>
                                    <td>3</td>
                                    <td>9/12/2020</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <button type="button" class="btn btn-light">Restore</button>
                    <h2 class="text-center">Archived Subtasks</h2>
                    <div class="row">
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
                                    <th scope="col">Task&nbsp;
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
                                    <th scope="col">Progress&nbsp;
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
                                    <td>Subtask 1</td>
                                    <td>Task 3</td>
                                    <td>am.123.1.123.2</td>
                                    <td>InProgress</td>
                                    <td>3</td>
                                    <td>9/12/2020</td>
                                </tr>
                                <tr>
                                    <th scope="col"><input type="checkbox"></th>
                                    <td>Subtask 1</td>
                                    <td>Task 3</td>
                                    <td>am.123.1.123.2</td>
                                    <td>InProgress</td>
                                    <td>3</td>
                                    <td>9/12/2020</td>
                                </tr>
                                <tr>
                                    <th scope="col"><input type="checkbox"></th>
                                    <td>Subtask 1</td>
                                    <td>Task 3</td>
                                    <td>am.123.1.123.2</td>
                                    <td>InProgress</td>
                                    <td>3</td>
                                    <td>9/12/2020</td>
                                </tr>
                                <tr>
                                    <th scope="col"><input type="checkbox"></th>
                                    <td>Subtask 1</td>
                                    <td>Task 3</td>
                                    <td>am.123.1.123.2</td>
                                    <td>InProgress</td>
                                    <td>3</td>
                                    <td>9/12/2020</td>
                                </tr>
                                <tr>
                                    <th scope="col"><input type="checkbox"></th>
                                    <td>Subtask 1</td>
                                    <td>Task 3</td>
                                    <td>am.123.1.123.2</td>
                                    <td>InProgress</td>
                                    <td>3</td>
                                    <td>9/12/2020</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <button type="button" class="btn btn-light">Restore</button>
                    <h2 class="text-center">Archived Findings</h2>
                    <div class="row">
                        <table class="table table-light table-striped">
                            <thead>
                                <tr>
                                    <th scope="col"><input type="checkbox"></th>
                                    <th scope="col">ID &nbsp;
                                        <div class="btn-group-vertical">
                                            <button class="btn btn-sm btn-secondary py-0"
                                                style="font-size: .6em;">&uarr;</button>
                                            <button class="btn btn-sm btn-secondary py-0"
                                                style="font-size: .6em;">&darr;</button>
                                        </div>
                                    </th>
                                    <th scope="col">Title &nbsp;
                                        <div class="btn-group-vertical">
                                            <button class="btn btn-sm btn-secondary py-0"
                                                style="font-size: .6em;">&uarr;</button>
                                            <button class="btn btn-sm btn-secondary py-0"
                                                style="font-size: .6em;">&darr;</button>
                                        </div>
                                    </th>
                                    <th scope="col">System &nbsp;
                                        <div class="btn-group-vertical">
                                            <button class="btn btn-sm btn-secondary py-0"
                                                style="font-size: .6em;">&uarr;</button>
                                            <button class="btn btn-sm btn-secondary py-0"
                                                style="font-size: .6em;">&darr;</button>
                                        </div>
                                    </th>
                                    <th scope="col">Task &nbsp;
                                        <div class="btn-group-vertical">
                                            <button class="btn btn-sm btn-secondary py-0"
                                                style="font-size: .6em;">&uarr;</button>
                                            <button class="btn btn-sm btn-secondary py-0"
                                                style="font-size: .6em;">&darr;</button>
                                        </div>
                                    </th>
                                    <th scope="col">Subtask &nbsp;
                                        <div class="btn-group-vertical">
                                            <button class="btn btn-sm btn-secondary py-0"
                                                style="font-size: .6em;">&uarr;</button>
                                            <button class="btn btn-sm btn-secondary py-0"
                                                style="font-size: .6em;">&darr;</button>
                                        </div>
                                    </th>
                                    <th scope="col">Analyst &nbsp;
                                        <div class="btn-group-vertical">
                                            <button class="btn btn-sm btn-secondary py-0"
                                                style="font-size: .6em;">&uarr;</button>
                                            <button class="btn btn-sm btn-secondary py-0"
                                                style="font-size: .6em;">&darr;</button>
                                        </div>
                                    </th>
                                    <th scope="col">Status &nbsp;
                                        <div class="btn-group-vertical">
                                            <button class="btn btn-sm btn-secondary py-0"
                                                style="font-size: .6em;">&uarr;</button>
                                            <button class="btn btn-sm btn-secondary py-0"
                                                style="font-size: .6em;">&darr;</button>
                                        </div>
                                    </th>
                                    <th scope="col">Classification &nbsp;
                                        <div class="btn-group-vertical">
                                            <button class="btn btn-sm btn-secondary py-0"
                                                style="font-size: .6em;">&uarr;</button>
                                            <button class="btn btn-sm btn-secondary py-0"
                                                style="font-size: .6em;">&darr;</button>
                                        </div>
                                    </th>
                                    <th scope="col">Type &nbsp;
                                        <div class="btn-group-vertical">
                                            <button class="btn btn-sm btn-secondary py-0"
                                                style="font-size: .6em;">&uarr;</button>
                                            <button class="btn btn-sm btn-secondary py-0"
                                                style="font-size: .6em;">&darr;</button>
                                        </div>
                                    </th>
                                    <th scope="col">Risk &nbsp;
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
                                    <td>1</td>
                                    <td>Finding 1</td>
                                    <td>System 1</td>
                                    <td>Task 2</td>
                                    <td>Subtask 3</td>
                                    <td>am.123.1.123.2</td>
                                    <td>Open</td>
                                    <td>Credentials Complexity</td>
                                    <td>Vulnerability</td>
                                    <td>VL</td>
                                </tr>
                                <tr>
                                    <th scope="col"><input type="checkbox"></th>
                                    <td>2</td>
                                    <td>Finding 2</td>
                                    <td>System 4</td>
                                    <td>Task 3</td>
                                    <td>Subtask 3</td>
                                    <td>wb.123.1.123.2</td>
                                    <td>Closed</td>
                                    <td>Autentication Bypass</td>
                                    <td>Vulnerability</td>
                                    <td>VL</td>
                                </tr>
                                <tr>
                                    <th scope="col"><input type="checkbox"></th>
                                    <td>3</td>
                                    <td>Finding 3</td>
                                    <td>System 1</td>
                                    <td>Task 1</td>
                                    <td>Subtask 3</td>
                                    <td>am.123.1.123.2</td>
                                    <td>Open</td>
                                    <td>Credentials Complexity</td>
                                    <td>Vulnerability</td>
                                    <td>L</td>
                                </tr>
                                <tr>
                                    <th scope="col"><input type="checkbox"></th>
                                    <td>4</td>
                                    <td>Finding 4</td>
                                    <td>System 6</td>
                                    <td>Task 5</td>
                                    <td>Subtask 3</td>
                                    <td>jh.123.1.123.2</td>
                                    <td>Closed</td>
                                    <td>Plain Text Web Login</td>
                                    <td>Vulnerability</td>
                                    <td>VH</td>
                                </tr>
                                <tr>
                                    <th scope="col"><input type="checkbox"></th>
                                    <td>5</td>
                                    <td>Finding 5</td>
                                    <td>System 1</td>
                                    <td>Task 6</td>
                                    <td>Subtask 3</td>
                                    <td>do.123.1.123.2</td>
                                    <td>Closed</td>
                                    <td>Credentials Complexity</td>
                                    <td>Information</td>
                                    <td>VL</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <button type="button" class="btn btn-light">Restore</button><br>
                    <h2 class="text-center">Archived Systems</h2>
                    <div class="row">
                        <!--INSERT TABLE CODE-->
                        <table class="table table-light table-striped">
                            <thead>
                                <tr>
                                    <th scope="col"><input type="checkbox"></th>
                                    <th scope="col">
                                        System &nbsp;
                                        <div class="btn-group-vertical">
                                            <button class="btn btn-sm btn-secondary py-0"
                                                style="font-size: .6em;">&uarr;</button>
                                            <button class="btn btn-sm btn-secondary py-0"
                                                style="font-size: .6em;">&darr;</button>
                                        </div>
                                    </th>
                                    <th scope="col">
                                        No. of Systems &nbsp;
                                        <div class="btn-group-vertical">
                                            <button class="btn btn-sm btn-secondary py-0"
                                                style="font-size: .6em;">&uarr;</button>
                                            <button class="btn btn-sm btn-secondary py-0"
                                                style="font-size: .6em;">&darr;</button>
                                        </div>
                                    </th>
                                    <th scope="col">
                                        No. of Findings &nbsp;
                                        <div class="btn-group-vertical">
                                            <button class="btn btn-sm btn-secondary py-0"
                                                style="font-size: .6em;">&uarr;</button>
                                            <button class="btn btn-sm btn-secondary py-0"
                                                style="font-size: .6em;">&darr;</button>
                                        </div>
                                    </th>
                                    <th scope="col">
                                        Progress &nbsp;
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
                                    <td>System 1</td>
                                    <td>2</td>
                                    <td>5</td>
                                    <td>In Progress</td>
                                </tr>
                                <tr>
                                    <th scope="col"><input type="checkbox"></th>
                                    <td>System 2</td>
                                    <td>3</td>
                                    <td>4</td>
                                    <td>Assigned</td>
                                </tr>
                                <tr>
                                    <th scope="col"><input type="checkbox"></th>
                                    <td>System 3</td>
                                    <td>5</td>
                                    <td>2</td>
                                    <td>In Progress</td>
                                </tr>
                                <tr>
                            </tbody>
                        </table>
                    </div>
                    <button type="button" class="btn btn-light">Restore</button><br><br><br>
                </form>
            </div>
            <div class="col-2" style="background-color:#202020">
                <?php include '../templates/search.php';?>
            </div>
            <div class="container-fluid">
                <?php include '../templates/footer.php';?>
            </div>
        </div>
    </div>
</body>
</html>