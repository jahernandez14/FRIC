<!doctype html>
<html lang="en">

<head>
    <?php include '../templates/header.php';?>
</head>

<body>
    <div class="container-fluid">
        <div class="row fluid-col">
            <div class="col-2" style="background-color:#202020">
                <?php include '../templates/eventTree.php';?>
            </div>
            <div class="col-8">
                <h2 class="text-center">Event Overview Table</h2>
                <a href="../views/helpContentView.php" class="btn-sm btn-light" style=color:black>+</a>
                <br></br>
                <table class="table table-light table-striped">
                    <thead>
                        <tr>
                            <th scope="col"><input type="checkbox"></th>
                            <th scope="col">Event Name &nbsp;
                                <div class="btn-group-vertical">
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&uarr;</button>
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&darr;</button>
                                </div>
                            </th>
                            <th scope="col">No. of Systems &nbsp;
                                <div class="btn-group-vertical">
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&uarr;</button>
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&darr;</button>
                                </div>
                            </th>
                            <th scope="col">No. of Findings &nbsp;
                                <div class="btn-group-vertical">
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&uarr;</button>
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&darr;</button>
                                </div>
                            </th>
                            <th scope="col">Progress &nbsp;
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
                            <td>Event 1</td>
                            <td>2</td>
                            <td>5</td>
                            <td>In Progress</td>
                        </tr>
                        <tr>
                            <th scope="col"><input type="checkbox"></th>
                            <td>Event 2</td>
                            <td>3</td>
                            <td>4</td>
                            <td>Assigned</td>
                        </tr>
                        <tr>
                            <th scope="col"><input type="checkbox"></th>
                            <td>Event 3</td>
                            <td>5</td>
                            <td>2</td>
                            <td>In Progress</td>
                        </tr>
                        <tr>
                            <th scope="col"><input type="checkbox"></th>
                            <td>Event 4</td>
                            <td>2</td>
                            <td>5</td>
                            <td>In Progress</td>
                        </tr>
                        <tr>
                            <th scope="col"><input type="checkbox"></th>
                            <td>Event 5</td>
                            <td>12</td>
                            <td>0</td>
                            <td>In Progress</td>
                        </tr>
                    </tbody>
                </table>
                <button type="button" class="btn btn-light">Delete</button>
                <button type="button" class="btn btn-light">Save</button>
                <button type="button" class="btn btn-light">Cancel</button>
                <h2 class="text-center">Event Detailed View</h2>
                <h4>Event Basic Information <a href="../views/helpContentView.php" class="btn-sm btn-light"
                        style=color:black>?</a></h4>
                <form>
                    <div class="row">
                        <div class="col">
                            <label>Event Name</label>
                            <input type="text" class="form-control" placeholder="Event 1">
                        </div>
                        <div class="col-3">
                            <label>Event Type</label>
                            <input type="text" class="form-control" placeholder="Event Type">
                        </div>
                        <div class="col-2">
                            <label>Event Version</label>
                            <input type="text" class="form-control" placeholder="Event Version">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label>Event Description</label>
                            <textarea class="form-control" id="Desc" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label>Organization Name</label>
                            <input type="text" class="form-control" placeholder="Org Name">
                        </div>
                        <div class="col-2">
                            <label>Assessment Data</label>
                            <input type="text" class="form-control" placeholder="3/3/2020">
                        </div>
                        <div class="col-4">
                            <label>Security Classification Title Guide</label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label>Client Name</label>
                            <input type="text" class="form-control" placeholder="Client Name">
                        </div>
                        <div class="col-3">
                            <label>Event Classification</label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                        <div class="col-3">
                            <label>Declassification Date</label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div>
                </form>
                <h4><br />Event Team Information</h4>

                <div class=col-10>
                    <div class="row">
                        <h5>Lead Analyst &nbsp;<br /><br /></h5>
                        <form method="post">
                            <input type="submit" name="addEdit" class="btn btn-light btn-sm" value="+">
                        </form>
                    </div>
                    <div class="row">
                        <div class="col-1">
                            <input type="checkbox" class="form-control">
                        </div>
                        <div class="col-3">
                            <select name="Confidentiality" class="form-control" id="confidentiality">
                                <option value="Remove">Edit</option>
                                <option value="Edit">Remove</option>
                                <option value="Sync">Sync</option>
                            </select>
                        </div>

                        <div class="col-3">
                            <select name="Confidentiality" onchange="javascript:handleSelect()" class="form-control"
                                id="confidentiality">
                                <option value="am.123.1.123.2">am.123.1.123.2</option>
                                <option value="mm.123.1.123.3">mm.123.1.123.3</option>
                                <option value="sr.123.1.123.4">sr.123.1.123.4</option>
                            </select>
                        </div>
                    </div>
                    <br></br>
                    <div class="row">
                        <h5>Analyst &nbsp;<br /><br /></h5>
                        <form method="post">
                            <input type="submit" name="sync" class="btn btn-light btn-sm" value="+">
                        </form>
                    </div>
                    <div class="row">
                        <div class="col-1">
                            <input type="checkbox" class="form-control">
                        </div>
                        <div class="col-3">
                            <select name="Confidentiality" class="form-control" id="confidentiality">
                                <option value="Remove">Edit</option>
                                <option value="Edit">Remove</option>
                                <option value="Sync">Sync</option>
                            </select>
                        </div>

                        <div class="col-3">
                            <select name="Confidentiality" onchange="javascript:handleSelect()" class="form-control"
                                id="confidentiality">
                                <option value="am.123.1.123.2">am.123.1.123.2</option>
                                <option value="mm.123.1.123.3">mm.123.1.123.3</option>
                                <option value="sr.123.1.123.4">sr.123.1.123.4</option>
                            </select>
                        </div>

                        <script type="text/javascript">
                        function handleSelect() {
                            window.location = "../views/analystProgressSummaryContentView.php";
                        }
                        </script>
                    </div>
                </div>
            </div>
            <div class="col-2" style="background-color:#202020">
                <?php include '../templates/search.php';?>
            </div>
        </div>
    </div>
</body>
<footer class="footer">
    <?php include '../templates/footer.php';?>
</footer>

</html>