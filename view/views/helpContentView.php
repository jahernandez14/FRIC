<!doctype html>
<html lang="en">

<head>
    <a id = "section_start"></a>
    <?php include '../templates/header.php';?>
</head>

<body>
<<<<<<< Updated upstream

    <div class="container-fluid content">
        <div class="row">
=======
    <div class="container-fluid">
        <div class="row fluid-col-extra">
>>>>>>> Stashed changes
            <div id="eventTree" class="dm-popout" style="background-color:#202020">
                <?php include '../templates/eventTree.php';?>
            </div>
            <div class="col-10">
                <h3 class="text-center"><strong>Help</strong></h3>
                <div style="background-color:#FFFFFF; color:black;" class="col-8 container fluid-col">
                    <p class="text-center">The following page describes each section within Findings and Reporting
                        Information Console (FRIC).</p>
                    
                    <h3>Sections</h3>
                        <ul>
                            <!--Another reference will be made here to take the user to a "Getting Started with FRIC"
                            Where the DB as well as other dependencies will be explained, so that the user can setup everything
                            <a href="gettingStarted.php" style="color:blue">&bull;Getting Everyting Started</a><br>/-->
                            <a href="#event_tree_info" style="color:black">&bull;Event Tree</a><br>
                            <a href="#search_info" style="color:black">&bull;Search</a><br>
                            <a href="#systems_info" style="color:black">&bull;Systems</a><br>
                            <a href="#tasks_info" style="color:black">&bull;Tasks</a><br>
                            <a href="#subtasks_info" style="color:black">&bull;Subtasks</a><br>
                            <a href="#findings_info" style="color:black">&bull;Findings</a><br>
                            <a href="#archive_info" style="color:black">&bull;Archive</a><br>
                            <a href="#config_info" style="color:black">&bull;Configuration</a><br>
                            <a href="#setup_info" style="color:black">&bull;Setup</a><br>
                        </ul>
                    <a id = "event_tree_info"></a>
                    <h4>Event Tree
                    <a href="#section_start" style="font-size:10px;color:black">[Top]</a></h4>
                    <ul>
                        <li>-Provides a tree list view of all Systems, Events, Findigs, Tasks, and Subtasks.</li>
                        <li>-Each element is clickabable and will direct to a more specific view.</li>
                    </ul>
                    <a id = "search_info"></a>
                    <h4>Search
                    <a href="#section_start" style="font-size:10px;color:black">[Top]</a></h4>
                    <ul>
                        <li>-Provides a tree list view of all Systems, Events, Findigs, Tasks, and Subtasks.</li>
                        <li>-Each element is clickabable and will direct to a more specific view.</li>
                        <li>-Tree is collapsable for viewability.</li>
                    </ul>
                    <a id = "systems_info"></a>
                    <h4>Systems
                    <a href="#section_start" style="font-size:10px;color:black">[Top]</a></h4>
                    <ul>
                        <li>-Provides a tree list view of all Systems, Events, Findigs, Tasks, and Subtasks.</li>
                        <li>-Each element is clickabable and will direct to a more specific view.</li>
                        <li>-Tree is collapsable for viewability.</li>
                    </ul>
                    <a id = "tasks_info"></a>
                    <h4>Tasks
                    <a href="#section_start" style="font-size:10px;color:black">[Top]</a></h4>
                    <ul>
                        <li>-Provides a tree list view of all Systems, Events, Findigs, Tasks, and Subtasks.</li>
                        <li>-Each element is clickabable and will direct to a more specific view.</li>
                        <li>-Tree is collapsable for viewability.</li>
                    </ul>
                    <a id = "subtasks_info"></a>
                    <h4>Subtasks
                    <a href="#section_start" style="font-size:10px;color:black">[Top]</a></h4>
                    <ul>
                        <li>-Provides a tree list view of all Systems, Events, Findigs, Tasks, and Subtasks.</li>
                        <li>-Each element is clickabable and will direct to a more specific view.</li>
                        <li>-Tree is collapsable for viewability.</li>
                    </ul>
                    <a id = "findings_info"></a>
                    <h4>Findings
                    <a href="#section_start" style="font-size:10px;color:black">[Top]</a></h4>
                    <ul>
                        <li>-Provides a tree list view of all Systems, Events, Findigs, Tasks, and Subtasks.</li>
                        <li>-Each element is clickabable and will direct to a more specific view.</li>
                        <li>-Tree is collapsable for viewability.</li>
                    </ul>
                    <a id = "archive_info"></a>
                    <h4>Archive
                    <a href="#section_start" style="font-size:10px;color:black">[Top]</a></h4>
                    <ul>
                        <li>-Provides a tree list view of all Systems, Events, Findigs, Tasks, and Subtasks.</li>
                        <li>-Each element is clickabable and will direct to a more specific view.</li>
                        <li>-Tree is collapsable for viewability.</li>
                    </ul>
                    <a id = "config_info"></a>
                    <h4>Configuration
                    <a href="#section_start" style="font-size:10px;color:black">[Top]</a></h4>
                    <ul>
                        <li>-Provides a tree list view of all Systems, Events, Findigs, Tasks, and Subtasks.</li>
                        <li>-Each element is clickabable and will direct to a more specific view.</li>
                        <li>-Tree is collapsable for viewability.</li>
                    </ul>
                    <a id = "setup_info"></a>
                    <h4>Setup
                    <a href="#section_start" style="font-size:10px;color:black">[Top]</a></h4>
                    <ul>
                        <li>-Provides a tree list view of all Systems, Events, Findigs, Tasks, and Subtasks.</li>
                        <li>-Each element is clickabable and will direct to a more specific view.</li>
                        <li>-Tree is collapsable for viewability.</li>
                    </ul>
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