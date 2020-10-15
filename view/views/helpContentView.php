<!doctype html>
<html lang="en">

<head>
    <a id="startPage"></a>
    <?php include '../templates/header.php';?>
</head>

<body>
    <div class="container-fluid content">
        <div class="row fluid-extra">
            <div id="eventTree" class="dm-popout" style="background-color:#202020">
                <?php include '../templates/eventTree.php';?>
            </div>
            <div class="col-10">
                <h3 class="text-center"><strong>Help</strong></h3>
                <div style="background-color:#FFFFFF; color:black;" class="col-8 container-fluid">
                    <p class="text-center">The following page describes each section within Findings and Reporting Information Console (FRIC).
                    </p>
                    <h2>Sections</h2>
                    <ul>
                        <a href="#FRICInfo" style="color:black; font-size:20px">&bull;<b>FRIC Main Structure</b></a><br>
                        <ol>
                            <li><a href="#eventTreeInfo" style="color:black; font-size:20px">Event Tree</a><br></li>
                            <li><a href="#searchInfo" style="color:black; font-size:20px">Search</a><br></li>
                            <li><a href="#systemsInfo" style="color:black; font-size:20px">Systems</a><br></li>
                            <li><a href="#tasksInfo" style="color:black; font-size:20px">Tasks</a><br></li>
                            <li><a href="#subtasksInfo" style="color:black; font-size:20px">Subtasks</a><br></li>
                            <li><a href="#findingsInfo" style="color:black; font-size:20px">Findings</a><br></li>
                            <li><a href="#archiveInfo" style="color:black; font-size:20px">Archive</a><br></li>
                            <li><a href="#configInfo" style="color:black; font-size:20px">Configuration</a><br></li>
                            <li><a href="#setupInfo" style="color:black; font-size:20px">Setup</a></li>
                            <li><a href="#logInfo" style="color:black; font-size:20px">Log</a></li><br>
                        </ol>
                        <lo>
                            <a href="#mongoInfo" style="color:black; font-size:20px">&bull;<b>MongoDB</b></a>
                        </lo>
                        <ol>
                            <li><a href="#windowsInfo" style="color:black; font-size:20px">Windows Installation</a></li>
                            <li><a href="#linuxInfo" style="color:black; font-size:20px">Linux Installation</a></li>
                            <li><a href="#mongoDBCommands" style="color:black; font-size:20px; text-align:center">List of Common MongoDB Commands</a></li>
                            <ol type="a">
                                <li><a href="#checkMongoVersion" style="color:black; font-size:20px">Check Current Version</a></li>
                                <li><a href="#enterMongoTerminal" style="color:black; font-size:20px">Enter MongoDB's Interactive Terminal</a></li>
                                <li><a href="#whereisData" style="color:black; font-size:20px">Check Where is all Data Stored</a></li>
                                <li><a href="#usingDBs" style="color:black; font-size:20px">Using Databases</a></li>
                                <ol type="I">
                                    <li><a href="#checkWorkingDB" style="color:black; font-size:20px">Check Current Database</a></li>
                                    <li><a href="#showAllDBs" style="color:black; font-size:20px">Show List of all DBs</a></li>
                                    <li><a href="#create-enterDB" style="color:black; font-size:20px">Create a DB/Access a DB</a></li>
                                    <li><a href="#deleteDB" style="color:black; font-size:20px">Delete a DB</a></li>
                                </ol>
                                <li><a href="#usingCollections" style="color:black; font-size:20px">Using Collections</a></li>
                                <ol type="I">
                                    <li><a href="#checkWorkingCollection" style="color:black; font-size:20px">Check Current Collection</a></li>
                                    <li><a href="#showAllCollections" style="color:black; font-size:20px">Show List of all Collections</a></li>
                                    <li><a href="#create-enterCollection" style="color:black; font-size:20px">Create a Collection/Access a Collection</a></li>
                                    <li><a href="#addNewRecord" style="color:black; font-size:20px">Add a Record to a Collection</a></li>
                                    <li><a href="#deleteCollection" style="color:black; font-size:20px">Delete a Collection</a></li>
                                </ol>
                            </ol>
                            <li><a href="#installCompass" style="color:black; font-size:20px">Install MongoDB GUI (Compass)</a></li>
                            <ol type="a">
                                <li><a href="#windowsCompassInstall" style="color:black; font-size:20px">Windows Installation</a></li>
                                <li><a href="#linuxCompassInstall" style="color:black; font-size:20px">Linux Installation</a></li>
                                <li><a href="#usingCompass" style="color:black; font-size:20px">Quick Guide to Using Compass</li>
                            </ol><br>
                        </ol>
                        <li><a href="#serverInfo" style="color:black; font-size:20px">&bull;<b>Server Info</b></a></li>
                        <ol>
                            <li><a href="#windowsServerInfo" style="color:black; font-size:20px">Windows Server</a></li>
                            <li><a href="#linuxServerInfo" style="color:black; font-size:20px">Linux Server</a></li><br>
                        </ol>
                        <li><a href="#extraInfo" style="color:black; font-size:20px">&bull;<b>FAQ</b></a></li><br>

                        <!-- Section link moved up for better display-->
                        <a id="FRICInfo"></a>
                        <a id="eventTreeInfo"></a>
                        <li><a href="#commonProblems" style="color:black; font-size:20px">&bull;<b>Common Problems</b></a></li>
                        <ol>
                            <li><a href="#windowsProblems" style="color:black; font-size:20px">Windows Common Problems</a></li>
                            <li><a href="#linuxProblems" style="color:black; font-size:20px">Linux Common Problems</a></li>
                        </ol>
                    </ul>

                    <!--Section Break Line-->
                    <hr style="height:5px;border-width:10;color:gray;background-color:gray">

                    <h3 style="color:black;">FRIC Main Structure</h3>

                    <!-- Section link moved up for better display-->
                    <a id="searchInfo"></a>

                    <h4>Event Tree
                        <a href="#startPage" style="color:black;font-size:10px">[Top]</a>
                    </h4>
                    <ul>
                        <li>-Provides a tree list view of all Systems, Events, Findigs, Tasks, and Subtasks.</li>
                        <li>-Each element is clickabable and will direct to a more specific view.</li>
                        <li>-Tree is collapsable for viewability.</li>
                    </ul>

                    <!-- Section link moved up for better display-->
                    <a id = "systemsInfo"></a>

                    <h4>Search
                        <a href="#startPage" style="color:black;font-size:10px">[Top]</a>
                    </h4>
                    <ul>
                        <li>-Provides a text field where the user can enter keywords, or brief descriptions, and find documents related to this request.</li>
                        <li>-Pressing the <em>Search</em> button will display a list of all results associated with the search request.</li>
                    </ul>

                    <h4>Systems
                        <a href="#startPage" style="color:black;font-size:10px">[Top]</a>
                    </h4>
                    <ul>
                        <li>-Provides a table of all Tasks and Findings alongside their respective progress within a System.</li>
                        <!-- Section link moved up for better display-->
                        <a id = "tasksInfo"></a>

                        <li>-Each System will be a composition of documents that can be made up of Tasks (further divided into Sub-tasks), Findings, and other artifacts (notes, pictures, files).</li>
                        <li>-The Lead Analysts will have the option to create new Systems, and all users will be able to archive Systems, which will remove said System from the user's workstation, but will not delete them.</li>
                    </ul>

                    <h4>Tasks
                        <a href="#startPage" style="color:black;font-size:10px">[Top]</a>
                    </h4>
                    <ul>
                        <!-- Section link moved up for better display-->
                        <a id = "subtasksInfo"></a>
                        
                        <li>-Provides a table of all Tasks within an Event and their associated Systems, progress, priority, the analyst working in a specific task, as well as a due date (set by the Lead Analyst).</li>
                        <li>-Tasks may be also pre-created by the Lead Analyst and assigned to analysts; or analysts themselves may choose from all the tasks and decide which one they want to work on.</li>
                        <li>-Every user is able to create tasks and associate them to a System as they see fit.</li>
                    </ul>

                    <h4>Subtasks
                        <a href="#startPage" style="color:black;font-size:10px">[Top]</a>
                    </h4>
                    <ul>
                        <li>-Provides a table of all Sub-tasks within an Event and their associated Tasks, progress, priority, the analyst working in a specific task, as well as a due date (set by the Lead Analyst).</li>
                            <!-- Section link moved up for better display-->
                            <a id = "findingsInfo"></a>
                    
                        <li>-Sub-tasks are a sub-division of Tasks, they may help organize a user's work by setting smaller deadlines that may fall before or at the associated Task's due date.</li>
                        <li>-Every user is able to create Sub-tasks but may not associate them to any Task, as they are related to Tasks ONLY.</li>
                    </ul>

                    <h4>Findings
                        <a href="#startPage" style="color:black;font-size:10px">[Top]</a>
                    </h4>
                    <ul>
                        <li>-Provides a table of Findigs within an Event; including a unique ID, their associated System, Task, Sub-task, working Analyst, with some other information.</li>
                        <!-- Section link moved up for better display-->
                        <a id = "archiveInfo"></a>

                        <li>-Findings may be associated to a Sub-task, Task, System, or no association at all (in this case, the Finding will be associated to the Event as a whole).</li>
                        <li>-The working Analyst is responsible for entering all the necessary information regarding a Finding, such as evidence for a problem, notes, classification, etc.</li>
                    </ul>

                    <h4>Archive
                        <a href="#startPage" style="color:black;font-size:10px">[Top]</a>
                    </h4>
                    <ul>
                        <!-- Section link moved up for better display-->
                        <a id = "configInfo"></a>

                        <li>-Provides tables for all Systems, Events, Findigs, Tasks, and Subtasks within an Event.</li>
                        <li>-Users will be able to Restore any of the list above, which will retrieve its information from a database, and make it visible for all.</li>
                        <li>-Events that have been "Deleted" or Archived will not appear in the "Active" workspace, but they will appear in this section.</li>
                    </ul>

                    <h4>Configuration
                        <a href="#startPage" style="color:black;font-size:10px">[Top]</a>
                    </h4>
                    <!-- Section link moved up for better display-->
                    <a id = "setupInfo"></a>

                    <ul>
                        <li>-Provides tables for different Event's specs, such as Rules, Event's Overall progress, Event's classification, Posture, Threat level, etc.</li>
                        <li>-Only Lead Analyst will be able to set and edit these specs, but all users will be able to filter them through depending on specific values.</li>
                        <li>-The Event configuration will appear in all Reports generated by FRIC.</li>
                    </ul>

                    <!-- Section link moved up for better display-->
                    <a id = "logInfo"></a>
                    
                    <h4>Setup
                        <a href="#startPage" style="color:black;font-size:10px">[Top]</a>
                    </h4>
                    <ul>
                        <li>-Provides a table in which users will be able to sync with other users or the Lead Analyst.</li>
                        <li>-Users are asked to input the IP address of the Lead Analyst (only if syncing has not been done before, after the first time this information will be stored).</li>
                    </ul>
                    <h4>Log
                        <a href="#startPage" style="color:black;font-size:10px">[Top]</a>
                    </h4>
                    <ul>
                        <li>-Provides a table in which users will be able to see modifications made to specific systems within an Event as well as what Analyst performed said action.</li>
                        <li>-This info table will be updated constantly right after an action has beed made, such as the archive of a Task, System, or Event; as well as the creation of or uploading of artifacts.</li>
                    </ul>

                    <!--Start of info sections-->
                    <!--Section Break Line-->
                    <hr style="height:5px;border-width:10;color:gray;background-color:gray">
                    <h3 id="mongoInfo">MongoDB
                        <a href="#startPage" style="color:black;font-size:10px">[Top]</a>
                    </h3>
                    <ul>
                        The first step is to download the Mongo Database software using the following website:
                        <li style="text-align:center">https://www.mongodb.com/try/download/community</li>
                        <br>The download process is very simple: just select the platform in which you are using FRIC, as well as the type of download file and version (4.4.1 is the most current as of 10/2020)
                        <br><br>&bull;If you chose <b>Windows</b>, then follow these steps:
                            <ol id = "windowsInfo">
                                <li>Decompress the download file</li>
                                <li>Run the .exe file. Usually it's named <em>mongodb.exe</em></li>
                                <li>Follow the installing instruction displayed on the screen, and complete the installation</li>
                                <lo style="font-size:12px">NOTE: You can customize this installation however you'd like</lo>
                                <li>Go to the folder location where MongoDB is installed (from step 3) and enter the <em>bin</em> folder</li>
                                <li>Copy the location of the <em>bin</em> folder and add it to the System Environmental Variables</li>
                                <li>Restart the device if needed</li>
                                <li>Open a console and type the command <em> mongo -version </em>and if you get the Shell version, then MongoDB is now installed in your system</li>
                                <li>On the same or a different console, type the command <em> mongo </em> and you will be using the MongoDB shell</li>
                            </ol><br>

                        &bull;If you chose <b>Linux Kali</b>, then follow these steps:
                        <ol id = "linuxInfo">
                            <!--wget -q0 - https://mongodb.org/static/pgp/server-4.4.asc | sudo apt-key add -
                            Enter your password, and if everything is done correctly, you should get an "OK" in the terminal.-->
                            <li><em>[Download MongoDB File]</em> Open a Terminal and type the command:</li><br>
                            <code style="color:black">
                                <p style="font-size:14px;text-align:left">wget -qO - https://www.mongodb.org/static/pgp/server-4.4.asc | sudo apt-key add -</p>
                            </code>
                            <lo>You should receive a message back saying "OK"</lo>
                            <li><em>[Create the list file]</em> Enter this command with your Debian version (buster / stretch):</li>
                            <code style="color:black">
                                <p style="font-size:14px;text-align:center">echo "deb http://repo.mongodb.org/apt/debian [VERSION NAME]/mongodb-org/4.4 main" | sudo tee /etc/apt/sources.list.d/mongodb-org-4.4.list</p>
                            </code>
                            <li><em>[Reload local package's database]</em> Enter the command:</li>
                            <code style="color:black">
                                <p style="font-size:14px;text-align:center">sudo apt-get update</p>
                            </code>
                            <li><em>[Install MongoDB Packages]</em> Enter the command:</li>
                            <code style="color:black">
                                <p style="font-size:14px;text-align:center">sudo apt-get install -y mongodb-org</p>
                            </code>
                        </ol>
                        <ol>
                            <lo>By default, MongoDB instance stores:</lo>
                            <ol type="I">
                                <li>its data files in /var/lib/mongodb</li>
                                <li>its log files in /var/log/mongodb</li>
                            </ol>
                        </ol>
                    </ul>
                            
                    <!--Start of info sections-->
                    <h3 id="mongoDBCommands"><br>List of Common MongoDB Commands
                        <a href="#startPage" style="color:black;font-size:10px">[Top]</a></h3>
                        
                    <ul>
                        <h4 id="checkMongoVersion">Check Current Version
                            <a href="#startPage" style="color:black;font-size:10px">[Top]</a></h4>
                        <ul>
                            <lo>Open a Console (Windows) or Terminal (Linux) and type the following command:</lo><br>
                            <p style="font-size:15px;text-align:center"><samp> mongo -version</samp>  or  <samp> mongod -version </samp></p>
                            <lo><em>If using <b>Windows</b>, you'll be shown the following:</lo></em><br>
                            <samp style="font-size:15px">
                                <ul>
                                    C:\Users\MegaUser>mongo -version<br>
                                    <p><b>MongoDB shell version v4.4.1</b></p>
                                    <p style="font-size:18px">or</p>
                                    C:\Users\MegaUser>mongod -version<br>
                                    <b>db version v4.4.1</b><br>
                                </ul>
                            </samp>
                                <br><lo><em>If using <b>Linux</b>, you'll be shown the following:</lo></em><br>
                            <samp>                            
                                <ul>
                                    MegaUser@Console:~$ mongod --version<br>
                                    <p><b>db version v3.6.8</b></p>
                                </ul>
                                <p style="font-size:18px">or</p>
                                <ul>
                                    MegaUser@Console:~$ mongo --version<br>
                                    <b>MongoDB shell version v3.6.8</b><br>
                                </ul>
                            </samp>
                        </ul>

                        <br><h4 id="enterMongoTerminal">Enter MongoDB Interactive Shell
                            <a href="#startPage" style="color:black;font-size:10px">[Top]</a></h4>
                        <ul>
                            <lo>In <b>Windows</b> and <b>Linux</b>; enter the command</lo><br>
                            <samp>
                                <p style="text-align:center">mongo</p>
                            </samp>
                        </ul>
                            
                        <br><h4 id="whereisData">Check Where is all Data Stored
                            <a href="#startPage" style="color:black;font-size:10px">[Top]</a></h4>
                        <ul>
                            <lo>In <b>Windows</b>, all the information is stored in the <em>MongoDB</em> folder inside <em>Program Files</em>. More specifically, this location:</em></lo><br>
                            <br><samp>
                                <p style="text-align:center">"LocalDisk":\Program Files\MongoDB\Server\"MongoDBVersion"\data</p>
                            </samp>
                        </ul>
                        <ul>
                            <lo>In <b>Kali Linux</b>, all the information is stored in the folder inside []. More specifically, this location:</em></lo>
                            <br><samp>
                                <p style="text-align:center">/var/lib/mongodb</p>
                            </samp>
                            <lo>Files will have the extension <em>.wt</em> and they cannot be accessed from outside the Mongo Shell or Compass.</lo>
                        </ul>
                            
                        <br><h4 id="usingDBs">Using Databases
                            <a href="#startPage" style="color:black;font-size:10px">[Top]</a></h4>

                        <ul>
                            <br><h4 id="checkWorkingDB">Check Current Database</h4>

                            <br><h4 id="showAllDBs">Show List of all Databases</h4>

                            <br><h4 id="create-enterDB">Create a DB / Access a DB</h4>

                            <br><h4 id="deleteDB">Delete a DB</h4>
                        </ul>

                        <br><h4 id="usingCollections">Using Collections
                            <a href="#startPage" style="color:black;font-size:10px">[Top]</a></h4>
                        <ul>
                            <br><h4 id="checkWorkingCollection">Check Current Collection</h4>

                            <br><h4 id="showAllCollections">Show List of all Collections</h4>

                            <br><h4 id="create-enterCollection">Create a Collection / Access a Collection</h4>
                                    
                            <br><h4 id="addNewRecord">Add a Record to a Collection</h4>

                            <br><h4 id="deleteCollection">Delete a Collection</h4>
                        </ul>

                        <br><h4 id="installCompass">Install MongoDB GUI (Compass)
                            <a href="#startPage" style="color:black;font-size:10px">[Top]</a></h4>
                        <ul>
                            <h4 id="windowsCompassInstall">Windows Compass Installation</a></lo><br>
                            <h4 id="linuxCompassInstall">Linux Compass Installation</a></lo>
                        </ul>
                    </ul>
                    <!--Section Break Line-->
                    <hr style="height:5px;border-width:10;color:gray;background-color:gray">
                    <h4 id="serverInfo">Server Information
                        <a href="#startPage" style="color:black;font-size:10px">[Top]</a>
                    </h4>
                    <ul>
                        <a id = "windowsServerInfo"></a>
                        &bull;If you chose <b>Windows</b>, then follow these steps:<br>
                        <a id = "linuxServerInfo"></a>
                        &bull;If you chose <b>Linux</b>, then follow these steps:
                    </ul>

                    <!--Section Break Line-->
                    <hr style="height:5px;border-width:10;color:gray;background-color:gray">
                    <h4 id="extraInfo">FAQ
                        <a href="#startPage" style="color:black;font-size:10px">[Top]</a>
                    </h4>

                    <!--Section Break Line-->
                    <hr style="height:5px;border-width:10;color:gray;background-color:gray">
                    <h4 id="commonProblems">Common Problems
                        <a href="#startPage" style="color:black;font-size:10px">[Top]</a>
                    </h4>
                    <ul>
                        <a id = "windowsProblems"></a>
                        <b>Windows</b> Common Problems<br>
                        <a id = "linuxProblems"></a>
                        <b>Linux</b> Common Problems<br>
                        Set the root folder to FRIC's<br>
                        Make sure that FRIC folder is inside /var/www<br>
                        change apache2.conf file inside /etc/apache2<br>
                        change .conf files inside /etc/apache2/sites-available/<br>
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