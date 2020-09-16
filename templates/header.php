  
<?php
echo <<< HEADER
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/custom.css">
    <link rel="stylesheet" href="../css/all.css">
    <link rel="icon" href="../images/fav.ico">
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
        <a class="navbar-brand" href="../views/eventContentView.php"><strong>FRIC</strong></a>
        <div class="navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="../views/eventContentView.php">Event</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../views/systemContentView.php">Systems</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../views/taskContentView.php">Tasks</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../views/subtaskContentView.php">Subtasks</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../views/findingsContentView.php">Findings</a>
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
                <a class="nav-link" href="../views/helpContentView.php">Help</a>
            </li>
            </ul>
        </div>
    </nav>  
HEADER;
    include 'overlay.php';
?>