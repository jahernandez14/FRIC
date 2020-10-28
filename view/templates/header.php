<link rel="icon" href="../images/fav.ico">
<div class="fixed-top" style="background-color: black;">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/custom.css">
    <title>FRIC</title>
    <div class="container-fluid">
        <div class="row">
            <div class="col-2">
                <img  class="float-left" src="../images/cead.png"/>
            </div>
            <div class="col-8">
                <h1 class="text-center"><strong>Findings and Reporting Information Console</strong></h1>
            </div>
            <div class="col-2">
                <img class= "float-right" src="../images/army.png"/>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button type="button" class="btn btn-light btn-sm" onclick="openEventTree()">&#9776;</button>
        <a class="navbar-brand" href="../views/eventOverview.php"><strong>&nbsp;&nbsp;FRIC</strong></a>
        <div class="navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="../views/eventOverview.php">Event</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../views/systemOverview.php">Systems</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../views/taskOverview.php">Tasks</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../views/subtaskOverview.php">Subtasks</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../views/findingsOverview.php">Findings</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../views/analystProgressSummaryContentView.php">Progress</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../views/archiveContentView.php">Archive</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../views/configurationContentView.php">Configuration</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../views/setupContentView.php">Setup</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../views/logContentView.php">Log</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../views/helpContentView.php">Help</a>
            </li>
            </ul>
        </div>
        <?php
            include_once("../views/config.php");
                echo $_SESSION["initials"] . " " . $_SESSION["ip"];
        ?>
        &nbsp;
        <form method="post">
            <input type="submit" name="notification" class ="btn btn-warning font-weight-bold" value = "!">
        </form>
    </nav>
    <script>
        function openEdit() {
            document.getElementById("addEditOverlay").style.width = "100%";
        }

        function closeEdit() {
            document.getElementById("addEditOverlay").style.width = "0%";
        }

        function openNotification() {
            document.getElementById("notification").style.width = "100%";
        }

        function closeNotification() {
            document.getElementById("notification").style.width = "0%";
        }

        function openSync() {
            document.getElementById("sync").style.width = "100%";
        }

        function closeSync() {
            document.getElementById("sync").style.width = "0%";
        }
    </script>

<?php
    include 'NotificationOverlay.php';
    include 'addEditOverlay.php';
    include 'syncOverlay.php';

    if(array_key_exists('notification', $_POST)) { 
        notification(); 
    }
    function notification() {
        echo "<script type='text/javascript'>openNotification();</script>";
    }

    if(array_key_exists('addEdit', $_POST)) { 
        addEdit(); 
    }
    function addEdit() {
        echo "<script type='text/javascript'>openEdit();</script>";
    }

    if(array_key_exists('sync', $_POST)) { 
        sync(); 
    }
    function sync() {
        echo "<script type='text/javascript'>openSync();</script>";
    }

    if(array_key_exists('closeOverlayButton', $_POST)) { 
        closeOverlay(); 
    }
    function closeOverlay() {
        echo "<script type='text/javascript'>closeNotification();</script>";
    }
?>
</div>