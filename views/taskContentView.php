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
            <h2 class = "text-center">Task Overview</h2>
            <button type="button" class="btn btn-light">+</button>
            <table class="table table-light table-striped">
                <thead>
                    <tr>
                    <th scope="col"><input type="checkbox"></th>
                    <th scope="col">Title &nbsp;<button>&uarr;</button><button>&darr;</button></th>
                    <th scope="col">System &nbsp;<button>&uarr;</button><button>&darr;</button></th>
                    <th scope="col">Analyst &nbsp;<button>&uarr;</button><button>&darr;</button></th>
                    <th scope="col">Priority &nbsp;<button>&uarr;</button><button>&darr;</button></th>
                    <th scope="col">Progress &nbsp;<button>&uarr;</button><button>&darr;</button></th>
                    <th scope="col">No. of Subtask &nbsp;<button>&uarr;</button><button>&darr;</button></th>
                    <th scope="col">No. of Findings &nbsp;<button>&uarr;</button><button>&darr;</button></th>
                    <th scope="col">Due Date &nbsp;<button>&uarr;</button><button>&darr;</button></th>
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

                <h2 class = "text-center">Task Detailed View</h2>
                <form>
                    <div class="row">
                        <div class="col">
                        <label>Title</label>
                        <input type="text" class="form-control" placeholder="Task 1">
                        </div>
                        <div class="col-3">
                        <label>System</label>
                        <select name="system" class="form-control" id="system">
                            <option value="system1">System 1</option>
                            <option value="system2">System 2</option>
                            <option value="system3">System 3</option>
                            <option value="system4">System 4</option>
                        </select>
                        </div>
                        <div class="col-2">
                        <label>Priority</label>
                        <select name="priority" class="form-control" id="priority">
                            <option value="low">Low</option>
                            <option value="medium">Medium</option>
                            <option value="high">High</option>
                        </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                        <label>Description</label>
                        <textarea class="form-control" id="Desc" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                        <label>Progress</label>
                        <select name="progress" class="form-control" id="progress">
                            <option value="notStarted">Not Started</option>
                            <option value="assigned">Assigned</option>
                            <option value="transferred">Transferred</option>
                            <option value="inProgress">In Progress</option>
                            <option value="complete">Complete</option>
                            <option value="notApplicable">Not Applicable</option>
                        </select>
                        </div>
                        <div class="col-3">
                        <label>System</label>
                        <select name="system" class="form-control" id="system" multiple>
                            <option value="system1">System 1</option>
                            <option value="system2">System 2</option>
                            <option value="system3">System 3</option>
                            <option value="system4">System 4</option>
                        </select>
                        </div>
                        <div class="col-2">
                        <label>Analyst(s)</label>
                        <select name="analyst" class="form-control" id="analyst" multiple>
                            <option value="analyst1">am.123.1.123.2</option>
                            <option value="analyst2">kl.123.1.127.5</option>
                            <option value="analyst3">jh.123.1.122.5</option>
                            <option value="analyst4">wb.123.1.124.2</option>
                        </select>
                        </div>
                        <div class="col-2">
                        <label>Collaborator(s)</label>
                        <select name="collaborator" class="form-control" id="collaborator" multiple>
                            <option value="analyst1">am.123.1.123.2</option>
                            <option value="analyst2">kl.123.1.127.5</option>
                            <option value="analyst3">jh.123.1.122.5</option>
                            <option value="analyst4">wb.123.1.124.2</option>
                        </select>
                        </div>
                        <div class="col-2">
                        <label>Related Task(s)</label>
                        <select name="relatedTask" class="form-control" id="relatedTask" multiple>
                            <option value="relatedTask1">Task 1</option>
                            <option value="relatedTask2">Task 2</option>
                            <option value="relatedTask3">Task 3</option>
                            <option value="relatedTask4">Task 4</option>
                        </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                        <label>Date</label>
                        <input type="date" class="form-control" id="date">
                        </div>
                        <div class="col-2">
                        <label>Attachments</label>
                        <input type="button" class="form-control" id="evidence" value="Choose File">
                        </div>
                    </div>
                </form>
                <br>
                </br>
                <button type="button" class="btn btn-light">Archive</button>
                <button type="button" class="btn btn-light">Demote</button>
                <button type="button" class="btn btn-light">Save</button>
                <button type="button" class="btn btn-light">Cancel</button>
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