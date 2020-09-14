<?php
echo <<< HEADER
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/custom.css">
    <link rel="icon" href="../images/fav.ico">
    <title>FRIC</title>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <img  class="float-left" src="../images/cead.png"/>
            </div>
            <div class="col-md-6">
                <h1 class="text-center"><strong>Findings and Reporting Information Console</strong></h1>
            </div>
            <div class="col">
                <img class= "float-right" src="../images/army.png"/>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="../views/general.php">FRIC</a>
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
                <a class="nav-link" href="#">Help</a>
            </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <a href= "../views/noResults.php" class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</a>
            </form>
        </div>
    </nav>  
HEADER
?>