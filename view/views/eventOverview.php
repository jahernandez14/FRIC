<!doctype html>
<html lang="en">

<head>
    <?php include '../templates/header.php';?>
</head>

<body>
    <div class="container-fluid">
        <div class="row fluid-col">
            <div id="eventTree" class="dm-popout" style="background-color:#202020">
                <?php include '../templates/eventTree.php';?>
            </div>
            <div class="col-10">
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
                </div>
            <div class="col-2" style="background-color:#202020">
                <?php include '../templates/search.php';?>
            </div>
        </div>
        <?php include '../templates/footer.php';?>
    </div>
</body>
</html>