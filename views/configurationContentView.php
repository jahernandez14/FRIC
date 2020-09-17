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
        <div class="col-8"> <!--Config content start-->

            <h3>Finding Type</h3>

            <h3>Posture</h3>

            <h3>Threat Level</h3>

            <h3>Impact Level</h3>

            <h3>Finding Classification</h3>

            <h3>Countermeasure</h3>

            <h3>Event Classification</h3>

            <h3>Level</h3>

            <h3>Event Type</h3>

            <h3>Finding Impact Level</h3>

            <h3>Severity Category Code</h3>

            <h3>Progress</h3>

            <h3>Event Rules</h3>

            <h3>Report Template</h3>

            <h3>Notification</h3>

        </div> <!--Config content end-->
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