<!doctype html>
<html lang="en">

<head>
    <?php
        include '../templates/header.php';
        include '../templates/table.php';
        //include '../templates/dummyData.php';
    ?>
</head>

<body>
    <div class="container-fluid content">
        <div class="row fluid-col-extra">
            <div id="eventTree" class="dm-popout" style="background-color:#202020">
                <?php include '../templates/eventTree.php';?>
            </div>
            <div class="col-10">
            <?php
            require_once('../templates/configList.php');
            require_once('../../controller/configController.php');
            if(array_key_exists("removeItem", $_POST)) {
                $listName = implode("_",explode(" ",$_POST["removeItem"]));
                foreach($_POST[$listName] as $listItem) {
                    @removeItem($listName, $listItem);
                }
            }
            if(array_key_exists("addItem", $_POST)) {
                $listName = implode("_",explode(" ",$_POST["addItem"]));
                @addItem($listName, $_POST["newItem"]);
            }
            
            if(array_key_exists("default", $_POST)) {
                @defaultConfig();
            }
            ?>
            <form method="post" action="configurationContentView.php">
            <div class="row-6">
                <div class="col-3">
                        <br></br>
                        <button class="btn btn-sm btn-light" type="submit" name="default" value="default">Load Default Config</button>
                </div>
            </div>
            <br></br>
            </form>
            <?php
            $listArray = array("Finding Type", "Posture", "Threat Level", "Impact Level", "Finding Classification", //DONE, DONE, DONE, DONE, DONE
                                "Countermeasure", "Event Classification", "Event Type", "Finding Impact Level", //DONE, DONE, DONE, DONE
                                "Severity Category Code", "Event Rules", "Progress"); //DONE, DONE, DONE
            foreach($listArray as $listPrint) new configList($listPrint, getConfig(implode("_",explode(" ",$listPrint))));
            ?>

                <h3>Report Template</h3>
                <table class="table table-light table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Report Template&nbsp;
                                <div class="btn-group-vertical">
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&uarr;</button>
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&darr;</button>
                                </div>
                            </th>
                            <th scope="col">Description&nbsp;
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
                            <td>Risk Matrix</td>
                            <td>Matrix assessing likelihood and severity of risk.</td>
                        </tr>
                        <tr>
                            <td>Emergent Result Brief</td>
                            <td>A brief summarizing findings, systems, impacts, and risks.</td>
                        </tr>
                        <tr>
                            <td>Final Technical Result</td>
                            <td>A more detailed report with all findings, and a summary of the likelihood, impacts, and
                                risks.</td>
                    </tbody>
                </table>
            </div>
            <!--Config content end-->
            <div class="col-2" style="background-color:#202020">
                <?php include '../templates/search.php';?>
            </div>
        </div>
    </div>
    <?php include '../templates/footer.php';?>
</body>

</html>