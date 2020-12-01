<!doctype html>
<html lang="en">

<head>
    <?php include '../templates/header.php';
    require_once('../../controller/logController.php');
    ?>
</head>

<body>
    <div class="container-fluid content">
        <div class="row fluid-col">
            <div id="eventTree" class="dm-popout" style="background-color:#202020">
                <?php include '../templates/eventTree.php';?>
            </div>
            <div class="col-10">
                <h2 class = "text-center">Transaction Log</h2>
                <table class="table table-light table-striped">
                <thead>
                        <tr>
                            <th scope="col">DateTime &nbsp;
                                <div class="btn-group-vertical">
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&uarr;</button>
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&darr;</button>
                                </div>
                            </th>
                            <th scope="col">Action Performed &nbsp;
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
                        </tr>
                </thead>
                <tbody>
                <?php
                    $logTable = logTable();
                    $i = 0;
                    while($i < count($logTable)){
                        echo '<tr>';
                        echo '<td>' . $logTable[$i][1] . '</td>';
                        echo '<td>' . $logTable[$i][2] . '</td>';
                        echo '<td>' . $logTable[$i][3] . '</td>';
                        echo '</tr>';
                        $i++;
                    }
                ?>
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