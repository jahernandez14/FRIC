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
            <h2 class = "text-center">Event Overview Table</h2>
            <table class="table table-light table-striped">
                <thead>
                    <tr>
                    <th scope="col"><input type="checkbox"></th>
                    <th scope="col">Event Name &nbsp;<button>&uarr;</button><button>&darr;</button></th>
                    <th scope="col">No. of Systems &nbsp;<button>&uarr;</button><button>&darr;</button></th>
                    <th scope="col">No. of Findings &nbsp;<button>&uarr;</button><button>&darr;</button></th>
                    <th scope="col">Progress &nbsp;<button>&uarr;</button><button>&darr;</button></th>
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

                <h2 class = "text-center">Event Detailed View</h2>
                <h4>Event Basic Information</h4>
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
                <h4><br/>Event Team Information</h4>
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