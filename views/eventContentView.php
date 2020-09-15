<!doctype html>
<html lang="en">
<head>
    <?php include '../templates/header.php';?>
</head>
<body>
    <div class="container-fluid">
        <div class="row fluid-col">
            <div class="col-2" style = "background-color:#0f0f0f">
            <?php include '../templates/eventTree.php';?>
            </div>
            <div class="col-8">
            <h2 class = "text-center">Event Overview Table</h2>
            <table class="table table-light table-striped">
                <thead>
                    <tr>
                    <th scope="col"><input type="checkbox"></th>
                    <th scope="col">Event Name</th>
                    <th scope="col">No. of Systems</th>
                    <th scope="col">No. of Findings</th>
                    <th scope="col">Progress</th>
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
            <div class="col-2"  style = "background-color:#0f0f0f">
            <?php include '../templates/search.php';?>
            </div>
        </div>
    </div>
</body>

<footer class="footer">
    <?php include '../templates/footer.php';?>
</footer>
</html>