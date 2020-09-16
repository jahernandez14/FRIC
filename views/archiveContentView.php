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
                <!--Code Goes Here-->
                <form>
                  <h2 class="text-center">Archived Tasks</h2>
                  <div class="row">
                    <h5>[INSERT TASK OVERVIEW TABLE]</h5>
                  </div>
                  <button type="button" class="btn btn-light">Restore</button><br><br>
                  <h2 class="text-center">Archived Subtasks</h2>
                  <div class="row">
                    <h5>[INSERT SUBTASK OVERVIEW TABLE]</h5>
                  </div>
                  <button type="button" class="btn btn-light">Restore</button><br><br>
                  <h2 class="text-center">Archived Findings</h2>
                  <div class="row">
                    <h5>[INSERT FINDINGS OVERVIEW TABLE]</h5>
                  </div>
                  <button type="button" class="btn btn-light">Restore</button><br><br>
                  <h2 class="text-center">Archived Systems</h2>
                  <div class="row">
                    <?php include '../views/systemOverviewTable.php';?>
                  </div>
                  <button type="button" class="btn btn-light">Restore</button><br><br>
                </form>
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
