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
                <h3 class="text-center"><strong>Help</strong></h3>
                <div style="background-color:#FFFFFF; color:black;" class="col-8 container fluid-col">
                    <p class="text-center">The following page describes each section within Findings and Reporting
                        Information Console (FRIC).
                    </p>
                    <h2>Sections</h2>
                        <ul>
                            <a href="#eventTreeInfo" style="color:black; font-size:20px">&bull;Event Tree</a><br>
                            <a href="#searchInfo" style="color:black; font-size:20px">&bull;Search</a><br>
                            <a href="#systemsInfo" style="color:black; font-size:20px">&bull;Systems</a><br>
                            <a href="#tasksInfo" style="color:black; font-size:20px">&bull;Tasks</a><br>
                            <a href="#subtasksInfo" style="color:black; font-size:20px">&bull;Subtasks</a><br>
                            <a href="#findingsInfo" style="color:black; font-size:20px">&bull;Findings</a><br>
                            <a href="#archiveInfo" style="color:black; font-size:20px">&bull;Archive</a><br>
                            <a href="#configInfo" style="color:black; font-size:20px">&bull;Configuration</a><br>
                            <a href="#setupInfo" style="color:black; font-size:20px">&bull;Setup</a>
                        </ul>

                    <h4 id="eventTreeInfo">Event Tree
                        <a href="#startPage" style="color:black;font-size:10px">[Top]</a></h4>
                    <ul>
                        <li>-Provides a tree list view of all Systems, Events, Findigs, Tasks, and Subtasks.</li>
                        <li>-Each element is clickabable and will direct to a more specific view.</li>
                    </ul>

                    <h4 id = "searchInfo">Search
                        <a href="#startPage" style="color:black;font-size:10px">[Top]</a></h4>
                    <ul>
                        <li>-Provides a tree list view of all Systems, Events, Findigs, Tasks, and Subtasks.</li>
                        <li>-Each element is clickabable and will direct to a more specific view.</li>
                        <li>-Tree is collapsable for viewability.</li>
                    </ul>

                    <h4 id = "systemsInfo">Systems
                        <a href="#startPage" style="color:black;font-size:10px">[Top]</a></h4>
                    <ul>
                        <li>-Provides a tree list view of all Systems, Events, Findigs, Tasks, and Subtasks.</li>
                        <li>-Each element is clickabable and will direct to a more specific view.</li>
                        <li>-Tree is collapsable for viewability.</li>
                    </ul>

                    <h4 id = "tasksInfo">Tasks
                        <a href="#startPage" style="color:black;font-size:10px">[Top]</a></h4>
                    <ul>
                        <li>-Provides a tree list view of all Systems, Events, Findigs, Tasks, and Subtasks.</li>
                        <li>-Each element is clickabable and will direct to a more specific view.</li>
                        <li>-Tree is collapsable for viewability.</li>
                    </ul>

                    <h4 id = "subtasksInfo">Subtasks
                        <a href="#startPage" style="color:black;font-size:10px">[Top]</a></h4>
                    <ul>
                        <li>-Provides a tree list view of all Systems, Events, Findigs, Tasks, and Subtasks.</li>
                        <li>-Each element is clickabable and will direct to a more specific view.</li>
                        <li>-Tree is collapsable for viewability.</li>
                    </ul>

                    <h4 id = "findingsInfo">Findings
                        <a href="#startPage" style="color:black;font-size:10px">[Top]</a></h4>
                    <ul>
                        <li>-Provides a tree list view of all Systems, Events, Findigs, Tasks, and Subtasks.</li>
                        <li>-Each element is clickabable and will direct to a more specific view.</li>
                        <li>-Tree is collapsable for viewability.</li>
                    </ul>

                    <h4 id = "archiveInfo">Archive
                        <a href="#startPage" style="color:black;font-size:10px">[Top]</a></h4>
                    <ul>
                        <li>-Provides a tree list view of all Systems, Events, Findigs, Tasks, and Subtasks.</li>
                        <li>-Each element is clickabable and will direct to a more specific view.</li>
                        <li>-Tree is collapsable for viewability.</li>
                    </ul>

                    <h4 id = "configInfo">Configuration
                        <a href="#startPage" style="color:black;font-size:10px">[Top]</a></h4>
                    <ul>
                        <li>-Provides a tree list view of all Systems, Events, Findigs, Tasks, and Subtasks.</li>
                        <li>-Each element is clickabable and will direct to a more specific view.</li>
                        <li>-Tree is collapsable for viewability.</li>
                    </ul>

                    <h4 id = "setupInfo">Setup
                        <a href="#startPage" style="color:black;font-size:10px">[Top]</a></h4>
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