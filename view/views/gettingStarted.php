<!doctype html>
<html lang="en">

<head>
    <a id="startPage"></a>
    <?php include '../templates/header.php';?>
</head>

<body>

    <div class="container-fluid content">
        <div class="row">
            <div id="eventTree" class="dm-popout" style="background-color:#202020">
                <?php include '../templates/eventTree.php';?>
            </div>
            <div class="col-10">
                <h3 class="text-center"><strong>Setting Up Device</strong></h3>
                <div style="background-color:#FFFFFF; color:black;" class="col-8 container fluid-col">
                    <ul>
                        <li>&bull;MongoDB</li>
                        <li>&bull;Server Info</li>
                        <li>&bull;Linux Installation</li>
                        <li>&bull;Windows installation?</li>
                        <li>&bull;FAQ</li>
                        <li>&bull;Common Problems</li>
                </div>
            </div>
            <div class="col-2" style="background-color:#202020">
                <?php include '../templates/search.php';?>
            </div>
        </div>
        <?php include '../templates/footer.php';?>
    </div>
</body>
</html>