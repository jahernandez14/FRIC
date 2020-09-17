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
                    <h2 class = "text-center">System Overview Table</h2>
                    <a href="../views/helpContentView.php" class="btn-sm btn-light" style=color:black>+</a>
                    <br></br>
                    <table class="table table-light table-striped">
                        <thead>
                            <tr>
                                <th scope="col"><input type="checkbox"></th>
                                <th scope="col">
                                    System &nbsp;
                                    <div class="btn-group-vertical">
                                        <button class="btn btn-sm btn-secondary py-0" style="font-size: .6em;">&uarr;</button>
                                        <button class="btn btn-sm btn-secondary py-0" style="font-size: .6em;">&darr;</button>
                                    </div>
                                </th>
                                <th scope="col">
                                    No. of Systems &nbsp;
                                    <div class="btn-group-vertical">
                                        <button class="btn btn-sm btn-secondary py-0" style="font-size: .6em;">&uarr;</button>
                                        <button class="btn btn-sm btn-secondary py-0" style="font-size: .6em;">&darr;</button>
                                    </div>
                                </th>
                                <th scope="col">
                                    No. of Findings &nbsp;
                                    <div class="btn-group-vertical">
                                        <button class="btn btn-sm btn-secondary py-0" style="font-size: .6em;">&uarr;</button>
                                        <button class="btn btn-sm btn-secondary py-0" style="font-size: .6em;">&darr;</button>
                                    </div>
                                </th>
                                <th scope="col">
                                    Progress &nbsp;
                                    <div class="btn-group-vertical">
                                        <button class="btn btn-sm btn-secondary py-0" style="font-size: .6em;">&uarr;</button>
                                        <button class="btn btn-sm btn-secondary py-0" style="font-size: .6em;">&darr;</button>
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
                    <h4>Event Basic Information <a href="../views/helpContentView.php" class="btn-sm btn-light" style=color:black>?</a></h4>
                    <h2 class = "text-center">System Detailed View</h2>
                    <h4>System Information</h4>
                    <form>
                        <div class="row">
                            <div class="col">
                                <label>System Name</label>
                                <input type="text" class="form-control" placeholder="Name">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label>System Description</label>
                                <textarea class="form-control" id="Desc" rows="5"></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label>System Location</label>
                                <input type="text" class="form-control" placeholder="Place">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-3">
                                <label>System Router</label>
                                <input type="text" class="form-control" placeholder="127.0.0.1">
                            </div>
                            <div class="col-2">
                                <label>System Switch</label>
                                <input type="text" class="form-control" placeholder="#">
                            </div>
                            <div class="col-2">
                                <label>System Room</label>
                                <input type="text" class="form-control" placeholder="Room #">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label>Test Plan</label>
                                <textarea class="form-control" id="Desc" rows="5"></textarea>
                            </div>
                        </div>
                        <br>
                    </form>
                    <!--System categorization; 3 dropdown menu-->
                    <h3>
                    System Categorization</h5></br>
                    <div class="row">
                        <div class="col">
                            <label>Confidentiality</label>
                            <select name="Confidentiality" class="form-control" id="confidentiality">
                                <option value="Conf Value 1">Low</option>
                                <option value="Conf Value 2">Medium</option>
                                <option value="Conf Value 3">High</option>
                                <option value="Conf Value 4">Information</option>
                            </select>
                        </div>
                        <div class="col">
                            <label>Integrity</label>
                            <select name="Integrity" class="form-control" id="integrity">
                                <option value="Integ Value 1">Low</option>
                                <option value="Integ Value 2">Medium</option>
                                <option value="Integ Value 3">High</option>
                                <option value="Integ Value 4">Information</option>
                            </select>
                        </div>
                        <div class="col">
                            <label>Availability</label>
                            <select name="Availability" class="form-control" id="availability">
                                <option value="Avail Value 1">Low</option>
                                <option value="Avail Value 2">Medium</option>
                                <option value="Avail Value 3">High</option>
                                <option value="Avail Value 4">Information</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col"><br/>
                            <button type="button" class="btn btn-light">Save</button>
                            <button type="button" class="btn btn-light">Archive</button>
                            <button type="button" class="btn btn-light">Cancel</button>
                        </div>
                    </div>
                    <br>
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