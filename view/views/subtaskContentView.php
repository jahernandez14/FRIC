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
                <h2 class="text-center">Subtask Detailed View</h2>
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
                            <select name="task" class="form-control" id="task" multiple>
                                <option value="task1">Task 1</option>
                                <option value="task2">Task 2</option>
                                <option value="task3">Task 3</option>
                                <option value="task4">Task 4</option>
                            </select>
                        </div>
                        <div class="col-2">
                            <label>Related Subtask(s)</label>
                            <select name="subtask" class="form-control" id="subtask" multiple>
                                <option value="subtask1">Subtask 1</option>
                                <option value="subtask2">Subtask 2</option>
                                <option value="subtask3">Subtask 3</option>
                                <option value="subtask4">Subtask 4</option>
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
                <button type="button" class="btn btn-light">Promote</button>
                <button type="button" class="btn btn-light">Save</button>
                <button type="button" class="btn btn-light">Cancel</button>
            </div>
            <div class="col-2" style="background-color:#202020">
                <?php include '../templates/search.php';?>
            </div>
        </div>
        <?php include '../templates/footer.php';?>
    </div>
</body>
</html>